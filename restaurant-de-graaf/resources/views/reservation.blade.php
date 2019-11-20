@extends('../layouts.app')

@section('title', 'Reserveren')

@section('header')

@endsection

@section('content')
    <div class="reservation container">
        @if(isset($successful))
            @if($successful == true)
                <div class="alert alert-success reservation__alert" role="alert">
                    Je reservering is succesvol geplaatst! Ga naar je profiel voor een overzicht van je reserveringen.
                    <button type="button" class="close reservation__alert-close">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            @if($successful == false)
                    <div class="alert alert-warning reservation__alert" role="alert">
                        Oeps! Er zijn geen tafels meer beschikbaar voor je gekozen datum en tijd. Misschien er nog op een ander moment een plek beschikbaar is.
                        <button type="button" class="close reservation__alert-close">
                            <span>&times;</span>
                        </button>
                    </div>
            @endif
        @endif
        <h1 class="reservation__heading">Reserveren</h1>
        <div class="reservation__fields">
            <form action="/reserveren" method="POST">
                @csrf
                <div class="row reservation__field">
                    <div class="col-md-12">
                        <label for="date">Op welke datum wilt u reserveren?</label>
                    </div>
                    <div class="col-md-12">
                        <input id="date" name="date" value="{{ date('Y-m-d') }}" type="date" min="{{ date('Y-m-d') }}" required>
                    </div>
                </div>

                <div class="row reservation__field">
                    <div class="col-md-12">
                        <label for="time">Hoe laat wilt u reserveren?</label>
                    </div>
                    <div class="col-md-12">
                        <input id="time" name="time" type="time" required>
                    </div>
                </div>

                <div class="row reservation__field">
                    <div class="col-md-12">
                        <label for="number">Met hoe veel personen komt u?</label>
                    </div>
                    <div class="col-md-12">
                        <input id="number" value="1" name="persons" min="1" max="8" type="number" required>
                    </div>
                </div>

                <div class="row reservation__field">
                    <div class="col-md-12">
                        <label for="comment">Heeft u nog een opmerking? (dieetwensen etc.)</label>
                    </div>
                    <div class="col-md-12">
                        <textarea id="comment" name="comment"></textarea>
                    </div>

                </div>
                <div class="row reservation__field">
                    <div class="col-md-12">
                        <button class="button button--primary" type="submit">Reserveren</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
