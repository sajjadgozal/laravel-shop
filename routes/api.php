<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
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

    //
    Route::get('/', function () {

    });

    // auth routes
    Route::post('/register' , [AuthController::class , 'register']);
    Route::post('/login' , [AuthController::class , 'login']);
    Route::get('/logout' , [AuthController::class , 'logout'])->middleware('auth:sanctum');

    // cart routs
    Route::get('/add-to-cart/{product}' ,  [CartController::class , 'addToCart' ])->name('addToCart');
    Route::get('/increase-in-cart/{product}' ,  [CartController::class , 'increaseInCart' ])->name('increaseInCart');
    Route::get('/decrease-from-cart/{product}' ,  [CartController::class , 'decreaseFromCart' ])->name('decreaseFromCart');
    Route::get('/remove-from-cart/{product}' ,  [CartController::class , 'removeFromCart' ])->name('removeFromCart');

    // Route::prefix('admin')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::prefix('admin')->middleware('auth:sanctum')->group(function () {

        Route::get('/dashboard', function () {
            return Inertia::render('Dashboard');
        })->name('dashboard');

        Route::apiResource('category', CategoryController::class);
        Route::apiResource('product', ProductController::class);
        Route::apiResource('role', ProductController::class);

    });

});
