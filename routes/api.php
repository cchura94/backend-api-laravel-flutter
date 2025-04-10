<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// php artisan make:controller AuthController
Route::post('/v1/auth/login', [AuthController::class, "funIngresar"]);
Route::post('/v1/auth/register', [AuthController::class, "funRegistro"]);

Route::get('/v1/auth/profile', [AuthController::class, "funPerfil"])->middleware('auth:sanctum');
Route::post('/v1/auth/logout', [AuthController::class, "funSalir"])->middleware('auth:sanctum');
