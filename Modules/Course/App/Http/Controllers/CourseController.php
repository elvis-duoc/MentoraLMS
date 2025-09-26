<?php

namespace Modules\Course\App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Course\App\Models\Course;
use Modules\Category\Entities\Category;
use Modules\Course\App\Models\CourseModule;
use Modules\Course\App\Models\CourseReview;
use Modules\SeoSetting\App\Models\SeoSetting;
use Modules\CourseLevel\App\Models\CourseLevel;
use Modules\CourseLanguage\App\Models\CourseLanguage;

class CourseController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        $courses = Course::with('instructor')->where(['status' => 'enable', 'approved_by_admin' => 'approved' ]);

        if ($request->min_amount) {
            $courses = $courses->where(function ($query) use ($request) {
                $query->where('offer_price', '>=', $request->min_amount)
                      ->orWhere(function ($query) use ($request) {
                          $query->whereNull('offer_price')
                                ->where('regular_price', '>=', $request->min_amount);
                      });
            });
        }

        if ($request->max_amount) {
            $courses = $courses->where(function ($query) use ($request) {
                $query->where('offer_price', '<=', $request->max_amount)
                      ->orWhere(function ($query) use ($request) {
                          $query->whereNull('offer_price')
                                ->where('regular_price', '<=', $request->max_amount);
                      });
            });
        }

        if($request->category){
            $category = Category::where('slug', $request->category)->first();
            if($category){
                $courses = $courses->where('category_id', $category->id);
            }
        }


        if($request->course_languages){
            $courses = $courses->whereIn('course_language_id', $request->course_languages);
        }

        if($request->course_levels){
            $courses = $courses->whereIn('course_level_id', $request->course_levels);
        }

        if($request->search){
            $services = $courses->whereHas('front_translate', function ($query) use ($request) {
                            $query->where('title', 'like', '%' . $request->search . '%')
                                ->orWhere('description', 'like', '%' . $request->search . '%');
                        });
        }


        if($request->sort_by){

            switch ($request->sort_by) {
                case 'oldest':
                    $courses->orderBy('id', 'asc');
                    break;

                case 'popular':
                    $courses->where('is_popular', 'enable')->latest();
                    break;

                case 'new':
                default:
                    $courses->latest();
                    break;
            }

        }else{
            $courses = $courses->orderBy('id', 'desc');
        }

        $courses = $courses->paginate(12);
        $courses = $courses->appends($request->all());

        $seo_setting = SeoSetting::where('id', 10)->first();

        $categories = Category::where('status', 'enable')->latest()->get();

        $course_languages = CourseLanguage::where('status', 1)->latest()->get();

        $course_levels = CourseLevel::where('status', 1)->latest()->get();

        $max_price_course = Course::orderBy('regular_price', 'desc')->first();
        $rang_slider_max_price = $max_price_course?->regular_price ?? 0;

        $req_min_amount = 0;
        $req_max_amount = $rang_slider_max_price;

        if($request->min_amount){
            $req_min_amount = $request->min_amount;
        }

        if($request->max_amount){
            $req_max_amount = $request->max_amount;
        }

        $page_view = 'course::index';
        $breadcrumb_title = trans('translate.Courses Grid View');

        if($request->page_view){
            if($request->page_view == 'list'){
                $page_view = 'course::list_view';
                $breadcrumb_title = trans('translate.Courses List View');
            }elseif($request->page_view == 'sidebar_grid_view'){
                $page_view = 'course::sidebar_grid_view';
                $breadcrumb_title = trans('translate.Courses Grid View');
            }elseif($request->page_view == 'sidebar_list_view'){
                $page_view = 'course::sidebar_list_view';
                $breadcrumb_title = trans('translate.Courses List View');
            }else{
                $page_view = 'course::index';
            }
        }

        return view($page_view, [
            'seo_setting' => $seo_setting,
            'breadcrumb_title' => $breadcrumb_title,
            'courses' => $courses,
            'categories' => $categories,
            'course_languages' => $course_languages,
            'course_levels' => $course_levels,
            'rang_slider_max_price' => $rang_slider_max_price,
            'req_min_amount' => $req_min_amount,
            'req_max_amount' => $req_max_amount,
        ]);

    }


    public function show(Request $request, $slug){

        $course = Course::where(['status' => 'enable', 'approved_by_admin' => 'approved', 'slug' => $request->slug])->firstOrFail();

        $instructor = User::select('id', 'name', 'email', 'designation', 'username', 'image')->findOrFail($course->user_id);

        $course_modules = CourseModule::with('lessons')->where('course_id', $course->id)->orderBy('serial', 'asc')->where('status', 'enable')->get();

        $breadcrumb_title = trans('translate.Course Details');

        $reviews = CourseReview::with('student')->where(['course_id' => $course->id, 'status' => 'enable'])->get();

        $total_ratings = $reviews->count();

         $rating_counts = [];
         foreach ($reviews as $review) {
             $rating = $review->rating;
             if (!isset($rating_counts[$rating])) {
                 $rating_counts[$rating] = 0;
             }
             $rating_counts[$rating]++;
         }

         $rating_data = [];
         for ($i = 1; $i <= 5; $i++) {
             $count = isset($rating_counts[$i]) ? $rating_counts[$i] : 0;
             $percentage = $total_ratings ? ($count / $total_ratings) * 100 : 0;
             $rating_data[$i] = [
                 'count' => $count,
                 'percentage' => $percentage
             ];
         }

        $preview_video_thumb = 'default-thumbnail.jpg';

        if($course->video_source == 'youtube'){
            preg_match('/\/embed\/([a-zA-Z0-9_-]+)/', html_decode($course->preview_video_id), $matches);
            if (!empty($matches[1])) {
                $videoId = $matches[1];
                $preview_video_thumb = "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg";
            }
        }

        $related_courses = Course::with('instructor')->where(['status' => 'enable', 'approved_by_admin' => 'approved', 'category_id' => $course->category_id])->where('id', '!=', $course->id)->latest()->take(3)->get();


        return view('course::show', [
            'breadcrumb_title' => $breadcrumb_title,
            'course' => $course,
            'course_modules' => $course_modules,
            'instructor' => $instructor,
            'reviews' => $reviews,
            'rating_data' => $rating_data,
            'preview_video_thumb' => $preview_video_thumb,
            'related_courses' => $related_courses,
        ]);
    }


    public function instructors(Request $request){

        $instructors = User::where(['status' => 'enable' , 'is_banned' => 'no', 'is_seller' => 1])->where('email_verified_at', '!=', null)->select('id', 'username', 'name', 'image', 'status', 'is_banned', 'is_seller', 'is_top_seller', 'designation', 'hourly_payment');

        if ($request->category_id || $request->course_language || $request->course_level) {
            $instructors->whereHas('courses', function($query) use ($request) {
                if ($request->category_id) {
                    $query->where('category_id', $request->category_id);
                }

                if ($request->course_language) {
                    $query->where('course_language_id', $request->course_language);
                }

                if ($request->course_level) {
                    $query->where('course_level_id', $request->course_level);
                }

            });
        }

        if($request->search){
            $instructors = $instructors->where('name', 'like', '%' . $request->search . '%');
        }

        $instructors = $instructors->orderBy('id','asc')->paginate(12);

        $seo_setting = SeoSetting::where('id', 7)->first();

        $breadcrumb_title = trans('translate.Instructors');

        $categories = Category::where('status', 'enable')->latest()->get();

        $course_languages = CourseLanguage::where('status', 1)->latest()->get();

        $course_levels = CourseLevel::where('status', 1)->latest()->get();

        return view('course::instructors', [
            'seo_setting' => $seo_setting,
            'breadcrumb_title' => $breadcrumb_title,
            'instructors' => $instructors,
            'categories' => $categories,
            'course_languages' => $course_languages,
            'course_levels' => $course_levels,
        ]);
    }


    public function instructor_show(Request $request, $username){


        $instructor = User::where(['status' => 'enable' , 'is_banned' => 'no', 'is_seller' => 1, 'username' => $username])->where('email_verified_at', '!=', null)->firstOrFail();

        $skills_expertises = json_decode($instructor->skills_expertise);

        $courses = Course::with('instructor')->where(['status' => 'enable', 'approved_by_admin' => 'approved', 'user_id' => $instructor->id])->orderBy('id', 'desc')->get();

        return view('course::instructor_show', [
            'breadcrumb_title' => $instructor->name,
            'instructor' => $instructor,
            'skills_expertises' => $skills_expertises,
            'courses' => $courses,

        ]);

    }





}
