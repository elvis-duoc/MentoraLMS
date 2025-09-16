<?php

namespace Modules\Course\App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\Facades\Image;
use Modules\Course\App\Models\Course;
use Modules\Course\App\Models\CourseModule;
use Modules\Course\App\Models\LessonChecklist;
use Modules\Course\App\Models\CourseModuleLesson;
use Modules\Course\App\Http\Requests\CourseModuleRequest;
use Modules\Course\App\Http\Requests\CourseModuleLessonRequest;

class CourseLessonController extends Controller
{

    public function index($course_id, $course_module_id){
        $course = Course::findOrFail($course_id);

        $course_module = CourseModule::where(['course_id' => $course_id, 'id' => $course_module_id])->firstOrFail();

        $module_lessons = CourseModuleLesson::where(['course_module_id' => $course_module_id])->orderBy('serial', 'asc')->get();

        return view('course::admin.course_lesson', [
            'course' => $course,
            'course_module' => $course_module,
            'module_lessons' => $module_lessons,
        ]);

    }

    public function store(CourseModuleLessonRequest $request, $course_module_id){

        $course_module = CourseModule::findOrFail($course_module_id);

        $course_module_lesson = new CourseModuleLesson();
        $course_module_lesson->course_module_id = $course_module_id;
        $course_module_lesson->name = $request->name;
        $course_module_lesson->video_source = $request->video_source;
        $course_module_lesson->video_id = $request->video_id;
        $course_module_lesson->video_duration = $request->video_duration;
        $course_module_lesson->serial = $request->serial;
        $course_module_lesson->description = $request->description;
        $course_module_lesson->is_public_lesson = $request->is_public_lesson ? 'enable' : 'disable';
        $course_module_lesson->status = $request->status ? 'enable' : 'disable';
        $course_module_lesson->save();

        $notify_message= trans('translate.Created Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);

    }


    public function update(CourseModuleRequest $request, $course_module_id, $module_lesson_id){

        $course_module_lesson = CourseModuleLesson::where(['course_module_id' => $course_module_id, 'id' => $module_lesson_id])->firstOrFail();

        $course_module_lesson->name = $request->name;
        $course_module_lesson->video_source = $request->video_source;
        $course_module_lesson->video_id = $request->video_id;
        $course_module_lesson->video_duration = $request->video_duration;
        $course_module_lesson->serial = $request->serial;
        $course_module_lesson->description = $request->description;
        $course_module_lesson->is_public_lesson = $request->is_public_lesson ? 'enable' : 'disable';
        $course_module_lesson->status = $request->status ? 'enable' : 'disable';
        $course_module_lesson->save();

        $notify_message= trans('translate.Update Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);

    }

    public function destroy(Request $request, $course_module_id, $module_lesson_id){

        $course_module_lesson = CourseModuleLesson::where(['course_module_id' => $course_module_id, 'id' => $module_lesson_id])->firstOrFail();

        LessonChecklist::where('course_module_lesson_id', $course_module_lesson->id)->delete();

        $course_module_lesson->delete();

        $notify_message= trans('translate.Delete Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);

    }

}
