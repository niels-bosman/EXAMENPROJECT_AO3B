@extends('layouts.app')

@section('title', 'Reserveringen | Restaurant de Graaf')




    <div class="container mt-5">
        <h3>Reserveringen</h3>
        <div class="row reservation__field">
            <div class="col-md-12">
                <label for="date">Dag van de reservering</label>
            <form method="get">
                <div class="col-md-12">
                    <input id="date" name="datum" value="<?php echo isset($date) ? $date : date('Y-m-d') ?>" <?php echo isset($date) ? 'readonly' : '' ?> type="date" required>
                    <button class="fas fa-search"></button>
                </div>
                @csrf
            </form>

                <label for="date">Week van de reservering</label>
                <form method="get">
                    <div class="col-md-12">
                        <input id="week" name="week" value="<?php echo isset($date) ? $date : date('Y-m-d') ?>" <?php echo isset($date) ? 'readonly' : '' ?> type="week" required>
                        <button class="fas fa-search"></button>
                    </div>
                    @csrf
                </form>

            </div>

        </div>
        <table class="table mt-5">
            <thead>
            <tr>
                <th scope="col">Reserverings code</th>
                <th scope="col">Datum</th>
                <th scope="col">Duur</th>
                <th scope="col">Commentaar</th>
                <th scope="col">Kosten</th>
                <th scope="col">Gasten</th>
                <th scope="col">Verwijder reservering</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->reservation_code}}</td>
                    <td>{{date("Y-m-d", strtotime($reservation->date))}}</td>
                    <td>{{ $reservation->duration }} minuten</td>
                    <td>{{ $reservation->comment }}</td>
                    <td> € {{ $reservation->payed_price }}</td>
                    <td>{{ $reservation->guest_amount }}</td>
                    <td><button class="fas fa-trash" name="delete"></button></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <hr>
    </div>

