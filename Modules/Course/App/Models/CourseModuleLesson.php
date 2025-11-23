<?php

namespace Modules\Course\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Course\Database\factories\CourseModuleLessonFactory;

class CourseModuleLesson extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    /**
     * Relación con CourseModule
     */
    public function course_module()
    {
        return $this->belongsTo(CourseModule::class, 'course_module_id');
    }

}
