<?php

use Illuminate\Support\Facades\Route;
use Modules\Page\App\Http\Controllers\PageController;
use Modules\Page\App\Http\Controllers\PrivacyController;
use Modules\Page\App\Http\Controllers\TermsConditiondController;
use Modules\Page\App\Http\Controllers\ContactPageController;
use Modules\Page\App\Http\Controllers\FooterContrllerController;

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
    Route::get('terms-conditions', [TermsConditiondController::class, 'index'])->name('terms-conditions');
    Route::put('update-terms-conditions', [TermsConditiondController::class, 'update'])->name('update-terms-conditions');

    Route::get('privacy-policy', [PrivacyController::class, 'index'])->name('privacy-policy');
    Route::put('update-privacy-policy', [PrivacyController::class, 'update'])->name('update-privacy-policy');


    Route::get('contact-us', [ContactPageController::class, 'index'])->name('contact-us');
    Route::put('update-contact-us', [ContactPageController::class, 'update'])->name('update-contact-us');


    Route::get('footer', [FooterContrllerController::class, 'index'])->name('footer');
    Route::put('update-footer', [FooterContrllerController::class, 'update'])->name('update-footer');

    Route::resource('custom-page', CustomPageController::class);




});
