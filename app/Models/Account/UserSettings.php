<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSettings extends Model
{
    use HasFactory;

    protected $table = 'users_settings'; // Matches your database table

    protected $fillable = [
        'user_id',
        'block_friendrequests',
        'block_following',
        'block_roominvites',
    ];

    public $timestamps = false;
    
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
