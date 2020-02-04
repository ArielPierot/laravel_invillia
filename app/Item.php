<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'title',
        'note',
        'quantity',
        'price',
        'ship_order_id'
    ];

    public function shipOrder()
    {
        return $this->belongsTo('App\ShipOrder');
    }
}
