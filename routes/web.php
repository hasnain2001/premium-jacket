<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\GuestAdminMiddleware;



Route::get('/', function () {
    return view('welcome');
});



Route::prefix('admin')->group(function () {
    
});

Route :: prefix('admin')->name('admin.')->group(function( ){

    Route:: middleware([GuestAdminMiddleware::class])->group(function(){
        Route::get('/login', [AdminLoginController::class, 'index'])->name('login');
        Route::post('/login', [AdminLoginController::class, 'login'])->name('login.submit');
    });
   


Route:: middleware(['auth',AdminMiddleware::class])->group(function(){
    Route::get('/home', [AdminHomeController::class, 'index'])->name('home');
});
  

})   ;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware(UserMiddleware::class);
    
