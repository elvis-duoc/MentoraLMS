<?php

use Illuminate\Support\Facades\Route;
use Modules\Newsletter\App\Http\Controllers\NewsletterController;
use Modules\Newsletter\App\Http\Controllers\Admin\NewsletterController as AdminNewsletterController;

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

Route::group(['middleware' => ['HtmlSpecialchars', 'MaintenanceMode']], function () {
    Route::post('store-newsletter', [NewsletterController::class, 'store'])->name('store-newsletter');
    Route::get('newsletter-verification', [NewsletterController::class, 'newsletter_verification'])->name('newsletter-verification');
});



Route::group(['as'=> 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin']], function () {

    Route::get('newsletter-list', [AdminNewsletterController::class, 'index'])->name('newsletter-list');
    Route::delete('newsletter-delete/{id}', [AdminNewsletterController::class, 'destroy'])->name('newsletter-delete');
    Route::get('newsletter-email', [AdminNewsletterController::class, 'email_box'])->name('newsletter-email');
    Route::post('send-newsletter-email', [AdminNewsletterController::class, 'send_email'])->name('send-newsletter-email');


});
