<?php

namespace App\Models\Housekeeping;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousekeepingActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_user_id',
        'ip_address',
        'action_performed',
    ];

    // Define relationship to User model if needed
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'staff_user_id');
    }
}