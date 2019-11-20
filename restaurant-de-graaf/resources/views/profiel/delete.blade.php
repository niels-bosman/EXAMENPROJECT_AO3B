@extends('layouts.app')

@section('title', 'Account opzeggen?')

@section('header')

@endsection

@section('content')
<h1>Weet u zeker dat u het account wilt opzeggen?</h1>
<ul style="list-style-type:none">
    <form action="/profiel/delete" method="POST" class="text-center">
        {{ csrf_field() }}
        <li><button type="submit">Ja</button><button type="sumbit">Nee</button></li>
    </form>
</ul>

@endsection
