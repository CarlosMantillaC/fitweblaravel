<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Llamar a otros seeders aquí
        $this->call(AdminSeeder::class);
    }
}
