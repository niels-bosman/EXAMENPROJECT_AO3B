@extends('../layouts.app')

@section('title', 'Contact | Restaurant de Graaf')

@section('header')

@endsection

@section('content')
<div class="contact container">
    <div class="row contact__heading">
        <div class="col-md-12">
            <h1>Neem contact met ons op</h1>
            <p>Als u vragen heeft of onduidelijkheden, kunt u contact opnemen bij de onderste 3 opties</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h2 class="text-center contact--h2">Email</h2>
            <form method="POST" action="/contact">
                @csrf
                <div class="form-group row">
                    <div class="col-md-12">
                        <input id="form--subject" type="text" class="form-control" name="subject" required placeholder="Onderwerp">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <textarea id="form-content" rows="10" cols="30" class="form-control" required></textarea>
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
        </div>
        <div class="col-md-6">
            <div class="col-md-12">
                <h2 class="text-center contact--h2">Telefonisch</h2>
                <div class="contact--telephone">
                    <h4 class="contact--h3">(06) 52 54 12 36 </h4>
                </div>
            </div>
            <div class="contact--space">
                <hr>
            </div>
            <div class="col-md-12">
                <h2 class="text-center contact--h2">Of kom bij ons langs</h2>
                <div class="contact--adress">
                    <h4 class="contact--adress contact--h3">Restaurant de Graaf</h4>
                    <p>J.F. Kennedylaan 49<br>7001 EA<br>Doetinchem</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <iframe width="100%" height="600" src="https://maps.google.com/maps?width=100%&height=600&hl=nl&q=J.F.%20kennedylaan%2049+(Restaurant%20de%20graaf)&ie=UTF8&t=&z=14&iwloc=B&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
        <a href="https://www.mapsdirections.info/nl/maak-een-google-map/">Maak een Google Map</a>
        van
        <a href="https://www.mapsdirections.info/nl/">
            Nederland Kaart
        </a>
    </iframe>
</div>
<br />
@endsection
