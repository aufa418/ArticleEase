@extends('app')

@section('content')
    <br>
    <h2>Hallo {{ Auth::user()->name }}...</h2>
    <hr>
    @include('component.createArticle')
@endsection
