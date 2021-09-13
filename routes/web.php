<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DiscountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class, 'shop'])->name('shop');

Route::get('/cart', [CartController::class, 'show'])->name('cart');


 Route::prefix('admin')->middleware(['auth:sanctum'])->group(function () {
//Route::prefix('admin')->group(function () {


    Route::get('/', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('discount', DiscountController::class);
});
