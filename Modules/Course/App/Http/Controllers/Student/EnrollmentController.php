<?php

namespace Modules\Course\App\Http\Controllers\Student;


use Dompdf\Dompdf;
use App\Rules\Captcha;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Course\App\Models\Course;
use Modules\Course\App\Models\CourseModule;
use Modules\Course\App\Models\CourseReview;
use Modules\EventCalendar\App\Models\Meeting;
use Modules\Course\App\Models\LessonChecklist;
use Modules\Course\App\Models\CourseEnrollment;
use Modules\Course\App\Models\CourseModuleLesson;
use Modules\Course\App\Models\CourseEnrollmentList;
use Modules\CertificateBuilder\App\Models\CertificateSetting;

class EnrollmentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function transactions()
    {

        $user = Auth::guard('web')->user();

        $enrollments = CourseEnrollment::with('course_list')->where('student_id', $user->id)->latest()->get();

        return view('course::student.transactions', [
            'enrollments' => $enrollments
        ]);
    }


    public function invoice($order_id)
    {

        $user = Auth::guard('web')->user();

        $enrollment = CourseEnrollment::with('student')->where('order_id', $order_id)->where('student_id', $user->id)->firstOrFail();

        $course_list = CourseEnrollmentList::with('instructor', 'course')->where('course_enrollment_id', $enrollment->id)->get();

        return view('course::student.invoice', [
            'enrollment' => $enrollment,
            'course_list' => $course_list,
        ]);
    }


    public function enrolled_courses()
    {

        $user = Auth::guard('web')->user();

        $enrollments = CourseEnrollmentList::with('course_enrollment', 'course')->whereHas('course_enrollment', function($query) use($user) {
            $query->where('payment_status', 'success')->where('student_id', $user->id);;
        })->pluck('course_id');

        $courses = Course::with('instructor', 'category')->where(['status' => 'enable', 'approved_by_admin' => 'approved'])->whereIn('id', $enrollments)->get();

        foreach($courses as $course){

            $lesson_checklists = LessonChecklist::where(['student_id' => $user->id, 'course_id' => $course->id])->pluck('course_module_lesson_id');

            $total_checked = $lesson_checklists->count();
            $total_lessons = $course->total_lesson;

            $percentage = $total_lessons > 0 ? round(($total_checked / $total_lessons) * 100) : 0;

            $course->total_checked = $total_checked;
            $course->percentage = $percentage;
        }

        return view('course::student.enrolled_courses', [
            'courses' => $courses
        ]);
    }

    public function enrolled_course(Request $request, $course_id)
    {

        $user = Auth::guard('web')->user();

        $enrollment_exist = CourseEnrollmentList::with('course_enrollment')->whereHas('course_enrollment', function($query) use($user) {
            $query->where('payment_status', 'success')->where('student_id', $user->id);;
        })->where('course_id', $course_id)->first();

        if(!$enrollment_exist)abort(404);


        $course = Course::with('instructor', 'category')->where(['status' => 'enable', 'approved_by_admin' => 'approved'])->where('id', $course_id)->first();

        $course_modules = CourseModule::with('lessons')->where('course_id', $course->id)->orderBy('serial', 'asc')->where('status', 'enable')->get();

        $active_lesson = null;
        $active_module = null;

        if($request->lesson_id){

            $active_lesson = CourseModuleLesson::where(['id' => $request->lesson_id])->firstOrFail();

            $active_module = CourseModule::where('course_id', $course->id)->where('id', $active_lesson->course_module_id)->firstOrFail();

        }else{

            $active_module = CourseModule::where('course_id', $course->id)->orderBy('id', 'asc')->firstOrFail();

            if($active_module){
                $active_lesson = CourseModuleLesson::where(['course_module_id' => $active_module->id])->firstOrFail();
            }
        }

        $checklist_array = [];
        $lesson_checklists = LessonChecklist::where(['student_id' => $user->id, 'course_id' => $course->id])->pluck('course_module_lesson_id');
        foreach($lesson_checklists as $lesson_checklist){
            $checklist_array[] = $lesson_checklist;
        }

        $total_checked = $lesson_checklists->count();
        $total_lessons = $course->total_lesson;

        $percentage = $total_lessons > 0 ? round(($total_checked / $total_lessons) * 100) : 0;

        $live_meeting = Meeting::where('course_id', $course->id)->latest()->first();

        return view('course::student.enrolled_course', [
            'course' => $course,
            'course_modules' => $course_modules,
            'active_lesson' => $active_lesson,
            'active_module' => $active_module,
            'checklist_array' => $checklist_array,
            'percentage' => $percentage,
            'total_checked' => $total_checked,
            'live_meeting' => $live_meeting,
        ]);
    }


    public function mark_lesson_complete(Request $request){


        $user = Auth::guard('web')->user();

        $enrollment_exist = CourseEnrollmentList::with('course_enrollment')->whereHas('course_enrollment', function($query) use($user) {
            $query->where('payment_status', 'success')->where('student_id', $user->id);;
        })->where('course_id', $request->course_id)->first();


        if(!$enrollment_exist){
            return response()->json(['message' => trans('translate.Your requested course not found')], 404);
        }

        $course = Course::where('id', $request->course_id)->first();

        if(!$course){
            return response()->json(['message' => trans('translate.Your requested course not found')], 404);
        }

        $active_lesson = CourseModuleLesson::where(['id' => $request->lesson_id])->first();

        if(!$active_lesson){
            return response()->json(['message' => trans('translate.Your requested lesson not found')], 404);
        }

        $find_module = CourseModule::where('course_id', $request->course_id)->where('id', $active_lesson->course_module_id)->firstOrFail();

        if(!$find_module){
            return response()->json(['message' => trans('translate.Your requested lesson not found')], 404);
        }

        $exist_checklist = LessonChecklist::where(['student_id' => $user->id, 'course_module_lesson_id' => $active_lesson->id])->first();
        if(!$exist_checklist){
            $lesson_checklist = new LessonChecklist();
            $lesson_checklist->student_id = $user->id;
            $lesson_checklist->course_module_lesson_id = $request->lesson_id;
            $lesson_checklist->course_id = $request->course_id;
            $lesson_checklist->save();

            $message = trans('translate.Your complete request stored to checklist');

        }else{

            $exist_checklist->delete();

            $message = trans('translate.Your complete request removed to checklist');
        }


        $lesson_checklists = LessonChecklist::where(['student_id' => $user->id, 'course_id' => $request->course_id])->pluck('course_module_lesson_id');

        $total_checked = $lesson_checklists->count();
        $total_lessons = $course->total_lesson;

        $percentage = $total_lessons > 0 ? round(($total_checked / $total_lessons) * 100) : 0;

        return response()->json(['message' => $message, 'percentage' => $percentage, 'total_checked' => $total_checked]);


    }

    public function wishlist()
    {

        return view('course::student.wishlist');
    }


    public function store_review(Request $request, $course_id){

        $request->validate([
            'rating' => 'required',
            'review' => 'required',
            'g-recaptcha-response'=>new Captcha()
        ], [
            'rating.required' => trans('translate.Rating is required'),
            'review.required' => trans('translate.Review is required'),
        ]);


        $user = Auth::guard('web')->user();

        $course = Course::findOrFail($course_id);

        $order = CourseEnrollment::whereHas('course_list', function($query) use ($course_id) {
            $query->where('course_id', $course_id);
        })->where('student_id', $user->id)->get();

        if($order->count() == 0){
            $notify_message = trans('translate.Unable to review this course, please purchase first');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }

        $exist = CourseReview::where(['student_id' => $user->id, 'course_id' => $course_id])->count();
        if($exist){
            $notify_message = trans('translate.Review already submited');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }

        $review = new CourseReview();
        $review->course_id = $course_id;
        $review->student_id = $user->id;
        $review->instructor_id = $course->user_id;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->status = 'enable';
        $review->save();

        $notify_message = trans('translate.Review submited successful, please wait for admin approval');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }



    public function download_certificate(Request $request, $course_id){


        $user = Auth::guard('web')->user();

        $enrollment_exist = CourseEnrollmentList::with('course_enrollment')->whereHas('course_enrollment', function($query) use($user) {
            $query->where('payment_status', 'success')->where('student_id', $user->id);;
        })->where('course_id', $course_id)->first();

        if(!$enrollment_exist)abort(404);


        $course = Course::with('instructor', 'category')->where(['status' => 'enable', 'approved_by_admin' => 'approved'])->where('id', $course_id)->first();

        $lesson_checklists = LessonChecklist::where(['student_id' => $user->id, 'course_id' => $course->id])->pluck('course_module_lesson_id');

        $total_checked = $lesson_checklists->count();
        $total_lessons = $course->total_lesson;


        $certificate = CertificateSetting::get();

        $certificate_setting = array();

        foreach($certificate as $data_item){
            $certificate_setting[$data_item->key] = $data_item->value;
        }

        $certificate_setting = (object) $certificate_setting;

        $render_html = view('course::student.certificate', [
            'certificate_setting' => $certificate_setting
        ])->render();


        $render_html = str_replace('{{student_name}}', $user?->name, $render_html);
        $render_html = str_replace('{{course_name}}', $course?->title, $render_html);
        $render_html = str_replace('{{download_date}}', date('d F Y'), $render_html);

        $dompdf = new Dompdf(['enable_remote' => true]);

        $dompdf->loadHtml($render_html);


        $dompdf->setPaper('A4', 'landscape');

        $dompdf->render();

        $dompdf->stream("certificate.pdf", ['Attachment' => true]);

        return redirect()->back();

    }

}
