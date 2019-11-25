@extends('layouts.app')

@section('title', 'Profiel | Restaurant de Graaf')

@section('content')
    <div class="profiel container">
        <h1 class="profiel__heading">Profiel</h1>
        <div class="card profiel__card">
            <form method="post">
                @csrf

                <input type="hidden" name="_method" value="PUT">
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
                    <div class="col-md-6 profiel__input">
                        <label for="checkbox">Ik ben geen robot</label>
                        <input id="checkbox" name="no-robot" type="checkbox" required>
                    </div>
                    <div class="col-md-6 profiel__spacing">
                        <button type="submit" class="button float-right button--primary">Wijzigen</button>
            </form>
            @if($only_admin > 2)
            <a class="button button--danger float-right profiel__remove-account-button" href="#">Account opzeggen</a>
            <div class="profiel__remove-modal-background profiel__remove-modal-disable"></div>
            <form method="post" class="profiel__remove-modal">
                <div class="modal-header">
                    <h5 class="modal-title">Weet je zeker dat je je account wilt opzeggen? Dit kan niet meer terug gezet worden.</h5>
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
                            <button type="submit" class="button button--danger float-right">Account opzeggen</button>
                        </div>
                    </div>
                </div>
            </form>
            @endif
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
        @if(count($reservations) <= 0)
            <p class="text-left">Er zijn helaas nog geen reserveringen op dit account</p>
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
                            <a href="#">Nota downloaden</a>
                        @else
                            <form action="/reservering" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="reservering" value="{{$reservation->reservation_code}}">
                                <button type="submit" class="button button--danger float-right">Annuleren</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
