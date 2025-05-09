<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersTransaction extends Model
{
    protected $table = 'users_transaction'; // Required due to singular table name

    protected $fillable = [
        'user_id',
        'amount',
        'desc',
        'transaction_id',
    ];

    /**
     * Get the user that owns the transaction.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
