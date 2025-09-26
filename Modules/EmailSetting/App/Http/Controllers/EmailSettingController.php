<?php

namespace Modules\EmailSetting\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\EmailSetting\App\Models\EmailSetting;
use Modules\EmailSetting\App\Models\EmailTemplate;
use Modules\EmailSetting\App\Http\Requests\EmailSettingRequest;
use Modules\EmailSetting\App\Http\Requests\EmailTemplateRequest;

class EmailSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting_data = EmailSetting::all();

        $email_setting = array();

        foreach($setting_data as $data_item){
            $email_setting[$data_item->key] = $data_item->value;
        }

        $email_setting = (object) $email_setting;

        return view('emailsetting::email_configuration', ['email_setting' => $email_setting]);
    }


    public function update(EmailSettingRequest $request)
    {
        EmailSetting::where('key', 'sender_name')->update(['value' => $request->sender_name]);
        EmailSetting::where('key', 'mail_host')->update(['value' => $request->mail_host]);
        EmailSetting::where('key', 'email')->update(['value' => $request->email]);
        EmailSetting::where('key', 'smtp_username')->update(['value' => $request->smtp_username]);
        EmailSetting::where('key', 'smtp_password')->update(['value' => $request->smtp_password]);
        EmailSetting::where('key', 'mail_port')->update(['value' => $request->mail_port]);
        EmailSetting::where('key', 'mail_encryption')->update(['value' => $request->mail_encryption]);


        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }

    public function email_template(){

        $template_list = EmailTemplate::all();


        return view('emailsetting::template_list', ['template_list' => $template_list]);
    }

    public function edit_email_template($id){

        $template_item = EmailTemplate::findOrFail($id);

        if($template_item->id == 1){
            return view('emailsetting::password_reset', ['template_item' => $template_item]);
        }elseif($template_item->id == 2){
            return view('emailsetting::contact_message', ['template_item' => $template_item]);
        }elseif($template_item->id == 3){
            return view('emailsetting::newsletter', ['template_item' => $template_item]);
        }elseif($template_item->id == 4){
            return view('emailsetting::user_register', ['template_item' => $template_item]);
        }elseif($template_item->id == 5){
            return view('emailsetting::instructor_approval', ['template_item' => $template_item]);
        }elseif($template_item->id == 6){
            return view('emailsetting::instructor_reject', ['template_item' => $template_item]);
        }elseif($template_item->id == 7){
            return view('emailsetting::course_reject', ['template_item' => $template_item]);
        }elseif($template_item->id == 8){
            return view('emailsetting::course_approval', ['template_item' => $template_item]);
        }elseif($template_item->id == 9){
            return view('emailsetting::enrollment_payment_approved', ['template_item' => $template_item]);
        }elseif($template_item->id == 10){
            return view('emailsetting::enrollment_payment_rejected', ['template_item' => $template_item]);
        }else{
            abort(404);
        }

    }


    public function update_email_template(EmailTemplateRequest $request, $id){

        $template_item = EmailTemplate::findOrFail($id);
        $template_item->subject = $request->subject;
        $template_item->description = $request->description;
        $template_item->save();

        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }






}
