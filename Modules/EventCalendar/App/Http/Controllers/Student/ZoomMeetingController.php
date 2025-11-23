<?php

namespace Modules\EventCalendar\App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\EventCalendar\App\Models\Meeting;
use Modules\Course\App\Models\CourseEnrollmentList;

class ZoomMeetingController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function event_calendar()
    {
        return view('eventcalendar::student.event_calendar');
    }

    public function event_calendar_iframe()
    {

        $user = Auth::guard('web')->user();

        $enrollments = CourseEnrollmentList::whereHas('course_enrollment', function($query) use($user) {
            $query->where('payment_status', 'success')->where('student_id', $user->id);;
        })->pluck('course_id');

        $meetings = Meeting::whereIn('course_id', $enrollments)->get();

        return view('eventcalendar::student.calender_body', [
            'meetings' => $meetings,
        ]);
    }

}
