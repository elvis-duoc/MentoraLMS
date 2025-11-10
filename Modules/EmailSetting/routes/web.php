<?php

use Illuminate\Support\Facades\Route;
use Modules\EmailSetting\App\Http\Controllers\EmailSettingController;


Route::group(['as'=> 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
    Route::get('email-setting', [EmailSettingController::class, 'index'])->name('email-setting');
    Route::put('update-email-setting', [EmailSettingController::class, 'update'])->name('update-email-setting');


    Route::get('email-template', [EmailSettingController::class, 'email_template'])->name('email-template');
    Route::get('edit-email-template/{id}', [EmailSettingController::class, 'edit_email_template'])->name('edit-email-template');
    Route::put('update-email-template/{id}', [EmailSettingController::class, 'update_email_template'])->name('update-email-template');


});
