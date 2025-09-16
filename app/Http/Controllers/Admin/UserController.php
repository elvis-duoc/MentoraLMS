<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\User;

use App\Helper\EmailHelper;

use Illuminate\Http\Request;
use App\Mail\InstructorApproval;
use Illuminate\Support\Facades\Log;

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

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function user_list(){

        $users = User::where('status', 'enable')->latest()->get();

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

        $enrollments = CourseEnrollment::with('course_list')->where('student_id', $user->id)->latest()->get();

        return view('admin.user.user_show', [
            'user' => $user,
            'enrolled_course_qty' => $enrolled_course_qty,
            'enrolled_course_amount' => $enrolled_course_amount,
            'wallet_balance' => $wallet_balance,
            'enrollments' => $enrollments,
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

        $enrollment_count = CourseEnrollment::where('student_id', $user_id)->count();

        if($total_courses > 0 || $enrollment_count > 0){
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


    public function seller_list(){

        $users = User::where('status', 'enable')->where('is_seller', 1)->latest()->get();

        $title = trans('translate.Seller List');

        return view('admin.seller.seller_list', ['users' => $users, 'title' => $title]);
    }

    public function pending_seller(){

        $users = User::where('status', 'disable')->where('is_seller', 1)->latest()->get();

        $title = trans('translate.Pending Seller');

        return view('admin.seller.seller_list', ['users' => $users, 'title' => $title]);
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
}
