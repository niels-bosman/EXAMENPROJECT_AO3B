@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Een nieuwe link is zojuist verstuurd naar uw email adres') }}
                        </div>
                    @endif

                    {{ __('Voordat je verdergaat, controlleer uw email adres voor een verificatie link astublieft') }}
                    {{ __('Als u geen link hebt ontvangen?') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Klik hier om een nieuwe te sturen') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
