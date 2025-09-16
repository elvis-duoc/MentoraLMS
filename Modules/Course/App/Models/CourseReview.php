<?php

namespace Modules\Course\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Course\Database\factories\CourseReviewFactory;

class CourseReview extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];


    public function student(){
        return $this->belongsTo(User::class, 'student_id')->select('id', 'name', 'username', 'image', 'designation', 'phone');
    }

}
