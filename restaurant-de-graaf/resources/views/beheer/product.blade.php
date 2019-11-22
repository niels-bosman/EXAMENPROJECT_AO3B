@extends('layouts.app')

@section('title', 'Beheer | Restaurant de Graaf')
<?php use App\Subtype; ?>
@section('content')
    <div class="beheer container">
        <h1 class="beheer__heading">Productenoverzicht</h1>

        <table class="table table-hover">
            <tr>
                <th>Naam</th>
                <th>Prijs</th>
                <th>Gerechttype</th>
                <th></th>
            </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{Subtype::where('id', $product->subtype)->get()[0]->name}}</td>
                    <td>
                        <a href="" class="button button--danger"><i class="fas fa-trash-alt"></i></a>
                        <a href="" class="button button--primary"><i class="fas fa-ban"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
