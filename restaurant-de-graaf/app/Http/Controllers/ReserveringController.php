<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\User;
use Illuminate\Http\Request;

class ReserveringController extends Controller {
    public function post(Reservation $reservation)
    {
        $timestamp = strtotime(\request('date') . \request('time'));
        $date = date('Y-m-d H:i:s', $timestamp);

        if ($date > date('Y-m-d H:i:s')) {
            $reservation->reservation_code = str_replace('-', '', \request('date')) . 'tafel';
            $reservation->UserID = auth()->user()->id;
            $reservation->date = $date;
            $reservation->duration = 120;
            $reservation->guest_amount = \request('persons');;
            $reservation->comment = \request('comment');

            $reservation->save();
        }

        return view('/home');
    }
}
