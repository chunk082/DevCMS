<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{
    protected $table = 'users_settings';

    public function community()
    {
        return $this->belongsTo(Community::class, 'user_id');
    }
}