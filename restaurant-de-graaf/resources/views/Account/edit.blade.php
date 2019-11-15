@extends('../layouts.app')

@section('title', 'Edit')

@section('header')

@endsection

@section('content')
    <h1>Edit user</h1>
    <form action="/account/login" method="POST" class="text-center">
    {{ csrf_field() }}
        <input type="text" name="email">
        <input type="password" name="password">
        <button type="submit">
    </form>
@endsection
