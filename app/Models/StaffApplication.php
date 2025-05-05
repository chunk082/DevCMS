<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'username',
        'discord_username',
        'age',
        'country',
        'reason_for_joining',
        'new_ideas',
        'availability_per_day',
        'additional_info',
    ];

}
