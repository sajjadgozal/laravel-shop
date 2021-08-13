<?php

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    // Route::prefix('admin')->middleware(['auth:sanctum', 'verified'])->group(function () {
        Route::prefix('admin')->group(function () {

            Route::get('/dashboard', function () {
                return Inertia::render('Dashboard');
            })->name('dashboard');
        
            Route::resource('category', CategoryController::class);
            Route::resource('product', ProductController::class);
            
        });
});
