<?php

use Illuminate\Support\Facades\Route;
use Modules\PaymentGateway\App\Http\Controllers\PaymentGatewayController;

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

    Route::get('paymentgateway', [PaymentGatewayController::class, 'index'])->name('paymentgateway');
    Route::put('update-stripe', [PaymentGatewayController::class, 'update_stripe'])->name('update-stripe');
    Route::put('update-paypal', [PaymentGatewayController::class, 'update_paypal'])->name('update-paypal');
    Route::put('update-razorpay', [PaymentGatewayController::class, 'update_razorpay'])->name('update-razorpay');
    Route::put('update-flutterwave', [PaymentGatewayController::class, 'update_flutterwave'])->name('update-flutterwave');
    Route::put('update-mollie', [PaymentGatewayController::class, 'update_mollie'])->name('update-mollie');
    Route::put('update-paystack', [PaymentGatewayController::class, 'update_paystack'])->name('update-paystack');
    Route::put('update-instamojo', [PaymentGatewayController::class, 'update_instamojo'])->name('update-instamojo');
    Route::put('update-bank', [PaymentGatewayController::class, 'update_bank'])->name('update-bank');
});
