<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
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
        'membership_type',
        'membership_price',
        'has_paid',
        'email',
        'phone',
    ];

    /**
     * Get the promotions associated with the client.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Promotion>
     */
    public function promotions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Promotion::class);
    }

    /**
     * Get the payments associated with the client.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Payment>
     */
    public function payments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Payment::class);
    }

    /**
     * Get the checkins associated with the client.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany<Checkin>
     */
    public function checkins(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Checkin::class, 'user');
    }

    /**
     * Get the invoices associated with the client through payments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough<Invoice>
     */
    public function invoices(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(Invoice::class, Payment::class);
    }
}