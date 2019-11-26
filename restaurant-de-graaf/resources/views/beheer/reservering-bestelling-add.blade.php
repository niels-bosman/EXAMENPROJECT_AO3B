@extends('layouts.app')

@section('title', 'Reservering | Restaurant de Graaf')

@section('content')
    <div class="profiel container">
        <h1 class="profiel__heading">Bestelling toevoegen ({{$reservation->reservation_code}})</h1>
        <div class="card profiel__card">
            <form method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 profiel__input">
                        <label for="product">Product</label>
                        <select name="product" id="product" class="form-control">
                            @foreach(\App\Product::all() as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                        @error('product')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6 profiel__input">
                        <label for="amount">Hoeveelheid</label>
                        <input type="number" id="amount" name="amount" class="form-control" min="0" max="100" value="1" step="1" required>
                        @error('amount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="robot">Ik ben geen robot</label>&nbsp;<input type="checkbox" id="robot" name="robot" required>
                    </div>

                    <div class="col-md-6">
                        <button type="submit" class="button float-right button--primary">Product toevoegen</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

    @if(isset($putSuccess))
        @if($putSuccess == true)
            <div class="alert alert-success reservation__alert" role="alert">
                De gegevens zijn succesvol gewijzigd!
                <button type="button" class="close reservation__alert-close">
                    <span>&times;</span>
                </button>
            </div>
        @endif
    @endif
@endsection

