<?php

use App\Http\Controllers\Main\HomeController;
use App\Http\Controllers\main\PageController;
use App\Http\Controllers\main\ProductsController;
use App\Http\Controllers\main\VendorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Vendor\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::get('/vendors/{id}/products', [VendorController::class, 'products'])->name('vendors-products');
Route::get('/vendors', [VendorController::class, 'all'])->name('vendors');

Route::get('/products/{id}', [ProductsController::class, 'detail'])->name('productsDetails');
Route::get('/products', [ProductsController::class, 'index'])->name('products');

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('/vendor')->middleware(['auth', 'verified', 'vendor'])->group(function () {
	Route::get('/dashboard', [DashboardController::class, 'index'])->name('vendor.dashboard');
});

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
