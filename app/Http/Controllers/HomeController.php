<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Rules\Captcha;
use Illuminate\Http\Request;
use Modules\FAQ\App\Models\Faq;
use Modules\Blog\App\Models\Blog;
use Modules\Course\App\Models\Course;
use Modules\Page\App\Models\ContactUs;
use Modules\Category\Entities\Category;
use Modules\Page\App\Models\CustomPage;
use Modules\Partner\App\Models\Partner;
use Modules\Blog\App\Models\BlogComment;
use Modules\Blog\App\Models\BlogCategory;
use Modules\Currency\App\Models\Currency;
use Modules\Language\App\Models\Language;
use Modules\Page\App\Models\PrivacyPolicy;
use Modules\Page\App\Models\TermAndCondition;
use Modules\SeoSetting\App\Models\SeoSetting;
use Modules\Testimonial\App\Models\Testimonial;
use Modules\GlobalSetting\App\Models\GlobalSetting;

class HomeController extends Controller
{

    public function index(Request $request)
    {

        $theme_setting = GlobalSetting::where('key', 'selected_theme')->first();

        if($theme_setting->value == 'all_theme'){
            if($request->has('theme')){
                $theme = $request->theme;
                if($theme == 'one'){
                    Session::put('selected_theme', 'theme_one');
                }elseif($theme == 'two'){
                    Session::put('selected_theme', 'theme_two');
                }elseif($theme == 'three'){
                    Session::put('selected_theme', 'theme_three');
                }elseif($theme == 'four'){
                    Session::put('selected_theme', 'theme_four');
                }else{
                    if(!Session::has('selected_theme')){
                        Session::put('selected_theme', 'theme_one');
                    }
                }
            }else{
                Session::put('selected_theme', 'theme_one');
            }
        }else{
            if($theme_setting->value == 'theme_one'){
                Session::put('selected_theme', 'theme_one');
            }elseif($theme_setting->value == 'theme_two'){
                Session::put('selected_theme', 'theme_two');
            }elseif($theme_setting->value == 'theme_three'){
                Session::put('selected_theme', 'theme_three');
            }elseif($theme_setting->value == 'theme_four'){
                Session::put('selected_theme', 'theme_four');
            }
        }


        $seo_setting = SeoSetting::where('id', 1)->first();

        $home1_hero_section = getContent('main_demo_hero.content', true);
        $home1_key_feature = getContent('key_feature.content', true);
        $home1_about_us = getContent('home1_about_us.content', true);
        $home1_join_instructor = getContent('home1_join_instructor.content', true);
        $home1_why_choose_us = getContent('home1_why_choose_us.content', true);

        $categories = Category::where('status', 'enable')->latest()->get();

        $categories = Category::with('courses')->where('status', 'enable')->latest()->get();

        $home_1_filter_categories = Category::with(['courses' => function($query) {
            $query->take(20);
        }])->take(3)->get();

        $partners = Partner::latest()->get();

        $testimonials = Testimonial::where('status', 'active')->latest()->get();

        $instructors = User::where(['status' => 'enable' , 'is_banned' => 'no', 'is_seller' => 1, 'is_top_seller' => 'enable'])->where('email_verified_at', '!=', null)->select('id', 'username', 'name', 'image', 'status', 'is_banned', 'is_seller', 'is_top_seller', 'designation', 'hourly_payment')->orderBy('id','asc')->take(5)->get();

        $blogs = Blog::with('author', 'category')->where('status', 1)->take(4)->get();

        // home 2 content start
        $home2_hero_section = getContent('home2_hero.content', true);
        $home2_about_us = getContent('home2_about_us.content', true);
        $home2_achievement = getContent('home2_achievement.content', true);
        $home2_our_facilities = getContent('home2_our_facilities.content', true);
        $home2_fun_fact = getContent('home2_fun_fact.content', true);
        $home2_featured_instructor = getContent('home2_featured_instructor.content', true);
        $home2_join_instructor = getContent('home2_join_instructor.content', true);
        $home2_mobile_app = getContent('home2_mobile_app.content', true);

        $home_2_filter_categories = Category::with(['courses' => function($query) {
            $query->take(40);
        }])->take(5)->get();


        // home 3 content start
        $home3_hero_section = getContent('home3_hero.content', true);
        $home3_about_us = getContent('home3_about.content', true);
        $courses = Course::with('instructor')->where(['status' => 'enable', 'approved_by_admin' => 'approved' ])->take(3)->get();
        $home3_fun_fact = getContent('home3_fun_fact.content', true);
        $home3_faq = getContent('home3_faq.content', true);
        $faqs_one = Faq::where('faq_type', 'section_one')->latest()->get();
        $home3_testimonial = getContent('home3_testimonial.content', true);
        $home3_explore = getContent('home3_explore.content', true);
        $home3_newsletter = getContent('home3_newsletter.content', true);


        // home 4 content start
        $home4_hero_section = getContent('home4_hero.content', true);
        $about_us = getContent('about_us.content', true);
        $our_campus = getContent('our_campus.content', true);
        $our_program = getContent('our_program.content', true);
        $popular_department = getContent('home4_popular_department.content', true);
        $about_video = getContent('about_video.content', true);
        $home4_testimonial = getContent('home4_testimonial.content', true);

        $home_4_filter_categories = Category::with(['courses' => function($query) {
            $query->take(40);
        }])->take(4)->get();


        $selected_theme = Session::get('selected_theme');

        if ($selected_theme == 'theme_one'){
            return view('index', [
                'seo_setting' => $seo_setting,
                'home1_hero_section' => $home1_hero_section,
                'categories' => $categories,
                'home1_key_feature' => $home1_key_feature,
                'home1_about_us' => $home1_about_us,
                'home_1_filter_categories' => $home_1_filter_categories,
                'home1_join_instructor' => $home1_join_instructor,
                'partners' => $partners,
                'testimonials' => $testimonials,
                'instructors' => $instructors,
                'home1_why_choose_us' => $home1_why_choose_us,
                'blogs' => $blogs,

            ]);
        }elseif($selected_theme == 'theme_two'){
            return view('index2', [
                'seo_setting' => $seo_setting,
                'home2_hero_section' => $home2_hero_section,
                'home2_key_feature' => $home1_key_feature,
                'home2_about_us' => $home2_about_us,
                'categories' => $categories,
                'home_2_filter_categories' => $home_2_filter_categories,
                'home2_achievement' => $home2_achievement,
                'testimonials' => $testimonials,
                'home2_our_facilities' => $home2_our_facilities,
                'home2_fun_fact' => $home2_fun_fact,
                'instructors' => $instructors,
                'home2_featured_instructor' => $home2_featured_instructor,
                'home2_join_instructor' => $home2_join_instructor,
                'home2_mobile_app' => $home2_mobile_app,
                'blogs' => $blogs,
            ]);
        }elseif($selected_theme == 'theme_three'){
            return view('index3', [
                'seo_setting' => $seo_setting,
                'home3_hero_section' => $home3_hero_section,
                'home3_about_us' => $home3_about_us,
                'courses' => $courses,
                'home3_fun_fact' => $home3_fun_fact,
                'home3_faq' => $home3_faq,
                'faqs_one' => $faqs_one,
                'testimonials' => $testimonials,
                'home3_testimonial' => $home3_testimonial,
                'instructors' => $instructors,
                'home3_explore' => $home3_explore,
                'home3_newsletter' => $home3_newsletter,
                'blogs' => $blogs,
            ]);
        }elseif($selected_theme == 'theme_four'){
            return view('index4', [
                'seo_setting' => $seo_setting,
                'home4_hero_section' => $home4_hero_section,
                'about_us' => $about_us,
                'home_4_filter_categories' => $home_4_filter_categories,
                'our_campus' => $our_campus,
                'our_program' => $our_program,
                'popular_department' => $popular_department,
                'about_video' => $about_video,
                'instructors' => $instructors,
                'home4_testimonial' => $home4_testimonial,
                'testimonials' => $testimonials,
                'blogs' => $blogs,
            ]);
        }else{
            return view('index', [
                'seo_setting' => $seo_setting,
                'home1_hero_section' => $home1_hero_section,
                'categories' => $categories,
                'home1_key_feature' => $home1_key_feature,
                'home1_about_us' => $home1_about_us,
                'home_1_filter_categories' => $home_1_filter_categories,
                'home1_join_instructor' => $home1_join_instructor,
                'partners' => $partners,
                'testimonials' => $testimonials,
                'instructors' => $instructors,
                'home1_why_choose_us' => $home1_why_choose_us,
                'blogs' => $blogs,

            ]);
        }

    }

