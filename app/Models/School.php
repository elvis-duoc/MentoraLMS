<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'logo',
        'primary_color',
        'secondary_color',
        'status'
    ];

    protected $appends = ['total_students', 'total_instructors'];

    public function users()
    {
        return $this->hasMany(User::class, 'school_id');
    }

    public function students()
    {
        return $this->hasMany(User::class, 'school_id')->where('is_seller', 'no');
    }

    public function instructors()
    {
        return $this->hasMany(User::class, 'school_id')->where('is_seller', 'yes');
    }

    public function getTotalStudentsAttribute()
    {
        return $this->students()->count();
    }

    public function getTotalInstructorsAttribute()
    {
        return $this->instructors()->count();
    }

    public function getLogoUrlAttribute()
    {
        if ($this->logo && file_exists(public_path('uploads/schools/' . $this->logo))) {
            return asset('uploads/schools/' . $this->logo);
        }

        if (file_exists(public_path('uploads/default-school-logo.png'))) {
            return asset('uploads/default-school-logo.png');
        }

        return asset('uploads/website-images/placeholder.png');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($school) {
            if (empty($school->slug)) {
                $school->slug = Str::slug($school->name);

                $originalSlug = $school->slug;
                $counter = 1;

                while (static::where('slug', $school->slug)->exists()) {
                    $school->slug = $originalSlug . '-' . $counter;
                    $counter++;
                }
            }
        });

        static::updating(function ($school) {
            if ($school->isDirty('name') && empty($school->getOriginal('slug'))) {
                $school->slug = Str::slug($school->name);

                $originalSlug = $school->slug;
                $counter = 1;

                while (static::where('slug', $school->slug)->where('id', '!=', $school->id)->exists()) {
                    $school->slug = $originalSlug . '-' . $counter;
                    $counter++;
                }
            }
        });
    }
}