<?php

namespace Modules\CourseLanguage\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CourseLanguage\App\Models\CourseLanguageTranslation;
use Modules\CourseLanguage\Database\factories\CourseLanguageFactory;

class CourseLanguage extends Model
{
    use HasFactory;

    protected $hidden = ['front_translate'];

    protected $fillable = [];

    protected $appends = ['name'];

    public function translate(){
        return $this->belongsTo(CourseLanguageTranslation::class, 'id', 'course_language_id')->where('lang_code', admin_lang());
    }

    public function front_translate(){
        return $this->belongsTo(CourseLanguageTranslation::class, 'id', 'course_language_id')->where('lang_code', front_lang());
    }

    public function getNameAttribute(){
        if($this->front_translate){
            return $this->front_translate?->name;
        }else{
            return $this->translate?->name;
        }

    }

}
