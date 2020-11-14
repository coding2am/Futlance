<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quarter extends Model
{
    protected $fillable = [
        'name',
        'city_id',
    ];

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    public function courts()
    {
        return $this->hasMany('App\Court');
    }
}
