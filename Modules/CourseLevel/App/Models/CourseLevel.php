<?php

namespace Modules\CourseLevel\App\Models;

use Modules\Course\App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CourseLevel\App\Models\CourseLevelTranslation;
use Modules\CourseLevel\Database\factories\CourseLevelFactory;

class CourseLevel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */

    protected $hidden = ['front_translate', 'courses'];

    protected $fillable = [];

    protected $appends = ['name', 'total_course'];

    public function translate(){
        return $this->belongsTo(CourseLevelTranslation::class, 'id', 'course_level_id')->where('lang_code', admin_lang());
    }

    public function front_translate(){
        return $this->belongsTo(CourseLevelTranslation::class, 'id', 'course_level_id')->where('lang_code', front_lang());
    }

    public function getNameAttribute(){
        if($this->front_translate){
            return $this->front_translate?->name;
        }else{
            return $this->translate?->name;
        }

    }

    public function courses(){
        return $this->hasMany(Course::class, 'course_level_id')->where(['status' => 'enable', 'approved_by_admin' => 'approved']);
    }

    public function getTotalCourseAttribute()
    {
        return $this->courses->count();
    }

}
