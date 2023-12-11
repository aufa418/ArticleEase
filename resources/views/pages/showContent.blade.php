@extends('app')
{{-- @dd($data) --}}

@section('content')
    <br>
    <a href="{{ URL::previous() }}" class="btn btn-primary mb-4">Back</a>
    <div class="card">
        <div class="card-body">
            <h2 class="text-center card-title">{{ $data->title }}</h2>
            <p>Category {{ $data->category->name }}</p>
            <hr>
            <br>
            <img src="{{ asset('storage/' . $data->banner) }}" style="max-width: 70%;" class="mx-auto mb-5 d-block">
            <br>
            <div>
                {{ strip_tags($data->body) }}
            </div>
        </div>
    </div>
@endsection
