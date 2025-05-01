<?php

use App\Http\Controllers\Admin\ConductorController;
use App\Http\Controllers\Admin\OrdenController;
use App\Http\Controllers\Admin\PaqueteController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource("paquete", PaqueteController::class);
Route::resource("orden", OrdenController::class);
Route::resource("user", UserController::class);
Route::resource("conductor", ConductorController::class);

