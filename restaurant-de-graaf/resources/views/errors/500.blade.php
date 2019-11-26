@extends('layouts.app')

@section('title', 'pagina niet gevonden | Restaurant de Graaf')

@section('content')
    <div class="container profiel error_page">
        <h1 class="profiel__heading">Er is iets misgegaan</h1>
        <p>U heeft niets fout gedaan: Dit is onze fout...<br>
            Misschien werkt het beter als u het later weer probeert.</p>
        <a href="/"><button type="submit" class="button button--primary">Terug naar home</button></a>
    </div>
@endsection
