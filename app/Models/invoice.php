<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'client_id',
        'payment_id',
        'invoice_number',
        'total_amount',
        'details',
    ];

    /**
     * Get the client associated with the invoice.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Client>
     */
    public function client(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get the payment associated with the invoice.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Payment>
     */
    public function payment(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }
}