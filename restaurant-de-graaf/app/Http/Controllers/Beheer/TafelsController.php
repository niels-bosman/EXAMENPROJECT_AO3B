<?php

namespace App\Http\Controllers\Beheer;

use App\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class TafelsController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $check = User::check_privileges();
        $tables = Table::all();
        return view('beheer/tafels', compact('tables', 'check'));
    }
}
