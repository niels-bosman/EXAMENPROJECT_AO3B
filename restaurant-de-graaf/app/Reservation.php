<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model {
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reservation_code',
        'UserID',
        'date',
        'duration',
        'comment',
        'payed_price',
        'guest_amount'
    ];
}
