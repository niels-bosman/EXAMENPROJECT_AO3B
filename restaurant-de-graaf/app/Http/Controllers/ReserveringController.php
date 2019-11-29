<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Table;
use App\TableReservation;
use DB;
use Illuminate\Support\Facades\Auth;

class ReserveringController extends Controller
{
    /**
     * Voegt de data van een nieuwe reservering toe als de data klopt. Dit regelt ook de check voor de tafels.
     *
     * @param Reservation $reservation
     * @param TableReservation $tableReservation
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function post(Reservation $reservation, TableReservation $tableReservation)
    {
        $table = request('table');
        if (empty($table)):

            $available_tables = Table::where('reservable', 1)->where('minimum_guests', '<=', request('persons'))->where('seats', '>=', request('persons'))->get();

            $tables = [];

            // Loopen door tafels
            foreach ($available_tables as $available_table)
            {
                $possible = 0;

                // Selecteer koppelingen met zelfde tafel
                $koppellingen = TableReservation::where('table_id', $available_table->table_id)->get();

                foreach ($koppellingen as $koppeling)
                {
                    // Selecteer reservering met zelfde code
                    $paired_reservations = Reservation::where('reservation_code', $koppeling->reservation_code)->get();

                    foreach ($paired_reservations as $paired_reservation)
                    {
                        // Check of de datum het zelfde is. Zo niet, is het een mogelijke koppeling.
                        if (substr($paired_reservation->date, 0, 10) !== substr(request('date'), 0, 10))
                        {
                            $possible++;
                        } else
                        {
                            $int_test_date = intval(substr($paired_reservation->date, 11, 2));
                            $int_reservation_date = intval(substr(request('time'), 0, 2));

                            // Check of de gekoppelde reservering gelijk staat aan de nieuwe reservering (minder en meer dan 2 uur er vanaf
                            if (($int_test_date + 2) !== $int_reservation_date && ($int_test_date + 1) !== $int_reservation_date && ($int_test_date) !== $int_reservation_date && ($int_test_date - 1) !== $int_reservation_date && ($int_test_date - 2) !== $int_reservation_date)
                            {
                                $possible++;
                            }
                        }
                    }
                }

                // Check of alle koppelingen niet overlappen met de nieuwe reservering
                if ($possible == count($koppellingen))
                {
                    if ($available_table)
                    {
                        // Voegt de tafel toe aan de beschikbare tafels array
                        array_push($tables, $available_table);
                    }
                }
            }

            // Kijk of er tafels zijn, zo ja; stuur deze mee. Anders error.
            if (count($tables) > 0)
            {
                return view('/home/reservation', [
                    'tables' => $tables,
                    'button' => 'Reserveren',
                    'date' => request('date'),
                    'time' => request('time'),
                    'persons' => request('persons'),
                    'comment' => request('comment'),
                ]);
            } else
            {
                return view('/home/reservation', [
                    'successful' => false,
                    'button' => 'Reserveren',
                    'date' => request('date'),
                    'time' => request('time'),
                    'persons' => request('persons'),
                    'comment' => request('comment')
                ]);
            }
        else:
            // Genereer reserveringscode
            $reservation_code = str_replace('-', '', request('date'));

            if ($table < 10)
            {
                $reservation_code .= '0' . $table;
            } else
            {
                $reservation_code .= $table;
            }

            // Check beschikbaarheid van volgnummer
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

            // Velden
            $reservation->reservation_code = $reservation_code;
            $reservation->UserID = Auth::user()->id;
            $reservation->date = request('date') . ' ' . request('time');
            $reservation->duration = 120;
            $reservation->guest_amount = request('persons');
            $reservation->comment = request('comment');
            $reservation->save();

            $tableReservation->table_id = $table;
            $tableReservation->reservation_code = $reservation_code;
            $tableReservation->save();

            // Succesvolle view
            return view('/home/reservation', [
                'successful' => true,
                'button' => 'Check beschikbaarheid'
            ]);
        endif;
    }

    /**
     * Verwijderd een specifieke reservering en zijn gekoppelde tafels.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy()
    {
        // Query van reservering en zijn koppelingen verwijderen
        TableReservation::where('reservation_code', request('reservering'))->delete();
        Reservation::where('reservation_code', request('reservering'))->delete();

        // Als het het persoonlijke account is, redirect hij naar profiel. Anders naar klanten pagina.
        if (!empty(request('user')))
        {
            return redirect('/beheer/klanten/' . request('user'));
        }

        return redirect('/profiel');
    }
}
