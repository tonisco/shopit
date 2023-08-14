<?php

use App\Http\Controllers\Vendor\DashboardController;
use App\Http\Controllers\Vendor\ProductController;
use App\Http\Controllers\Vendor\ProductVariantController;
use App\Http\Controllers\Vendor\ProductVariantItemsController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::put('/products/{id}/status', [ProductController::class, 'productStatus'])->name('products.status');
Route::resource('products', ProductController::class);

Route::put('/products/{product}/variants/{productVariant}/status', [ProductVariantController::class, 'variantStatus'])->name('products.variant.status');
Route::resource('products.variants', ProductVariantController::class);

Route::resource('products.variants.items', ProductVariantItemsController::class);
