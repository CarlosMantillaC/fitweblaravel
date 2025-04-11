<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    public function login()
{
    return $this->morphOne(Login::class, 'loginable');
}

}
