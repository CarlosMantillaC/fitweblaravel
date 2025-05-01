<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Array de nombres y apellidos comunes en español
        $nombresMasculinos = ['Juan', 'Carlos', 'Luis', 'Pedro', 'Miguel', 'Jorge', 'Fernando', 'Ricardo', 'Oscar', 'Raúl'];
        $nombresFemeninos = ['María', 'Ana', 'Sofía', 'Elena', 'Patricia', 'Isabel', 'Adriana', 'Gabriela', 'Claudia', 'Lucía'];
        $apellidos = ['Pérez', 'García', 'López', 'Martínez', 'Rodríguez', 'Hernández', 'González', 'Sánchez', 'Ramírez', 'Flores'];

        // Generar 20 usuarios
        for ($i = 0; $i < 20; $i++) {
            // Alternar entre género masculino y femenino
            $genero = $i % 2 == 0 ? 'M' : 'F';
            
            // Seleccionar nombre según género
            $nombre = $genero == 'M' 
                ? $faker->randomElement($nombresMasculinos) 
                : $faker->randomElement($nombresFemeninos);
            
            $apellido1 = $faker->randomElement($apellidos);
            $apellido2 = $faker->randomElement($apellidos);
            
            User::create([
                'name' => "$nombre $apellido1 $apellido2",
                'gender' => $genero,
                'birth_date' => $faker->date($format = 'Y-m-d', $max = '2003-01-01'),
                'phone_number' => '3' . $faker->numerify('########'),
                'email' => strtolower("$nombre.$apellido1.$i@gmail.com"),
                'state' => $faker->randomElement(['Activo', 'Inactivo']), // Solo activo e inactivo
                'gym_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}