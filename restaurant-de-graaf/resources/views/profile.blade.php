@extends('layouts.app')

@section('title', 'Profiel')

@section('content')
    <div class="hero" style="background-image: url('https://images.pexels.com/photos/696218/pexels-photo-696218.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');"></div>
    <div class="content">
        <h1 class="content__title">Profiel!</h1>
        <p class="content__paragraph">Reserveer voor lunch of diner, hiervoor heb je een account nodig zodat je altijd gemakkelijk je reserveringen en bestellingen in kan zien!</p>
        <a class="content__button--center button--primary" href="">Reserveer nu</a>
    </div>
    <div class="menu">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Onze gerechten</h2>
                    <p>Onze maaltijden zijn gemaakt met de hoogste kwaliteit en zorg. Elk seizoen wordt het menu anders en kun je lekker afwisselen met de maaltijden, daarmee kun je de kinderen steeds opnieuw verrassen. </p>
                    <a class="menu__button button--primary" href="">Bekijk ons menu</a>
                </div>
                <div class="col-md-6">
                    <img class="menu__img" src="https://images.pexels.com/photos/1267320/pexels-photo-1267320.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection