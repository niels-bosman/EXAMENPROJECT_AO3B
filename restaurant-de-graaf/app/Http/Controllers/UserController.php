<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    public function home()
    {
        // needs to change
        return view('/user/not_admin');
    }

    public function show($id)
    {
        $user = User::where('id', $id)->firstOrFail();

        return view('/user/user', [
            'user' => $user
        ]);
    }

    public function edit($id)
    {

        $user = User::where('id', $id)->firstOrFail();

        return view('/user/edit', [
            'user' => $user
        ]);
    }

    public function update($id)
    {

        // needs to change

        return redirect('/user/' . $id);
    }

    public function account_terminate($id)
    {
        $user = User::where('id', $id)->firstOrFail();

        return view('/user/delete', [
            'user' => $user
        ]);
    }

    public function confirmAccount_terminate($id)
    {
        $user = User::where('id', $id)->firstOrFail();

        return redirect('/user');
    }

    public function account_not_activated($id)
    {
        $user = User::where('id', $id)->firstOrFail();

        return view('/user/account_not_activated', [
            'user' => $user
        ]);
    }

    public function account_blocked($id)
    {
        $user = User::where('id', $id)->firstOrFail();

        return view('/user/account_blocked', [
            'user' => $user
        ]);
    }
}
