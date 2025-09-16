<?php

use Illuminate\Support\Facades\Route;
use Modules\Blog\App\Http\Controllers\BlogController;
use Modules\Blog\App\Http\Controllers\BlogCategoryController;


Route::group(['as'=> 'admin.', 'prefix' => 'admin/cms', 'middleware' => ['auth:admin']], function () {
    Route::resource('blog', BlogController::class)->names('blog');
    Route::resource('blog-category', BlogCategoryController::class)->names('blog-category');

    Route::get('comment-list', [BlogController::class, 'blog_list'])->name('comment-list');
    Route::get('show-comment/{id}', [BlogController::class, 'show_comment'])->name('show-comment');
    Route::put('blog-comment-status/{id}', [BlogController::class, 'blog_comment_status'])->name('blog-comment-status');
    Route::delete('delete-blog-comment/{id}', [BlogController::class, 'delete_comment'])->name('delete-blog-comment');
});


