@extends('app')
{{-- @dd($data) --}}

@section('content')
    <a href="{{ Request::is('content/*') ? 'mycontent' : 'content' }}" class="btn btn-primary">Back</a>

    <div class="card">
        <div class="card-body">
            <h2 class="text-center card-title">{{ $data->title }}</h2>
            <hr>
            <img src="storage/{{ $data->banner }}">
            <br>
            <div>
                {{ strip_tags($data->body) }}
            </div>
        </div>
    </div>
@endsection
