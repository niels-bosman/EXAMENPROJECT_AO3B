<?php

namespace App\Http\Controllers\Beheer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeheerController extends Controller
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
        return view('beheer/beheer');
    }
}
