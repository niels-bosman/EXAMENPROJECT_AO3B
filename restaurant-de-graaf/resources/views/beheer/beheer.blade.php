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


{{--    <div class="hero" style="background-image: url('https://images.pexels.com/photos/1581554/pexels-photo-1581554.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');"></div>--}}
{{--    <div class="content">--}}
{{--        <h1 class="content__title">Reserveer nu</h1>--}}
{{--        <p class="content__paragraph">Reserveer voor lunch of diner, hiervoor heb je een account nodig zodat je altijd gemakkelijk je reserveringen en bestellingen in kan zien!</p>--}}
{{--        <a class="content__button--center button--primary" href="/reserveren">Reserveer nu</a>--}}
{{--    </div>--}}
{{--    <div class="menu">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-6">--}}
{{--                    <h2>Hoogwaardige ingredienten</h2>--}}
{{--                    <p>Onze maaltijden zijn gemaakt met de hoogste kwaliteit en zorg. Elk seizoen wordt het menu anders en kun je lekker afwisselen met de maaltijden, daarmee kun je de kinderen steeds opnieuw verrassen. </p>--}}
{{--                    <a class="menu__button button--primary" href="/menu">Bekijk ons menu</a>--}}
{{--                </div>--}}
{{--                <div class="col-md-6">--}}
{{--                    <img class="menu__img" src="https://images.pexels.com/photos/1756061/pexels-photo-1756061.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
