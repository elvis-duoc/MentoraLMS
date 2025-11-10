<?php

use Illuminate\Support\Facades\Route;
use Modules\Language\App\Http\Controllers\LanguageController;



Route::group(['as'=> 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin']], function () {

    Route::resource('language', LanguageController::class)->names('language');
    Route::get('theme-language', [LanguageController::class, 'theme_language'])->name('theme-language');
    Route::post('update-theme-language', [LanguageController::class, 'update_theme_language'])->name('update-theme-language');

});
