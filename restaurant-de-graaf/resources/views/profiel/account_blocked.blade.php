@extends('layouts.app')

@section('title', 'Het account is geblokkeerd')

@section('header')

@endsection

@section('content')
<div class="login container">
    <h1 class="login__heading">Uw account is geblokkeerd!</h1>
    <h3 class="text-center">Neem contact op met een systeembeheerder om dit op te lossen</h3>
    <h4 class="text-center">(+316) 52 54 12</h4>
    <div class="button--secondary">
        <a class="button--go-back content__button--center button--primary" href="{{ url('/') }}">home</a>
        <div class="content__button--center button--space"></div>
        <a class="button--go-back content__button--center button--primary" href="{{ url('/contact') }}">Contact opnemen</a>
        <div class="content__button--center button--space"></div>
        <a class="button--go-back content__button--center button--primary" href="{{ route('logout') }}">Uitloggen</a>
    </div>
</div>
@endsection
