<?php

namespace Modules\CourseLanguage\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\CourseLanguage\Database\factories\CourseLanguageTranslationFactory;

class CourseLanguageTranslation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];


}
