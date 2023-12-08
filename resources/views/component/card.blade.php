@php
    use Illuminate\Support\Str;
@endphp

<div class="card" style="width: 18rem;">
    <img src="storage/{{ $data->banner }}" class="card-img-top">
    <div class="card-body">
        <h5 class="card-title">{{ $data->title }}</h5>
        <h6 class="card-subtitle mb-3 text-body-secondary">Author {{ $data->author }}</h6>
        <p class="card-text">{{ Str::limit(strip_tags($data->body), 100) }}</p>
        <a href="{{ route('content.show', $data->id) }}" class="btn btn-primary">Go somewhere</a>
    </div>
</div>
