<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;
use Illuminate\Http\Request;
use Laravel\Sanctum\Sanctum;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('auth')->group(function () {
   
    Route::post('/register', [AuthController::class, 'register']);
    
   
    Route::post('/login', [AuthController::class, 'login']);
    
    
    Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::post('/cart', [CartController::class, 'add']);
    Route::delete('/cart/{id}', [CartController::class, 'remove']);
    // Route::post('/orders', [OrderController::class, 'store']);
});



