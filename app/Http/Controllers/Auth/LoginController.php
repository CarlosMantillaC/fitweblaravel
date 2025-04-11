<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Login;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validar campos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Buscar el login por email
        $login = Login::where('email', $request->email)->first();

        // Validar si existe
        if (!$login) {
            return back()->withErrors(['email' => 'Usuario no encontrado']);
        }

        // Verificar la contraseña
        if (!Hash::check($request->password, $login->password)) {
            return back()->withErrors(['password' => 'Contraseña incorrecta']);
        }

        // Obtener el modelo relacionado (Admin o Receptionist)
        $user = $login->loginable;
        $userType = class_basename($user); // 'Admin' o 'Receptionist'

        // Guardar en sesión si es necesario
        Session::put('user', $user);
        Session::put('user_type', $userType);

        // Redirigir según el tipo de usuario
        if ($userType === 'Admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($userType === 'Receptionist') {
            return redirect()->route('receptionist.dashboard');
        }

        return back()->withErrors(['email' => 'Tipo de usuario no reconocido']);
    }

    public function showLoginForm()
    {
        return view('auth.login'); // resources/views/auth/login.blade.php
    }


    public function logout(Request $request)
    {
        Session::flush(); // Limpia todos los datos de la sesión

        return redirect('/login')->with('message', 'Sesión cerrada correctamente');
    }
}
