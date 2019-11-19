<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function home()
    {
        return view('/home/home');
    }

    public function login()
    {
        return view('/auth/login');
    }

    public function create()
    {
        return view('/profiel/register');
    }

    public function menu()
    {
        return view('/home/menu');
    }

    public function reservation()
    {
        return view(User::check_account('/home/reservation'));
    }

    public function contact()
    {
        return view('/home/contact');
    }

    public function faq()
    {
        return view('/home/faq');
    }

    public function service_condition()
    {
        return view('/home/service_condition');
    }

    public function forgot_password()
    {
        if (User::check_logged_in()) {
            return view('/profiel');
        } else {
            return view('/auth/passwords/email');
        }
    }

    public function account_terminate()
    {
        return view(User::check_account('/profiel/delete'));
    }

    public function confirmAccount_terminate()
    {
        return view(User::check_account('/home'));
    }

    public function account_not_activated()
    {
        return view('/profiel/account_not_activated');
    }

    public function account_blocked()
    {
        return view('/profiel/account_blocked');
    }
}
