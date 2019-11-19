@extends('../layouts.app')

@section('title', 'Reserveren')

@section('header')

@endsection

@section('content')
    <div class="reservation container">
        <h1 class="reservation__heading">Reserveren</h1>
        <div class="reservation__fields">
            <form action="/reserveren" method="POST">
                @csrf
                <div class="row reservation__field">
                    <div class="col-md-12">
                        <label for="date">Op welke datum wilt u reserveren?</label>
                    </div>
                    <div class="col-md-12">
                        <input id="date" name="date" type="date" required>
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
                        <input id="number" name="persons" min="1" max="8" type="number" required>
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
