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

    /**
     * Todos los usuarios del colegio
     */
    public function users()
    {
        return $this->hasMany(User::class, 'school_id');
    }

    /**
     * Solo estudiantes (usuarios que NO son sellers)
     * Nota: Funciona tanto si is_seller es string ('no', 'yes') como integer (0, 1)
     */
    public function students()
    {
        return $this->hasMany(User::class, 'school_id')
                    ->where(function($query) {
                        $query->where('is_seller', 0)
                              ->orWhere('is_seller', 'no')
                              ->orWhereNull('is_seller');
                    });
    }

    /**
     * Solo instructores (usuarios que SÍ son sellers)
     * Nota: Funciona tanto si is_seller es string ('no', 'yes') como integer (0, 1)
     */
    public function instructors()
    {
        return $this->hasMany(User::class, 'school_id')
                    ->where(function($query) {
                        $query->where('is_seller', 1)
                              ->orWhere('is_seller', 'yes');
                    });
    }

    /**
     * Atributo computado: total de estudiantes
     */
    public function getTotalStudentsAttribute()
    {
        return $this->students()->count();
    }

    /**
     * Atributo computado: total de instructores
     */
    public function getTotalInstructorsAttribute()
    {
        return $this->instructors()->count();
    }

    /**
     * Obtener URL del logo con fallbacks
     */
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

    /**
     * Boot del modelo para auto-generar slugs únicos
     */
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