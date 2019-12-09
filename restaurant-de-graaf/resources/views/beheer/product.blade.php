@extends('layouts.app')

@section('title', 'Productoverzicht | Restaurant de Graaf')

@section('content')
    <div class="beheer container">
        <h1 class="beheer__heading">Productoverzicht</h1>

        <a href="/beheer/producten/new" class="button button--primary float-right" style="margin-bottom: 30px;">Product toevoegen&nbsp;<i class="fas fa-plus"></i></a>
        <table class="table table-hover">
            <tr>
                <th>Naam</th>
                <th>Prijs</th>
                <th>Gerechttype</th>
                <th></th>
            </tr>
            {{-- Loopt door alle producten --}}
            @foreach($products as $product)
                <tr>
                    <td class="{{$product->enabled == 0 ? 'disabled' : ''}}">{{$product->name}}</td>
                    <td class="{{$product->enabled == 0 ? 'disabled' : ''}}">€ <?php echo number_format($product->price, 2, ',', '.') ?></td>
                    <td class="{{$product->enabled == 0 ? 'disabled' : ''}}">{{\App\Subtype::where('id', $product->subtype)->get()[0]->name}}</td>
                    <td>
                        <a href="/beheer/producten/{{$product->id}}" class="button button--primary button--primary--small"><i class="fas fa-pen"></i></a>

                        {{-- Toggled of het een add of delete knop is --}}
                        @if($product->enabled == 1)
                            <form method="POST" style="display: inline">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <input type="hidden" name="enabled" value="{{$product->enabled}}">
                                <button type="submit" class="button button--danger" title="Deactiveren">
                                    <i class="fas fa-trash-alt"></i></button>
                            </form>
                        @else
                            <form method="POST" style="display: inline">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="hidden" name="id" value="{{$product->id}}">
                                <input type="hidden" name="enabled" value="{{$product->enabled}}">
                                <button type="submit" class="button button--positive" title="Toevoegen">
                                    <i class="fas fa-plus"></i></button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

@if(isset($putSuccess))
    @if($putSuccess == true)
        <div class="alert alert-success reservation__alert" role="alert">
            {{$msg}}
            <button type="button" class="close reservation__alert-close">
                <span>&times;</span>
            </button>
        </div>
    @endif
@endif
