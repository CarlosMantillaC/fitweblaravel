<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'gender',
        'birth_date',
        'phone_number',
        'state',
        'gym_id',
    ];

    // Relaciones
    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }
}
