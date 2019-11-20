@extends('../layouts.app')

@section('title', 'Inloggen | Restaurant de Graaf')

@section('header')

@endsection

@section('content')
    <h1>Login</h1>
    <form action="/login" method="POST" class="text-center">
    {{ csrf_field() }}
        <input type="text" name="email">
        <input type="password" name="password">
        <button type="submit">
    </form>
@endsection
