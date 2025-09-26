<?php

use Illuminate\Support\Facades\Route;
use Modules\Coupon\App\Http\Controllers\Admin\CouponController;
use Modules\Coupon\App\Http\Controllers\CouponController as FrontendCouponController;

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

Route::group(['as'=> 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin']],function (){
    Route::resource('coupon', CouponController::class)->names('coupon');
    Route::get('coupon-log', [CouponController::class, 'coupon_log'])->name('coupon-log');
});


Route::group(['middleware' => ['HtmlSpecialchars']],function (){
    Route::post('apply-coupon', [FrontendCouponController::class, 'apply_coupon'])->name('apply-coupon');
});