    public function about_us()
    {

        $seo_setting = SeoSetting::where('id', 3)->first();

        $breadcrumb_title = trans('translate.About Us');

        $blogs = Blog::with('author', 'category')->where('status', 1)->take(3)->get();

        $about_us = getContent('about_us.content', true);

        $our_program = getContent('our_program.content', true);

        $popular_department = getContent('popular_department.content', true);

        $about_video = getContent('about_video.content', true);

        return view('about_us', [
            'seo_setting' => $seo_setting,
            'breadcrumb_title' => $breadcrumb_title,
            'about_us' => $about_us,
            'our_program' => $our_program,
            'popular_department' => $popular_department,
            'about_video' => $about_video,
            'blogs' => $blogs,
        ]);
    }

    public function blogs(Request $request)
    {

        $page_view = 'blogs';
        $paginate_qty = 9;
        if($request->page_view){
            if($request->page_view == 'blogs_with_sidebar'){
                $page_view = 'blogs_with_sidebar';
                $paginate_qty = 6;
            }else{
                $page_view = 'blogs';
            }
        }

        $blogs = Blog::with('author')->where('status', 1);

        if($request->category){
            $blogs = $blogs->where('blog_category_id', $request->category);
        }

        if ($request->search) {
            $blogs = $blogs->where(function ($query) use ($request) {
                $query->whereHas('front_translate', function ($subQuery) use ($request) {
                    $subQuery->where('title', 'like', '%' . $request->search . '%')
                             ->orWhere('description', 'like', '%' . $request->search . '%');
                })
                ->orWhereJsonContains('tags', [['value' => $request->search]]);
            });
        }

        $blogs = $blogs->paginate($paginate_qty);

        $seo_setting = SeoSetting::where('id', 2)->first();

        $breadcrumb_title = trans('translate.Our Blogs');

        $latest_blogs = Blog::with('author')->where('status', 1)->take(5)->get();

        $blog_categories = BlogCategory::where('status', 1)->get();

        $blog_for_tags = Blog::where('status', 1)->select('status', 'tags')->get();

        $tags_array = [];
        foreach($blog_for_tags as $blog_for_tag){
            if($blog_for_tag->tags){
                foreach(json_decode($blog_for_tag->tags) ?? [] as $blog_tag){
                    if(!in_array($blog_tag->value, $tags_array)){
                        $tags_array[] = $blog_tag->value;
                    }
                }
            }
        }

        return view($page_view, [
            'blogs' => $blogs,
            'seo_setting' => $seo_setting,
            'breadcrumb_title' => $breadcrumb_title,
            'latest_blogs' => $latest_blogs,
            'blog_categories' => $blog_categories,
            'tags_array' => $tags_array,
        ]);
    }


