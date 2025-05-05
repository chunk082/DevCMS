<?php

namespace App\Models\Housekeeping;

use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'items_base';

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
    public $incrementing = true;

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
        'sprite_id',
        'public_name',
        'item_name',
        'type',
        'width',
        'length',
        'stack_height',
        'allow_stack',
        'allow_sit',
        'allow_lay',
        'allow_walk',
        'allow_gift',
        'allow_trade',
        'allow_recycle',
        'allow_marketplace_sell',
        'allow_inventory_stack',
        'interaction_type',
        'interaction_modes_count',
        'vending_ids',
        'multiheight',
        'customparams',
        'effect_id_male',
        'effect_id_female',
        'clothing_on_walk',
    ];
}
