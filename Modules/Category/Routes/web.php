<?php

use Modules\Category\Http\Controllers\CategoryController;

Route::group(['as'=> 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin']],function (){

    Route::resource('category', CategoryController::class);

});
