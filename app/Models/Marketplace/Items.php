<?php

namespace App\Models\Marketplace;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Marketplace\BaseItem;

class Items extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'id',
        'item_id',
        // Other fields
    ];

    // Relationship to the `BaseItem` model
    public function baseItem()
    {
        return $this->belongsTo(BaseItem::class, 'item_id', 'id'); // items.item_id = items_base.id
    }
}