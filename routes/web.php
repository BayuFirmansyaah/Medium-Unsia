<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

Route::get('/', function () {
   
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', function(){
        return 200;
    })->name('login');
});

Route::group(['middleware' => 'guest'], function () {
  
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    });


    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
      
    });

});