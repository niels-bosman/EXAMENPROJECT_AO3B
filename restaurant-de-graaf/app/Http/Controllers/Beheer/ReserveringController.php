<?php

namespace App\Http\Controllers\Beheer;

use App\Reservation;
use App\TableReservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Console\Input\Input;
use DB;

class ReserveringController extends Controller
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
        if (isset($_GET['datum']))
        {
            $reservations = Reservation::whereDate('date', '=', $_GET['datum'])->get();
        } elseif (isset($_GET['week']))
        {
            $year = substr($_GET['week'], 0, 4); // 4 vervangen met aantal tekens tot '-'
            $week = substr($_GET['week'], strpos($_GET['week'], 'W') + 1);
            $date = Carbon::now();
            $date->setISODate($year, $week);
            $weekStart = $date->startOfWeek()->toDateString();
            $weekEndTemp = $date->endOfWeek();
            $weekEndTemp->day += 1;
            $weekEnd = $weekEndTemp->toDateString();
            $reservations = Reservation::whereBetween('date', [
                $weekStart,
                $weekEnd
            ])->get();
        } else
        {
            $reservations = Reservation::all();
        }

        return view('beheer/reserveringen', compact('reservations'));
    }

    public function delete($reservation_code)
    {
        TableReservation::where('reservation_code', '=', $reservation_code)->delete();
        DB::table('reservation_products')->where('reservation_code', '=', $reservation_code)->delete();
        Reservation::where('reservation_code', '=', $reservation_code)->delete();

        return redirect('/beheer/reserveringen');

    }

}
