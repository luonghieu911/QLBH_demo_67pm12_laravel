<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::get('/san-pham/{product}', [ShopController::class, 'show'])->name('shop.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('/', 'layout.dashboard')->name('dashboard');
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::resource('products', ProductController::class)->except(['show']);
});

Route::get('/login', [AuthController::class, 'showlogin']);
Route::post('/checklogin', [AuthController::class, 'checklogin'])->name('checklogin');

Route::fallback(function () {
    return response()->view('error.404', [], 404);
});
