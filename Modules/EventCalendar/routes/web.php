<?php

use Illuminate\Support\Facades\Route;
use Modules\EventCalendar\App\Http\Controllers\Instructor\ZoomMeetingController;
use Modules\EventCalendar\App\Http\Controllers\Student\ZoomMeetingController as StudentZoomMeetingController;

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

Route::group(['as'=> 'instructor.', 'prefix' => 'instructor', 'middleware' => ['auth:web', 'CheckInstructor']],function (){

    Route::get('/zoom/auth', [ZoomMeetingController::class, 'redirectToZoom'])->name('zoom.auth');
    Route::get('/zoom/callback', [ZoomMeetingController::class, 'handleZoomCallback'])->name('zoom.callback');
    Route::get('/zoom/create-meeting', [ZoomMeetingController::class, 'createMeeting'])->name('zoom.createMeeting');


    Route::resource('zoom-meeting', ZoomMeetingController::class);
    Route::get('event-calendar', [ZoomMeetingController::class, 'event_calendar'])->name('event-calendar');
    Route::get('event-calendar-iframe', [ZoomMeetingController::class, 'event_calendar_iframe'])->name('event-calendar-iframe');

    Route::get('zoom-setting', [ZoomMeetingController::class, 'zoom_setting'])->name('zoom-setting');
    Route::put('update-zoom-setting', [ZoomMeetingController::class, 'update_zoom_setting'])->name('update-zoom-setting');

});


Route::group(['as'=> 'student.', 'prefix' => 'student', 'middleware' => ['auth:web']],function (){

    Route::get('event-calendar', [StudentZoomMeetingController::class, 'event_calendar'])->name('event-calendar');
    Route::get('event-calendar-iframe', [StudentZoomMeetingController::class, 'event_calendar_iframe'])->name('event-calendar-iframe');

});
