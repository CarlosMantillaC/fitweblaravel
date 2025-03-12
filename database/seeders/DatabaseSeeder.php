<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder; // 🔹 Importa correctamente el seeder
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,          // Seeder para crear administradores si no existen
        ]);

        $this->command->info('Base de datos sembrada correctamente.');
    }
}

