@extends('layouts.app')

@section('title', 'pagina niet gevonden | Restaurant de Graaf')

@section('content')
    <div class="container profiel error_page">
        <h1 class="profiel__heading">Pagina niet gevonden</h1>
        <p>Misschien heeft u het adres verkeerd ingetypt.</p>
        <a href="/"><button type="submit" class="button button--primary">Terug naar home</button></a>
    </div>
@endsection
