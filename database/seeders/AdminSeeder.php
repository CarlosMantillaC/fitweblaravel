<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'email' => 'AdministradorFitWeb.com',
            'password' => Hash::make('Admin/Fit/web'), // Contraseña encriptada
        ]);
    }
}
