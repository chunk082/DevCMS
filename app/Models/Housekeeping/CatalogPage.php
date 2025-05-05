<?php

namespace App\Models\Housekeeping;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogPage extends Model
{
    use HasFactory;

    protected $table = 'catalog_pages';

     // Disable timestamps
    public $timestamps = false;

    protected $fillable = [
        'id',
        'parent_id', 
        'caption_save', 
        'caption', 
        'page_layout', 
        'icon_color', 
        'icon_image', 
        'min_rank', 
        'order_num', 
        'visible', 
        'enabled', 
        'club_only', 
        'vip_only', 
        'page_headline', 
        'page_teaser', 
        'page_special', 
        'page_text1', 
        'page_text2', 
        'page_text_details', 
        'page_text_teaser', 
        'room_id', 
        'includes'
    ];

    protected $casts = [
        'visible' => 'boolean',
        'enabled' => 'boolean',
        'club_only' => 'boolean',
        'vip_only' => 'boolean',
    ];
}
