<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use Auth, File, Image, Str, Hash;
use App\Http\Controllers\Controller;
use Modules\Coupon\App\Models\Coupon;
use Modules\Course\App\Models\Course;
use Modules\Wishlist\App\Models\Wishlist;
use Modules\Course\App\Models\CourseModule;
use Modules\Course\App\Models\CourseReview;
use App\Http\Requests\PasswordChangeRequest;
use Modules\Coupon\App\Models\CouponHistory;
use App\Http\Requests\BecomeInstructorRequest;
use Modules\Course\App\Models\LessonChecklist;
use Modules\Course\App\Models\CourseEnrollment;
use App\Http\Requests\EditStudentProfileRequest;
use Modules\Course\App\Models\CourseTranslation;
use Modules\Course\App\Models\CourseModuleLesson;
use Modules\Course\App\Models\CourseEnrollmentList;
use Modules\SupportTicket\App\Models\SupportTicket;
use Modules\SupportTicket\App\Models\MessageDocument;
use Modules\PaymentWithdraw\App\Models\SellerWithdraw;
use Modules\SupportTicket\App\Models\SupportTicketMessage;

class ProfileController extends Controller
{
    public function dashboard(){

        $user = Auth::guard('web')->user();

        $enrollments = CourseEnrollment::with('course_list')->where('student_id', $user->id)->take(10)->get();

        $complete_transaction = CourseEnrollment::with('course_list')->where('student_id', $user->id)->where('payment_status', 'success')->sum('total_amount');
        $rejected_transaction = CourseEnrollment::with('course_list')->where('student_id', $user->id)->where('payment_status', 'rejected')->sum('total_amount');

        $enrolled_corse = CourseEnrollmentList::whereHas('course_enrollment', function($query) use($user) {
            $query->where('payment_status', 'success')->where('student_id', $user->id);;
        })->count();

        $wishlists = Wishlist::where('user_id', $user->id)->count();

        $support_tickets = SupportTicket::where('author_id', $user->id)->where('admin_type', 'admin')->latest()->count();

        
        return view('student.dashboard', [
            'enrollments' => $enrollments,
            'enrolled_corse' => $enrolled_corse,
            'complete_transaction' => $complete_transaction,
            'rejected_transaction' => $rejected_transaction,
            'wishlists' => $wishlists,
            'support_tickets' => $support_tickets,
        ]);

    }

    public function edit_profile(){
        $user = Auth::guard('web')->user();

        return view('student.edit_profile', ['user' => $user]);
    }

    public function update_profile(EditStudentProfileRequest $request){

        $user = Auth::guard('web')->user();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->save();

        if($request->file('image')){
            $old_image = $user->image;
            $user_image = $request->image;
            $extention = $user_image->getClientOriginalExtension();
            $image_name = Str::slug($user->name).date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $image_name = 'uploads/custom-images/'.$image_name;
            Image::make($user_image)->save(public_path().'/'.$image_name);
            $user->image = $image_name;
            $user->save();
            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

    public function change_password(){
        return view('student.change_password');
    }

    public function update_password(PasswordChangeRequest $request){

        $user = Auth::guard('web')->user();

        if(Hash::check($request->current_password, $user->password)){
            $user->password = Hash::make($request->password);
            $user->save();

            $notify_message = trans('translate.Password changed successfully');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
            return redirect()->back()->with($notify_message);

        }else{
            $notify_message = trans('translate.Current password does not match');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }


    }


    public function become_an_instructor(Request $request){

        $user = Auth::guard('web')->user();

        return view('student.become_an_instructor', [
            'user' => $user
        ]);
    }

    public function instructor_application(BecomeInstructorRequest $request){


        $skills_expertise = array();

        foreach($request->skills as $index => $skill){
            if($request->skills[$index] && $request->expertises[$index]){
                $skills_expertise [] = (object) array(
                    'skill' => $skill,
                    'expertise' => $request->expertises[$index],
                );
            }

        }

        $user = Auth::guard('web')->user();
        $user->skills_expertise = json_encode($skills_expertise);
        $user->instructor_experience = $request->instructor_experience;
        $user->designation = $request->designation;
        $user->about_me = $request->about_me;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->facebook = $request->facebook;
        $user->linkedin = $request->linkedin;
        $user->twitter = $request->twitter;
        $user->instagram = $request->instagram;
        $user->instructor_joining_request = 'pending';
        $user->save();

        $notify_message = trans('translate.Instructor joining request send to admin. please awaiting for approval');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }





    public function account_delete(){
        return view('student.account_delete');
    }

    public function confirm_account_delete(Request $request){

        $user = Auth::guard('web')->user();

        $request->validate([
            'current_password' => 'required'
        ], [
            'current_password.required' => trans('translate.Current password is required')
        ]);

        if(!Hash::check($request->current_password, $user->password)){
            $notify_message = trans('translate.Current password does not match');
            $notify_message = array('message' => $notify_message, 'alert-type' => 'error');
            return redirect()->back()->with($notify_message);
        }

        $user_image = $user->image;

        if($user_image){
            if(File::exists(public_path().'/'.$user_image))unlink(public_path().'/'.$user_image);
        }

        $user_id = $user->id;
        Coupon::where('seller_id', $user_id)->delete();
        CouponHistory::where('seller_id', $user_id)->delete();
        CouponHistory::where('buyer_id', $user_id)->delete();

        $courses = Course::where('user_id', $user_id)->get();

        foreach($courses as $course){
            CourseEnrollmentList::where('course_id', $course->id)->delete();
            $modules = CourseModule::where('course_id', $course->id)->get();
            foreach($modules as $module){
                CourseModuleLesson::where('course_module_id', $module->id)->delete();
                $module->delete();
            }

            LessonChecklist::where('course_id', $course->id)->delete();
            CourseTranslation::where('course_id', $course->id)->delete();
            CourseReview::where('course_id', $course->id)->delete();

            $old_image = $course->thumb_image;
            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }

            $course->delete();


        }

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

        Auth::guard('web')->logout();

        $notify_message = trans('translate.Your account deleted successful');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('student.login')->with($notify_message);


    }



}
