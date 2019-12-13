@extends('../layouts.app')

@section('title', 'Neem contact op | Restaurant de Graaf')

@section('header')

@endsection

@section('content')
    <div class="contact container">
        <div class="row contact__heading">
            <div class="col-md-12">
                <h1>Neem contact met ons op</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="/contact">
                    @csrf
                    <div class="form-group row" style="max-width: 400px">
                        <div class="col-md-12">
                            <label for="form--subject">Onderwerp</label>
                            <input id="form--subject" type="text" class="form-control" name="subject" required placeholder="Onderwerp">
                        </div>
                    </div>
                    <div class="form-group row" style="max-width: 800px">
                        <div class="col-md-12">
                            <label for="form-content">Uw bericht</label>
                            <textarea id="form-content" rows="10" cols="30" class="form-control" required placeholder="Geachte heer/mevrouw van restaurant de graaf,"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-12">
                            <button type="submit" class="button--left content__button--center button--primary">
                                Verstuur
                            </button>
                        </div>
                    </div>
                </form>
                <hr style="padding: 25px 0">
            </div>
            <div class="col-md-6">
                <div class="col-md-12">
                    <h2 class="contact--h2">Kom bij ons langs</h2>
                    <div class="contact--adress">
                        <h6 class="contact--adress contact--h3"><b>Restaurant de Graaf</b></h6>
                        <p>J.F. Kennedylaan 49<br>7001 EA<br>Doetinchem</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-md-12">
                    <h2 class="contact--h2">Openingstijden</h2>
                    <div class="contact--adress">
                        <p>
                            Maandag:   12:00 - 20:00<br>
                            Dinsdag:   12:00 - 20:00<br>
                            Woensdag:  12:00 - 20:00<br>
                            Donderdag: 12:00 - 20:00<br>
                            Vrijdag:   12:00 - 20:00<br>
                            Zaterdag:  12:00 - 22:00<br>
                            Zondag:    12:00 - 22:00
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact--iframe">
        <iframe width="100%" height="300" src="https://maps.google.com/maps?width=100%&height=600&hl=nl&q=J.F.%20kennedylaan%2049+(Restaurant%20de%20graaf)&ie=UTF8&t=&z=14&iwloc=B&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
            <a href="https://www.mapsdirections.info/nl/maak-een-google-map/">Maak een Google Map</a>
            van
            <a href="https://www.mapsdirections.info/nl/">
                Nederland Kaart
            </a>
        </iframe>
    </div>
    <br/>
@endsection
