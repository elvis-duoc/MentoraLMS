<?php

namespace Modules\CourseLanguage\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Course\App\Models\Course;
use Modules\Language\App\Models\Language;
use Modules\CourseLanguage\App\Models\CourseLanguage;
use Modules\CourseLanguage\App\Models\CourseLanguageTranslation;
use Modules\CourseLanguage\App\Http\Requests\CourseLanguageRequest;

class CourseLanguageController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $course_languages = CourseLanguage::with('translate')->latest()->get();

        return view('courselanguage::index', ['course_languages' => $course_languages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courselanguage::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseLanguageRequest $request)
    {
        $course_language = new CourseLanguage();
        $course_language->status = $request->status ? 1 : 0;
        $course_language->save();

        $languages = Language::all();
        foreach($languages as $language){
            $lang_trans = new CourseLanguageTranslation();
            $lang_trans->lang_code = $language->lang_code;
            $lang_trans->course_language_id = $course_language->id;
            $lang_trans->name = $request->name;
            $lang_trans->save();
        }

        $notify_message = trans('translate.Created successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.courselanguage.edit', ['courselanguage' => $course_language->id, 'lang_code' => admin_lang()])->with($notify_message);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {

        $course_language = CourseLanguage::findOrFail($id);

        $language_translate = CourseLanguageTranslation::where(['course_language_id' => $course_language->id, 'lang_code' => $request->lang_code])->first();

        return view('courselanguage::edit', ['course_language' => $course_language, 'language_translate' => $language_translate]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseLanguageRequest $request, $id)
    {

        $course_language = CourseLanguage::findOrFail($id);

        if($request->lang_code == admin_lang()){
            $course_language->status = $request->status ? 1 : 0;
            $course_language->save();
        }

        $lang_trans = CourseLanguageTranslation::where(['id' => $request->translate_id])->first();
        $lang_trans->name = $request->name;
        $lang_trans->save();

        $notify_message = trans('translate.Update successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $course_qty = Course::where('course_language_id', $id)->count();

        if($course_qty > 0){
            $notify_message = trans('translate.Multiple courses created under it, so you can not delete it');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }


        $course_language = CourseLanguage::findOrFail($id);
        $course_language->delete();

        CourseLanguageTranslation::where('course_language_id', $id)->delete();

        $notify_message = trans('translate.Deleted successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }


    public function setup_language($lang_code){
        $language_translates = CourseLanguageTranslation::where('lang_code' , admin_lang())->get();

        foreach($language_translates as $lang_translate){
            $new_trans = new CourseLanguageTranslation();
            $new_trans->lang_code = $lang_code;
            $new_trans->name = $lang_translate->name;
            $new_trans->course_language_id = $lang_translate->course_language_id;
            $new_trans->save();

        }
    }
}
