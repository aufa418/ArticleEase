@extends('app')
{{-- @dd(auth()->user()->id) --}}

@section('content')
    <h2 class="text-center">Content</h2>
    <hr>
    @include('component.createArticle')
    <hr>
    @include('component.yourContent', ['datas' => $datas, 'user_id' => auth()->user()->id])
@endsection
