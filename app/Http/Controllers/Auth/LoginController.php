<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Apunta a resources/views/auth/login.blade.php
 // Asegúrate de tener una vista login.blade.php
    }

    public function login(Request $request)
    
    {


    
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $admin = Admin::where('email', $request->email)->first();

        
        if (!$admin) {
            die("LLEGÓ AQUÍ 3 - Usuario no encontrado");
        }
    
        if (!Hash::check($request->password, $admin->password)) {
            die("LLEGÓ AQUÍ 4 - Contraseña incorrecta");
        }
    
        session(['admin_logged' => true]);
        session()->save(); // 🔥 Asegura que la sesión se guarde
        return redirect()->route('dashboard');
    
        die("LLEGÓ AQUÍ 5 - Sesión guardada con éxito");
        die("LLEGÓ AQUÍ 6 - Redirigiendo...");
    
        return redirect()->route('dashboard');
    }
    
    
    
    
    }