<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Asegúrate de que esta vista existe en resources/views/login.blade.php
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('dashboard'); // Cambia 'dashboard' por la ruta que deseas
        }
    
        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }
    


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); // Redirigir al login después del logout
    }
}
