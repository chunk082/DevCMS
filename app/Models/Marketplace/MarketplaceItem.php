<?php

namespace App\Models\Marketplace;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Marketplace\Items; // Correct namespace for the Items model
use App\Models\User; // Correct namespace for the User model

class MarketplaceItem extends Model
{
    use HasFactory;

    protected $table = 'marketplace_items';

    protected $fillable = [
        'id',
        'item_id',
        'user_id',
        'price',
        'timestamp',
        'sold_timestamp',
        'state',
    ];

    // Method to get catalog item details for this marketplace item
    public function item()
    {
        return $this->belongsTo(Items::class, 'item_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
