<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Apunta a la vista login.blade.php en la carpeta "auth"
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            session(['admin_logged' => true]);
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }

    public function logout()
    {
        session()->forget('admin_logged');
        return redirect()->route('login');
    }
}
