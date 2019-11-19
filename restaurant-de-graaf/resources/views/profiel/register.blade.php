@extends('layouts.app')

@section('title', 'Registreer')

@section('header')

@endsection

@section('content')
<h1>Registreer nu!</h1>
<form method="POST" action="{{ route('login') }}">
        @csrf
        @isset($error)
        <h4 class="text-center">{{ $error }}</h4>
        @endisset
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mailadres:') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="button button--primary">
                    {{ __('Registreer') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Wachtwoord vergeten?') }}
                </a>
                @endif
            </div>
        </div>
    </form>
@endsection
