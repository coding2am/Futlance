<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
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

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function court()
    {
        return $this->belongsTo('App\Court');
    }
    public function paymentMethod()
    {
        return $this->belongsTo('App\PaymentMethod');
    }
}
