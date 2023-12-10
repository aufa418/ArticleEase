@extends('app')
{{-- @dd($datas) --}}

@section('content')
    <h2 class="text-center">Article</h2>
    <hr>
    <div class="row">
        @if ($datas->count() > 0)
            @foreach ($datas as $data)
                <div class="col-3">
                    @include('component.card', ['data' => $data])
                </div>
            @endforeach
        @else
            <div class="col-12">
                <p class="text-center">Do Not Have Article</p>
            </div>
        @endif
    </div>
@endsection
