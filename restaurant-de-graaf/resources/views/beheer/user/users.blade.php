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
            <td><a href="gebruikers/{{ $user->id }}" class="header__menu-item">{{$user->name}}</a></td>
            <td><a href="gebruikers/{{ $user->id }}" class="header__menu-item">{{$user->email}}</a></td>
            <td><a href="gebruikers/{{ $user->id }}" class="header__menu-item">{{$user->tel_number}}</a></td>
            @if($user->id != $auth->id)
            <td>
                <a class="button button--danger profiel__remove-account-button" href="/beheer/gebruikers/{{$user->id}}/delete"><i class="fas fa-trash-alt"></i></a>
                <a class="button button--primary" href="/beheer/gebruikers/{{$user->id}}/block"><i class="fas fa-ban"></i></a>
            </td>
            @endif
        </tr>
        @endforeach
    </table>
</div>
@endsection
