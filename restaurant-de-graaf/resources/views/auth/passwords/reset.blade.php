@extends('layouts.app')

@section('content')
<div class="reset container">
    <h1 class="login__heading">Wachtwoord veranderen</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email Adres') }}</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" readonly autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Wachtwoord') }}</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Bevestig Password') }}</label>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="button--left content__button--center button--primary">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
</div>
@endsection
