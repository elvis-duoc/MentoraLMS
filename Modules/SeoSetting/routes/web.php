<?php

use Illuminate\Support\Facades\Route;
use Modules\SeoSetting\App\Http\Controllers\SeoSettingController;


Route::group(['as'=> 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
    Route::get('seo-setting', [SeoSettingController::class, 'index'])->name('seo-setting');
    Route::put('update-seo-setting/{id}', [SeoSettingController::class, 'update'])->name('update-seo-setting');
});
