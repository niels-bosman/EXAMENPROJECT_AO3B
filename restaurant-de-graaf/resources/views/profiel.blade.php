@extends('layouts.app')

@section('title', 'Profiel')

@section('header')

@endsection

@section('content')
    <h1>Welkom {{ Auth::user()->name }}</h1>
@endsection
