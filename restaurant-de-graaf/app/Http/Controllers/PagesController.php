<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function reservation()
    {
        return view('/reservation');
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
        return view('/forgot_password');
    }
}
