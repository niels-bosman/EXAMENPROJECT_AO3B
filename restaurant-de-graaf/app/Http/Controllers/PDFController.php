<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class PDFController extends Controller
{
    public function index($reservation)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html($reservation));
        return $pdf->stream();
    }

    public function get_user_data()
    {
        $user = DB::table('users')->where('id', Auth::user()->id)->first();
        return $user;
    }

    public function get_reservation_data($reservation)
    {
        $reservation = DB::table('reservations')->where('reservation_code', $reservation)->first();
        return $reservation;
    }

    function convert_customer_data_to_html($reservation)
    {
     $user = $this->get_user_data();
     $reservation = $this->get_reservation_data($reservation);

     $created_at = (empty($reservation->created_at)) ? "Datum onbekend": date("Y-m-d", strtotime($reservation->created_at));
     $output = '
     <h1 align="center">Reservering klant '.$user->name.'</h1>
     <br>
     <h3 align="center">Reserverings code: '.$reservation->reservation_code.'</h3>
     <h4 align="center">Datum: '.date("Y-m-d", strtotime($reservation->date)).'</h4>
     <br><br>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th align="center" style="border: 1px solid; padding:12px;" width="12%">Naam</th>
    <th align="center" style="border: 1px solid; padding:12px;" width="5%">Gasten</th>
    <th align="center" style="border: 1px solid; padding:12px;" width="8%">Duur</th>
    <th align="center" style="border: 1px solid; padding:12px;" width="10%">aangemaakt op:</th>
   </tr>
     ';
      $output .= '
      <tr>
       <td align="center" style="border: 1px solid; padding:12px;">'.$user->name.'</td>
       <td align="center" style="border: 1px solid; padding:12px;">'.$reservation->guest_amount.'</td>
       <td align="center" style="border: 1px solid; padding:12px;">'.$reservation->duration.' minuten</td>
       <td align="center" style="border: 1px solid; padding:12px;">'.$created_at.'</td>
      </tr>
      ';
     $output .= '</table>';
     return $output;
    }
}
