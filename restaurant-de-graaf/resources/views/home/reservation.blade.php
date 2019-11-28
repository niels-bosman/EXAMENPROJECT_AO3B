@extends('../layouts.app')

@section('title', 'Reserveren | Restaurant de Graaf')

@section('header')

@endsection

@section('content')
    <div class="reservation container">
        @if(isset($successful))
            @if($successful)
                <div class="alert alert-success reservation__alert" role="alert">
                    Je reservering is succesvol geplaatst! Ga naar je profiel voor een overzicht van je reserveringen.
                    <button type="button" class="close reservation__alert-close">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            @if(!$successful)
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
                        <input id="date" name="date" value="<?php echo isset($date) ? $date : date('Y-m-d') ?>" <?php echo isset($date) ? 'readonly' : '' ?> type="date" min="{{ date('Y-m-d') }}" required>
                    </div>
                </div>

                <div class="row reservation__field">
                    <div class="col-md-12">
                        <label for="time">Hoelaat wilt u reserveren?</label>
                    </div>
                    <div class="col-md-12">
                        <input id="time" min="12:00" max="20:00" value="<?php echo isset($time) ? $time : '' ?>" <?php echo isset($time) ? 'readonly' : '' ?> name="time" type="time" required>
                    </div>
                </div>

                <div class="row reservation__field">
                    <div class="col-md-12">
                        <label for="number">Met hoeveel personen komt u?</label>
                    </div>
                    <div class="col-md-12">
                        <input id="number" value="<?php echo isset($persons) ? $persons : '1' ?>" <?php echo isset($persons) ? 'readonly' : '' ?> name="persons" min="1" max="8" type="number" required>
                    </div>
                </div>

                <div class="row reservation__field">
                    <div class="col-md-12">
                        <label for="comment">Heeft u nog een opmerking? (dieetwensen etc.)</label>
                    </div>
                    <div class="col-md-12">
                        <textarea id="comment" <?php echo isset($comment) ? 'readonly' : '' ?> name="comment"><?php echo isset($comment) ? $comment : '' ?></textarea>
                    </div>

                    @if(isset($tables))
                        <div class="col-md-12 reservation__radio-buttons">
                            @foreach($tables as $table)
                                <div class="input__fields--radio">
                                    <input type="radio" id="table_{{$table->table_id}}" @if($loop->first) checked="checked" @endif value="{{$table->table_id}}" name="table">
                                    <label for="table_{{$table->table_id}}">Tafel {{$table->table_id}} ({{$table->seats}} zitplaatsen)</label>
                                </div>
                            @endforeach
                        </div>
                    @endif

                </div>
                <div class="row reservation__field">
                    <div class="col-md-12">
                        <div class="buttons">
                            @if($button == 'Reserveren')
                                <a class="button button--soft" style="margin-right: 15px" href="/reserveren">Andere datum kiezen</a>
                            @endif
                            <button class="button button--primary" type="submit">{{$button}}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
