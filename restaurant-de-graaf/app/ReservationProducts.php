<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationProducts extends Model
{
    protected $fillable = [
        'reservation_code', 'product_id', 'amount'
    ];
}
