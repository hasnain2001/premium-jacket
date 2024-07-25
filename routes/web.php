<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\GuestAdminMiddleware;
use App\Http\Controllers\ProductController;



Route::get('/', function () {
    return view('welcome');
});

route::fallback(function(){
return view('404');
});
Route :: any('*',function(){
return view('404');
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


    Route::controller(ProductController::class)->prefix('dashboard')->name('admin.')->group(function () {
        Route::get('/product', 'index')->name('product');
        Route::get('/product/create', 'create')->name('product.create');
        Route::post('/product/store', 'store')->name('product.store');
        Route::get('/product/edit/{id}', 'edit')->name('product.edit');
        Route::post('/product/update/{id}', 'update')->name('product.update');
        Route::get('/product/delete/{id}', 'destroy')->name('product.delete');
         Route::post('/product/deleteSelected', 'deleteSelected')->name('product.deleteSelected');
    });
    
