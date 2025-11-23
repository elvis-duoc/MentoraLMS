<?php

namespace Modules\EventCalendar\App\Models;

use Modules\Course\App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\EventCalendar\Database\factories\MeetingFactory;

class Meeting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'title',
        'meeting_id',
        'meeting_link',
        'description',
        'instructor_id',
        'course_id',
        'start_time',
        'end_time',
        'time_zone',
        'platform',
        'duration',
    ];


    public function course(){
        return $this->belongsTo(Course::class, 'course_id');;
    }

}
