<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index() {
        return view('/home/review');
    }

    public function post(Request $request, Review $review) {
        $review->title = \request('title');
        $review->text = \request('title');
        $review->stars = \request('stars') / 2;
        $review->user_id = Auth::user()->id;

        $review->save();

        $successful = true;
        return view('/home/review', compact('successful'));
    }
}
