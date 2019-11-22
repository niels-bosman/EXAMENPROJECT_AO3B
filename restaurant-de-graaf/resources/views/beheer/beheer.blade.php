@extends('layouts.app')

@section('title', 'Beheer | Restaurant de Graaf')

@section('content')
    <div class="beheer container">
        <h1 class="profiel__heading">Beheer</h1>
        <div class="row">
            <div class="col-md-6 card-container scale-animation">
                <div class="card beheer__card pointer border-top">
                    <a href="/beheer/gebruikers">
                        <div class="row height-150">
                            <div class="col-9 card-content-admin">
                                <h3>Gebruikers</h3>
                            </div>
                            <div class="col-3 icon-container">
                                <h1 class="icon-large"><i class="fa fa-users"></i></h1>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6 card-container scale-animation">
                <div class="card beheer__card pointer border-top">
                    <a href="/beheer/reserveringen">
                        <div class="row height-150">
                            <div class="col-9 card-content-admin">
                                <h3>Reserveringen</h3>
                            </div>
                            <div class="col-3 icon-container">
                                <h1 class="icon-large"><i class="fa fa-clipboard"></i></h1>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 card-container scale-animation">
                <div class="card beheer__card pointer border-top">
                    <a href="/beheer/producten">
                        <div class="row height-150">
                            <div class="col-9 card-content-admin">
                                <h3>Producten</h3>
                            </div>
                            <div class="col-3 icon-container">
                                <h1 class="icon-large"><i class="fas fa-utensils"></i></h1>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6 card-container scale-animation">
                <div class="card beheer__card pointer border-top">
                    <a href="/beheer/tafels">
                        <div class="row height-150">
                            <div class="col-9 card-content-admin">
                                <h3>Tafels</h3>
                            </div>
                            <div class="col-3 icon-container">
                                <h1 class="icon-large"><i class="fa fa-chair"></i></h1>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
