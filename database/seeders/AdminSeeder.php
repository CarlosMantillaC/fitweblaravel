<?php

use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

public function run()
{
    Admin::create([
        'email' => 'admin@example.com',
        'password' => Hash::make('password'), // Encripta la contraseña
    ]);
}