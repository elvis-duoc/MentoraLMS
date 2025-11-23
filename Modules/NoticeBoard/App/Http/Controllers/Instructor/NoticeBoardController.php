<?php

namespace Modules\NoticeBoard\App\Http\Controllers\Instructor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Course\App\Models\Course;
use Modules\NoticeBoard\App\Models\NoticeBoard;

class NoticeBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::guard('web')->user();

        $notices = NoticeBoard::with('course')->where('instructor_id', $user->id)->latest()->get();


        return view('noticeboard::instructor.index', [
            'notices' => $notices,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $user = Auth::guard('web')->user();

        $courses = Course::where(['status' => 'enable', 'approved_by_admin' => 'approved'])->where('user_id', $user->id)->get();

        return view('noticeboard::instructor.create', [
            'courses' => $courses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:255',
            'course_id' => 'required|exists:courses,id',
            'description' => 'required',
        ],
        [
            'title.required' => trans('translate.Subject is required'),
            'description.required' => trans('translate.Message is required'),
        ]);

        $user = Auth::guard('web')->user();

        $notice = new NoticeBoard();
        $notice->instructor_id = $user->id;
        $notice->course_id = $request->course_id;
        $notice->title = $request->title;
        $notice->description = $request->description;
        $notice->save();

        $notify_message = trans('translate.Notice created successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('instructor.notice-board.index')->with($notify_message);

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Auth::guard('web')->user();

        $courses = Course::where(['status' => 'enable', 'approved_by_admin' => 'approved'])->where('user_id', $user->id)->get();

        $notice = NoticeBoard::where('instructor_id', $user->id)->where('id', $id)->firstOrFail();

        return view('noticeboard::instructor.edit', [
            'courses' => $courses,
            'notice' => $notice,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'course_id' => 'required|exists:courses,id',
            'description' => 'required',
        ],
        [
            'title.required' => trans('translate.Subject is required'),
            'description.required' => trans('translate.Message is required'),
        ]);

        $user = Auth::guard('web')->user();

        $notice = NoticeBoard::where('instructor_id', $user->id)->where('id', $id)->firstOrFail();

        $notice->course_id = $request->course_id;
        $notice->title = $request->title;
        $notice->description = $request->description;
        $notice->save();

        $notify_message = trans('translate.Notice update successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('instructor.notice-board.index')->with($notify_message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::guard('web')->user();

        $notice = NoticeBoard::where('instructor_id', $user->id)->where('id', $id)->firstOrFail();
        $notice->delete();

        $notify_message = trans('translate.Deleted successfully');
        $notify_message = array('message' => $notify_message, 'alert-type' => 'success');
        return redirect()->route('instructor.notice-board.index')->with($notify_message);
    }
}
