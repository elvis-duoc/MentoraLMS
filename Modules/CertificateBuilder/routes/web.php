<?php

use Illuminate\Support\Facades\Route;
use Modules\CertificateBuilder\App\Http\Controllers\CertificateBuilderController;

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
    Route::get('certificatebuilder', [CertificateBuilderController::class, 'index'])->name('certificatebuilder');
    Route::post('certificatebuilder-setting', [CertificateBuilderController::class, 'update_setting'])->name('certificatebuilder-setting');
    Route::post('certificate-builder.position', [CertificateBuilderController::class, 'update'])->name('certificate-builder.position');
});

