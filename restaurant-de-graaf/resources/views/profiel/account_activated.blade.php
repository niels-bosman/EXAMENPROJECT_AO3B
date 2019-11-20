@extends('layouts.app')

@section('title', 'Het account is geactiveerd')

@section('header')

@endsection

@section('content')
    <div class="login container">
        <h1 class="login__heading">Uw account is geactiveerd!</h1>
        <h3 class="text-center">U kunt nu uw account gebruiken</h3>
        <a class="go-back content__button--center button--primary" style='margin: 30px auto -30px auto' href="{{ url('/') }}">ga naar profiel</a>
    </div>
@endsection
