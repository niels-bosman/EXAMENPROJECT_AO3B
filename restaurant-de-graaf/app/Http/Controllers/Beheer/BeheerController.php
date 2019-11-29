<?php

namespace App\Http\Controllers\Beheer;

use App\Product;
use App\Reservation;
use App\ReservationProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

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

    public function get()
    {
        $reservation = Reservation::where('reservation_code', request('id'))->first();

        return $reservation ? view('beheer/reservering-detail', compact('reservation')) : $this->index();
    }

    public function getBestellingen()
    {
        $reservation = Reservation::where('reservation_code', request('id'))->first();

        return $reservation ? view('beheer/reservering-bestelling-add', compact('reservation')) : $this->index();
    }

    public function destroyBestelling()
    {
        ReservationProduct::where('id', request('id'))->delete();

        return redirect('/beheer/reserveringen/' . request('code'));
    }

    public function postBestellingen(Request $request, ReservationProduct $product)
    {
        $this->validate($request, [
            'product' => [
                'required',
                'int'
            ],
            'amount' => [
                'required',
                'int'
            ],
        ]);

        $product->reservation_code = request('id');
        $product->product_id = request('product');
        $product->amount = request('amount');
        $product->save();

        return redirect('/beheer/reserveringen/' . request('id'));
    }

    public function put(Request $request)
    {
        $this->validate($request, [
            'reservation_code' => [
                'required',
                'string',
                'max:255'
            ],
            'date' => ['required'],
            'time' => ['required'],
            'duration' => [
                'required',
                'int'
            ],
            'guests' => [
                'required',
                'int'
            ],
            'comment' => ['max:255'],
            'robot' => ['required'],
        ]);

        Reservation::where('reservation_code', request('reservation_code'))->update([
            'date' => request('date') . ' ' . request('time'),
            'duration' => request('duration'),
            'guest_amount' => request('guests'),
            'comment' => request('comment'),
        ]);

        $putSuccess = true;
        $reservation = Reservation::where('reservation_code', request('id'))->first();

        return $reservation ? view('beheer/reservering-detail', compact('reservation', 'putSuccess')) : $this->index();
    }
}
