<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayoutLoginController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ViewDetailsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SeeAllController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('/', ClientController::class);

Route::get('/', [LayoutLoginController::class, 'index'])->name('login');
Route::get('/admin/register', [LayoutLoginController::class, 'register'])->name('register');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [LayoutLoginController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/logout', [LayoutLoginController::class, 'logout'])->name('logout');

    Route::resource('/admin/inventory', InventoryController::class);
    Route::resource('/admin/addCategory', CategoryController::class);
});

Route::resource('/view-details', ViewDetailsController::class);
Route::get('/see-all-products', [SeeAllController::class, 'seeAll'])->name('seeAll');
// Route::resource('/inventory', InventoryController::class);


// POST REQUEST

Route::post('/admin/registerPost', [LayoutLoginController::class, 'registerPost'])->name('registerPost');
Route::post('/admin/loginPost', [LayoutLoginController::class, 'loginPost'])->name('loginPost');