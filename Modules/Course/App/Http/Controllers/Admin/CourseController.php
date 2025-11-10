<?php

namespace Modules\Course\App\Http\Controllers\Admin;

use Exception;
use App\Models\User;
use App\Helper\EmailHelper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\Facades\Image;
use Modules\Course\App\Models\Course;
use Modules\Category\Entities\Category;
use Modules\Language\App\Models\Language;
use Modules\Course\App\Emails\CourseReject;
use Modules\Course\App\Models\CourseModule;
use Modules\Course\App\Models\CourseReview;
use Modules\Course\App\Models\LessonChecklist;
use Modules\CourseLevel\App\Models\CourseLevel;
use Modules\Course\App\Models\CourseTranslation;
use Modules\Course\App\Models\CourseModuleLesson;
use Modules\EmailSetting\App\Models\EmailTemplate;
use Modules\Course\App\Models\CourseEnrollmentList;
use Modules\SupportTicket\App\Models\SupportTicket;
use Modules\CourseLanguage\App\Models\CourseLanguage;
use Modules\SupportTicket\App\Models\MessageDocument;
use Modules\SupportTicket\App\Models\SupportTicketMessage;
use Modules\Course\App\Http\Requests\CourseBasicInfoRequest;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $courses = Course::with('category', 'instructor')->where('approved_by_admin', '!=', 'draft')->orderBy('id', 'desc')->get();

        $title = trans('translate.Course List');

        return view('course::admin.index', [
            'title' => $title,
            'courses' => $courses
        ]);
    }


    public function pending_course()
    {

        $courses = Course::with('category', 'instructor')->where('approved_by_admin', 'pending')->latest()->get();

        $title = trans('translate.Awaiting Course');

        return view('course::admin.index', [
            'title' => $title,
            'courses' => $courses,
        ]);
    }

    public function rejected_course()
    {

        $courses = Course::with('category', 'instructor')->where('approved_by_admin', 'rejected')->latest()->get();

        $title = trans('translate.Rejected Course');

        return view('course::admin.index', [
            'title' => $title,
            'courses' => $courses,
        ]);
    }

    public function active_course()
    {

        $courses = Course::with('category', 'instructor')->where('approved_by_admin', 'approved')->latest()->get();

        $title = trans('translate.Active Course');

        return view('course::admin.index', [
            'title' => $title,
            'courses' => $courses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::with('translate')->where('status', 'enable')->get();

        $course_levels = CourseLevel::with('translate')->where('status', 1)->latest()->get();

        $course_languages = CourseLanguage::with('translate')->where('status', 1)->latest()->get();

        $sellers = User::where(['status' => 'enable' , 'is_banned' => 'no', 'is_seller' => 1])->where('email_verified_at', '!=', null)->orderBy('id','desc')->get();

        return view('course::admin.create', [
            'categories' => $categories,
            'course_levels' => $course_levels,
            'course_languages' => $course_languages,
            'sellers' => $sellers,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseBasicInfoRequest $request)
    {

        $course = new Course();
        $course->user_id = $request->user_id;
        $course->slug = $request->slug;
        $course->regular_price = $request->regular_price;
        $course->offer_price = $request->offer_price;
        $course->category_id = $request->category_id;
        $course->course_level_id = $request->course_level_id;
        $course->course_language_id = $request->course_language_id;
        $course->total_lesson = $request->total_lesson;
        $course->total_duration = $request->total_duration;
        $course->approved_by_admin = 'approved';
        $course->status = 'enable';
        $course->save();

        $languages = Language::all();
        foreach($languages as $language){
            $course_translate = new CourseTranslation();
            $course_translate->lang_code = $language->lang_code;
            $course_translate->course_id = $course->id;
            $course_translate->short_description = $request->short_description;
            $course_translate->description = $request->description;
            $course_translate->title = $request->title;
            $course_translate->save();
        }



        $notify_message= trans('translate.Basic information added successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');

        return redirect()->route('admin.course-media', ['course_id' => $course->id, 'req_type' => 'from_create'])->with($notify_message);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $categories = Category::with('translate')->where('status', 'enable')->get();

        $course_levels = CourseLevel::with('translate')->where('status', 1)->latest()->get();

        $course_languages = CourseLanguage::with('translate')->where('status', 1)->latest()->get();

        $sellers = User::where(['status' => 'enable' , 'is_banned' => 'no', 'is_seller' => 1])->where('email_verified_at', '!=', null)->orderBy('id','desc')->get();


        $course = Course::findOrFail($id);

        $course_translate = CourseTranslation::where(['course_id' => $id, 'lang_code' => $request->lang_code])->firstOrFail();

        return view('course::admin.edit', [
            'course' => $course,
            'course_translate' => $course_translate,
            'categories' => $categories,
            'course_levels' => $course_levels,
            'course_languages' => $course_languages,
            'sellers' => $sellers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseBasicInfoRequest $request, $id)
    {

        $course = Course::findOrFail($id);

        if($request->lang_code == admin_lang()){
            $course->user_id = $request->user_id;
            $course->regular_price = $request->regular_price;
            $course->offer_price = $request->offer_price;
            $course->category_id = $request->category_id;
            $course->course_level_id = $request->course_level_id;
            $course->course_language_id = $request->course_language_id;
            $course->total_lesson = $request->total_lesson;
            $course->total_duration = $request->total_duration;
            $course->save();
        }

        $course_translate = CourseTranslation::where(['course_id' => $id, 'lang_code' => $request->lang_code])->firstOrFail();

        $course_translate->short_description = $request->short_description;
        $course_translate->description = $request->description;
        $course_translate->title = $request->title;
        $course_translate->save();


        $notify_message= trans('translate.Updated Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');

        if($request->req_type && $request->req_type == 'from_create'){
            return redirect()->route('admin.course-media', ['course_id' => $course->id, 'req_type' => 'from_create'] )->with($notify_message);
        }

        return redirect()->back()->with($notify_message);
    }

    public function course_media(Request $request, $course_id){

        $course = Course::findOrFail($course_id);

        return view('course::admin.course_media', [
            'course' => $course
        ]);

    }

    public function course_media_update(Request $request, $course_id){

        $course = Course::findOrFail($course_id);

        if($request->thumb_image){
            $old_image = $course->thumb_image;
            $image_name = 'course-thumb'.date('-Y-m-d-h-i-s-').rand(999,9999).'.webp';
            $image_name ='uploads/custom-images/'.$image_name;
            Image::make($request->thumb_image)
                ->encode('webp', 80)
                ->save(public_path().'/'.$image_name);
            $course->thumb_image = $image_name;
            $course->save();

            if($old_image){
                if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
            }
        }

        $course->video_source = $request->video_source;
        $course->preview_video_id = $request->preview_video_id;
        $course->save();

        $notify_message= trans('translate.Updated Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');

        if($request->req_type && $request->req_type == 'from_create'){
            return redirect()->route('admin.course-curriculum', ['course_id' => $course->id, 'req_type' => 'from_create'] )->with($notify_message);
        }

        return redirect()->back()->with($notify_message);

    }



    public function course_seo(Request $request, $course_id){

        $course = Course::findOrFail($course_id);

        return view('course::admin.course_seo', [
            'course' => $course
        ]);

    }

    public function course_seo_update(Request $request, $course_id){

        $course = Course::findOrFail($course_id);

        $course->seo_title = $request->seo_title;
        $course->seo_description = $request->seo_description;
        $course->save();


        $notify_message= trans('translate.Updated Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);

    }


    public function submit_for_review(Request $request, $course_id){

        $course = Course::findOrFail($course_id);

        return view('course::admin.submit_for_review', [
            'course' => $course
        ]);

    }


    public function course_approved($course_id){

        $course = Course::findOrFail($course_id);
        $course->approved_by_admin = 'approved';
        $course->save();

        EmailHelper::mail_setup();

        $user = User::findOrFail($course->user_id);

        try{
            $template = EmailTemplate::find(8);
            $message = $template->description;
            $subject = $template->subject;
            $message = str_replace('{{user_name}}',$user->name,$message);
            $message = str_replace('{{course_name}}',$course?->translate?->title,$message);

            Mail::to($user->email)->send(new CourseReject($message,$subject));

        }catch(Exception $ex){
            Log::info($ex->getMessage());
        }


        $notify_message = trans('translate.Course approval successful');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('admin.courses.index')->with($notify_message);

    }


    public function course_rejected(Request $request, $course_id){

        $course = Course::findOrFail($course_id);
        $course->approved_by_admin = 'rejected';
        $course->save();

        $user = User::findOrFail($course->user_id);

        EmailHelper::mail_setup();

        try{
            $template = EmailTemplate::find(7);
            $message = $template->description;
            $subject = $template->subject;
            $message = str_replace('{{user_name}}',$user->name,$message);
            $message = str_replace('{{course_name}}',$course?->translate?->title,$message);
            $message = str_replace('{{reason}}',$request->reason,$message);

            Mail::to($user->email)->send(new CourseReject($message,$subject));

        }catch(Exception $ex){
            Log::info($ex->getMessage());
        }

        $notify_message = trans('translate.A rejection reason send to instructor mail');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->route('admin.courses.index')->with($notify_message);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $course = Course::findOrFail($id);

        $enrollment_count = CourseEnrollmentList::where('course_id', $id)->count();

        if($enrollment_count > 0){
            $notify_message = trans('translate.Multiple enrollment created under it, so you can not delete it');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }


        $course_modules = CourseModule::where('course_id', $id)->get();
        foreach($course_modules as $course_module){
            CourseModuleLesson::where(['course_module_id' => $course_module->id])->delete();

            $course_module->delete();

        }

        LessonChecklist::where('course_id', $id)->delete();
        CourseTranslation::where('course_id', $id)->delete();
        CourseReview::where('course_id', $course->id)->delete();

        $old_image = $course->thumb_image;
        if($old_image){
            if(File::exists(public_path().'/'.$old_image))unlink(public_path().'/'.$old_image);
        }

        $support_tickets = SupportTicket::where('course_id', $course->id)->latest()->get();

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

        $course->delete();

        $notify_message = trans('translate.Course deleted successful');
        $notify_message = array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);



    }


    public function setup_language($lang_code){
        $course_translates = CourseTranslation::where('lang_code', admin_lang())->get();
        foreach($course_translates as $course_translate){
            $new_translate = new CourseTranslation();
            $new_translate->lang_code = $lang_code;
            $new_translate->course_id = $course_translate->course_id;
            $new_translate->short_description = $course_translate->short_description;
            $new_translate->description = $course_translate->description;
            $new_translate->title = $course_translate->title;
            $new_translate->save();
        }
    }


}
