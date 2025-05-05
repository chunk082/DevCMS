<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $table = 'users'; // Assuming 'users' table is used

    public function articleComments()
    {
        return $this->hasMany(Comments::class, 'user_id');
    }

    public function badges()
    {
        return $this->hasMany(UserBadges::class, 'user_id');
    }

    public function userSettings()
    {
        return $this->hasOne(UsersSetting::class, 'user_id');
    }
}