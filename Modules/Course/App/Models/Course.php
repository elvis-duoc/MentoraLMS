<?php

namespace Modules\Course\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;
use Modules\Course\App\Models\CourseReview;
use Modules\CourseLevel\App\Models\CourseLevel;
use Modules\Course\App\Models\CourseTranslation;
use Modules\Course\App\Models\CourseEnrollmentList;
use Modules\Course\Database\factories\CourseFactory;
use Modules\CourseLanguage\App\Models\CourseLanguage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected $hidden = ['front_translate', 'enrolled_courses', 'reviews'];

    protected $appends = ['title', 'short_description', 'total_student', 'avg_rating', 'total_rating'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function course_level(){
        return $this->belongsTo(CourseLevel::class, 'course_level_id');
    }

    public function course_language(){
        return $this->belongsTo(CourseLanguage::class, 'course_language_id');
    }



    public function instructor(){
        return $this->belongsTo(User::class, 'user_id')->select('id', 'name', 'email', 'image', 'username');
    }

    public function translate(){
        return $this->belongsTo(CourseTranslation::class, 'id', 'course_id')->where('lang_code', admin_lang());
    }

    public function front_translate(){
        return $this->belongsTo(CourseTranslation::class, 'id', 'course_id')->where('lang_code', front_lang());
    }

    public function getTitleAttribute(){
        if($this->front_translate){
            return $this->front_translate?->title;
        }else{
            return $this->translate?->title;
        }

    }

    public function getShortDescriptionAttribute(){
        if($this->front_translate){
            return $this->front_translate?->short_description;
        }else{
            return $this->translate?->short_description;
        }

    }

    public function getDescriptionAttribute(){
        if($this->front_translate){
            return $this->front_translate?->description;
        }else{
            return $this->translate?->description;
        }
    }

    public function enrolled_courses(){
        return $this->hasMany(CourseEnrollmentList::class, 'course_id');
    }

    public function getTotalStudentAttribute(){
        return $this->enrolled_courses->count();
    }

    public function reviews(){
        return $this->hasMany(CourseReview::class, 'course_id')->where('status', 'enable');
    }

    public function getAvgRatingAttribute()
    {
        return sprintf("%.2f", $this->reviews->avg('rating'));
    }

    public function getTotalRatingAttribute()
    {
        return $this->reviews->count();
    }

}
