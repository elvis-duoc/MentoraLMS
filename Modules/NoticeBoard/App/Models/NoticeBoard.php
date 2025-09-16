<?php

namespace Modules\NoticeBoard\App\Models;

use Modules\Course\App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class NoticeBoard extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    public function course(){
        return $this->belongsTo(Course::class, 'course_id');;
    }

}
