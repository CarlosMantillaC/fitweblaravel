<?php

use App\Http\Controllers\Auth\AdminLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;


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

Route::get('/dashboard', function () {
    if (!session('admin_logged')) {
        return redirect()->route('login');
    }
    return view('dashboard');
})->name('dashboard');





