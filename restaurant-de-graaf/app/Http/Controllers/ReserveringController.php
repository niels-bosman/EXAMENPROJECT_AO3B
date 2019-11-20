<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\TableReservation;
use App\Table;
use DB;
use Faker\Provider\DateTime;

class ReserveringController extends Controller {
    public function post(Reservation $reservation) {
        $timestamp = strtotime(\request('date') . \request('time'));
        $date = date('Y-m-d H:i:s', $timestamp);
        $persons = \request('persons');

        $available_tables = Table::where('reservable', 1)->where('minimum_guests', '<=', $persons)->where('seats', '>=', $persons)->get();

        // Loop through tables
        foreach ($available_tables as $available_table) {
            $koppellingen = TableReservation::where('table_id', $available_table->table_id)->get();

            $possible = 0;
            // Nieuwe reservering
            foreach ($koppellingen as $koppeling) {
                $paired_reservations = Reservation::where('reservation_code', $koppeling->reservation_code)->get();

                // Single reservering
                foreach ($paired_reservations as $paired_reservation) {
                    // Check if date same
                    if (substr($paired_reservation->date, 0, 10) !== substr(request('date'), 0, 10)) {
                        $possible++;
                    } else {
                        $int_test_date = intval(substr($paired_reservation->date, 11, 2));
                        $int_reservation_date = intval(substr(request('date'), 0, 2));
                        if (($int_test_date + 2) !== $int_reservation_date && ($int_test_date + 1) !== $int_reservation_date && ($int_test_date) !== $int_reservation_date && ($int_test_date - 1) !== $int_reservation_date && ($int_test_date - 2) !== $int_reservation_date) {
                            $possible++;
                        }
                    }
                }
            }
            if ($possible == count($koppellingen)) {
                $table = $available_table;
                break;
            }
        }

        if (isset($table)) {
            $reservation_code = str_replace('-', '', \request('date')) . $table->table_id;

            if ($persons <= 8 && $persons >= 1) {
                $reservation->reservation_code = $reservation_code;
                $reservation->UserID = auth()->user()->id;
                $reservation->date = $date;
                $reservation->duration = 120;
                $reservation->guest_amount = $persons;
                $reservation->comment = \request('comment');

                $reservation->save();

                $data = [
                    'table_id' => $table->table_id,
                    'reservation_code' => $reservation_code
                ];

                DB::table('table_reservations')->insert($data);
            }
            return view('/reservation', ['successful' => true]);
        } else {
            return view('/reservation', ['successful' => false]);
        }
    }
}
