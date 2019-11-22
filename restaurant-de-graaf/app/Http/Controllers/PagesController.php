<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subtype;
use App\User;
use App\Type;
use App\Product;

class PagesController extends Controller
{
    public function home()
    {
        return view('/home/home');
    }

    public function login()
    {
        return view('/profiel/login');
    }

    public function create()
    {
        return view('/profiel/registration');
    }

    public function menu()
    {
        $types = Type::all();

        return view('/home/menu', compact('types'));
    }

    public function reservation()
    {
        return view(User::check_account('/home/reservation'), ['button' => 'Check beschikbaarheid']);
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
}
