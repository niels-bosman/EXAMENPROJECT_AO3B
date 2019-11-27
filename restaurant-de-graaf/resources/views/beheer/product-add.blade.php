@extends('layouts.app')

@section('title', 'Product toevoegen | Restaurant de Graaf')

@section('content')
    <div class="profiel container">
        <h1 class="profiel__heading">Nieuw product toevoegen</h1>
        <div class="card profiel__card">
            <form method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 profiel__input">
                        <label for="name">Naam</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>

                    <div class="col-md-6 profiel__input">
                        <label for="type">Subtype</label>
                        <select name="type" id="type" class="form-control" required>
                            @foreach(App\Subtype::all() as $subtype)
                                @if($loop->first)
                                    <option value="{{$subtype->id}}" selected>{{$subtype->name}}</option>
                                @else
                                    <option value="{{$subtype->id}}">{{$subtype->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 profiel__input">
                        <label for="price">Prijs</label>
                        <input type="number" id="price" name="price" class="form-control" pattern="[0-9]+([\.,][0-9]+)?" step="0.01" required>
                    </div>

                    <div class="col-md-6 profiel__input">
                        <label for="enabled">Staat op menukaart</label>
                        <select name="enabled" id="enabled" class="form-control" required>
                            <option value="1" selected>Ja</option>
                            <option value="0">nee</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="robot">Ik ben geen robot</label>&nbsp;<input type="checkbox" id="robot" name="robot" required>
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="button float-right button--primary">Toevoegen</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
