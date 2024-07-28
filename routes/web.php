<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\ContentController as AdminContentController;

Route::get('/', function () {
   
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', function(){return 200;})->name('login');
});

Route::group(['middleware' => 'guest'], function () {
  
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

        Route::resource('user', AdminUserController::class);
        Route::resource('content', AdminContentController::class);
    });


    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
      
    });

});