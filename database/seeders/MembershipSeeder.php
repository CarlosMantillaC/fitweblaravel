<?php

namespace Database\Seeders;

use App\Models\Membership;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Carbon;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            // Asegúrate de que haya usuarios creados
            $users = User::all();
    
            if ($users->isEmpty()) {
                $this->command->warn('No hay usuarios para asignar suscripciones.');
                return;
            }
    
            Membership::create([
                'type' => 'Anual',
                'amount' => 800000,
                'discount' => 50000,
                'start_date' => now(),
                'finish_date' => now()->addYear(),
                'user_id' => 1,
            ]);
            
    
            $this->command->info('Suscripciones generadas para todos los usuarios.');
        }
    }
}

