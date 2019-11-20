<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\TableReservation;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function Get()
    {
        $user = auth()->user();
        $reservations = Reservation::where('UserID', $user->id)->get();
        $numbers = "";
        foreach ($reservations as $reservation)
        {
            $numbers .= $reservation->reservation_code . ', ';
        }
        $numbers = substr($numbers, 0, strlen($numbers) - 2);
        $tables_reservations = TableReservation::where('reservation_code', $numbers)->get();
        return view('profile', compact('user',  'reservations', 'tables_reservations'));
    }

    public function Put(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'tel_number' => ['required', 'string', 'max:255'],
            'street' => ['string', 'max:255'],
            'house_number' => ['string', 'max:255'],
            'city' => ['string', 'max:255'],
            'zipcode' => ['string', 'max:255']
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

        return view('profile', compact('user', 'putSucces'));
    }
}