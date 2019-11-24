@extends('layouts.app')

@section('title', 'Beheer | Restaurant de Graaf')

@section('content')
<div class="beheer container">
    <h1 class="beheer__heading">Weet je zeker dat je het account van {{$user->name}} wilt opzeggen?</h1>
    <form method="post" class="text-center">
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div>
            <div class="row">
                <div class="col-md-7">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="button button--danger float-right">Account opzeggen</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
