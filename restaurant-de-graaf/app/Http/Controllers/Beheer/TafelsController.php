<?php

namespace App\Http\Controllers\Beheer;

use App\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $tables = Table::all();
        return view('beheer/tafels', compact('tables'));
    }
}
