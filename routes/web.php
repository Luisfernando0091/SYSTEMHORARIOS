<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\UserWebController;
use App\Http\Controllers\Auth\LoginController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.post');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Redirigir raíz al login
Route::get('/', function () {
    return redirect()->route('login');
});

// DASHBOARD (solo para usuarios autenticados)

Route::get('/dashboard', [UserWebController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');
// REGISTROS - RESTful
Route::resource('registros', AsistenciaController::class);

// USUARIOS
Route::get('/usuarios', [UserWebController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/create', [UserWebController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UserWebController::class, 'store'])->name('usuarios.store');


Route::get('/db', function () {
    return view('Admin.Db');
})->middleware('auth')->name('db');


Route::get('/usuarios/list', [UserWebController::class, 'index'])->name('list.index');