    public function blog($slug)
    {
        $blog = Blog::with('author')->where('status', 1)->where('slug', $slug)->firstOrFail();

        $blog->views = $blog->views + 1;
        $blog->save();

        $blog_comments = BlogComment::where('blog_id', $blog->id)->where('status', 1)->latest()->get();

        $breadcrumb_title = trans('translate.Blog Details');

        $latest_blogs = Blog::with('author')->where('status', 1)->take(5)->get();

        $blog_categories = BlogCategory::where('status', 1)->get();

        $blog_for_tags = Blog::where('status', 1)->select('status', 'tags')->get();

        $tags_array = [];
        foreach($blog_for_tags as $blog_for_tag){
            if($blog_for_tag->tags){
                foreach(json_decode($blog_for_tag->tags) ?? [] as $blog_tag){
                    if(!in_array($blog_tag->value, $tags_array)){
                        $tags_array[] = $blog_tag->value;
                    }
                }
            }
        }

        return view('blog_detail', [
            'blog' => $blog,
            'blog_comments' => $blog_comments,
            'breadcrumb_title' => $breadcrumb_title,
            'latest_blogs' => $latest_blogs,
            'blog_categories' => $blog_categories,
            'tags_array' => $tags_array,
        ]);
    }

    public function store_blog_comment(Request $request, $id){
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email',
            'comment' => 'required',
            'g-recaptcha-response'=>new Captcha()
        ], [
            'name.required' => trans('translate.Name is required'),
            'email.required' => trans('translate.Email is required'),
            'comment.required' => trans('translate.Comment is required'),
        ]);

        $blog_comment = new Blogcomment();
        $blog_comment->blog_id = $id;
        $blog_comment->name = $request->name;
        $blog_comment->email = $request->email;
        $blog_comment->comment = $request->comment;
        $blog_comment->status = 0;
        $blog_comment->save();

        $notify_message= trans('translate.Comment submited successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }

    public function contact_us()
    {
        $contact_us = ContactUs::first();

        $seo_setting = SeoSetting::where('id', 4)->first();

        $breadcrumb_title = trans('translate.Contact Us');

        return view('contact_us', [
            'contact_us' => $contact_us,
            'seo_setting' => $seo_setting,
            'breadcrumb_title' => $breadcrumb_title,
        ]);
    }

    public function faq()
    {
        $faqs_one = Faq::where('faq_type', 'section_one')->latest()->get();
        $faqs_two = Faq::where('faq_type', 'section_two')->latest()->get();

        $seo_setting = SeoSetting::where('id', 5)->first();

        $faq_page = getContent('faq_page.content', true);

        $breadcrumb_title = trans('translate.FAQ');

        $blogs = Blog::with('author', 'category')->where('status', 1)->take(4)->get();

        return view('faq', [
            'seo_setting' => $seo_setting,
            'breadcrumb_title' => $breadcrumb_title,
            'faqs_two' => $faqs_two,
            'faqs_one' => $faqs_one,
            'faq_page' => $faq_page,
            'blogs' => $blogs,
        ]);
    }

    public function privacy_policy()
    {
        $privacy_policy = PrivacyPolicy::first();

        $seo_setting = SeoSetting::where('id', 9)->first();

        $breadcrumb_title = trans('translate.Privacy Policy');

        return view('privacy_policy', ['privacy_policy' => $privacy_policy, 'seo_setting' => $seo_setting, 'breadcrumb_title' => $breadcrumb_title]);
    }

    public function terms_conditions()
    {
        $terms_conditions = TermAndCondition::first();

        $seo_setting = SeoSetting::where('id', 6)->first();

        $breadcrumb_title = trans('translate.Terms & Conditions');

        return view('terms_conditions', ['terms_conditions' => $terms_conditions, 'seo_setting' => $seo_setting, 'breadcrumb_title' => $breadcrumb_title]);
    }

    public function custom_page($slug)
    {
        $custom_page = CustomPage::where('slug', $slug)->firstOrFail();

        $breadcrumb_title = $custom_page->page_name;

        return view('custom_page', ['custom_page' => $custom_page, 'breadcrumb_title' => $breadcrumb_title]);
    }

    public function download_file($file){
        $filepath= public_path() . "/uploads/custom-images/".$file;
        return response()->download($filepath);
    }


    public function language_switcher(Request $request){


        $request_lang = Language::where('lang_code', $request->lang_code)->first();

        Session::put('front_lang', $request->lang_code);
        Session::put('front_lang_name', $request_lang->lang_name);
        Session::put('lang_dir', $request_lang->lang_direction);

        app()->setLocale($request->lang_code);

        $notify_message= trans('translate.Language switched successful');
        if(env('APP_MODE') == 'DEMO'){
            $notify_message=array('message'=>$notify_message,'alert-type'=>'success', 'demo_mode' => 'Demo mode not tranlsate all language');
        }else{
            $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        }


        return redirect()->back()->with($notify_message);

    }


    public function currency_switcher(Request $request){

        $request_currency = Currency::where('currency_code', $request->currency_code)->first();

        Session::put('currency_name', $request_currency->currency_name);
        Session::put('currency_code', $request_currency->currency_code);
        Session::put('currency_icon', $request_currency->currency_icon);
        Session::put('currency_rate', $request_currency->currency_rate);
        Session::put('currency_position', $request_currency->currency_position);

        $notify_message= trans('translate.Currency switched successful');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);

    }

}
