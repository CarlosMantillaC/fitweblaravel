<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Verifica si el usuario administrador ya existe
        $adminExists = DB::table('admins')->where('email', 'Administrador@FitWeb.com')->exists();

        if (!$adminExists) {
            DB::table('admins')->insert([
                'email' => 'Administrador@FitWeb.com',
                'password' => Hash::make('Admin/Fit/Web.com/'), // Cambia por seguridad
            ]);
        }
    }
}



