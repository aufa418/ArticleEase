@extends('app')

@section('content')
    @auth
        <h2 class="text-center">Welcome Back {{ Auth::user()->name }}</h2>
    @else
        <h2 class="text-center">Hello... Welcome in Article App</h2>
    @endauth
@endsection
