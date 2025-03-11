<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario está autenticado
        if (!Auth::check()) {
            // Si no está autenticado, redirige a la página de login
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para acceder a esta página.');
        }

        // Si el usuario está autenticado, permite que la solicitud continúe
        return $next($request);
    }
}