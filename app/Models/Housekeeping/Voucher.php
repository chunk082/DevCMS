<?php

namespace App\Models\Housekeeping;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = [
        'code',
        'credits',
        'points',
        'points_type',
        'catalog_item_id',
        'amount',
        'limit',
    ];
}