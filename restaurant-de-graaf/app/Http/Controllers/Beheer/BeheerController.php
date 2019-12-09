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

    /**
     * Retourneerd de details van een reservering op de detail pagina.
     *
     * @return \Illuminate\Contracts\Support\Renderable|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function get()
    {
        $reservation = Reservation::where('reservation_code', request('id'))->first();

        return $reservation ? view('beheer/reservering-detail', compact('reservation')) : $this->index();
    }

    /**
     * Retourneerd de bestellingen die bij een reservering horen.
     *
     * @return \Illuminate\Contracts\Support\Renderable|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getBestellingen()
    {
        $reservation = Reservation::where('reservation_code', request('id'))->first();

        return $reservation ? view('beheer/reservering-bestelling-add', compact('reservation')) : $this->index();
    }

    /**
     * Verwijderd een specifieke bestelling die bij een reservering hoort.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyBestelling()
    {
        // Verwijder query
        ReservationProduct::where('id', request('id'))->delete();

        return redirect('/beheer/reserveringen/' . request('code'));
    }

    /**
     * Voegt een nieuwe bestelling aan een gekoppelde reservering toe.
     *
     * @param Request $request
     * @param ReservationProduct $product
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function postBestellingen(Request $request, ReservationProduct $product)
    {
        // Validatie
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

        // Velden
        $product->reservation_code = request('id');
        $product->product_id = request('product');
        $product->amount = request('amount');
        $product->save();

        return redirect('/beheer/reserveringen/' . request('id'));
    }

    /**
     * Bewerkt een specifieke reservering
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function put(Request $request)
    {
        // Validatie
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

        // Update query
        Reservation::where('reservation_code', request('reservation_code'))->update([
            'date' => request('date') . ' ' . request('time'),
            'duration' => request('duration'),
            'guest_amount' => request('guests'),
            'comment' => request('comment'),
        ]);

        // Zorg dat er een succesvolle popup komt en pakt de juiste reservering pagina.
        $putSuccess = true;
        $reservation = Reservation::where('reservation_code', request('id'))->first();

        return $reservation ? view('beheer/reservering-detail', compact('reservation', 'putSuccess')) : $this->index();
    }
}
