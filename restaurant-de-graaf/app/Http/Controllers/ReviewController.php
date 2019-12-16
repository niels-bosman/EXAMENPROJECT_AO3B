<?php

namespace App\Http\Controllers;

use App\Review;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        return view(User::check_account('/home/review'));
    }

    public function post(Request $request, Review $review)
    {
        $this->validate($request, [
            'title' => [
                'required',
                'string',
                'max:255'
            ],
            'text' => [
                'required',
                'string',
            ],
            'stars' => [
                'required',
                'min:1',
                'max:10',
            ],
        ]);

        $review->title = \request('title');
        $review->text = \request('text');
        $review->stars = \request('stars') / 2;
        $review->user_id = Auth::user()->id;

        $review->save();

        $successful = true;

        return view('/home/review', compact('successful'));
    }
}
