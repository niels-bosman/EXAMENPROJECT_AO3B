<?php

namespace App\Http\Controllers\Beheer;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ProductController extends Controller
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
        $products = Product::all();
        $check = User::check_privileges();
        return view('beheer/product', compact('products', 'check'));
    }
}
