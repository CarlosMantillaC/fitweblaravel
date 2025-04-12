<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class UpdateUserStates extends Command
{
    protected $signature = 'users:update-states';
    protected $description = 'Actualiza el estado de los usuarios según la vigencia de su membresía';

    public function handle()
    {
        Log::info("Comando 'users:update-states' ejecutado.");
    
        $hoy = Carbon::today();
    
        User::with('memberships')
            ->get()
            ->each(function ($user) use ($hoy) {
                $membresiaActiva = $user->memberships
                    ->sortByDesc('finish_date')
                    ->first();
    
                if ($membresiaActiva && $membresiaActiva->finish_date < $hoy) {
                    if ($user->state !== 'inactivo') {
                        $user->state = 'inactivo';
                        $user->save();
                        $this->info("Usuario {$user->name} marcado como inactivo.");
                        Log::info("Usuario {$user->name} marcado como inactivo.");
                    }
                }
            });
    
        return Command::SUCCESS;
    }
}    