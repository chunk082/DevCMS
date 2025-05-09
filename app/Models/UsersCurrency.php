<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersCurrency extends Model
{
    protected $table = 'users_currency';

    public $timestamps = false; // Optional: remove if the table has timestamps

    protected $fillable = [
        'user_id',
        'type',
        'amount',
    ];
}
