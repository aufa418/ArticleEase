@extends('app')
{{-- @dd($datas) --}}

@section('content')
    <h2 class="text-center">Article</h2>
    <hr>
    <div class="row">
        @foreach ($datas as $data)
            <div class="col-3">
                @include('component.card', ['data' => $data])
            </div>
        @endforeach
    </div>
@endsection
