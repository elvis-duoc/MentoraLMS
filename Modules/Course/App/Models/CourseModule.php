<?php

namespace Modules\Course\App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Course\App\Models\CourseModuleLesson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Course\Database\factories\CourseModuleFactory;

class CourseModule extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    public function lessonsForPrivate(){
        return $this->hasMany(CourseModuleLesson::class, 'course_module_id');
    }

    public function lessons(){
        return $this->hasMany(CourseModuleLesson::class, 'course_module_id')->where('status', 'enable');
    }



}
