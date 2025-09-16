<?php

use Illuminate\Support\Facades\Route;
use Modules\Currency\App\Http\Controllers\CurrencyController;

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

    Route::resource('multi-currency', CurrencyController::class)->names('multi-currency');
});


