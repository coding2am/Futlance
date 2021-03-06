<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    protected $fillable = [
        'name',
        'photo',
        'price_per_hour',
        'status',
        'city_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function quarter()
    {
        return $this->belongsTo('App\Quarter');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'court_user')
            ->withPivot('count')
            ->withTimestamps();
    }
}
