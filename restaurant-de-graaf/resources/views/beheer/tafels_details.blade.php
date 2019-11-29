@extends('layouts.app')

@section('title', 'Tafel aanpassen | Restaurant de Graaf')

@section('content')
    <div class="profiel container">
        <h1 class="profiel__heading">Tafel {{$table->table_id}}</h1>
        <div class="card profiel__card">
            <form method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="row">
                    <div class="col-md-6 profiel__input">
                        <label for="input-tafelID">Tafelnummer</label>
                        <input type="number" id="input-tafelID" class="form-control" min="1" name="tafelnummer" required="required" value="{{$table->table_id}}">
                    </div>
                    <div class="col-md-6 profiel__input">
                        <label for="input-seats">Zitplaatsen</label>
                        <input type="number" id="input-seats" class="form-control" min="1" name="zitplaatsen" required="required" value="{{$table->seats}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 profiel__input">
                        <label for="input-min">Minimaal Aantal Personen</label>
                        <input type="number" id="input-min" class="form-control" min="0" name="minimum" required="required" value="{{$table->minimum_guests}}">
                    </div>
                    <div class="col-md-6 profiel__input">
                        <label for="input-reservable">Reserveerbaar</label>
                        <select id="input-reservable" class="form-control" name="reserveerbaar">
                            <option value="1"
                                    @if($table->reservable == true)
                                    selected="selected"
                                    @endif
                            >Ja
                            </option>
                            <option value="0"
                                    @if($table->reservable == false)
                                    selected="selected"
                                    @endif
                            >Nee
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 profiel__input">
                        <label for="checkbox">Ik ben geen robot</label>
                        <input id="checkbox" name=no-robot type="checkbox" required>
                    </div>
                    <div class="col-md-6 profiel__spacing">
                        <button type="submit" class="button float-right button--primary">Wijzigen</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
