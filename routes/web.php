<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsistenciaController;


Route::get('/', function () {
    return view('admin.dashboard'); 
})->name('dashboard');

// Esta línea reemplaza las dos rutas anteriores y define los 7 endpoints RESTful.
// Incluye 'registros.index' (GET /registros) y 'registros.store' (POST /registros).
Route::resource('registros', AsistenciaController::class);
