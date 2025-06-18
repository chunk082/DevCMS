<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CryptoPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_gateway',
        'amount',
        'amount_crypto',
        'address',
        'now_invoice_id',
        'now_payment_id',
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
