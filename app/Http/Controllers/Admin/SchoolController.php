<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolRequest;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Imports\SchoolsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Modules\Course\App\Models\Course;
use Modules\Course\App\Models\CourseEnrollment;
use Modules\Course\App\Models\CourseEnrollmentList;
use Exception;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::orderBy('id', 'asc')->paginate(15);
        return view('admin.school.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.school.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SchoolRequest $request)
    {
        try {
            $school = new School();
            $school->name = $request->name;
            $school->slug = $request->slug ?: Str::slug($request->name);
            $school->primary_color = $request->primary_color;
            $school->secondary_color = $request->secondary_color;
            $school->status = $request->status;

            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoName = time() . '_' . Str::random(10) . '.' . $logo->getClientOriginalExtension();
                $uploadPath = public_path('uploads/schools/');
                if (!File::isDirectory($uploadPath)) {
                    File::makeDirectory($uploadPath, 0755, true, true);
                }
                $logo->move($uploadPath, $logoName);
                $school->logo = $logoName;
            }

            $school->save();

            $notification = trans('admin_validation.Created Successfully');
            $notification = array('messege' => $notification, 'alert-type' => 'success');

            return redirect()->route('admin.schools.index')->with($notification);
        } catch (\Throwable $th) {
            $notification = array('messege' => 'Error al crear el colegio: ' . $th->getMessage(), 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        $students = $school->students()
                           ->orderBy('created_at', 'desc')
                           ->paginate(10, ['*'], 'students_page');

        $instructors = $school->instructors()
                              ->orderBy('created_at', 'desc')
                              ->paginate(10, ['*'], 'instructors_page');

        // Cursos disponibles para asignación masiva
        $courses = Course::where('approved_by_admin', 'approved')->orderBy('id', 'desc')->get();

        return view('admin.school.show', compact('school', 'students', 'instructors', 'courses'));
    }


    /**
     * Asignar un curso a todos los estudiantes de un colegio (carga masiva)
     */
    public function assignCourse(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        $school = School::findOrFail($id);
        $course = Course::findOrFail($request->course_id);

        $assignedCount = 0;

        // Si es "dry run" solo contamos cuántos se asignarían sin modificar la DB
        $isDryRun = $request->boolean('dry_run');

        if ($isDryRun) {
            // recorrer en chunks para cálculo sin insertar
            $school->students()->where('status', 'enable')->chunk(200, function($students) use ($course, &$assignedCount) {
                foreach ($students as $student) {
                    $enrollment = CourseEnrollment::where('student_id', $student->id)->first();

                    if ($enrollment) {
                        $exists = CourseEnrollmentList::where('course_enrollment_id', $enrollment->id)
                            ->where('course_id', $course->id)
                            ->exists();

                        if (!$exists) {
                            $assignedCount++;
                        }
                    } else {
                        // no tiene enrollment, por lo tanto se asignaría
                        $assignedCount++;
                    }
                }
            });

            $message = "$assignedCount estudiantes serían asignados al curso: " . ($course->title ?? $course->id);
            return redirect()->back()->with(['message' => $message, 'alert-type' => 'info']);
        }

        // Operación real: insertar en transacción
        DB::beginTransaction();
        try {
            $school->students()->where('status', 'enable')->chunk(200, function($students) use ($course, &$assignedCount) {
                foreach ($students as $student) {
                    // Obtener o crear inscripción del estudiante
                    $enrollment = CourseEnrollment::firstOrCreate(
                        ['student_id' => $student->id],
                        [
                            'order_id' => 'ADMIN-' . time(),
                            'transaction_id' => 'TXN-ADMIN-' . time(),
                            'total_amount' => 0,
                            'payment_method' => 'Admin Assignment',
                            'payment_status' => 'success',
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]
                    );

                    // Evitar duplicados: si ya tiene el curso, saltar
                    $exists = CourseEnrollmentList::where('course_enrollment_id', $enrollment->id)
                        ->where('course_id', $course->id)
                        ->exists();

                    if (!$exists) {
                        CourseEnrollmentList::create([
                            'course_enrollment_id' => $enrollment->id,
                            'course_id' => $course->id,
                            'instructor_id' => $course->user_id ?? null,
                            'total_amount' => 0,
                        ]);
                        $assignedCount++;
                    }
                }
            });

            DB::commit();

            $message = "$assignedCount estudiantes asignados al curso: " . ($course->title ?? $course->id);
            return redirect()->back()->with(['message' => $message, 'alert-type' => 'success']);

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['message' => 'Error: ' . $e->getMessage(), 'alert-type' => 'error']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        return view('admin.school.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SchoolRequest $request, School $school)
    {
        $school->name = $request->name;
        $school->slug = $request->slug ?: Str::slug($request->name);
        $school->primary_color = $request->primary_color;
        $school->secondary_color = $request->secondary_color;
        $school->status = $request->status;

        if ($request->hasFile('logo')) {
            $oldLogo = $school->logo;

            $logo = $request->file('logo');
            $logoName = time() . '_' . Str::random(10) . '.' . $logo->getClientOriginalExtension();

            $uploadPath = public_path('uploads/schools/');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }

            $logo->move($uploadPath, $logoName);
            $school->logo = $logoName;

            if ($oldLogo && File::exists(public_path('uploads/schools/' . $oldLogo))) {
                File::delete(public_path('uploads/schools/' . $oldLogo));
            }
        }

        $school->save();

        $notification = trans('admin_validation.Update Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');

        return redirect()->route('admin.schools.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        if ($school->users()->count() > 0) {
            $notification = trans('admin_validation.This school has associated users and cannot be deleted');
            $notification = array('messege' => $notification, 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        if ($school->logo && File::exists(public_path('uploads/schools/' . $school->logo))) {
            File::delete(public_path('uploads/schools/' . $school->logo));
        }

        $school->delete();

        $notification = trans('admin_validation.Delete Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');

        return redirect()->route('admin.schools.index')->with($notification);
    }

    /**
     * Import schools from CSV file.
     */
    public function importCSV(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);

        $file = $request->file('file');
        $filePath = $file->getRealPath();

        $added = 0;
        $skipped = 0; 
        $slugsInCsv = []; // Para evitar duplicados dentro del CSV

        if (($handle = fopen($filePath, 'r')) !== false) {
            $header = fgetcsv($handle, 1000, ',');
            if (!$header) {
                $notification = array('messege' => 'El archivo CSV está vacío o tiene un formato incorrecto.', 'alert-type' => 'error');
                return redirect()->back()->with($notification);
            }

            while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                if (count($row) != count($header)) {
                    $skipped++;
                    continue;
                }

                $data = array_combine($header, $row);

                $name = trim($data['name'] ?? '');
                $slug = trim($data['slug'] ?? '');
                $logoUrl = trim($data['logo'] ?? '');
                $primary_color = $data['primary_color'] ?? '#000000';
                $secondary_color = $data['secondary_color'] ?? '#FFFFFF';
                $status = isset($data['status']) && in_array(strtolower(trim($data['status'])), ['active','inactive'])
                            ? strtolower(trim($data['status']))
                            : 'inactive';

                // Validar nombre obligatorio
                if (!$name) {
                    $skipped++;
                    continue;
                }

                // Validar que no exista colegio con mismo nombre
                if (School::where('name', $name)->exists()) {
                    $skipped++;
                    continue;
                }

                // Generar slug si está vacío
                if (!$slug) {
                    $slug = Str::slug($name);
                }

                // Evitar duplicados dentro del CSV
                if (in_array($slug, $slugsInCsv)) {
                    $skipped++;
                    continue;
                }
                $slugsInCsv[] = $slug;

                // Asegurar slug único en DB
                $originalSlug = $slug;
                $counter = 1;
                while (School::where('slug', $slug)->exists()) {
                    $slug = $originalSlug . '-' . $counter;
                    $counter++;
                }

                // Descargar logo si hay URL
                $logoName = null;
                if ($logoUrl) {
                    try {
                        $contents = @file_get_contents($logoUrl);
                        if (!$contents) throw new \Exception("No se pudo descargar la imagen.");

                        $ext = pathinfo(parse_url($logoUrl, PHP_URL_PATH), PATHINFO_EXTENSION) ?: 'png';
                        $logoName = time() . '_' . Str::random(10) . '.' . $ext;

                        $uploadPath = public_path('uploads/schools/');
                        if (!File::isDirectory($uploadPath)) {
                            File::makeDirectory($uploadPath, 0755, true, true);
                        }

                        file_put_contents($uploadPath . $logoName, $contents);
                    } catch (\Exception $e) {
                        $skipped++;
                        continue;
                    }
                }

                // Crear colegio
                try {
                    School::create([
                        'name' => $name,
                        'slug' => $slug,
                        'logo' => $logoName,
                        'primary_color' => $primary_color,
                        'secondary_color' => $secondary_color,
                        'status' => $status,
                    ]);
                    $added++;
                } catch (\Exception $e) {
                    $skipped++;
                }
            }

            fclose($handle);
        }

        // Preparar mensaje final
        if ($added > 0) {
            $message = "$added colegios importados correctamente.";
            if ($skipped > 0) {
                $message .= " $skipped filas fueron ignoradas por errores o duplicados.";
            }
            $notification = array('messege' => $message, 'alert-type' => 'success');
        } else {
            $message = "No se importó ningún colegio. $skipped filas fueron ignoradas.";
            $notification = array('messege' => $message, 'alert-type' => 'error');
        }

        return redirect()->back()->with($notification);
    }

    /**
     * Update school status (AJAX)
     */
    public function school_status(Request $request, $id)
    {
        $school = School::findOrFail($id);
        $school->status = $request->status;
        $school->save();

        $notification = trans('admin_validation.Update Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');

        return response()->json(['notification' => $notification]);
    }
}