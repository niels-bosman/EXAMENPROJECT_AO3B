@extends('../layouts.app')

@section('title', 'Reserveren | Restaurant de Graaf')

@section('header')

@endsection

@section('content')
    <div class="reservation container">
        @if(isset($successful))
            @if($successful)
                <div class="alert alert-success reservation__alert" role="alert">
                    De reservering is succesvol geplaatst!
                    <button type="button" class="close reservation__alert-close">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            @if(!$successful)
                <div class="alert alert-warning reservation__alert" role="alert">
                    Oeps! Er zijn geen tafels meer beschikbaar voor de gekozen datum en tijd. Misschien er nog op een ander moment een plek beschikbaar is.
                    <button type="button" class="close reservation__alert-close">
                        <span>&times;</span>
                    </button>
                </div>
            @endif
        @endif
        <h1 class="reservation__heading">Reserveren</h1>
        <div class="reservation__fields">
            <form action="/beheer/reserveren/new" method="POST">
                @csrf
                <div class="row reservation__field">
                    <div class="col-md-12">
                        <label for="date">Op welke datum is de reserveren?</label>
                    </div>
                    <div class="col-md-12">
                        <input id="date" name="date" value="<?php echo isset($date) ? $date : date('Y-m-d') ?>" <?php echo isset($date) ? 'readonly' : '' ?> type="date" min="{{ date('Y-m-d') }}" required>
                    </div>
                </div>

                <div class="row reservation__field">
                    <div class="col-md-12">
                        <label for="time">Hoelaat is de reserveren?</label>
                    </div>
                    <div class="col-md-12">
                        <?php
                        $hours = intval(date('H')) + 1;
                        $minutes = date('i');
                        ?>
                        <input id="time" value="<?php if(!isset($time)){echo $hours . ':' . $minutes;} ?><?php echo isset($time) ? $time : '' ?>" <?php echo isset($time) ? 'readonly' : '' ?> name="time" type="time" required>
                    </div>
                </div>

                <div class="row reservation__field">
                    <div class="col-md-12">
                        <label for="number">Met hoeveel personen komen ze?</label>
                    </div>
                    <div class="col-md-12">
                        <input id="number" value="<?php echo isset($persons) ? $persons : '1' ?>" <?php echo isset($persons) ? 'readonly' : '' ?> name="persons" min="1" type="number" required>
                    </div>
                </div>

                <div class="row reservation__field">
                    <div class="col-md-12">
                        <label for="comment">Opmerking? (dieetwensen etc.)</label>
                    </div>
                    <div class="col-md-12">
                        <textarea id="comment" <?php echo isset($comment) ? 'readonly' : '' ?> name="comment"><?php echo isset($comment) ? $comment : '' ?></textarea>
                    </div>

                    @if(isset($tables))
                        <div class="col-md-12 reservation__radio-buttons">
                            @foreach($tables as $table)
                                <div class="input__fields--radio">
                                    <input type="checkbox" id="table_{{$table->table_id}}" value="{{$table->table_id}}" name="table{{$table->table_id}}"
                                            @if(isset($selected))
                                                @if(in_array($table->table_id, $selected))
                                                    checked
                                                @endif
                                            @endif
                                    >
                                    <label for="table_{{$table->table_id}}">Tafel {{$table->table_id}} ({{$table->seats}} zitplaatsen)</label>
                                </div>
                            @endforeach
                        </div>
                        <input type="radio" name="table" checked hidden>
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
