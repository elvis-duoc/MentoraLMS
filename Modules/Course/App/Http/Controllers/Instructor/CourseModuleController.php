<?php

namespace Modules\Course\App\Http\Controllers\Instructor;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Course\App\Models\Course;
use Modules\Course\App\Models\CourseModule;
use Modules\Course\App\Models\CourseModuleLesson;
use Modules\Course\App\Http\Requests\CourseModuleRequest;

class CourseModuleController extends Controller
{

    public function index($course_id){
        $course = Course::findOrFail($course_id);

        $course_modules = CourseModule::with('lessonsForPrivate')->where('course_id', $course_id)->orderBy('serial', 'asc')->get();

        return view('course::instructor.course_curriculum', [
            'course' => $course,
            'course_modules' => $course_modules,
        ]);

    }

    public function store(CourseModuleRequest $request, $course_id){
        $course = Course::findOrFail($course_id);

        $course_module = new CourseModule();
        $course_module->course_id = $course_id;
        $course_module->name = $request->name;
        $course_module->serial = $request->serial;
        $course_module->status = $request->status ? 'enable' : 'disable';
        $course_module->save();

        $notify_message= trans('translate.Created Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);

    }


    public function update(CourseModuleRequest $request, $course_id, $course_module_id){

        $course_module = CourseModule::where(['course_id' => $course_id, 'id' => $course_module_id])->firstOrFail();
        $course_module->name = $request->name;
        $course_module->serial = $request->serial;
        $course_module->status = $request->status ? 'enable' : 'disable';
        $course_module->save();

        $notify_message= trans('translate.Update Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);

    }

    public function destroy(Request $request, $course_id, $course_module_id){

        $course_module = CourseModule::where(['course_id' => $course_id, 'id' => $course_module_id])->firstOrFail();

        CourseModuleLesson::where(['course_module_id' => $course_module_id])->delete();

        $course_module->delete();

        $notify_message= trans('translate.Delete Successfully');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);

    }

}
