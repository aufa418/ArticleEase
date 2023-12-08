@extends('app')
@dd($request)

@section('content')
    <h2 class="text-center">Article</h2>
    <hr>
    <div class="row">
        <div class="col-4">
            @include('component.card')
        </div>
    </div>
@endsection
