<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\TableReservation;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function home()
    {
        $user = auth()->user();
        $reservations = Reservation::where('UserID', $user->id)->get();
//        $numbers = "";
//        foreach ($reservations as $reservation)
//        {
//            $numbers .= $reservation->reservation_code . ', ';
//        }
//        $numbers = substr($numbers, 0, strlen($numbers) - 2);
//        $tables_reservations = TableReservation::where('reservation_code', $numbers)->get();
        $tables_reservations = TableReservation::get();
        return view(User::check_account('/profiel/profiel'), compact('user',  'reservations', 'tables_reservations'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'tel_number' => ['required', 'string', 'max:255'],
            'street' => ['max:255'],
            'house_number' => ['max:255'],
            'city' => ['max:255'],
            'zipcode' => ['max:255']
        ]);

        $user = User::find(auth()->user()->id);
        $user->name = request('name');
        $user->email = request('email');
        $user->tel_number = request('tel_number');
        $user->street = request('street');
        $user->house_number = request('house_number');
        $user->city = request('city');
        $user->zipcode = request('zipcode');

        $user->save();

        $putSucces = true;

        $reservations = Reservation::where('UserID', $user->id)->get();
        $numbers = "";
        foreach ($reservations as $reservation)
        {
            $numbers .= $reservation->reservation_code . ', ';
        }
        $numbers = substr($numbers, 0, strlen($numbers) - 2);
        $tables_reservations = TableReservation::where('reservation_code', $numbers)->get();

        return view(User::check_account('/profiel/profiel'), compact('user', 'reservations', 'tables_reservations' , 'putSucces'));
    }

    public function account_activated()
    {
        return view(User::check_account('/profiel/account_activated'));
    }
}
