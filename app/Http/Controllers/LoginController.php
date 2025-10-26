<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
 public function username()
     {
        return 'username';
    }
 public function login(Request $request)
    {  
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('usuarios/create');
        }
        return back()->withErrors(([
            'username' => 'Credenciales Incorrectas',
        ]));

    }
}
