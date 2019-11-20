<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function home()
    {
        $user = auth()->user();
        return view(User::check_account('/profiel/profiel'), compact('user'));
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

        return view(User::check_account('/profiel/profiel'), compact('user', 'putSucces'));
    }

    public function account_activated()
    {
        return view(User::check_account('/profiel/account_activated'));
    }
}
