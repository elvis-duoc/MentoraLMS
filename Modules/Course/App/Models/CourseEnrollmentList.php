<?php

namespace Modules\Course\App\Models;

use App\Models\User;
use Modules\Course\App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Course\Database\factories\CourseEnrollmentListFactory;

class CourseEnrollmentList extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];


    public function instructor(){
        return $this->belongsTo(User::class, 'instructor_id')->select('id', 'name', 'username', 'image', 'designation', 'phone', 'email', 'gender', 'address');
    }

    public function course(){
        return $this->belongsTo(Course::class, 'course_id');;
    }


    public function course_enrollment(){
        return $this->belongsTo(CourseEnrollment::class, 'course_enrollment_id');;
    }




}
