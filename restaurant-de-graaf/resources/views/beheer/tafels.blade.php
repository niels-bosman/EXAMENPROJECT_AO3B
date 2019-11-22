@extends('layouts.app')

@section('title', 'Beheer | Restaurant de Graaf')

@section('content')
    <div class="beheer container">
        <h1 class="beheer__heading">Tafeloverzicht</h1>

        <table class="table table-hover">
            <tr>
                <th>Tafelnummer</th>
                <th>Zitplaatsen</th>
                <th>Minimaal aantal personen</th>
                <th>Reserveerbaar</th>
                <th></th>

            </tr>
            @foreach($tables as $table)
                <tr>
                    <td>{{$table->table_id}}</td>
                    <td>{{$table->seats}}</td>
                    <td>{{$table->minimum_guests}}</td>
                    <td>{{$table->reservable}}</td>
                    <td>
                        <a href="" class="button button--danger"><i class="fas fa-edit"></i></a>
                        <a href="" class="button button--soft"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
