<?php

namespace Modules\SupportTicket\App\Models;

use App\Models\User;
use Modules\Course\App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupportTicket extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];


    public function author(){
        return $this->belongsTo(User::class, 'author_id')->select('id', 'name', 'email', 'phone');
    }

    public function course(){
        return $this->belongsTo(Course::class, 'course_id');;
    }


}
