<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home()
    {
        return view(User::check_account('/profiel/profiel'));
    }

    public function edit()
    {
        return view(User::check_account('/profiel/edit'));
    }

    public function update()
    {
        // needs to change
        return view(User::check_account('/profiel/edit'));
    }

    public function account_activated()
    {
        return view(User::check_account('/profiel/account_activated'));
    }
}
