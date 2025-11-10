<?php

use Illuminate\Support\Facades\Route;
use Modules\GlobalSetting\App\Http\Controllers\GlobalSettingController;

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

Route::group(['as'=> 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin']], function () {

    Route::controller(GlobalSettingController::class)->group(function(){
        Route::group(['prefix' => 'configuration'],function (){

            Route::get('general-setting', 'general_setting')->name('general-setting');
            Route::put('update-general-setting', 'update_general_setting')->name('update-general-setting');
            Route::put('update-logo-favicon', 'update_logo_favicon')->name('update-logo-favicon');
            Route::put('update-google-captcha', 'update_google_captcha')->name('update-google-captcha');
            Route::put('update-tawk-chat', 'update_tawk_chat')->name('update-tawk-chat');
            Route::put('update-google-analytic', 'update_google_analytic')->name('update-google-analytic');
            Route::put('update-facebook-pixel', 'update_facebook_pixel')->name('update-facebook-pixel');
            Route::delete('database-clear', 'database_clear')->name('database-clear');


            Route::get('cookie-consent', 'cookie_consent')->name('cookie-consent');
            Route::put('cookie-consent-update', 'cookie_consent_update')->name('cookie-consent-update');

            Route::get('error-image', 'error_image')->name('error-image');
            Route::put('error-image-update', 'error_image_update')->name('error-image-update');

            Route::get('login-image', 'login_image')->name('login-image');
            Route::put('login-image-update', 'login_image_update')->name('login-image-update');

            Route::get('admin-login-image', 'admin_login_image')->name('admin-login-image');
            Route::put('admin-login-image-update', 'admin_login_image_update')->name('admin-login-image-update');


            Route::get('breadcrumb', 'breadcrumb')->name('breadcrumb');
            Route::put('breadcrumb-update', 'breadcrumb_update')->name('breadcrumb-update');

            Route::get('social-login', 'social_login')->name('social-login');
            Route::put('social-login-update', 'social_login_update')->name('social-login-update');


            Route::get('default-avatar', 'default_avatar')->name('default-avatar');
            Route::put('default-avatar-update', 'default_avatar_update')->name('default-avatar-update');

            Route::get('maintenance-mode', 'maintenance_mode')->name('maintenance-mode');
            Route::put('maintenance-mode-update', 'maintenance_mode_update')->name('maintenance-mode-update');

            Route::get('cache-clear', 'cache_clear')->name('cache-clear');

        });
    });
});

