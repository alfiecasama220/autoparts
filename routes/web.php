<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayoutLoginController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin', [LayoutLoginController::class, 'index'])->name('login');
Route::get('/admin/register', [LayoutLoginController::class, 'register'])->name('register');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [LayoutLoginController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/logout', [LayoutLoginController::class, 'logout'])->name('logout');
});

// POST REQUEST

Route::post('/admin/registerPost', [LayoutLoginController::class, 'registerPost'])->name('registerPost');
Route::post('/admin/loginPost', [LayoutLoginController::class, 'loginPost'])->name('loginPost');