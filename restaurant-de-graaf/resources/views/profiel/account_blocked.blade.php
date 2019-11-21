@extends('layouts.app')

@section('title', 'Het account is geblokkeerd')

@section('header')

@endsection

@section('content')
<div class="login container">
    <h1 class="login__heading">Uw account is geblokkeerd</h1>
    <p class="text-center">Neem contact op met een systeembeheerder om dit op te lossen</p>
    <div class="button--secondary">
        <a class="button--go-back content__button--center button--primary" href="{{ url('/contact') }}">Neem contact op</a>
    </div>
</div>
@endsection
