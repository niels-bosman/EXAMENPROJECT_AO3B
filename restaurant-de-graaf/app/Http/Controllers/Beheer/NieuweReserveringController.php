<?php

namespace App\Http\Controllers\Beheer;

use App\Product;
use App\Reservation;
use App\ReservationProduct;
use App\Table;
use App\TableReservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class NieuweReserveringController extends Controller
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
        return view('beheer/reservering-aanmaken', ['button' => 'Check beschikbaarheid']);
    }

    public function create(Reservation $reservation, TableReservation $tableReservation)
    {
        $available_tables = Table::all();

        // Loop through tables
        $tables = array();

        foreach ($available_tables as $available_table)
        {
            $koppellingen = TableReservation::where('table_id', $available_table->table_id)->get();

            $possible = 0;

            // Nieuwe reservering
            foreach ($koppellingen as $koppeling)
            {
                $paired_reservations = Reservation::where('reservation_code', $koppeling->reservation_code)->get();

                // Single reservering
                foreach ($paired_reservations as $paired_reservation)
                {
                    // Check if date same
                    if (substr($paired_reservation->date, 0, 10) !== substr(request('date'), 0, 10))
                    {
                        $possible++;
                    } else
                    {
                        $int_test_date = intval(substr($paired_reservation->date, 11, 2));
                        $int_reservation_date = intval(substr(request('time'), 0, 2));
                        if (($int_test_date + 2) !== $int_reservation_date && ($int_test_date + 1) !== $int_reservation_date && ($int_test_date) !== $int_reservation_date && ($int_test_date - 1) !== $int_reservation_date && ($int_test_date - 2) !== $int_reservation_date)
                        {
                            $possible++;
                        }
                    }
                }
            }

            if ($possible == count($koppellingen))
            {
                if ($available_table)
                {
                    array_push($tables, $available_table);
                }
            }
        }

        if (empty(\request("table"))):

            if (count($tables) > 0)
            {
                return view('beheer/reservering-aanmaken', [
                    'tables' => $tables,
                    'button' => 'Reserveren',
                    'date' => request('date'),
                    'time' => request('time'),
                    'persons' => request('persons'),
                    'comment' => request('comment'),
                ]);
            } else
            {
                return view('beheer/reservering-aanmaken', [
                    'successful' => false,
                    'button' => 'Reserveren',
                    'date' => request('date'),
                    'time' => request('time'),
                    'persons' => request('persons'),
                    'comment' => request('comment')
                ]);
            }
        else:
            $reservation_code = str_replace('-', '', request('date'));

            $selected = array();
            $seats = 0;
            foreach ($tables as $tafel)
            {
                $key = "table" . $tafel->table_id;
                if (!empty(\request($key)))
                {
                    array_push($selected, $tafel->table_id);
                    $seats += $tafel->seats;
                }
            }

            if (count($selected) == 0 || $seats < request('persons'))
            {
                return view('beheer/reservering-aanmaken', [
                    'tables' => $tables,
                    'selected' => $selected,
                    'button' => 'Reserveren',
                    'date' => request('date'),
                    'time' => request('time'),
                    'persons' => request('persons'),
                    'comment' => request('comment'),
                ]);
            }

            if ($selected[0] < 10)
            {
                $reservation_code .= '0' . $selected[0];
            } else
            {
                $reservation_code .= $selected[0];
            }

            for ($i = 1; $i < 10; $i++)
            {
                $temp_code = $reservation_code . $i;
                $check = Reservation::where('reservation_code', $temp_code)->first();

                if (!$check)
                {
                    $reservation_code = $temp_code;
                    break;
                }
            }

            $reservation->reservation_code = $reservation_code;
            $reservation->date = request('date') . ' ' . request('time');
            $reservation->duration = 120;
            $reservation->guest_amount = request('persons');
            $reservation->comment = request('comment');
            $reservation->save();

            foreach ($selected as $value)
            {
                TableReservation::insert([
                        "table_id" => $value,
                        "reservation_code" => $reservation_code
                    ]);
            }

            return view('beheer/reservering-aanmaken', [
                'successful' => true,
                'button' => 'Check beschikbaarheid'
            ]);
        endif;
    }
}
