<?php

namespace Modules\CourseLevel\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Course\App\Models\Course;
use Modules\Language\App\Models\Language;
use Modules\CourseLevel\App\Models\CourseLevel;
use Modules\CourseLevel\App\Models\CourseLevelTranslation;
use Modules\CourseLevel\App\Http\Requests\CourseLevelRequest;

class CourseLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $course_levels = CourseLevel::with('translate')->latest()->get();

        return view('courselevel::index', ['course_levels' => $course_levels]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courselevel::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseLevelRequest $request)
    {
        $course_level = new CourseLevel();
        $course_level->status = $request->status ? 1 : 0;
        $course_level->save();

        $languages = Language::all();
        foreach($languages as $language){
            $level_trans = new CourseLevelTranslation();
            $level_trans->lang_code = $language->lang_code;
            $level_trans->course_level_id = $course_level->id;
            $level_trans->name = $request->name;
            $level_trans->save();
        }

        $notify_message = trans('translate.Created successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('admin.courselevel.edit', ['courselevel' => $course_level->id, 'lang_code' => admin_lang()])->with($notify_message);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {

        $course_level = CourseLevel::findOrFail($id);

        $level_translate = CourseLevelTranslation::where(['course_level_id' => $course_level->id, 'lang_code' => $request->lang_code])->first();

        return view('courselevel::edit', ['course_level' => $course_level, 'level_translate' => $level_translate]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseLevelRequest $request, $id)
    {

        $course_level = CourseLevel::findOrFail($id);

        if($request->lang_code == admin_lang()){
            $course_level->status = $request->status ? 1 : 0;
            $course_level->save();
        }

        $level_trans = CourseLevelTranslation::where(['id' => $request->translate_id])->first();
        $level_trans->name = $request->name;
        $level_trans->save();

        $notify_message = trans('translate.Update successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {


        $course_qty = Course::where('course_level_id', $id)->count();

        if($course_qty > 0){
            $notify_message = trans('translate.Multiple courses created under it, so you can not delete it');
            $notify_message = array('message'=>$notify_message,'alert-type'=>'error');
            return redirect()->back()->with($notify_message);
        }

        $course_level = CourseLevel::findOrFail($id);
        $course_level->delete();

        CourseLevelTranslation::where('course_level_id', $id)->delete();

        $notify_message = trans('translate.Deleted successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->back()->with($notify_message);

    }


    public function setup_language($lang_code){
        $level_translates = CourseLevelTranslation::where('lang_code' , admin_lang())->get();

        foreach($level_translates as $level_translate){
            $new_trans = new CourseLevelTranslation();
            $new_trans->lang_code = $lang_code;
            $new_trans->name = $level_translate->name;
            $new_trans->course_level_id = $level_translate->course_level_id;
            $new_trans->save();

        }
    }
}
