<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsReceptionist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = session('user');
        $userType = session('user_type');

        if (!$user || $userType !== 'Receptionist') {
            return redirect('/login')->with('error', 'Acceso no autorizado');
        }

        return $next($request);
    }
}
