<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Controllers\UserController;

// Página principal y públicas
Route::get('/', fn () => view('inicio'));
Route::get('contactanos', fn () => view('contactanos'));
Route::get('sobre-nosotros', fn () => view('sobre-nosotros'));
Route::get('funcionalidades', fn () => view('funcionalidades'));

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('custom.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::prefix('admin')->group(function () {
        Route::resource('users', UserController::class)->names([
            'index' => 'admin.users',
            'create' => 'users.create',
            'store' => 'users.store',
            'edit' => 'users.edit',
            'update' => 'users.update',
            'destroy' => 'users.destroy',
            'show' => 'users.show',
        ]);
    });
});

Route::middleware(['receptionist'])->group(function () {
    Route::get('/receptionist/dashboard', [ReceptionistController::class, 'dashboard'])->name('receptionist.dashboard');

    Route::prefix('receptionist')->group(function () {
        Route::resource('users', UserController::class)->names([
            'index'   => 'receptionist.users',
            'create'  => 'receptionist.users.create',
            'store'   => 'receptionist.users.store',
            'edit'    => 'receptionist.users.edit',
            'update'  => 'receptionist.users.update',
            'destroy' => 'receptionist.users.destroy',
            'show'    => 'receptionist.users.show',
        ]);
    });
});