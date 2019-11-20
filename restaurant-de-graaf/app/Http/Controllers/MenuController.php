<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subtype;
use App\Type;
use App\Product;

class MenuController extends Controller
{
    public function get()
    {
        $types = Type::all();

        return view('/menu', compact('types'));
    }
}
