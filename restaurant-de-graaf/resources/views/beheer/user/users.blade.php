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
            <td>

            <a href="gebruikers/{{ $user->id }}" class="header__menu-item @if($user->blocked == 1) button--block @endif">{{$user->name}}</a>
            </td>
            <td><a href="gebruikers/{{ $user->id }}" class="header__menu-item @if($user->blocked == 1) button--block @endif">{{$user->email}}</a></td>
            <td><a href="gebruikers/{{ $user->id }}" class="header__menu-item @if($user->blocked == 1) button--block @endif">{{$user->tel_number}}</a></td>
            @if($user->id != $auth->id)
            <td>
                <a class="button button--danger profiel__remove-account-button" href="/beheer/gebruikers/{{$user->id}}/delete"><i class="fas fa-trash-alt"></i></a>
                @if($user->blocked == 0)
                <a class="button button--primary" href="/beheer/gebruikers/{{$user->id}}/block"><i class="fas fa-ban"></i></a>
                @else
                <a class="button button--deblock" href="/beheer/gebruikers/{{$user->id}}/block"><i class="fas fa-unlock-alt"></i></i></a>
                @endif
            </td>
            @endif
        </tr>
        @endforeach
    </table>
</div>
@endsection
