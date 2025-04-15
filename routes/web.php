<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MembershipController;

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
    Route::get('/admin/dashboard', [UserController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/dashboard/user-stats', [UserController::class, 'userStats'])->name('admin.dashboard.userStats');

    Route::prefix('admin')->group(function () {
        Route::resource('users', UserController::class)->names([
            'index' => 'admin.users',
            'create' => 'admin.users.create',
            'store' => 'admin.users.store',
            'edit' => 'users.edit',
            'update' => 'users.update',
            'destroy' => 'users.destroy',
            'show' => 'users.show',
        ]);
    });

    Route::prefix('admin')->group(function () {
        Route::resource('memberships', MembershipController::class)->names([
            'index' => 'admin.memberships',
            'create' => 'admin.memberships.create',
            'store' => 'admin.memberships.store',
            'edit' => 'memberships.edit',
            'update' => 'memberships.update',
            'destroy' => 'memberships.destroy',
            'show' => 'memberships.show',
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
            'update' => 'receptionist.users.update',
            'destroy' => 'receptionist.users.destroy',
            'show' => 'receptionist.users.show',
        ]);

        Route::resource('memberships', MembershipController::class)->names([
            'index'   => 'receptionist.memberships',
            'create'  => 'receptionist.memberships.create',
            'store'   => 'receptionist.memberships.store',
            'edit'    => 'receptionist.memberships.edit',
            'update' => 'receptionist.memberships.update',
            'destroy' => 'receptionist.memberships.destroy',
            'show' => 'receptionist.memberships.show',
        ]);
    });
});