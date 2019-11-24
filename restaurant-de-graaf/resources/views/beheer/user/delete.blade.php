@extends('layouts.app')

@section('title', 'Beheer | Restaurant de Graaf')

@section('content')
<div class="beheer container">
    <h3 class="beheer__heading text-center">Weet je zeker dat je het account van {{$user->name}} wilt opzeggen?</h3>
    <div class="beheer__button-container">
        <div class="beheer__button-button">
            <form method="post" action="/beheer/gebruikers/{{$user->id}}/delete">
                {{ csrf_field() }}
                {{ method_field('POST') }}
                <button type="submit" class="button button--soft">Annuleer</button>
            </form>
        </div>
        <div class="beheer__button-button">
            <form method="post" action="/beheer/gebruikers/{{$user->id}}/delete">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <button type="submit" class="button button--primary">Account blokkeren</button>
            </form>
        </div>
        <div class="beheer__button-button">
            <form method="post" action="/beheer/gebruikers/{{$user->id}}/delete">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="button button--danger">Account verwijderen</button>
            </form>
        </div>
    </div>
    </form>
</div>
@endsection
