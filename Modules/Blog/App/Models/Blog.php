<?php

namespace Modules\Blog\App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Database\factories\BlogFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    protected $hidden = ['front_translate'];

    protected $appends = ['title', 'description', 'seo_title', 'seo_description', 'total_comment', 'short_description'];

    protected static function newFactory(): BlogFactory{}

    public function author(){
        return $this->belongsTo(Admin::class, 'admin_id', 'id')->select('id', 'name', 'image', 'about_me');
    }

    public function category(){
        return $this->belongsTo(BlogCategory::class, 'blog_category_id', 'id');
    }

    public function translate(){
        return $this->belongsTo(BlogTranslation::class, 'id', 'blog_id')->where('lang_code', admin_lang());
    }

    public function front_translate(){
        return $this->belongsTo(BlogTranslation::class, 'id', 'blog_id')->where('lang_code', front_lang());
    }

    public function comments(){
        return $this->hasMany(BlogComment::class)->where('status', 1);
    }

    public function getTotalCommentAttribute(){
        return $this->comments->count();
    }

    public function getTitleAttribute(){
        return $this->front_translate?->title;
    }

    public function getDescriptionAttribute(){
        return $this->front_translate?->description;
    }

    public function getShortDescriptionAttribute(){
        return $this->front_translate?->short_description;
    }



    public function getSeoTitleAttribute(){
        return $this->front_translate?->seo_title;
    }

    public function getSeoDescriptionAttribute(){
        return $this->front_translate?->seo_description;
    }







}
