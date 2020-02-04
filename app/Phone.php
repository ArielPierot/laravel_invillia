<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'number',
        'people_id'
    ];

    public function person()
    {
        return $this->belongsTo('App\Person');
    }
}
