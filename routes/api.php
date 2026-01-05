<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductsController; // pastikan nama sama dengan class sebenar
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/me', [AuthController::class, 'me']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/products', [ProductsController::class, 'index'])
        ->middleware('permission:products-view');

    Route::get('/products/{id}', [ProductsController::class, 'show'])
        ->middleware('permission:products-view');

    Route::post('/products', [ProductsController::class, 'store'])
        ->middleware('permission:products-create');

    Route::put('/products/{id}', [ProductsController::class, 'update'])
        ->middleware('permission:products-update');

    Route::delete('/products/{id}', [ProductsController::class, 'destroy'])
        ->middleware('permission:products-delete');
});