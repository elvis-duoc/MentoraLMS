<?php

use Illuminate\Support\Facades\Route;
use Modules\PaymentWithdraw\App\Http\Controllers\PaymentWithdrawController;
use Modules\PaymentWithdraw\App\Http\Controllers\WithdrawMethodController;
use Modules\PaymentWithdraw\App\Http\Controllers\Seller\WithdrawController;

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

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth:admin']], function () {

    Route::resource('withdraw-list', PaymentWithdrawController::class);
    Route::post('withdraw-approval/{id}', [PaymentWithdrawController::class, 'withdraw_approval'])->name('withdraw-approval');
    Route::post('withdraw-rejected/{id}', [PaymentWithdrawController::class, 'withdraw_rejected'])->name('withdraw-rejected');

    Route::resource('withdraw-methods', WithdrawMethodController::class);

});


Route::group(['prefix' => 'seller', 'as' => 'seller.', 'middleware' => ['auth:web', 'HtmlSpecialchars']], function () {

    Route::resource('my-withdraw', WithdrawController::class);

});


