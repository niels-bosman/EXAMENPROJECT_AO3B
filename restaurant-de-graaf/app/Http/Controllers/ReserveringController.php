<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\User;
use Illuminate\Http\Request;

class ReserveringController extends Controller {
    public function post(Reservation $reservation, User $user) {
        $reservation->reservation_code = date('Ymd') . 'tafel';
    }
}
