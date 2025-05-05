<?php

namespace App\Models\Housekeeping;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogItems extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'catalog_items';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the primary key.
     *
     * @var string
     */
    protected $keyType = 'int';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'item_ids',
        'page_id',
        'catalog_name',
        'cost_credits',
        'cost_points',
        'points_type',
        'amount',
        'limited_stack',
        'limited_sells',
        'order_number',
        'offer_id',
        'song_id',
        'extradata',
        'have_offer',
        'club_only',
    ];

    /**
     * Default attribute values.
     *
     * @var array
     */
    protected $attributes = [
        'have_offer' => '0',
        'club_only' => '0',
    ];
}
