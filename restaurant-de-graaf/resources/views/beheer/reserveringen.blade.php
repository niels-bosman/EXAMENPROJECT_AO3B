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
        <div class="col-md-3 profiel__input" style="display: flex; flex-direction: column">
            @if(isset($_GET['datum']) || isset($_GET['week']))
                <label for="#" style="opacity: 0">Opheven</label>
                <a href="/beheer/reserveringen" class="button button--primary">Filters opheffen</a>
            @endif
        </div>
    </div>
    <table class="table table-hover">
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
                <td style="display: flex">
                    <a href="/beheer/reserveringen/{{$reservation->reservation_code}}" class="button button--primary button--flex" style="margin-right: 5px;"><i class="fas fa-pen" aria-hidden="true"></i></a>
                    <a class="button button--danger profiel__remove-account-button button--flex" data-id="{{$reservation->reservation_code}}" href="#"><i class="fas fa-trash-alt"></i></a>
                    <div class="profiel__remove-modal-background profiel__remove-modal-disable" data-id="{{$reservation->reservation_code}}"></div>
                    <form method="post" class="profiel__remove-modal" action="/beheer/reserveringen/{{$reservation->reservation_code}}" data-id="{{$reservation->reservation_code}}">
                        <input type="hidden" name="id" value="{{$reservation->reservation_code}}">
                        <div class="modal-header">
                            <h5 class="modal-title">Weet je zeker dat je reservering {{$reservation->reservation_code}} wilt verwijderen? Dit kan niet meer terug gezet worden.</h5>
                            <button type="button" class="close profiel__remove-modal-disable">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="profiel__remove-modal-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Ik ben geen robot
                                        <input type="checkbox" required>
                                    </label>
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="button button--danger float-right">Reservering verwijderen</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
</div>

