@extends('../layouts.app')

@section('title', 'Edit')

@section('header')

@endsection

@section('content')
    <h1>Edit user</h1>
    <ul style="list-style-type:none">
    <form action="/profiel" method="POST" class="text-center">
        {{ csrf_field() }}
        <li>Naam: <input type="text" name="naam" value="{{ $user->name }}"></li>
        <li>Email: <input type="text" name="email" value="{{ $user->email }}"></li>
        <li>Telefoonnummer: <input type="text" name="telefoonnummer" value="{{ $user->tel_number }}"></li>
        <li>Adres: <input type="text" name="adres" value="{{ $user->street }}"></li>
        <li>Huisnummer: <input type="text" name="huisnummer" value="{{ $user->house_number }}"></li>
        <li>Postcode: <input type="text" name="postcode" value="{{ $user->zipcode }}"></li>
        <li>Plaats: <input type="text" name="plaats" value="{{ $user->city }}"></li>
        <li><button type="submit">Update</button></li>
    </form>
</ul>
@endsection
