@extends('../layouts.app')

@section('title', 'Registreren | Restaurant de Graaf')

@section('header')

@endsection

@section('content')
<h1>Login</h1>
<ul style="list-style-type:none">
    <form action="/home/registration" method="POST" class="text-center">
        {{ csrf_field() }}
        <li>Naam: <input type="text" name="naam"></li>
        <li>Email: <input type="text" name="email"></li>
        <li>Telefoonnummer: <input type="text" name="telefoonnummer"></li>
        <li>Wachtwoord: <input type="password" name="wachtwoord"></li>
        <li>Herhaal wachtwoord: <input type="password" name="herhaal_Wachtwoord"></li>
        <li>Adres: <input type="text" name="adres"></li>
        <li>Huisnummer: <input type="text" name="huisnummer"></li>
        <li>Postcode: <input type="text" name="postcode"></li>
        <li>Plaats: <input type="text" name="plaats"></li>
        <li><button type="submit">Registreer</button></li>
    </form>
</ul>
@endsection
