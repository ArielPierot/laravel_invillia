<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'name'
    ];

    protected $table = "people";

    public function shipOrders()
    {
        return $this->hasMany('App\ShipOrder');
    }

    public function phones()
    {
        return $this->hasMany('App\Phone');
    }
}
