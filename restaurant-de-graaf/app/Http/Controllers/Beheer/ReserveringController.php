<?php

namespace App\Http\Controllers\Beheer;

use App\Reservation;
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

//        if (isset($_GET['datum'])){
//            $reservations = Reservation::whereDate('date','=', $_GET['datum'])->get();
//        }
//        elseif(isset($_GET['week'])){
//            $date = Carbon::now();
//            $date->setISODate(2019, 48);
//            $weekEnd =  $date->startOfWeek();
//            $weekStart = $date->endOfWeek();
//            $weekStart->day -= 6;
//            $reservations = Reservation::whereDate('date', [$weekStart, $weekEnd])->get();
////            $reservations = Reservation::where(\DB::raw("WEEKOFYEAR(date)"),'=',$_GET['week'])->get();
//
////            dd(\request('week'));
////            dd($weekStart, $weekEnd);
//        }
//        else{
            $reservations = Reservation::all();


        return view('beheer/reserveringen',compact('reservations'));



    }

    public function destroy() {

    }

}
