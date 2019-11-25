<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\TableReservation;
use App\Table;
use App\User;
use DB;
use Illuminate\Support\Facades\Auth;

class ReserveringController extends Controller {
    public function post(Reservation $reservation, TableReservation $tableReservation) {
        $table = request('table');
        $check = User::check_privileges();
        if (empty($table)):
            $timestamp = strtotime(\request('date') . \request('time'));
            $date = date('Y-m-d H:i:s', $timestamp);
            $persons = \request('persons');

            $available_tables = Table::where('reservable', 1)->where('minimum_guests', '<=', $persons)->where('seats', '>=', $persons)->get();

            // Loop through tables
            $tables = array();

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
                    if ($available_table) {
                        array_push($tables, $available_table);
                    }
                }
            }

            if (count($tables) > 0) {
                return view('/home/reservation', [
                    'tables' => $tables,
                    'button' => 'Reserveren',
                    'date' => request('date'),
                    'time' => request('time'),
                    'persons' => request('persons'),
                    'comment' => request('comment'),
                ], compact('check'),
            );
            } else {
                return view('/home/reservation', [
                    'successful' => false,
                    'button' => 'Reserveren',
                    'date' => request('date'),
                    'time' => request('time'),
                    'persons' => request('persons'),
                    'comment' => request('comment')
                ], compact('check'),
            );
            }
        else:
            $reservation_code = str_replace('-', '', request('date')) . $table;

            $reservation->reservation_code = $reservation_code;
            $reservation->UserID = Auth::user()->id;
            $reservation->date = request('date') . ' ' . request('time');
            $reservation->duration = 120;
            $reservation->guest_amount = request('persons');
            $reservation->comment = request('date');
            $reservation->save();

            $tableReservation->table_id = $table;
            $tableReservation->reservation_code = $reservation_code;
            $tableReservation->save();

            return view('/home/reservation', [
                'successful' => true,
                'button' => 'Check beschikbaarheid'
            ], compact('check'),
        );
        endif;
    }

    public function destroy() {
        TableReservation::where('reservation_code', request('reservering'))->delete();
        Reservation::where('reservation_code', request('reservering'))->delete();

        $user = auth()->user();
        $reservations = Reservation::where('UserID', $user->id)->get();
        $tables_reservations = TableReservation::get();

        $check = User::check_privileges();

        return view(User::check_account('/profiel/profiel'), compact('user',  'reservations', 'tables_reservations', 'check'));
    }
}
