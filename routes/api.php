<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('brands', BrandController::class)->Middleware('auth:sanctum');

Route::apiResource('category', CategoryController::class)->Middleware('auth:sanctum');

Route::apiResource('product', ProductController::class)->Middleware('auth:sanctum');

require __DIR__.'/auth.php';



