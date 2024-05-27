lsanctump<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('index', [AuthenticationController::class, 'index']);
Route::post('register', [AuthenticationController::class, 'register']);
Route::post('login', [AuthenticationController::class, 'login']);

Route::get('products', [ProductController::class, 'products']);
Route::get('showProduct/{id}', [ProductController::class, 'showProduct']);
Route::post('addProduct', [ProductController::class, 'addProduct']);
Route::put('editProduct/{id}', [ProductController::class, 'editProduct']);
Route::delete('removeProduct/{id}', [ProductController::class, 'removeProduct']);