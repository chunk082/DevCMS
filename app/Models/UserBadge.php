<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBadge extends Model
{
    protected $table = 'users_badges';

    public function community()
    {
        return $this->belongsTo(Community::class, 'user_id');
    }
}