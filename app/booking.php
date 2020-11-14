<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    protected $fillable = [
        'booking_no',
        'booking_date',
        'start_time',
        'end_time',
        'note',
        'comment',
        'status',
        'user_id',
        'court_id',
        'payment_method_id',
    ];
}
