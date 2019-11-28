@extends('layouts.app')

@section('title', $user->name . ' | Restaurant de Graaf')

@section('content')
<div class="profiel container">
    <h1 class="profiel__heading">Gegevens van {{$user->name}}</h1>
    <div class="card profiel__card">
        <form method="post">
            @csrf

            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="row">
                <div class="col-md-6 profiel__input">
                    <label for="input-name">Naam: </label>
                    <input type="text" id="input-name" class="form-control" name="name" required="required" value="{{$user->name}}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6 profiel__input">
                    <label for="input-street">Straatnaam: </label>
                    <input type="text" id="input-street" class="form-control" name="street" value="{{$user->street}}">
                    @error('street')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 profiel__input">
                    <label for="input-tel_number">Telefoonnummer: </label>
                    <input type="tel" id="input-tel_number" class="form-control" name="tel_number" required="required" value="{{$user->tel_number}}">
                    @error('tel_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6 profiel__input">
                    <label for="input-house_number">Huisnummer: </label>
                    <input type="number" id="input-house_number" class="form-control" name="house_number" value="{{$user->house_number}}">
                    @error('house_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 profiel__input">
                    <label for="input-email">Emailadres: </label>
                    <input type="email" id="input-email" class="form-control" name="email" required="required" value="{{$user->email}}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6 profiel__input">
                    <label for="input-city">Woonplaats: </label>
                    <input type="text" id="input-city" class="form-control" name="city" value="{{$user->city}}">
                    @error('city')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 profiel__input">
                    <label for="input-zipcode">Postcode: </label>
                    <input type="text" id="input-zipcode" class="form-control" name="zipcode" value="{{$user->zipcode}}">
                    @error('zipcode')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6 profiel__input">
                    <label for="input-password">Wachtwoord: </label>
                    <input type="password" id="input-password" class="form-control" name="password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                @if(\Illuminate\Support\Facades\Auth::user()->auth_level > 2)
                    <div class="col-md-6 profiel__input">
                        <label for="input-password">Authenticatie level: </label>
                        <select id="input-auth_level" class="form-control" name="auth_level">
                            <option value="1" @if($user->auth_level == 1) selected @endif>Klant</option>
                            <option value="2" @if($user->auth_level == 2) selected @endif>Personeel</option>
                            <option value="3" @if($user->auth_level == 3) selected @endif>Beheerder</option>
                        </select>
                        @error('auth_level')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                @endif
                <div class="col-md-6 @if(\Illuminate\Support\Facades\Auth::user()->auth_level < 3) offset-md-6 @endif profiel__spacing">
                    <button type="submit" class="button float-right button--primary">Wijzigen</button>
        </form>
    </div>
</div>
</div>

@if(isset($putSucces))
@if($putSucces == true)
<div class="alert alert-success reservation__alert" role="alert">
    Je gegevens zijn succesvol gewijzigd!
    <button type="button" class="close reservation__alert-close">
        <span>&times;</span>
    </button>
</div>
@endif
@endif

<div id="registraties">
    <h2>Reserveringen</h2>
    @if(count($reservations) <= 0) <p class="text-left">Er zijn helaas nog geen reserveringen op dit account</p>
        @endif
        @foreach($reservations as $reservation)
        <div class="card profiel__card profiel__card--less-margin">
            <h3>{{$reservation->reservation_code}}</h3>
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-4"><b>Datum:</b> {{date("Y-m-d", strtotime($reservation->date))}}
                        </div>
                        <div class="col-md-4">
                            <b>Tafelnummer(s):</b>

                            <?php $count = 0; ?>

                            @foreach($tables_reservations as $table)
                            @if($table->reservation_code == $reservation->reservation_code)
                            {{ $count == 0 ? '' : ', ' }}
                            {{ $table->table_id }}
                            <?php $count++; ?>
                            @endif
                            @endforeach
                        </div>
                        <div class="col-md-4"><b>Tijd:</b> {{date("H:i", strtotime($reservation->date))}}
                        </div>
                        <div class="col-md-4"><b>Duur:</b> {{$reservation->duration}} minuten</div>
                        <div class="col-md-4"><b>Personen:</b> {{$reservation->guest_amount}}</div>
                    </div>
                </div>
                <div class="col-md-2 float-right">
                    @if(new DateTime($reservation->date) <= new DateTime(date("Y-m-d H:i:s")))
                     <a href="/beheer/klanten/pdf/{{$reservation->reservation_code}}" target="_blank">Nota downloaden</a>
                        @else
                        <form action="/reservering" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="hidden" name="reservering" value="{{$reservation->reservation_code}}">
                            <input type="hidden" name="user" value="{{$reservation->UserID}}">
                            <button type="submit" class="button button--danger float-right">Annuleren</button>
                        </form>
                        @endif
                </div>
            </div>
        </div>
        @endforeach
</div>
@endsection
