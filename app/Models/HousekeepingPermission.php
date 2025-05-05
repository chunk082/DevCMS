<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HousekeepingPermission extends Model
{
    use HasFactory;

    protected $fillable = ['permission', 'min_rank', 'description'];
}