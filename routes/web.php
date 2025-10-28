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
Route::get('/dashboard', function () {
    $totalUsuarios = \App\Models\User::count();
    return view('inicio.index', compact('totalUsuarios'));
})->middleware('auth')->name('dashboard');

// REGISTROS - RESTful
Route::resource('registros', AsistenciaController::class);

// --- RUTAS DE USUARIOS (CRUD) ---

// MUESTRA EL LISTADO Y CREACIÓN
Route::get('/usuarios', [UserWebController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/create', [UserWebController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UserWebController::class, 'store'])->name('usuarios.store');


// RUTA DE EDICIÓN (GET) 
// Nombre: usuarios.edit
// Acción: MUESTRA el formulario para editar a un usuario específico ({user}).
Route::get('usuarios/{user}/edit', [UserWebController::class, 'editar'])->name('usuarios.edit'); 

// RUTA DE ACTUALIZACIÓN (PUT)
// Nombre: usuarios.update
// Acción: PROCESA la modificación de datos del usuario y los guarda.
Route::put('usuarios/{user}', [UserWebController::class, 'updateusuario'])->name('usuarios.update');


Route::get('/db', function () {
    return view('Admin.Db');
})->middleware('auth')->name('db');


Route::get('/usuarios/list', [UserWebController::class, 'index'])->name('list.index');


// --- RUTAS DE PERFIL PROPIO ---

// MUESTRA el perfil propio
Route::get('usuarios/perfil', [UserWebController::class, 'perfil'])->name('usuarios.perfil');

// PROCESA la actualización del perfil propio
Route::put('usuarios/perfil', [UserWebController::class, 'updateperfil'])->name('usuarios.perfil.update'); // Nombre: usuarios.perfil.update
