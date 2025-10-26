<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // ✅ Listar usuarios
    public function index()
    {
        return User::all();
    }

    // ✅ Registrar usuario
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'dni' => $request->dni,
            'password' => Hash::make($request->password),
        ]);

        return response()->json($user, 201);
    }

    // ✅ Mostrar un usuario
    public function show($id)
    {
        return User::findOrFail($id);
    }

    // ✅ Actualizar usuario
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->all());

        return response()->json($user, 200);
    }

    // ✅ Eliminar usuario
    public function destroy($id)
    {
        User::destroy($id);
        return response()->json(null, 204);
    }
}
