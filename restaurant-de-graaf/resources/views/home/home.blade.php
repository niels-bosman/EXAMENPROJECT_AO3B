@extends('layouts.app')

@section('title', 'Home | Restaurant de Graaf')

@section('content')
    <div class="hero" style="background-image: url('https://images.pexels.com/photos/1581554/pexels-photo-1581554.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260');"></div>
    <div class="content">
        <h1 class="content__title">Reserveer nu</h1>
        <p class="content__paragraph">Reserveer voor lunch of diner, hiervoor heb je een account nodig zodat je altijd gemakkelijk je reserveringen en bestellingen in kan zien!</p>
        <a class="content__button--center button--primary" href="/reserveren">Reserveer nu</a>
    </div>
    <div class="menu">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Hoogwaardige ingredienten</h2>
                    <p>Onze maaltijden zijn gemaakt met de hoogste kwaliteit en zorg. Elk seizoen wordt het menu anders en kun je lekker afwisselen met de maaltijden, daarmee kun je de kinderen steeds opnieuw verrassen. </p>
                    <a class="menu__button button--primary" href="/menu">Bekijk ons menu</a>
                </div>
                <div class="col-md-6">
                    <img class="menu__img" src="https://images.pexels.com/photos/1756061/pexels-photo-1756061.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="content container">
        <h2 class="content__heading">Reviews</h2>
        <div class="row">
            @foreach(\App\Review::where('approved', 1)->take(2)->get() as $review)
                <div class="col-md-6">
                    <div class="card profiel__card profiel__card--nocenter">
                        <h2>{{$review->title}}</h2>
                        <p><i>"{{$review->text}}"</i></p>

                        <div class="stars">
                            @for($i = 0; $i <= $review->stars -1; $i++)
                                <i class="fas fa-star"></i>
                            @endfor

                            @if(is_float($review->stars))
                                <i class="fas fa-star-half-alt"></i>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
