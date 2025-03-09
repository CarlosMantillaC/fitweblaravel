<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'cedula',
        'name',
        'role',
        'salary',
        'email',
        'phone',
    ];

    /**
     * Get the schedules associated with the employee.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<TrainerSchedule>
     */
    public function schedules(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(TrainerSchedule::class);
    }

    /**
     * Get the checkins associated with the employee.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany<Checkin>
     */
    public function checkins(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Checkin::class, 'user');
    }
}