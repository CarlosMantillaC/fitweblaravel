<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Attendance extends Model
{
    protected $fillable = [
        'attendable_id',
        'attendable_type',
        'date',
        'check_in',
        'check_out',
    ];

    public function attendable(): MorphTo
    {
        return $this->morphTo();
    }
}

