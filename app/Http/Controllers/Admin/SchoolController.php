<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolRequest;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Imports\SchoolsImport;
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

            $notification = array('message' => "Colegio '{$school->name}' creado correctamente", 'alert-type' => 'success');

            return redirect()->route('admin.schools.index')->with($notification);
        } catch (\Throwable $th) {
            $notification = array('message' => 'Error al crear el colegio: ' . $th->getMessage(), 'alert-type' => 'error');
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

        $notification = array('message' => "Colegio '{$school->name}' actualizado correctamente", 'alert-type' => 'success');

        return redirect()->route('admin.schools.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        $schoolName = $school->name;

        if ($school->users()->count() > 0) {
            $notification = array('message' => "El colegio '{$schoolName}' tiene usuarios asociados y no puede ser eliminado", 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        if ($school->logo && File::exists(public_path('uploads/schools/' . $school->logo))) {
            File::delete(public_path('uploads/schools/' . $school->logo));
        }

        $school->delete();

        $notification = array('message' => "Colegio '{$schoolName}' eliminado correctamente", 'alert-type' => 'success');

        return redirect()->route('admin.schools.index')->with($notification);
    }

    /**
     * Import schools from Excel file.
     */
    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|file'
        ]);

        try {
            $file = $request->file('file');

            // Validar extensión manualmente
            $extension = strtolower($file->getClientOriginalExtension());
            if (!in_array($extension, ['xls', 'csv'])) {
                $notification = array('message' => 'El archivo debe ser .xls o .csv', 'alert-type' => 'error');
                return redirect()->back()->with($notification);
            }

            $import = new SchoolsImport();

            // Importar usando el método nativo (sin Laravel Excel)
            $result = $import->import($file->getRealPath());

            if ($result['success']) {
                $imported = $result['imported'];
                $skipped = $result['skipped'];
                $errors = $result['errors'];

                if ($imported > 0) {
                    $message = "$imported colegios importados correctamente.";
                    if ($skipped > 0) {
                        $message .= " $skipped filas fueron ignoradas por errores o duplicados.";
                    }

                    // Si hay errores específicos, mostrarlos
                    if (!empty($errors)) {
                        $message .= " Errores: " . implode(', ', array_slice($errors, 0, 3));
                        if (count($errors) > 3) {
                            $message .= " (+" . (count($errors) - 3) . " más)";
                        }
                    }

                    $notification = array('message' => $message, 'alert-type' => 'success');
                } else {
                    $message = "No se importó ningún colegio.";
                    if (!empty($errors)) {
                        $message .= " Errores: " . implode(', ', array_slice($errors, 0, 3));
                    }
                    $notification = array('message' => $message, 'alert-type' => 'error');
                }
            } else {
                $message = "Error al importar: " . implode(', ', $result['errors']);
                $notification = array('message' => $message, 'alert-type' => 'error');
            }

            return redirect()->back()->with($notification);
        } catch (\Exception $e) {
            $notification = array('message' => 'Error al importar: ' . $e->getMessage(), 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Download template Excel file for schools import.
     */
    public function downloadTemplate()
    {
        $filePath = public_path('templates/plantilla_colegios.xls');

        if (!file_exists($filePath)) {
            $notification = array('message' => 'Plantilla no encontrada.', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        return response()->download($filePath, 'plantilla_colegios.xls');
    }

    /**
     * Update school status (AJAX)
     */
    public function school_status(Request $request, $id)
    {
        $school = School::findOrFail($id);
        $school->status = $request->status;
        $school->save();

        $statusText = $request->status == 'active' ? 'activado' : 'desactivado';
        $notification = array('message' => "Colegio '{$school->name}' {$statusText} correctamente", 'alert-type' => 'success');

        return response()->json(['notification' => $notification]);
    }
}