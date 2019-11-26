@extends('layouts.app')

@section('title', 'Reserveringen | Restaurant de Graaf')


<div class="container profiel">
    <h1>Reserveringoverzicht</h1>

    <div class="row reservation__field" style="margin-top: 50px">

        <div class="col-md-3 profiel__input">
            <form method="get" style="display: flex;flex-direction: column;">
                <label for="date">Dag van de reservering</label>
                <div style="display: flex">
                    <input id="date" class="form-control" name="datum" value="<?php echo isset($date) ? $date : date('Y-m-d') ?>" <?php echo isset($date) ? 'readonly' : '' ?> type="date" required>
                    <button class="fas fa-search button button--primary button--primary--small" style="margin-left: 10px"></button>
                </div>
            </form>
        </div>

        <div class="col-md-3 profiel__input">
            <form method="get" style="display: flex;flex-direction: column">
                <label for="date">Week van de reservering</label>
                <div style="display: flex">
                    <input id="week" class="form-control" name="week" value="<?php echo isset($date) ? $date : date('Y-m-d') ?>" <?php echo isset($date) ? 'readonly' : '' ?> type="week" required>
                    <button class="fas fa-search button button--primary button--primary--small" style="margin-left: 10px"></button>
                </div>
            </form>
        </div>
    </div>
    <table class="table mt-5">
        <tr>
            <th scope="col">Reserveringsnummer</th>
            <th scope="col">Datum</th>
            <th scope="col">Duur</th>
            <th scope="col">Opmerking</th>
            <th scope="col">Betaald</th>
            <th scope="col">Gasten</th>
            <th scope="col"></th>
        </tr>

        @foreach ($reservations as $reservation)
            <tr>
                <td>{{$reservation->reservation_code}}</td>
                <td>{{date("Y-m-d", strtotime($reservation->date))}}</td>
                <td>{{$reservation->duration}} minuten</td>
                <td>{{$reservation->comment}}</td>
                @if($reservation->payed_price)
                    <td>&euro; {{ $reservation->payed_price }}</td>
                @else
                    <td></td>
                @endif
                <td>{{ $reservation->guest_amount }}</td>
                <form method="post" action="/beheer/reserveringen/{{$reservation->reservation_code}}">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <td>
                        <button type="submit" class="button button--danger" name="Verwijderen">
                            <i class="fas fa-trash-alt"></i></button>
                    </td>
                </form>
            </tr>
        @endforeach

    </table>

    <hr>
</div>

