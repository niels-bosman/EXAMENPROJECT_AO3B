@extends('../layouts.app')

@section('title', 'Reserveren')

@section('header')

@endsection

@section('content')
    <div class="reservation container">
        <h1 class="reservation__heading">Reserveer nu</h1>
        <div class="reservation__fields">
            <form action="">
                <div class="row reservation__field">
                    <div class="col-md-12">
                        <label for="date">Op welke datum wilt u reserveren?</label>
                    </div>
                    <div class="col-md-12">
                        <input id="date" type="date" required>
                    </div>
                </div>

                <div class="row reservation__field">
                    <div class="col-md-12">
                        <label for="time">Hoe laat wilt u reserveren?</label>
                    </div>
                    <div class="col-md-12">
                        <input id="time" type="time" required>
                    </div>
                </div>

                <div class="row reservation__field">
                    <div class="col-md-12">
                        <label for="number">Met hoe veel personen komt u?</label>
                    </div>
                    <div class="col-md-12">
                        <input id="number" type="number" required>
                    </div>
                </div>
            </form>
        </div>
        <div class="row reservation__field">
            <div class="col-md-12">
                <button class="button button--primary" type="submit">Reserveren</button>
            </div>
        </div>
    </div>
@endsection
