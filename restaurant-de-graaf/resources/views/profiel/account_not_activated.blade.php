@extends('layouts.app')

@section('title', 'Het account is nog niet geactiveerd')

@section('header')

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Uw account is nog niet geactiveerd!</h1>
                </div>
                <div class="card-body">
                <p>Zo te zien heeft u nog niet het account geactiveerd.</p>
                    <p>Check je mail of u een bevestigingsmail heb gekregen, <br> of klik op de link om een nieuwe te sturen.</p>
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Een nieuwe link is zojuist verstuurd naar uw email adres') }}
                    </div>
                    @endif
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0"><h1 class="content__title">Klik hier om een nieuwe te sturen</h1></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
