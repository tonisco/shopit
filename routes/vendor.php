<?php

use App\Http\Controllers\Vendor\DashboardController;
use App\Http\Controllers\Vendor\ProductController;
use App\Http\Controllers\Vendor\ProductImageController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::put('/products/{id}/status', [ProductController::class, 'productStatus'])->name('product-status');
Route::resource('products', ProductController::class);
Route::resource('products.images', ProductImageController::class);
