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
                        <form method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input hidden required value="{{$user->id}}" name="userID">
                            <button type="submit" class="button button--soft"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        <form method="post" >
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input hidden required value="{{$user->id}}" name="userID">
                            @if($user->blocked == 0)
                                <button type="submit" class="button button--danger"><i class="fas fa-ban"></i></button>
                               @else
                                <button type="submit" class="button button--danger"><i class="fas fa-unlock"></i></button>
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
