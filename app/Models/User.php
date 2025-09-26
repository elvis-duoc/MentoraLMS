<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Modules\Course\App\Models\Course;
use Illuminate\Notifications\Notifiable;
use Modules\Course\App\Models\CourseReview;
use Modules\Course\App\Models\CourseEnrollmentList;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const STATUS_ACTIVE = 'enable';

    const STATUS_INACTIVE = 'disable';

    const BANNED_ACTIVE = 'yes';

    const BANNED_INACTIVE = 'no';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'verification_token',
        'username',
        'status',
        'is_banned',
        'is_seller',
        'password',
        'verification_token',
        'provider',
        'provider_id',
        'email_verified_at',
        'zoom_access_token',
        'zoom_refresh_token',
        'zoom_token_expiry',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'reviews',
        'enrolled_courses',
        'courses',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['avg_rating', 'total_rating', 'total_student', 'total_course'];

    public function reviews(){
        return $this->hasMany(CourseReview::class, 'instructor_id')->where('status', 'enable');
    }
    public function getAvgRatingAttribute()
    {
        return sprintf("%.2f", $this->reviews->avg('rating'));
    }

    public function getTotalRatingAttribute()
    {
        return $this->reviews->count();
    }

    public function courses(){
        return $this->hasMany(Course::class, 'user_id')->where(['status' => 'enable', 'approved_by_admin' => 'approved']);
    }

    public function enrolled_courses(){
        return $this->hasMany(CourseEnrollmentList::class, 'instructor_id');
    }


    public function getTotalStudentAttribute(){
        return $this->enrolled_courses->count();
    }

    public function getTotalCourseAttribute(){
        return $this->courses->count();
    }


}
