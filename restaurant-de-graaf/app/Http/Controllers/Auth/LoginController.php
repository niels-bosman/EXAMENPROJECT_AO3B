<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->auth_level > 1)
        {
            return redirect('/beheer');
        }

        return redirect('/profiel');
    }

    public $maxAttempts = 2;

    protected function hasTooManyLoginAttempts(Request $request)
    {
        if ($this->limiter()->tooManyAttempts($this->throttleKey($request), $this->maxAttempts()))
        {
            $user = User::where('email', $request->email)->first();
            if ($user)
            {
                $user->wrong_count = 1;
                $user->update();
            }

            return $this->limiter()->tooManyAttempts($this->throttleKey($request), $this->maxAttempts());
        }

        return $this->limiter()->tooManyAttempts($this->throttleKey($request), $this->maxAttempts());
    }

}
