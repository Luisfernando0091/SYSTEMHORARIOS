<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role; // ✅ Import correcto

class UserWebController extends Controller
{
    public function create()
{ $roles = Role::all();
        return view('usuarios.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'lastname' => 'required',
            'username' => 'required|unique:usuarios,username',
              'email'    => 'required|email|unique:usuarios,email',
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
            'role'     => $request->role,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole($request->role);

        return redirect()->route('usuarios.create')
            ->with('success', 'Usuario registrado correctamente');
    }
}
