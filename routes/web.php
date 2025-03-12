<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('inicio');
});

Route::get('contactanos', function () {
    return view('contactanos');
});

Route::get('sobre-nosotros', function () {
    return view('sobre-nosotros');
});

Route::get('funcionalidades', function () {
    return view('funcionalidades');
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Ruta protegida por autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); // Asegúrate de tener resources/views/dashboard.blade.php
    })->name('dashboard');
});

