<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subtype;
use App\User;
use App\Type;
use Illuminate\Support\Facades\Auth;
use App\Product;

class PagesController extends Controller
{
    public function home()
    {
        $check = User::check_privileges();
        return view('home/home', compact('check'));
    }

    public function login()
    {
        $check = User::check_privileges();

        dd($check);

        return view('/auth/login', compact('check'));
    }

    public function create()
    {
        $check = User::check_privileges();
        return view('/auth/register', compact('check'));
    }

    public function menu()
    {
        $types = Type::all();
        $check = User::check_privileges();

        return view('/home/menu', compact('types', 'check'));
    }

    public function reservation()
    {
        $check = User::check_privileges();
        return view(User::check_account('/home/reservation'), ['button' => 'Check beschikbaarheid'], compact('check'));
    }

    public function contact()
    {
        $check = User::check_privileges();
        return view('/home/contact', compact('check'));
    }

    public function faq()
    {
        $check = User::check_privileges();
        return view('/home/faq', compact('check'));
    }

    public function service_condition()
    {
        $check = User::check_privileges();
        return view('/home/service_condition', compact('check'));
    }

    public function forgot_password()
    {
        $check = User::check_privileges();
        if (User::check_logged_in()) {
            return view('/profiel', compact('check'));
        } else {
            return view('/auth/passwords/email', compact('check'));
        }
    }
}
