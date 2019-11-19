<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function account_not_activated()
    {
        return view('account_not_activated');
    }

    public function account_blocked()
    {
        return view('account_blocked');
    }
}
