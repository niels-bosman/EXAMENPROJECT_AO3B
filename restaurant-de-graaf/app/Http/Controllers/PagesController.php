<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function home()
    {
        return view('/home');
    }

    public function login()
    {
        return view('/login');
    }

    public function checkLogin()
    {
        // needs to change
        return view('/login');
    }

    public function create()
    {
        return view('/registration');
    }

    public function createAccount()
    {
        // needs to change
        return view('/registration');
    }

    public function menu()
    {
        return view('/menu');
    }

    public function reservation()
    {
        return view(User::check_account('/reservation'));
    }

    public function contact()
    {
        return view('/contact');
    }

    public function faq()
    {
        return view('/faq');
    }

    public function service_condition()
    {
        return view('/service_condition');
    }

    public function forgot_password()
    {
        if (User::check_logged_in()) {
            return view('profiel');
        } else {
            return view('/forgot_password');
        }
    }

    public function account_terminate()
    {
        return view(User::check_account('/profiel/delete'));
    }

    public function confirmAccount_terminate()
    {
        return view(User::check_account('/'));
    }

    public function account_not_activated()
    {
        return view('/account_not_activated');
    }

    public function account_blocked()
    {
        return view('/account_blocked');
    }
}
