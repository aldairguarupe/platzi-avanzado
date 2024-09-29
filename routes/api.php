<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('products', \App\Http\Controllers\ProductController::class)
    ->middleware('auth:sanctum');
Route::apiResource('categories', \App\Http\Controllers\CategoryController::class);

Route::get('send-command', [\App\Http\Controllers\NewsletterController::class, 'send']);

Route::post('qualify/user/{id}', [\App\Http\Controllers\QualificationController::class, 'rateUser'])
    ->middleware('auth:sanctum');
Route::post('qualify/product/{id}', [\App\Http\Controllers\QualificationController::class, 'rateProduct'])
    ->middleware('auth:sanctum');

Route::get('/exception', function () {
    throw new Exception('Soy una excepción');
});

Route::post('/login', [\App\Http\Controllers\UserTokenController::class, 'login']);
