<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class UserWebController extends Controller
{ 
    // MUESTRA EL LISTADO COMPLETO
    public function index()
    {
        $usuarios = User::with('roles')->get();
        return view('usuarios.index', compact('usuarios'));
    }

    // CREACIÓN Y ALMACENAMIENTO (store) ... (código omitido por brevedad)
    public function create()
    { 
        $roles = Role::all();
        return view('usuarios.create',compact('roles'));
    }
    public function store(Request $request)
    {
        // Lógica de store() ...
        $request->validate([
            'name'     => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:usuarios,username', 
            'email'    => 'required|email|max:255|unique:usuarios,email',
            'password' => 'required|min:6',
            'role'     => 'required',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'dni'      => $request->dni,
            'password' => Hash::make($request->password),
        ]);
        
        $user->assignRole($request->role);

        return redirect()->route('usuarios.create')->with('success', 'Usuario registrado correctamente');
    }

    // --- FLUJO DE PERFIL PROPIO (Auth::user()) ---

    // MUESTRA EL FORMULARIO DE PERFIL PROPIO (perfil)
    public function perfil()
    {
        $user = Auth::user();
        $user->load('roles');
        return view('usuarios.perfil', compact('user'));
    }

    // PROCESA LA ACTUALIZACIÓN DE PERFIL PROPIO (updateperfil)
    public function updateperfil(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name'     => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:usuarios,username,' . $user->id, 
            'email'    => 'required|email|max:255|unique:usuarios,email,' . $user->id,
            'phone'    => 'nullable|string|max:20',
            'dni'      => 'nullable|string|max:20',
        ]);
        
        $user->update($request->only('name', 'lastname', 'username', 'email', 'phone', 'dni'));
        
        if($request->filled('password')){
            $request->validate(['password' => 'required|string|min:6|confirmed']);
            $user->update(['password' => Hash::make($request->password)]);
        }
        
        return redirect()->route('usuarios.perfil')->with('success', 'Perfil actualizado correctamente');
    }

    // --- FLUJO DE EDICIÓN DE OTROS USUARIOS (CRUD) ---

    /**
     * MÉTODO 1: EDITAR (GET) -> Muestra el formulario para editar un usuario.
     */
    public function editar(User $user)
    {
        $roles = Role::all();
        // Va a la vista que ya creamos: resources/views/usuarios/update.blade.php
        return view('usuarios.update', compact('user', 'roles'));
    }

    /**
     * MÉTODO 2: ACTUALIZAR (PUT) -> Procesa la modificación de datos del usuario.
     */
    public function updateusuario(Request $request, User $user)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:usuarios,username,' . $user->id, 
            'email'    => 'required|email|max:255|unique:usuarios,email,' . $user->id,
            'phone'    => 'nullable|string|max:20',
            'dni'      => 'nullable|string|max:20',
            'role'     => 'required',
        ]);
        
        $user->update($request->only('name', 'lastname', 'username', 'email', 'phone', 'dni'));

        // Sincroniza el rol del usuario (Spatie)
        $user->syncRoles([$request->role]);
        
        if($request->filled('password')){
            $request->validate(['password' => 'required|string|min:6|confirmed']);
            $user->update(['password' => Hash::make($request->password)]);
        }
        
        // Redirige al listado de usuarios después de guardar
        return redirect()->route('usuarios.index')->with('success', 'Usuario ' . $user->name . ' actualizado correctamente');
    }
}