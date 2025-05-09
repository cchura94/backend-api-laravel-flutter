<?php

use App\Http\Controllers\Api\ApiPaqueteController;
use App\Http\Controllers\Api\ApiUserController;
use App\Http\Controllers\Api\OrdenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// php artisan make:controller AuthController

Route::prefix('/v1/auth')->group(function() {

    Route::post('login', [AuthController::class, "funIngresar"]);
    Route::post('register', [AuthController::class, "funRegistro"]);

    Route::middleware('auth:sanctum')->group(function(){
        Route::get('profile', [AuthController::class, "funPerfil"]);//->middleware('auth:sanctum');
        Route::post('logout', [AuthController::class, "funSalir"]);// ->middleware('auth:sanctum');
    });

});
Route::apiResource('orden', OrdenController::class);
Route::middleware('auth:sanctum')->group(function(){

    Route::apiResource("paquete", ApiPaqueteController::class);// ->middleware('auth:sanctum');
    Route::apiResource("user", ApiUserController::class);

});


Route::get("/no-autorizado", function(){
    return response()->json(["mensaje" => "Necesitas un token para acceder", "error" => true], 401);
})->name("login");