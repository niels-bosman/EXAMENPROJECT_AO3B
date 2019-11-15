<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    public function home() {
        if(!isset($_SESSION['activated']))
        {
            return view('account');
        }
        else
        {
            return view('account.login');
        }
    }

    public function checkAccountActivation(User $user)
    {
        $user = User::all()[0];

        if($user->activated)
        {
            return redirect('account');
        }
        else
        {
            return view('account.account_not_activated');
        }
    }

    public function checklogin(User $user)
    {
        if(!$user->email == $_POST['email'] && !$user->password == $_POST['password'])
        {
            return redirect('account');
        }
        else
        {
            return view('account.login');
        }
    }

    public function login()
    {
        return view('account.login');
    }

    public function create()
    {
        $user = new User();

        $user->name = request('name');
        $user->email = request('email');
        $user->tel_number = request('tel_number');

        $user->save();

        return redirect('/account/account_not_activated');
    }

    public function show($id)
    {
        $id = User::findOrFail($id);

        return view('account.{$id}');
    }

    public function edit($id)
    {
        $id = User::findOrFail($id);

        return view('account.{$id}/edit');
    }

    public function recoverPassword()
    {

    }

    public function delete()
    {

    }
}
