<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\TableReservation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function home()
    {
        $user = auth()->user();
        $reservations = Reservation::where('UserID', $user->id)->get();
        $check = User::check_privileges();
        $tables_reservations = TableReservation::get();
        return view(User::check_account('profiel/profiel'), compact('user',  'reservations', 'tables_reservations', 'check'));
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
            'zipcode' => ['max:255'],
            'no-robot' => ['required']
        ]);

        $user = User::find(auth()->user()->id);
        $user->name = request('name');
        $user->email = request('email');
        $user->tel_number = request('tel_number');
        $user->street = request('street');
        $user->house_number = request('house_number');
        $user->city = request('city');
        $user->zipcode = request('zipcode');

        if (strlen(request('password')) !== 0) {

            $this->validate($request, [
                'password' => ['required', 'string', 'min:8', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/'],
            ]);

            $user->password = request('password');
        }


        $user->save();

        $putSucces = true;

        $reservations = Reservation::where('UserID', $user->id)->get();

        $tables_reservations = TableReservation::get();

        $check = User::check_privileges();

        return view(User::check_account($check['link']), compact('user', 'reservations', 'tables_reservations' , 'putSucces', 'check'));
    }

    public function destroy() {
        Reservation::where('UserID', Auth::user()->id)->update(['UserID' => null]);
        User::where('id', Auth::user()->id)->delete();

        $check = User::check_privileges();
        return view('auth/login', compact('check'));
    }

    public function account_activated()
    {
        $check = User::check_privileges();
        return view(User::check_account('/profiel/account_activated'), compact('check'));
    }

    public function account_not_activated()
    {
        $check = User::check_privileges();
        return view('/profiel/account_not_activated', compact('check'));
    }

    public function account_blocked()
    {
        $check = User::check_privileges();
        return view('/profiel/account_blocked', compact('check'));
    }

    public function account_blocked_password()
    {
        $check = User::check_privileges();
        return view('/profiel/account_blocked_password', compact('check'));
    }
}
