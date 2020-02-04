<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShipOrder extends Model
{
    protected $fillable = [
        'shipto_name',
        'shipto_address',
        'shipto_city',
        'shipto_country',
        'people_id'
    ];
}
