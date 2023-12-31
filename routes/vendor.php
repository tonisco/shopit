<?php

use App\Http\Controllers\Vendor\DashboardController;
use App\Http\Controllers\vendor\OrderController;
use App\Http\Controllers\Vendor\ProductController;
use App\Http\Controllers\Vendor\ProductVariantController;
use App\Http\Controllers\Vendor\SettingsController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::put('/products/{id}/status', [ProductController::class, 'productStatus'])->name('products.status');
Route::get('/products/{id}/reviews', [ProductController::class, 'reviews'])->name('products.reviews');
Route::resource('products', ProductController::class);

Route::put('/products/{product}/variants/{productVariant}/status', [ProductVariantController::class, 'variantStatus'])->name('products.variant.status');
Route::resource('products.variants', ProductVariantController::class);
Route::post('/products/{product}/variants/{variant}/items', [ProductVariantController::class, 'storeVariantItem'])->name('products.variants.items.store');
Route::put('/products/{product}/variants/{variant}/items/{item}', [ProductVariantController::class, 'updateVariantItem'])->name('products.variants.items.update');
Route::delete('/products/{product}/variants/{variant}/items/{item}', [ProductVariantController::class, 'destroyVariantItem'])->name('products.variants.items.destroy');

Route::get('/orders', OrderController::class)->name('orders.index');

Route::get('/profile', [SettingsController::class, 'index'])->name('profile.index');
Route::put('/profile/update', [SettingsController::class, 'updateProfile'])->name('profile.update');
Route::delete('/profile/delete/account', [SettingsController::class, 'deleteAccount'])->name('account.delete');
