<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\TableReservation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Haal de user op en geef de gegevens van deze user en een lijst van de reserveringen.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        $user = auth()->user();
        $reservations = Reservation::where('UserID', $user->id)->get();
        $only_admin = DB::table('users')->where('auth_level', 3)->count();
        $tables_reservations = TableReservation::get();

        return view(User::check_account('profiel/profiel'), compact('user', 'reservations', 'tables_reservations', 'only_admin'));
    }

    /**
     * Controleer de aangepaste data van de gebruiker en update (Indien nodig) de gegevens.
     * Laat daarna de profiel weer zien.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => [
                'required',
                'string',
                'max:255'
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255'
            ],
            'tel_number' => [
                'required',
                'string',
                'max:255'
            ],
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

        if (strlen(request('password')) !== 0)
        {
            $this->validate($request, [
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/'
                ],
            ]);
            $user->password = Hash::make(request('password'));
        }
        $user->save();
        $putSucces = true;
        $reservations = Reservation::where('UserID', $user->id)->get();
        $tables_reservations = TableReservation::get();
        $only_admin = DB::table('users')->where('auth_level', 3)->count();

        return view(User::check_account('profiel/profiel'), compact('user', 'reservations', 'tables_reservations', 'putSucces', 'only_admin'));
    }

    /**
     * Verwijder de gebruiker en stuur hem/haar terug naar de login pagina.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function destroy()
    {
        Reservation::where('UserID', Auth::user()->id)->update(['UserID' => null]);
        User::where('id', Auth::user()->id)->delete();

        return view('auth/login');
    }

    /**
     * Stuur de account geäctiveerd pagina terug.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function account_activated()
    {
        return view(User::check_account('/profiel/account_activated'));
    }

    /**
     * Geen een pagina die vriendelijk verteld dat het account nog geäctiveerd moet worden.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function account_not_activated()
    {
        return view('/profiel/account_not_activated');
    }

    /**
     * Laat een pagina zien dat de gebruiker is geblokkerd
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function account_blocked()
    {
        return view('/profiel/account_blocked');
    }

    /**
     * Laat een pagina zien die toelicht dat de gebruiker te vaak een verkeerd wachtwoord heft ingevoerd.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function account_blocked_password()
    {
        return view('/profiel/account_blocked_password');
    }
}
