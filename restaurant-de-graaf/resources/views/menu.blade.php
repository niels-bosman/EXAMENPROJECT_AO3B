@extends('../layouts.app')

@section('title', 'Menu')

@section('header')

@endsection

<?php
use App\Subtype;
use App\Product;
?>

@section('content')
    <div class="menukaart container">
        <h1 class="menukaart__heading">Ons menu</h1>
        <div class="menukaart__menu">

            @foreach($types as $type)
                <h2 class="menukaart__type">{{$type->name}}</h2>

                @foreach(App\Subtype::where('type_id', $type->id)->get() as $subtype)
                    <h4 class="menukaart__subtype">{{$subtype->name}}</h4>

                    <div class="menukaart__single-product">
                        @foreach(App\Product::where('subtype', $subtype->id)->get() as $product)
                            <div class="menukaart__product-row">
                                <article class="menukaart__product">
                                    <div class="menukaart__product-name">
                                        {{$product->name}}
                                    </div>
                                    <div class="menukaart__product-price">
                                        &euro; {{$product->price}}
                                    </div>
                                </article>
                                <hr>
                            </div>

                        @endforeach
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection
