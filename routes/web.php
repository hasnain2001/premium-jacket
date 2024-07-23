<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Middleware\UserMiddleware;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('home');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::get('/admin/dashboard', [AdminHomeController::class, 'index'])->name('admin.home');
Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware(UserMiddleware::class);
