<?php

namespace Modules\Testimonial\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Testimonial\App\Models\TestimonialTrasnlation;
use Modules\Testimonial\Database\factories\TestimonialFactory;

class Testimonial extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected static function newFactory(): TestimonialFactory{}

    public function translate(){
        return $this->belongsTo(TestimonialTrasnlation::class, 'id', 'testimonial_id')->where('lang_code' , admin_lang());
    }

    public function front_translate(){
        return $this->belongsTo(TestimonialTrasnlation::class, 'id', 'testimonial_id')->where('lang_code' , front_lang());
    }

    protected $hidden = ['front_translate'];

    protected $appends = ['name', 'designation', 'comment'];

    public function getNameAttribute(){
        return $this->front_translate?->name;
    }

    public function getCommentAttribute(){
        return $this->front_translate?->comment;
    }

    public function getDesignationAttribute(){
        return $this->front_translate?->designation;
    }
    
}
