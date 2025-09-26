<?php

namespace Modules\Blog\App\Models;

use Modules\Blog\App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Blog\Database\factories\BlogCommentFactory;

class BlogComment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    public function blog(){
        return $this->belongsTo(Blog::class);
    }
}
