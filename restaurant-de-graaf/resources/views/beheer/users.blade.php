@extends('layouts.app')

@section('title', 'Beheer | Restaurant de Graaf')

@section('content')
    <div class="beheer container">
        <h1 class="beheer__heading">Gebruikersoverzicht</h1>

        <table class="table table-hover">
            <tr>
                <th>Naam</th>
                <th>Emailadres</th>
                <th>Telefoonnummer</th>
                <th></th>

            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->tel_number}}</td>
                    <td>
                        <a href="" class="button button--danger"><i class="fas fa-trash-alt"></i></a>
                        <a href="" class="button button--primary"><i class="fas fa-ban"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
