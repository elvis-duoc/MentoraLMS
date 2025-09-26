<?php

use Illuminate\Support\Facades\Route;
use Modules\NoticeBoard\App\Http\Controllers\Instructor\NoticeBoardController;
use Modules\NoticeBoard\App\Http\Controllers\Student\NoticeBoardController as StudentNoticeBoardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['as' => 'instructor.', 'prefix' => 'instructor', 'middleware' => ['auth:web', 'HtmlSpecialchars', 'MaintenanceMode']], function(){

    Route::resource('notice-board', NoticeBoardController::class);

});


Route::group(['as' => 'student.', 'prefix' => 'student', 'middleware' => ['auth:web', 'HtmlSpecialchars', 'MaintenanceMode']], function(){

    Route::get('notice-board', [StudentNoticeBoardController::class, 'index'])->name('notice-board');

});
