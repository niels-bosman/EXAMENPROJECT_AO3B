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
     * Haal alle tafels op en laat het overzicht zien.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tables = Table::all();

        return view('beheer/tafels', compact('tables'));
    }

    /**
     * Haal alle gegevens van een specifieke tafel op en laat de detail pagina zien.
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($id)
    {
        $table = Table::where('table_id', $id)->first();

        return view('beheer/tafels_details', compact('table'));
    }

    /**
     * Verwerk de input van de aangepaste tafel en stuur de gebruiker terug naar het ocerzicht.
     *
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'tafelnummer' => ['required'],
            'zitplaatsen' => ['required'],
            'minimum' => ['required'],
            'no-robot' => ['required']
        ]);

        $table = Table::where('table_id', $id)->update([
            'table_id' => request('tafelnummer'),
            'seats' => request('zitplaatsen'),
            'minimum_guests' => request('minimum'),
            'reservable' => request('reserveerbaar')
        ]);

        return redirect('/beheer/tafels');
    }
}
