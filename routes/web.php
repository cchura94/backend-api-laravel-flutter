<?php

use App\Http\Controllers\Admin\ConductorController;
use App\Http\Controllers\Admin\OrdenController;
use App\Http\Controllers\Admin\PaqueteController;
use App\Http\Controllers\Admin\SeguimientoController;
use App\Http\Controllers\Admin\UserController;
use App\Models\Seguimiento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

Route::get("paquete/{id}/orden", [PaqueteController::class, "funNuevaOrden"]);
Route::post("paquete/{id}/orden", [PaqueteController::class, "funguardarOrden"]);


Route::resource("paquete", PaqueteController::class);
Route::resource("orden", OrdenController::class);
Route::resource("user", UserController::class);
Route::resource("conductor", ConductorController::class);
Route::resource("seguimiento", SeguimientoController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
