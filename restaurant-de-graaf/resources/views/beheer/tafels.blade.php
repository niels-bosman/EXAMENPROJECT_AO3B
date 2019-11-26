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
                    <td><?php echo $table->reservable == 1 ? "Ja" : "Nee"; ?></td>
                    <td>
                        <a href="tafels/{{$table->table_id}}" class="button button--primary button--primary--small"><i class="fas fa-pen" aria-hidden="true"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
