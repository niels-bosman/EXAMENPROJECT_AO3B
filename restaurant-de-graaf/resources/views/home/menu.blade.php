@extends('../layouts.app')

@section('title', 'Menu | Restaurant de Graaf')

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
                            @if($product->enabled == 0)
                                @continue
                            @endif
                            <div class="menukaart__product-row">
                                <article class="menukaart__product">
                                    <div class="menukaart__product-name">
                                        <span>{{$product->name}}</span>
                                    </div>
                                    <div class="menukaart__product-price">
                                        <span>&euro; {{$product->price}}{{strpos($product->price, '.') ? '' : '.00' }}</span>
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
