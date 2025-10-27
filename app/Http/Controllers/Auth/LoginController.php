<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Mostrar el formulario de login
    public function showLoginForm()
    {
        return view('auth.login'); // Tu vista login.blade.php
    }

    // Procesar login
    public function login(Request $request)
    {
        // Validar campos
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Seguridad: regenerar sesión
            return redirect()->intended(route('dashboard'));
 // Redirige después del login
        }

        return back()->withErrors([
            'username' => 'Credenciales incorrectas',
        ])->withInput();
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); // Redirige a login después de logout
    }
}
