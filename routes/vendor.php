<?php

use App\Http\Controllers\Vendor\DashboardController;
use App\Http\Controllers\Vendor\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('product', ProductController::class);
