<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Juan Pérez',
            'gender' => 'M',
            'birth_date' => '1990-05-10',
            'phone_number' => '3001234567',
            'email' => 'juanperez@gmail.com',
            'state' => 'activo',
            'gym_id' => 1,
        ]);
    }
}
