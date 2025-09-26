<?php

namespace Modules\NoticeBoard\App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Course\App\Models\Course;
use Modules\NoticeBoard\App\Models\NoticeBoard;
use Modules\Course\App\Models\CourseEnrollmentList;

class NoticeBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::guard('web')->user();



        $notices = NoticeBoard::select('notice_boards.*')
                    ->join('courses', 'notice_boards.course_id', '=', 'courses.id')
                    ->join('course_enrollment_lists', 'courses.id', '=', 'course_enrollment_lists.course_id')
                    ->join('course_enrollments', 'course_enrollment_lists.course_enrollment_id', '=', 'course_enrollments.id')
                    ->where('course_enrollments.payment_status', 'success')
                    ->where('course_enrollments.student_id', $user->id)
                    ->latest()
                    ->get();



        return view('noticeboard::student.index', [
            'notices' => $notices,
        ]);
    }

}
