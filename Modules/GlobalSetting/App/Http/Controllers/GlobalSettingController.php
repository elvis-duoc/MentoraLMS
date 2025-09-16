<?php

namespace Modules\GlobalSetting\App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;

use Modules\FAQ\App\Models\Faq;
use Cache, Image, File, Artisan;
use Modules\Blog\App\Models\Blog;
use App\Http\Controllers\Controller;
use Modules\Coupon\App\Models\Coupon;
use Modules\Course\App\Models\Course;
use Modules\Category\Entities\Category;
use Modules\Page\App\Models\CustomPage;
use Modules\Partner\App\Models\Partner;
use Modules\Blog\App\Models\BlogComment;
use Modules\Blog\App\Models\BlogCategory;
use Modules\Currency\App\Models\Currency;
use Modules\Language\App\Models\Language;
use Modules\Wishlist\App\Models\Wishlist;
use Modules\FAQ\App\Models\FaqTranslation;
use Modules\Page\App\Models\PrivacyPolicy;
use Modules\Course\App\Models\CourseModule;
use Modules\Course\App\Models\CourseReview;
use Modules\Blog\App\Models\BlogTranslation;
use Modules\Coupon\App\Models\CouponHistory;
use Modules\Newsletter\App\Models\Newsletter;
use Modules\Page\App\Models\TermAndCondition;
use Modules\Course\App\Models\LessonChecklist;
use Modules\Course\App\Models\CourseEnrollment;
use Modules\CourseLevel\App\Models\CourseLevel;
use Modules\NoticeBoard\App\Models\NoticeBoard;
use Modules\Testimonial\App\Models\Testimonial;
use Modules\Course\App\Models\CourseTranslation;
use Modules\Course\App\Models\CourseModuleLesson;
use Modules\Category\Entities\CategoryTranslation;
use Modules\Page\App\Models\CustomPageTranslation;
use Modules\Course\App\Models\CourseEnrollmentList;
use Modules\GlobalSetting\App\Models\GlobalSetting;
use Modules\SupportTicket\App\Models\SupportTicket;
use Modules\Blog\App\Models\BlogCategoryTranslation;
use Modules\ContactMessage\App\Models\ContactMessage;
use Modules\CourseLanguage\App\Models\CourseLanguage;
use Modules\PaymentGateway\App\Models\PaymentGateway;
use Modules\SupportTicket\App\Models\MessageDocument;
use Modules\PaymentWithdraw\App\Models\SellerWithdraw;
use Modules\PaymentWithdraw\App\Models\WithdrawMethod;
use Modules\CourseLevel\App\Models\CourseLevelTranslation;
use Modules\SupportTicket\App\Models\SupportTicketMessage;
use Modules\Testimonial\App\Models\TestimonialTrasnlation;
use Modules\GlobalSetting\App\Http\Requests\TawkChatRequest;
use Modules\GlobalSetting\App\Http\Requests\SocialLoginRequest;
use Modules\CourseLanguage\App\Models\CourseLanguageTranslation;
use Modules\GlobalSetting\App\Http\Requests\CookieConsentRequest;
use Modules\GlobalSetting\App\Http\Requests\FacebookPixelRequest;
use Modules\GlobalSetting\App\Http\Requests\GeneralSettingRequest;
use Modules\GlobalSetting\App\Http\Requests\GoogleAnalyticRequest;
use Modules\GlobalSetting\App\Http\Requests\GoogleRecaptchaRequest;

class GlobalSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function general_setting()
    {
        return view('globalsetting::index');
    }

    public function update_general_setting(GeneralSettingRequest $request)
    {

        GlobalSetting::where('key', 'selected_theme')->update(['value' => $request->selected_theme]);
        GlobalSetting::where('key', 'blog_theme')->update(['value' => $request->blog_theme]);
        GlobalSetting::where('key', 'course_theme')->update(['value' => $request->course_theme]);
        GlobalSetting::where('key', 'app_name')->update(['value' => $request->app_name]);
        GlobalSetting::where('key', 'contact_message_mail')->update(['value' => $request->contact_message_mail]);
        GlobalSetting::where('key', 'timezone')->update(['value' => $request->timezone]);
        GlobalSetting::where('key', 'commission_type')->update(['value' => $request->commission_type]);
        GlobalSetting::where('key', 'commission_per_sale')->update(['value' => $request->commission_per_sale]);
        GlobalSetting::where('key', 'preloader_status')->update(['value' => $request->preloader_status]);

        $this->set_cache_setting();

        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }


    public function update_logo_favicon(Request $request)
    {

        $logo_setting = GlobalSetting::where('key', 'logo')->first();

        if($request->logo){
            $old_logo = $logo_setting->value;
            $image = $request->logo;
            $ext = $image->getClientOriginalExtension();
            $logo_name = 'logo-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
            $logo_name = 'uploads/website-images/'.$logo_name;
            $request->logo->move(public_path('uploads/website-images'), $logo_name);
            $logo_setting->value = $logo_name;
            $logo_setting->save();

            if($old_logo){
                if(File::exists(public_path().'/'.$old_logo))unlink(public_path().'/'.$old_logo);
            }
        }

        $footer_logo_setting = GlobalSetting::where('key', 'footer_logo')->first();

        if($request->footer_logo){
            $old_logo = $footer_logo_setting->value;
            $image = $request->footer_logo;
            $ext = $image->getClientOriginalExtension();
            $logo_name = 'footer-logo-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
            $logo_name = 'uploads/website-images/'.$logo_name;
            $request->footer_logo->move(public_path('uploads/website-images'), $logo_name);
            $footer_logo_setting->value = $logo_name;
            $footer_logo_setting->save();
            if($old_logo){
                if(File::exists(public_path().'/'.$old_logo))unlink(public_path().'/'.$old_logo);
            }
        }


        $secondary_logo_setting = GlobalSetting::where('key', 'secondary_logo')->first();

        if($request->secondary_logo){
            $old_logo = $secondary_logo_setting->value;
            $image = $request->secondary_logo;
            $ext = $image->getClientOriginalExtension();
            $logo_name = 'secondary-logo-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
            $logo_name = 'uploads/website-images/'.$logo_name;
            $request->secondary_logo->move(public_path('uploads/website-images'), $logo_name);
            $secondary_logo_setting->value = $logo_name;
            $secondary_logo_setting->save();
            if($old_logo){
                if(File::exists(public_path().'/'.$old_logo))unlink(public_path().'/'.$old_logo);
            }
        }


        $secondary_footer_logo_setting = GlobalSetting::where('key', 'secondary_footer_logo')->first();

        if($request->secondary_footer_logo){
            $old_logo = $secondary_footer_logo_setting->value;
            $image = $request->secondary_footer_logo;
            $ext = $image->getClientOriginalExtension();
            $logo_name = 'secondary-footer-logo-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
            $logo_name = 'uploads/website-images/'.$logo_name;
            $request->secondary_footer_logo->move(public_path('uploads/website-images'), $logo_name);
            $secondary_footer_logo_setting->value = $logo_name;
            $secondary_footer_logo_setting->save();
            if($old_logo){
                if(File::exists(public_path().'/'.$old_logo))unlink(public_path().'/'.$old_logo);
            }
        }

        $secondary_navmenu_logo_setting = GlobalSetting::where('key', 'secondary_navmenu_logo')->first();

        if($request->secondary_navmenu_logo){
            $old_logo = $secondary_navmenu_logo_setting->value;
            $image = $request->secondary_navmenu_logo;
            $ext = $image->getClientOriginalExtension();
            $logo_name = 'secondary-menu-logo-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
            $logo_name = 'uploads/website-images/'.$logo_name;
            $request->secondary_navmenu_logo->move(public_path('uploads/website-images'), $logo_name);
            $secondary_navmenu_logo_setting->value = $logo_name;
            $secondary_navmenu_logo_setting->save();
            if($old_logo){
                if(File::exists(public_path().'/'.$old_logo))unlink(public_path().'/'.$old_logo);
            }
        }

        $home3_logo_setting = GlobalSetting::where('key', 'home3_logo')->first();

        if($request->home3_logo){
            $old_logo = $home3_logo_setting->value;
            $image = $request->home3_logo;
            $ext = $image->getClientOriginalExtension();
            $logo_name = 'secondary-menu-logo-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
            $logo_name = 'uploads/website-images/'.$logo_name;
            $request->home3_logo->move(public_path('uploads/website-images'), $logo_name);
            $home3_logo_setting->value = $logo_name;
            $home3_logo_setting->save();
            if($old_logo){
                if(File::exists(public_path().'/'.$old_logo))unlink(public_path().'/'.$old_logo);
            }
        }

        $home3_footer_logo_setting = GlobalSetting::where('key', 'home3_footer_logo')->first();

        if($request->home3_footer_logo){
            $old_logo = $home3_footer_logo_setting->value;
            $image = $request->home3_footer_logo;
            $ext = $image->getClientOriginalExtension();
            $logo_name = 'secondary-menu-logo-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
            $logo_name = 'uploads/website-images/'.$logo_name;
            $request->home3_footer_logo->move(public_path('uploads/website-images'), $logo_name);
            $home3_footer_logo_setting->value = $logo_name;
            $home3_footer_logo_setting->save();
            if($old_logo){
                if(File::exists(public_path().'/'.$old_logo))unlink(public_path().'/'.$old_logo);
            }
        }



        $logo_setting = GlobalSetting::where('key', 'favicon')->first();

        if($request->favicon){
            $old_favicon = $logo_setting->value;
            $favicon = $request->favicon;
            $ext = $favicon->getClientOriginalExtension();
            $favicon_name = 'favicon-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
            $favicon_name = 'uploads/website-images/'.$favicon_name;
            $request->favicon->move(public_path('uploads/website-images'), $favicon_name);
            $logo_setting->value = $favicon_name;
            $logo_setting->save();
            if($old_favicon){
                if(File::exists(public_path().'/'.$old_favicon))unlink(public_path().'/'.$old_favicon);
            }
        }


        $this->set_cache_setting();

        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

    public function update_google_captcha(GoogleRecaptchaRequest $request){

        GlobalSetting::where('key', 'recaptcha_site_key')->update(['value' => $request->site_key]);
        GlobalSetting::where('key', 'recaptcha_secret_key')->update(['value' => $request->secret_key]);
        GlobalSetting::where('key', 'recaptcha_status')->update(['value' => $request->status ? 1 : 0]);

        $this->set_cache_setting();

        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);


    }

    public function update_tawk_chat(TawkChatRequest $request){

        GlobalSetting::where('key', 'tawk_chat_link')->update(['value' => $request->chat_link]);
        GlobalSetting::where('key', 'tawk_status')->update(['value' => $request->status ? 1 : 0]);

        $this->set_cache_setting();

        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

    public function update_google_analytic(GoogleAnalyticRequest $request){

        GlobalSetting::where('key', 'google_analytic_id')->update(['value' => $request->analytic_id]);
        GlobalSetting::where('key', 'google_analytic_status')->update(['value' => $request->status ? 1 : 0]);

        $this->set_cache_setting();

        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

    public function update_facebook_pixel(FacebookPixelRequest $request){

        GlobalSetting::where('key', 'pixel_app_id')->update(['value' => $request->app_id]);
        GlobalSetting::where('key', 'pixel_status')->update(['value' => $request->status ? 1 : 0]);

        $this->set_cache_setting();

        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }


    public function database_clear(){

        Blog::truncate();
        BlogCategory::truncate();
        BlogCategoryTranslation::truncate();
        BlogComment::truncate();
        BlogTranslation::truncate();
        Category::truncate();
        CategoryTranslation::truncate();
        ContactMessage::truncate();
        Coupon::truncate();
        CouponHistory::truncate();
        Course::truncate();
        CourseEnrollment::truncate();
        CourseEnrollmentList::truncate();
        CourseLanguage::truncate();
        CourseLanguageTranslation::truncate();
        CourseLevel::truncate();
        CourseLevelTranslation::truncate();
        CourseModule::truncate();
        CourseModuleLesson::truncate();
        CourseReview::truncate();
        CourseTranslation::truncate();
        CustomPage::truncate();
        CustomPageTranslation::truncate();
        Faq::truncate();
        FaqTranslation::truncate();
        LessonChecklist::truncate();
        Newsletter::truncate();
        Partner::truncate();
        SellerWithdraw::truncate();
        Testimonial::truncate();
        TestimonialTrasnlation::truncate();
        User::truncate();
        Wishlist::truncate();
        WithdrawMethod::truncate();
        SupportTicket::truncate();
        SupportTicketMessage::truncate();
        MessageDocument::truncate();
        NoticeBoard::truncate();


        PrivacyPolicy::where('lang_code', '!=', 'en')->delete();
        TermAndCondition::where('lang_code', '!=', 'en')->delete();

        Currency::where('id', '!=', 1)->delete();
        Language::where('id', '!=', 1)->delete();

        $admins = Admin::where('id', '!=', 1)->get();
        foreach($admins as $admin){
            $admin_image = $admin->image;
            $admin->delete();
            if($admin_image){
                if(File::exists(public_path().'/'.$admin_image))unlink(public_path().'/'.$admin_image);
            }
        }


        $folderPath = public_path('uploads/custom-images');
        $response = File::deleteDirectory($folderPath);

        $path = public_path('uploads/custom-images');
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }

        PaymentGateway::where('key', 'stripe_currency_id')->update(['value' => 1]);
        PaymentGateway::where('key', 'paypal_currency_id')->update(['value' => 1]);
        PaymentGateway::where('key', 'razorpay_currency_id')->update(['value' => 1]);
        PaymentGateway::where('key', 'flutterwave_currency_id')->update(['value' => 1]);
        PaymentGateway::where('key', 'mollie_currency_id')->update(['value' => 1]);
        PaymentGateway::where('key', 'paystack_currency_id')->update(['value' => 1]);
        PaymentGateway::where('key', 'instamojo_currency_id')->update(['value' => 1]);


        $notify_message = trans('translate.Database clear successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }


    public function cookie_consent(){

        return view('globalsetting::cookie_consent');

    }


    public function cookie_consent_update(CookieConsentRequest $request){

        GlobalSetting::where('key', 'cookie_consent_message')->update(['value' => $request->message]);
        GlobalSetting::where('key', 'cookie_consent_status')->update(['value' => $request->status ? 1 : 0]);

        $this->set_cache_setting();

        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }


    public function error_image(){

        return view('globalsetting::error_image');

    }


    public function error_image_update(Request $request){

        $setting = GlobalSetting::where('key', 'error_image')->first();

        if($request->error_image){
            $old_logo = $setting->value;
            $image = $request->error_image;
            $ext = $image->getClientOriginalExtension();
            $logo_name = 'error-image-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
            $logo_name = 'uploads/website-images/'.$logo_name;
            $logo = Image::make($image)
                    ->save(public_path().'/'.$logo_name);
            $setting->value = $logo_name;
            $setting->save();

            if($old_logo){
                if(File::exists(public_path().'/'.$old_logo))unlink(public_path().'/'.$old_logo);
            }
        }

        $this->set_cache_setting();

        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }


    public function login_image(){

        return view('globalsetting::login_image');

    }


    public function login_image_update(Request $request){

        $setting = GlobalSetting::where('key', 'login_page_bg')->first();

        if($request->login_page_bg){
            $old_logo = $setting->value;
            $image = $request->login_page_bg;
            $ext = $image->getClientOriginalExtension();
            $logo_name = 'login-bg-image-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
            $logo_name = 'uploads/website-images/'.$logo_name;
            $logo = Image::make($image)
                    ->save(public_path().'/'.$logo_name);
            $setting->value = $logo_name;
            $setting->save();

            if($old_logo){
                if(File::exists(public_path().'/'.$old_logo))unlink(public_path().'/'.$old_logo);
            }

        }

        $this->set_cache_setting();

        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

    public function admin_login_image(){

        return view('globalsetting::admin_login_image');

    }


    public function admin_login_image_update(Request $request){

        $setting = GlobalSetting::where('key', 'admin_login')->first();

        if($request->admin_login){
            $old_logo = $setting->value;
            $image = $request->admin_login;
            $ext = $image->getClientOriginalExtension();
            $logo_name = 'admin-bg-image-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
            $logo_name = 'uploads/website-images/'.$logo_name;
            $logo = Image::make($image)
                    ->save(public_path().'/'.$logo_name);
            $setting->value = $logo_name;
            $setting->save();

            if($old_logo){
                if(File::exists(public_path().'/'.$old_logo))unlink(public_path().'/'.$old_logo);
            }

        }

        $this->set_cache_setting();

        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }


    public function breadcrumb(){

        return view('globalsetting::breadcrumb');

    }


    public function breadcrumb_update(Request $request){

        $setting = GlobalSetting::where('key', 'breadcrumb_image')->first();

        if($request->breadcrumb_image){
            $old_logo = $setting->value;
            $image = $request->breadcrumb_image;
            $ext = $image->getClientOriginalExtension();
            $logo_name = 'breadcrumb-image-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
            $logo_name = 'uploads/website-images/'.$logo_name;
            $logo = Image::make($image)
                    ->save(public_path().'/'.$logo_name);
            $setting->value = $logo_name;
            $setting->save();

            if($old_logo){
                if(File::exists(public_path().'/'.$old_logo))unlink(public_path().'/'.$old_logo);
            }

        }

        $this->set_cache_setting();

        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

    public function social_login(){

        return view('globalsetting::social_login');
    }

    public function social_login_update(SocialLoginRequest $request){

        GlobalSetting::where('key', 'facebook_client_id')->update(['value' => $request->facebook_client_id]);
        GlobalSetting::where('key', 'facebook_secret_id')->update(['value' => $request->facebook_secret_id]);
        GlobalSetting::where('key', 'facebook_redirect_url')->update(['value' => $request->facebook_redirect_url]);
        GlobalSetting::where('key', 'is_facebook')->update(['value' => $request->is_facebook ? 1 : 0]);

        GlobalSetting::where('key', 'gmail_client_id')->update(['value' => $request->gmail_client_id]);
        GlobalSetting::where('key', 'gmail_secret_id')->update(['value' => $request->gmail_secret_id]);
        GlobalSetting::where('key', 'gmail_redirect_url')->update(['value' => $request->gmail_redirect_url]);
        GlobalSetting::where('key', 'is_gmail')->update(['value' => $request->is_gmail ? 1 : 0]);

        $this->set_cache_setting();

        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);



    }


    public function default_avatar(){

        return view('globalsetting::default_avatar');

    }


    public function default_avatar_update(Request $request){

        $setting = GlobalSetting::where('key', 'default_avatar')->first();

        if($request->default_avatar){
            $old_logo = $setting->value;
            $image = $request->default_avatar;
            $ext = $image->getClientOriginalExtension();
            $logo_name = 'avatar-image-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
            $logo_name = 'uploads/website-images/'.$logo_name;
            $logo = Image::make($image)
                    ->save(public_path().'/'.$logo_name);
            $setting->value = $logo_name;
            $setting->save();

            if($old_logo){
                if(File::exists(public_path().'/'.$old_logo))unlink(public_path().'/'.$old_logo);
            }

        }

        $this->set_cache_setting();

        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

    public function maintenance_mode(){

        return view('globalsetting::maintenance_mode');

    }


    public function maintenance_mode_update(Request $request){

        $setting = GlobalSetting::where('key', 'maintenance_image')->first();

        if($request->maintenance_image){
            $old_logo = $setting->value;
            $image = $request->maintenance_image;
            $ext = $image->getClientOriginalExtension();
            $logo_name = 'maintenance-image-'.date('Y-m-d-h-i-s-').rand(999,9999).'.'.$ext;
            $logo_name = 'uploads/website-images/'.$logo_name;
            $logo = Image::make($image)
                    ->save(public_path().'/'.$logo_name);
            $setting->value = $logo_name;
            $setting->save();

            if($old_logo){
                if(File::exists(public_path().'/'.$old_logo))unlink(public_path().'/'.$old_logo);
            }

        }

        GlobalSetting::where('key', 'maintenance_text')->update(['value' => $request->maintenance_text]);
        GlobalSetting::where('key', 'maintenance_status')->update(['value' => $request->maintenance_status ? 1 : 0]);

        $this->set_cache_setting();

        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }


    public function cache_clear(){

        Artisan::call('optimize:clear');

        $notify_message = trans('translate.Updated successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);
    }


    public function set_cache_setting(){
        $setting_data = GlobalSetting::get();

        $setting = array();

        foreach($setting_data as $data_item){
            $setting[$data_item->key] = $data_item->value;
        }

        $setting = (object) $setting;


        Cache::put('setting', $setting);

    }

}
