<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;

use App\Helper\EmailHelper;

use Illuminate\Http\Request;
use App\Mail\InstructorApproval;
use Illuminate\Support\Facades\Log;
use App\Models\School;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Modules\Coupon\App\Models\Coupon;
use Modules\Course\App\Models\Course;
use Modules\Wishlist\App\Models\Wishlist;
use Modules\Course\App\Models\CourseReview;
use Modules\Coupon\App\Models\CouponHistory;
use Modules\Course\App\Models\LessonChecklist;
use Modules\Course\App\Models\CourseEnrollment;
use Modules\EmailSetting\App\Models\EmailTemplate;
use Modules\Course\App\Models\CourseEnrollmentList;
use Modules\GlobalSetting\App\Models\GlobalSetting;
use Modules\SupportTicket\App\Models\SupportTicket;
use Modules\SupportTicket\App\Models\MessageDocument;
use Modules\PaymentWithdraw\App\Models\SellerWithdraw;
use Modules\SupportTicket\App\Models\SupportTicketMessage;
use Illuminate\Support\Facades\DB;
use App\Imports\StudentsImport;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function user_list(){

        $users = User::latest()->get();

        $title = trans('translate.Student List');

        return view('admin.user.user_list', ['users' => $users, 'title' => $title]);
    }

    public function pending_user(){

        $users = User::where('status', 'disable')->latest()->get();

        $title = trans('translate.Pending Student');

        return view('admin.user.user_list', ['users' => $users, 'title' => $title]);
    }

    public function user_show($id){

        $user = User::findOrFail($id);

        $enrolled_courses = CourseEnrollmentList::whereHas('course_enrollment', function($query) use($user) {
            $query->where('payment_status', 'success')->where('student_id', $user->id);
        })->get();

        $enrolled_course_qty = $enrolled_courses->count();

        $enrolled_course_amount = CourseEnrollment::where('payment_status', 'success')->where('student_id', $user->id)->sum('total_amount');

        $wallet_balance = 0.00;

        $enrollments = CourseEnrollment::with(['course_list.course.instructor'])->where('student_id', $user->id)->latest()->get();

        // Obtener cursos disponibles para asignar
        $courses = Course::where('approved_by_admin', '!=', 'draft')->latest()->get();

        // Obtener los IDs de los cursos ya asignados al estudiante (de TODAS sus inscripciones)
        $enrollments_for_courses = CourseEnrollment::where('student_id', $user->id)->get();
        $enrollmentIds = $enrollments_for_courses->pluck('id')->toArray();

        $studentCourseIds = [];
        if (!empty($enrollmentIds)) {
            $studentCourseIds = CourseEnrollmentList::whereIn('course_enrollment_id', $enrollmentIds)
                ->pluck('course_id')
                ->unique()
                ->toArray();
        }

        // Obtener escuelas disponibles
        $schools = School::orderBy('name')->get();

        return view('admin.user.user_show', [
            'user' => $user,
            'enrolled_course_qty' => $enrolled_course_qty,
            'enrolled_course_amount' => $enrolled_course_amount,
            'wallet_balance' => $wallet_balance,
            'enrollments' => $enrollments,
            'courses' => $courses,
            'studentCourseIds' => $studentCourseIds,
            'schools' => $schools,
        ]);
    }

    public function update(Request $request ,$id){

        $user = User::findOrFail($id);

        $rules = [
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required|max:220',
        ];
        $customMessages = [
            'name.required' => trans('translate.Name is required'),
            'phone.required' => trans('translate.Phone is required'),
            'address.required' => trans('translate.Address is required')
        ];
        $this->validate($request, $rules,$customMessages);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->status = $request->status ? 'enable' : 'disable';
        $user->is_top_seller = $request->is_top_seller ? 'enable' : 'disable';
        $user->save();

        $notify_message= trans('translate.User updated successful');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);

    }

    public function user_destroy($id){

        $user = User::findOrFail($id);
        $user_id = $user->id;

        $total_courses = Course::where('user_id', $user_id)->count();

        // Verificar si el usuario tiene cursos REALMENTE asignados, no solo registros de inscripción vacíos
        $enrollments = CourseEnrollment::where('student_id', $user_id)->get();
        $has_enrolled_courses = false;

        foreach($enrollments as $enrollment) {
            $courseCount = CourseEnrollmentList::where('course_enrollment_id', $enrollment->id)->count();
            if($courseCount > 0) {
                $has_enrolled_courses = true;
                break;
            }
        }

        if($total_courses > 0 || $has_enrolled_courses){
            $notify_message = trans('translate.You can not delete this user, multiple courses available under this user');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->route('admin.user-list')->with($notify_message);
        }

        $user_image = $user->image;

        if($user_image){
            if(File::exists(public_path().'/'.$user_image))unlink(public_path().'/'.$user_image);
        }

        Coupon::where('seller_id', $user_id)->delete();
        CouponHistory::where('seller_id', $user_id)->delete();
        CouponHistory::where('buyer_id', $user_id)->delete();

        $enrollments = CourseEnrollment::where('student_id', $user_id)->get();

        foreach($enrollments as $enrollment){
            CourseEnrollmentList::where('course_enrollment_id', $enrollment->id)->delete();
            $enrollment->delete();
        }

        CourseEnrollmentList::where('instructor_id', $user_id)->delete();

        CourseReview::where('student_id', $user_id)->delete();
        LessonChecklist::where('student_id', $user_id)->delete();
        CourseReview::where('instructor_id', $user_id)->delete();
        SellerWithdraw::where('seller_id', $user_id)->delete();
        Wishlist::where('user_id', $user_id)->delete();

        $support_tickets = SupportTicket::where('author_id', $user->id)->latest()->get();

        foreach($support_tickets as $support_ticket){
            $ticket_messages = SupportTicketMessage::with('documents')->where('support_ticket_id', $support_ticket->id)->get();

            foreach($ticket_messages as $ticket_message){
    
                $documents = MessageDocument::where('message_id', $ticket_message->id)->where('model_name', 'SupportTicketMessage')->get();
                foreach($documents as $document){
                    $exist_file_name = $document->file_name;
                    if($exist_file_name){
                        if(File::exists(public_path('uploads/custom-images').'/'.$exist_file_name))unlink(public_path('uploads/custom-images').'/'.$exist_file_name);
                    }
    
                    $document->delete();
                }
    
                $ticket_message->delete();
            }
    
            $support_ticket->delete();
        }
        
        $user->delete();

        $notify_message = trans('translate.Delete Successfully');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('admin.user-list')->with($notify_message);

    }

    public function user_status($id){
        $user = User::findOrFail($id);
        if($user->status == 'enable'){
            $user->status = 'disable';
            $user->save();
            $message = trans('translate.Status Changed Successfully');
        }else{
            $user->status = 'enable';
            $user->save();
            $message = trans('translate.Status Changed Successfully');
        }
        return response()->json($message);
    }

    public function user_send_mail_page($id){

        $user = User::findOrFail($id);

        return view('admin.user.user_send_mail_page', ['user' => $user]);
    }

    public function user_send_mail(Request $request, $id){
        $rules = [
            'subject'=>'required',
            'message'=>'required'
        ];
        $customMessages = [
            'subject.required' => trans('translate.Subject is required'),
            'message.required' => trans('translate.Message is required'),
        ];
        $this->validate($request, $rules,$customMessages);

        $user = User::findOrFail($id);

        EmailHelper::mail_setup();
        try{
            $subject = $request->subject;
            $message = $request->message;
            Mail::to($user->email)->send(new InstructorApproval($message,$subject));
        }catch(Exception $ex){
            Log::info($ex->getMessage());
        }

        $notify_message = trans('translate.Mail send successfully');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }


    public function seller_joining_request(){

        $users = User::where('instructor_joining_request', 'pending')->latest()->get();

        $title = trans('translate.Instructor Joining Request');

        return view('admin.seller.seller_joining_request', ['users' => $users, 'title' => $title]);
    }

    public function seller_joining_detail($user_id){

        $user = User::findOrFail($user_id);

        $skills_expertises = json_decode($user->skills_expertise);


        return view('admin.seller.seller_joining_detail', ['user' => $user, 'skills_expertises' => $skills_expertises]);
    }


    public function seller_joining_approval($user_id){

        $user = User::findOrFail($user_id);
        $user->instructor_joining_request = 'approved';
        $user->is_seller = 1;
        $user->save();

        EmailHelper::mail_setup();

        try{
            $template = EmailTemplate::find(5);
            $message = $template->description;
            $subject = $template->subject;
            $message = str_replace('{{user_name}}',$user->name,$message);

            Mail::to($user->email)->send(new InstructorApproval($message,$subject));

        }catch(Exception $ex){
            Log::info($ex->getMessage());
        }



        $notify_message = trans('translate.Instructor application approval successful');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);

    }

    public function seller_joining_reject(Request $request, $user_id){

        $user = User::findOrFail($user_id);
        $user->instructor_joining_request = 'rejected';
        $user->save();

        EmailHelper::mail_setup();

        try{
            $template = EmailTemplate::find(6);
            $message = $template->description;
            $subject = $template->subject;
            $message = str_replace('{{user_name}}',$user->name,$message);
            $message = str_replace('{{reason}}',$request->reason,$message);

            Mail::to($user->email)->send(new InstructorApproval($message,$subject));

        }catch(Exception $ex){
            Log::info($ex->getMessage());
        }

        $notify_message = trans('translate.A rejection reason send to instructor mail');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);

    }

    public function updateStudentCourses(Request $request, $id){
        $request->validate([
            'courses' => 'array',
            'courses.*' => 'integer|exists:courses,id',
        ]);

        try {
            DB::beginTransaction();

            $user = User::findOrFail($id);

            // Obtener o crear la inscripción del estudiante
            $enrollment = CourseEnrollment::where('student_id', $id)->first();

            if (!$enrollment) {
                // Crear una inscripción base si no existe
                $enrollment = new CourseEnrollment();
                $enrollment->student_id = $id;
                $enrollment->order_id = 'ADMIN-' . time();
                $enrollment->transaction_id = 'TXN-ADMIN-' . time();
                $enrollment->total_amount = 0;
                $enrollment->payment_method = 'Admin Assignment';
                $enrollment->payment_status = 'success';
                $enrollment->save();
            }

            // Eliminar cursos antiguos
            CourseEnrollmentList::where('course_enrollment_id', $enrollment->id)->delete();

            // Insertar nuevos cursos seleccionados
            if (!empty($request->courses)) {
                foreach ($request->courses as $courseId) {
                    $course = Course::find($courseId);
                    
                    $enrollmentList = new CourseEnrollmentList();
                    $enrollmentList->course_enrollment_id = $enrollment->id;
                    $enrollmentList->course_id = $courseId;
                    $enrollmentList->instructor_id = $course->user_id ?? null;
                    $enrollmentList->total_amount = 0;
                    $enrollmentList->save();
                }
            }

            DB::commit();

            $notify_message = trans('translate.Courses updated successfully');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
            return redirect()->back()->with($notify_message);

        } catch (Exception $e) {
            DB::rollBack();
            
            $notify_message = 'Error: ' . $e->getMessage();
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }
    }

    public function seller_show($id){

        $user = User::findOrFail($id);

        $total_income = CourseEnrollmentList::whereHas('course_enrollment', function($query) {
            $query->where('payment_status', 'success');
        })->where('instructor_id', $user->id)->sum('total_amount');

        $commission_type = GlobalSetting::where('key', 'commission_type')->value('value');
        $commission_per_sale = GlobalSetting::where('key', 'commission_per_sale')->value('value');

        $total_commission = 0.00;
        $net_income = $total_income;
        if($commission_type == 'commission'){
            $total_commission = ($commission_per_sale / 100) * $total_income;
            $net_income = $total_income - $total_commission;
        }

        $pending_success_list = SellerWithdraw::where('seller_id', $user->id)->where('status', '!=', 'rejected')->sum('total_amount');

        $total_withdraw_amount = $pending_success_list;

        $current_balance = $net_income - $total_withdraw_amount;

        $pending_withdraw = SellerWithdraw::where('seller_id', $user->id)->where('status', 'pending')->sum('total_amount');

        $courses = Course::with('category')->where('approved_by_admin', '!=', 'draft')->where('user_id', $user->id)->latest()->get();

        return view('admin.seller.seller_show', [
            'user' => $user,
            'total_income' => $total_income,
            'total_commission' => $total_commission,
            'net_income' => $net_income,
            'current_balance' => $current_balance,
            'total_withdraw_amount' => $total_withdraw_amount,
            'pending_withdraw' => $pending_withdraw,
            'courses' => $courses,
        ]);

    }

    /**
     * Asignar cursos a un estudiante (método alternativo/legacy)
     */
    public function assignCourses(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Obtener los cursos seleccionados en el formulario
        $selectedCourses = $request->input('courses', []);

        // Buscar o crear la inscripción principal del estudiante
        $enrollment = CourseEnrollment::firstOrCreate(
            ['student_id' => $user->id],
            [
                'order_id' => 'ADMIN-' . time(),
                'transaction_id' => 'TXN-ADMIN-' . time(),
                'total_amount' => 0,
                'payment_method' => 'Admin Assignment',
                'payment_status' => 'success',
                'created_at' => now(),
                'updated_at' => now()
            ]
        );

        // Eliminar cursos anteriores
        CourseEnrollmentList::where('course_enrollment_id', $enrollment->id)->delete();

        // Crear nuevas asignaciones
        foreach ($selectedCourses as $courseId) {
            $course = Course::find($courseId);
            
            CourseEnrollmentList::create([
                'course_enrollment_id' => $enrollment->id,
                'course_id' => $courseId,
                'instructor_id' => $course->user_id ?? null,
                'total_amount' => 0,
            ]);
        }

        $notify_message = array('message' => 'Cursos actualizados correctamente.', 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }

    /**
     * Asignar escuela a un usuario
     */
    public function assign_school(Request $request, $id)
    {
        $request->validate([
            'school_id' => 'required|exists:schools,id',
        ]);

        $user = User::findOrFail($id);
        $user->school_id = $request->school_id;
        $user->save();

        return redirect()->back()->with([
            'message' => 'Colegio asignado correctamente.',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Import students from Excel file.
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

            $import = new StudentsImport();

            // Importar usando el método nativo (sin Laravel Excel)
            $result = $import->import($file->getRealPath());

            if ($result['success']) {
                $imported = $result['imported'];
                $skipped = $result['skipped'];
                $errors = $result['errors'];

                if ($imported > 0) {
                    $message = "$imported estudiantes importados correctamente.";
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
                    $message = "No se importó ningún estudiante.";
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
     * Download template Excel file for students import.
     */
    public function downloadTemplate()
    {
        $filePath = public_path('templates/plantilla_estudiantes.xls');

        if (!file_exists($filePath)) {
            $notification = array('message' => 'Plantilla no encontrada.', 'alert-type' => 'error');
            return redirect()->back()->with($notification);
        }

        return response()->download($filePath, 'plantilla_estudiantes.xls');
    }

    /**
     * Add courses to a student (only adds, doesn't remove existing courses)
     */
    public function addStudentCourses(Request $request, $id)
    {
        $request->validate([
            'courses' => 'required|array',
            'courses.*' => 'integer|exists:courses,id',
        ]);

        try {
            DB::beginTransaction();

            $user = User::findOrFail($id);

            // Obtener o crear la inscripción del estudiante
            $enrollment = CourseEnrollment::where('student_id', $id)->first();

            if (!$enrollment) {
                // Crear una inscripción base si no existe
                $enrollment = new CourseEnrollment();
                $enrollment->student_id = $id;
                $enrollment->order_id = 'ADMIN-' . time();
                $enrollment->transaction_id = 'TXN-ADMIN-' . time();
                $enrollment->total_amount = 0;
                $enrollment->payment_method = 'Admin Assignment';
                $enrollment->payment_status = 'success';
                $enrollment->save();
            }

            // Obtener IDs de cursos ya inscritos
            $existingCourseIds = CourseEnrollmentList::where('course_enrollment_id', $enrollment->id)
                ->pluck('course_id')
                ->toArray();

            // Insertar solo los cursos nuevos (que no estén ya inscritos)
            $addedCount = 0;
            foreach ($request->courses as $courseId) {
                if (!in_array($courseId, $existingCourseIds)) {
                    $course = Course::find($courseId);

                    $enrollmentList = new CourseEnrollmentList();
                    $enrollmentList->course_enrollment_id = $enrollment->id;
                    $enrollmentList->course_id = $courseId;
                    $enrollmentList->instructor_id = $course->user_id ?? null;
                    $enrollmentList->total_amount = 0;
                    $enrollmentList->save();

                    $addedCount++;
                }
            }

            DB::commit();

            if ($addedCount > 0) {
                $notify_message = $addedCount === 1
                    ? 'Curso agregado exitosamente'
                    : "{$addedCount} cursos agregados exitosamente";
            } else {
                $notify_message = 'Los cursos seleccionados ya estaban asignados al estudiante';
            }

            $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
            return redirect()->back()->with($notify_message);

        } catch (Exception $e) {
            DB::rollBack();
            $notify_message = trans('translate.Something went wrong');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }
    }

    /**
     * Remove a specific course from a student
     */
    public function removeStudentCourse($userId, $courseId)
    {
        try {
            $user = User::find($userId);
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Estudiante no encontrado'
                ], 200);
            }

            $course = Course::find($courseId);
            if (!$course) {
                return response()->json([
                    'success' => false,
                    'message' => 'Curso no encontrado'
                ], 200);
            }

            // Buscar TODAS las inscripciones del estudiante
            $enrollments = CourseEnrollment::where('student_id', $userId)->get();

            if ($enrollments->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'El estudiante no tiene inscripciones registradas'
                ], 200);
            }

            // Obtener los IDs de todas las inscripciones
            $enrollmentIds = $enrollments->pluck('id')->toArray();

            // Eliminar el curso de TODAS las inscripciones del estudiante
            $deleted = CourseEnrollmentList::whereIn('course_enrollment_id', $enrollmentIds)
                ->where('course_id', $courseId)
                ->delete();

            if ($deleted > 0) {
                return response()->json([
                    'success' => true,
                    'message' => "El curso '{$course->title}' fue eliminado exitosamente ({$deleted} registro(s) eliminado(s))"
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'El curso no estaba asignado a este estudiante'
                ], 200);
            }

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el curso: ' . $e->getMessage()
            ], 200);
        }
    }
}