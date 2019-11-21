@extends('layouts.app')

@section('title', 'Het account is geblokkeerd')

@section('header')

@endsection

@section('content')
    <div class="login container">
        <h1 class="login__heading">Uw account is geblokkeerd!</h1>
        <p class="text-center">Reset uw wachtwoord om weer gebruik te kunnen maken van uw account</p>
        <div class="button--secondary">
            <a class="button--go-back content__button--center button--primary" href="{{ url('/password/reset') }}">Wachtwoord resetten</a>
        </div>
    </div>
@endsection
