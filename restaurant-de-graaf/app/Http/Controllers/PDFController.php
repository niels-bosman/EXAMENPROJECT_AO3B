<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\User;
use App\Reservation;
use App\ReservationProducts;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class PDFController extends Controller
{
    public function index($reservation)
    {
        if(User::check_account("check") == "check") {
            $user = $this->get_user();
            $reservation_check = $this->get_reservation($reservation);
            if(User::check_privileges() > 1) {
                $pdf = \App::make('dompdf.wrapper');
                $pdf->loadHTML($this->convert_customer_to_html($reservation));
                return $pdf->stream();
            }
            else if($user->id === $reservation_check->UserID)
            {
                $pdf = \App::make('dompdf.wrapper');
                $pdf->loadHTML($this->convert_customer_to_html($reservation));
                return $pdf->stream();
            }
            else {
                return redirect('/profiel');
            }
        }
    }

    public function get_user()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return $user;
    }

    public function get_reservation($reservation)
    {
        $reservation = Reservation::where('reservation_code', $reservation)->first();
        return $reservation;
    }

    public function get_reservation_products($reservation)
    {
        $reservation_products = ReservationProducts::where('reservation_code', $reservation)->get();
        return $reservation_products;
    }

    function convert_customer_to_html($reservation_code)
    {
        $reservation = $this->get_reservation($reservation_code);
        $reservation_products = $this->get_reservation_products($reservation_code);
        $products = $this->get_products($reservation_products);

        $date = (empty($reservation->date)) ? "Datum onbekend" : date('l - d M Y', strtotime($reservation->date));
        $time = (empty($reservation->date)) ? "Tijd onbekend" : date('g:i A', strtotime($reservation->date));
        $guest = (empty($reservation->guest_amount)) ? "?" : $reservation->guest_amount;
        $payed = (empty($reservation->payed_price)) ? "Niet betaald" : "Betaald: €".number_format($reservation->payed_price, 2, ',', '.')."";
        $output = '
        <head>
            <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
            </script>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Nota: '. $reservation->reservation_code.'</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <script src="https://kit.fontawesome.com/326db4868f.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="/css/app.css">
            <link rel="shortcut icon" type="image/png" href="favicon.png"/>
        </head>
        <body>
        <div>
            <h1 align="center" style="color: #1693A6;">Restaurant de Graaf</h1>
            <hr>
            <table width="100%" style="border: 0px; line-height: 0.5">
                <tr>
                    <td width="25%"></td>
                    <td width="25%"><p align="center">Restaurant de Graaf,</p></td>
                    <td width="25%"><p align="center">J.F. Kennedylaan 49,</p></td>
                    <td width="25%"></td>
                </tr>
                <tr>
                    <td width="25%"></td>
                    <td width="25%"><p align="center">7001 EA Doetinchem,</p></td>
                    <td width="25%"><p align="center">(06) 52 54 12 36</p></td>
                    <td width="25%"></td>
                </tr>
            </table>
            <hr style="margin: 0 auto 20px auto">
            <table width="100%" style="border: 0px; line-height: 0.5">
                <tr>
                    <td width="25%"><p align="center">'. $date .'</p></td>
                    <td width="25%"><p align="center">'. $time .'</p></td>
                    <td width="25%"><p align="center">Aantal mensen: '.$guest.'</p></td>
                    <td width="25%"><p align="center">'.$payed.'</p></td>
                </tr>
            </table
            <hr style="margin: 0 auto 20px auto">
            <table width="100%" style="border-collapse: collapse; border: 0px;">
                <tr>
                    <th align="center" width="10%">Naam</th>
                    <th align="center" width="5%">Prijs</th>
                    <th align="center" width="8%">Aantal</th>
                    <th align="center" width="10%">Totaal</th>
                </tr>
            </table>
            <hr style="margin: 5px auto 10px auto">
            <table width="100%" style="border-collapse: collapse; border: 0px;">
                ';
                $subtotal = 0;
                $i = 0;
                foreach($products as $product) {
                    if(is_numeric($product)) {
                    } else {
                        $product[0]->total = ($product[0]->price * $reservation_products[$i]->amount);
                        $subtotal = $subtotal + $product[0]->total;
                        $output .= '

                        <tr>
                            <td width="10%">' . $product[0]->name . '</td>
                            <td width="5%">' . $product[0]->price . '</td>
                            <td width="8%">' . $reservation_products[$i]->amount . '</td>
                            <td width="10%">' . $product[0]->total . '</td>
                        </tr>';
                        ;
                    }
                    $i++;
                }
                $subtotal = number_format($subtotal, 2, ',', '.');
                $output .= '
                </table>
                <hr style="margin: 15px auto 80px auto">
                <table width="100%" style="border-collapse: collapse; border: 0px;">
                    <tr>
                        <th width="20   %" align="center"></th>
                        <th width="20%" align="center"><h1>TOTAAL:</h1></th>
                        <th width="10%" align="center"></th>
                        <th width="20%" align="center"><h1>€ '.$subtotal.'</h1></th>
                        <th width="20%" align="center"></th>
                    </tr>
                </table>
                <hr style="margin: 15px auto 20px auto">
                <h4 align="center">Bedankt en tot ziens!</h4>
            </body>';


        return $output;
    }
}
