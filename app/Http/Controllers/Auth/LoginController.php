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
        
        // Depuración para verificar los datos de la base de datos
        dd($admin, Hash::check($request->password, $admin->password));
    
        if ($admin && Hash::check($request->password, $admin->password)) {
            session(['admin_logged' => true]); 
        
            // Verificar si la sesión se guarda
            dd(session()->all());
        
            return redirect()->route('dashboard');
        }
        
    
        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }

}