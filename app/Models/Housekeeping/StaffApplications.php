<?php

namespace App\Models\Housekeeping;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffApplications extends Model
{
    use HasFactory;

    // Define any fillable fields for mass assignment
    protected $fillable = [
        'username', 'discord_username', 'age', 'country', 'reason_for_joining', 'new_ideas', 'availability_per_day', 'additional_info'
    ];
}
