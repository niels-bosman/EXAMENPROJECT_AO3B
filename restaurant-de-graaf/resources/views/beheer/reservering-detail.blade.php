@extends('layouts.app')

@section('title', 'Reservering | Restaurant de Graaf')

@section('content')
    <div class="profiel container">
        <h1 class="profiel__heading">Reservering {{$reservation->reservation_code}}</h1>
        <div class="card profiel__card">
            <form method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="row">
                    <div class="col-md-6 profiel__input">
                        <label for="reservation_code">Reserveringscode</label>
                        <input type="text" id="reservation_code" name="reservation_code" class="form-control" value="{{$reservation->reservation_code}}" readonly required>
                        @error('reservation_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6 profiel__input">
                        <label for="user">Klant</label>
                        <input type="text" id="user" class="form-control" value="{{\App\User::where('id',$reservation->UserID)->first()->name}} ({{$reservation->UserID}})" readonly required>
                        @error('user')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6 profiel__input">
                        <label for="date">Reserveringsdatum</label>
                        <input type="date" id="date" name="date" class="form-control" required readonly value="{{substr($reservation->date, 0, -9)}}">
                        @error('date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6 profiel__input">
                        <label for="time">Reserveringstijd</label>
                        <input type="time" id="time" name="time" class="form-control" required readonly value="{{substr($reservation->date, 11)}}">
                        @error('time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6 profiel__input">
                        <label for="duration">Reservering duur (minuten)</label>
                        <input type="number" id="duration" name="duration" class="form-control" value="{{$reservation->duration}}" required step="15">
                        @error('duration')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6 profiel__input">
                        <label for="guests">Gasten</label>
                        <input type="number" id="guests" name="guests" class="form-control" value="{{$reservation->guest_amount}}" required>
                        @error('guests')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-12 profiel__input">
                        <label for="comment">Opmerkingen</label>
                        <textarea id="comment" name="comment" class="form-control">{{$reservation->comment}}</textarea>
                        @error('comment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="robot">Ik ben geen robot</label>&nbsp;<input type="checkbox" id="robot" name="robot" required>
                        @error('robot')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="button float-right button--primary">Wijzigen</button>
                    </div>
                </div>
            </form>
        </div>
        <div id="registraties">
            <div class="duo-heading">
                <h2>Bestellingen</h2>
                <a href="/beheer/reserveringen/{{$reservation->reservation_code}}/bestellingen/add" class="button button--primary">Bestelling toevoegen&nbsp;<i class="fas fa-plus" aria-hidden="true"></i></a>
            </div>

            <table class="table table-hover">
                <tr>
                    <th>Product</th>
                    <th>Prijs</th>
                    <th>Hoeveelheid</th>
                    <th>Totaalprijs</th>
                    <th></th>
                </tr>

                <?php $prices = array(); ?>
                @foreach(\App\ReservationProduct::where('reservation_code', $reservation->reservation_code)->get() as $reservationProduct)
                    <tr>
                        <?php
                        $name = \App\Product::where('id', $reservationProduct->product_id)->first()->name;
                        $price = \App\Product::where('id', $reservationProduct->product_id)->first()->price;
                        $amount = $reservationProduct->amount;
                        $totaal = ($price * $amount);
                        ?>

                        <td>{{$name}}</td>
                        <td>&euro; {{$price}}</td>
                        <td>{{$amount}}</td>
                        <td>&euro; {{$totaal}}</td>
                        <td>
                            <form method="post">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="koppel_id" value="{{$reservationProduct->id}}">
                                <button type="submit" class="button button--danger" title="Verwijderen">
                                    <i class="fas fa-trash"></i></button>
                            </form>
                        </td>

                        <?php array_push($prices, $totaal); ?>
                    </tr>
                @endforeach

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><b>&euro; {{array_sum($prices)}}</b></td>
                </tr>
            </table>
        </div>

    </div>

    @if(isset($putSuccess))
        @if($putSuccess == true)
            <div class="alert alert-success reservation__alert" role="alert">
                De gegevens zijn succesvol gewijzigd!
                <button type="button" class="close reservation__alert-close">
                    <span>&times;</span>
                </button>
            </div>
        @endif
    @endif
@endsection

