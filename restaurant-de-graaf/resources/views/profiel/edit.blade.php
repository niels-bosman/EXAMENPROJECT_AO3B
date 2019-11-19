@extends('../layouts.app')

@section('title', 'Edit')

@section('header')

@endsection

@section('content')
    <h1>Edit user</h1>
    <ul style="list-style-type:none">
    <form action="/user/edit" method="POST" class="text-center">
        {{ csrf_field() }}
        <li>Naam: <input type="text" name="naam" value=""></li>
        <li>Email: <input type="text" name="email" value=""></li>
        <li>Telefoonnummer: <input type="text" name="telefoonnummer" value=""></li>
        <li>Adres: <input type="text" name="adres" value=""></li>
        <li>Huisnummer: <input type="text" name="huisnummer" value=""></li>
        <li>Postcode: <input type="text" name="postcode" value=""></li>
        <li>Plaats: <input type="text" name="plaats" value=""></li>
        <li><button type="submit">Update</button></li>
    </form>
</ul>
@endsection
