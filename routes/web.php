<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\UserWebController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// DASHBOARD
Route::get('/', function () {
    return view('admin.dashboard'); 
})->name('dashboard');

// REGISTROS - RESTful
Route::resource('registros', AsistenciaController::class);

// USUARIOS (solo los métodos que tienes implementados)
Route::get('/usuarios', [UserWebController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/create', [UserWebController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UserWebController::class, 'store'])->name('usuarios.store');

// LOGIN
Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::post('login', [LoginController::class, 'login'])->name('login.post');
