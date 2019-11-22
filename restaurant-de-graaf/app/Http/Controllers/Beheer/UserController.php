<?php

namespace App\Http\Controllers\Beheer;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('beheer');
    }

    /**
     * Shows the users.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        return view('beheer/users', compact('users'));
    }

    public function ban(Request $request)
    {
        $user = User::where('id', request('userID'))->first();
        $user->blocked = $user->blocked == 0 ? 1 : 0;

        $user->save();
        return $this->index();
    }
}
