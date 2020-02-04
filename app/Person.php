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
        return $this->hasMany('App\ShipOrder', 'people_id');
    }

    public function phones()
    {
        return $this->hasMany('App\Phone', 'people_id');
    }
}
