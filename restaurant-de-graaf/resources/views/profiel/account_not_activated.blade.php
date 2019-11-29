@extends('layouts.app')

@section('title', 'Account nog niet geactiveerd | Restaurant de Graaf')

@section('header')

@endsection

@section('content')

    <div class="login container">
        <h1 class="login__heading">Uw account is nog niet geactiveerd!</h1>
        <p class=".text-center">Zo te zien heeft u nog niet het account geactiveerd.</p>
        <p class=".text-center">Check je mail of u een bevestigingsmail heb gekregen,
            <br> of klik op de link om een nieuwe te sturen.</p>
        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                <p class=".text-center" style="margin: 0 auto; ">Een nieuwe link is zojuist verstuurd naar uw email adres</p>
            </div>
        @endif
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-12" style='margin: 0 auto; display: block;'>Klik hier om een nieuwe te sturen</button>
        </form>
    </div>
@endsection
