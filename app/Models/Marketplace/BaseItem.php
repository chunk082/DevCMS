<?php

namespace App\Models\Marketplace;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseItem extends Model
{
    use HasFactory;

    protected $table = 'items_base';

    protected $fillable = [
        'id',
        'sprite_id',
        'public_name',
        'item_name',
        // Other fields
    ];
}