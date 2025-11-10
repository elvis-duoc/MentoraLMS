<?php

namespace Modules\Course\App\Http\Controllers\Admin;

use Exception;
use Carbon\Carbon;
use App\Models\User;
use App\Helper\EmailHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Modules\Course\App\Models\Course;
use Modules\Course\App\Models\CourseEnrollment;
use Modules\EmailSetting\App\Models\EmailTemplate;
use Modules\Course\App\Models\CourseEnrollmentList;
use Modules\GlobalSetting\App\Models\GlobalSetting;
use Modules\Course\App\Emails\EnrollmentPaymentApprovalMail;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $enrollments = CourseEnrollment::with('student', 'course_list')->latest()->get();

        $title = trans('translate.Enrollments List');

        return view('course::admin.enrollment.index', [
            'enrollments' => $enrollments,
            'title' => $title,
        ]);
    }


    public function course_pending_payment()
    {

        $enrollments = CourseEnrollment::with('student', 'course_list')->where('payment_status', 'pending')->latest()->get();

        $title = trans('translate.Pending Payment');

        return view('course::admin.enrollment.index', [
            'enrollments' => $enrollments,
            'title' => $title,
        ]);
    }

    public function course_rejected_payment()
    {

        $enrollments = CourseEnrollment::with('student', 'course_list')->where('payment_status', 'rejected')->latest()->get();

        $title = trans('translate.Rejected Payment');

        return view('course::admin.enrollment.index', [
            'enrollments' => $enrollments,
            'title' => $title,
        ]);
    }

    /**
     * Show the specified resource.
     */
    public function show($order_id)
    {

        $enrollment = CourseEnrollment::with('student')->where('order_id', $order_id)->firstOrFail();

        $course_list = CourseEnrollmentList::with('instructor', 'course')->where('course_enrollment_id', $enrollment->id)->get();

        return view('course::admin.enrollment.show', [
            'enrollment' => $enrollment,
            'course_list' => $course_list,
        ]);
    }



    public function enrollment_payment_approved($order_id){

        $enrollment = CourseEnrollment::with('student')->where('id', $order_id)->firstOrFail();
        $enrollment->payment_status = 'success';
        $enrollment->order_status = 'success';
        $enrollment->save();

        EmailHelper::mail_setup();

        $user = User::findOrFail($enrollment->student_id);

        try{
            $template = EmailTemplate::find(9);
            $message = $template->description;
            $subject = $template->subject;
            $message = str_replace('{{user_name}}',$user->name,$message);
            $message = str_replace('{{invoice_id}}',$enrollment->order_id,$message);

            Mail::to($user->email)->send(new EnrollmentPaymentApprovalMail($message,$subject));

        }catch(Exception $ex){
            Log::info($ex->getMessage());
        }


        $notify_message = trans('translate.Payment approval successful');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);

    }


    public function enrollment_payment_rejected(Request $request, $order_id){

        $enrollment = CourseEnrollment::with('student')->where('id', $order_id)->firstOrFail();
        $enrollment->payment_status = 'rejected';
        $enrollment->save();

        EmailHelper::mail_setup();

        $user = User::findOrFail($enrollment->student_id);

        try{
            $template = EmailTemplate::find(10);
            $message = $template->description;
            $subject = $template->subject;
            $message = str_replace('{{user_name}}',$user->name,$message);
            $message = str_replace('{{invoice_id}}',$enrollment->order_id,$message);
            $message = str_replace('{{reason}}',$request->reason,$message);

            Mail::to($user->email)->send(new EnrollmentPaymentApprovalMail($message,$subject));

        }catch(Exception $ex){
            Log::info($ex->getMessage());
        }


        $notify_message = trans('translate.A rejection reason send to student mail');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);

    }


    public function destroy($order_id)
    {

        $enrollment = CourseEnrollment::where('id', $order_id)->firstOrFail();

        CourseEnrollmentList::where('course_enrollment_id', $enrollment->id)->delete();

        $enrollment->delete();

        $notify_message = trans('translate.Enrollement deleted successful');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('admin.course-enrollments')->with($notify_message);

    }


    public function earning_and_revenue(Request $request)
    {

        $enrollments = CourseEnrollmentList::with('course_enrollment.student')->whereHas('course_enrollment', function($query) {
            $query->where('payment_status', 'success');
        });

        if ($request->order_id || $request->student_id) {
            $enrollments->whereHas('course_enrollment', function($query) use ($request) {
                if ($request->order_id) {
                    $query->where('order_id', $request->order_id);
                }
                if ($request->student_id) {
                    $query->where('student_id', $request->student_id);
                }
            });
        }

        if($request->instructor_id){
            $enrollments = $enrollments->where('instructor_id', $request->instructor_id);
        }

        if($request->course_id){
            $enrollments = $enrollments->where('course_id', $request->course_id);
        }

        if($request->start_date){
             $startDate = Carbon::createFromFormat('Y-m-d', $request->start_date)->startOfDay();
            $enrollments = $enrollments->where('created_at', '>=', $startDate);
        }

        if($request->end_date){
            $endDate = Carbon::createFromFormat('Y-m-d', $request->end_date)->endOfDay();
            $enrollments = $enrollments->where('created_at', '<=', $endDate);
        }


        switch ($request->sort_by) {
            case 'oldest':
                $enrollments->orderBy('id', 'asc');
                break;

            case 'amount_asc_to_des':
                $enrollments->orderBy('total_amount', 'asc');
                break;

            case 'amount_desc_to_asc':
                $enrollments->orderBy('total_amount', 'desc');
                break;

            case 'latest':
            default:
                $enrollments->latest();
                break;
        }

        $enrollments = $enrollments->get();

        $title = trans('translate.Earning & Revenue');

        $total_income = $enrollments->sum('total_amount');

        $total_sold = $enrollments->count();

        $commission_type = GlobalSetting::where('key', 'commission_type')->value('value');
        $commission_per_sale = GlobalSetting::where('key', 'commission_per_sale')->value('value');

        $total_commission = 0.00;
        $net_income = $total_income;
        if($commission_type == 'commission'){
            $total_commission = ($commission_per_sale / 100) * $total_income;
            $net_income = $total_income - $total_commission;
        }


        $instructors = User::where('status', 'enable')->where('is_seller', 1)->latest()->get();

        $students = User::where('status', 'enable')->latest()->get();

        $courses = Course::where('approved_by_admin', 'approved')->latest()->get();


        return view('course::admin.enrollment.earning_and_revenue', [
            'enrollments' => $enrollments,
            'title' => $title,
            'total_income' => $total_income,
            'total_commission' => $total_commission,
            'net_income' => $net_income,
            'total_sold' => $total_sold,
            'instructors' => $instructors,
            'students' => $students,
            'courses' => $courses,
        ]);
    }
}
