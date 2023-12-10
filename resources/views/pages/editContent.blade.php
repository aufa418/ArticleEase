@extends('app')
@section('content')
    <div class="card mx-auto mt-5" style="width: 70%;">
        <div class="card-body">
            <h4 class="card-title text-center">Edit Post</h4>
            <br>
            <form action="{{ route('content.update', $data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="author" value="{{ Auth::user()->name }}">
                <input type="hidden" name="author_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="imageOld" value="{{ $data->banner }}">

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $data->title }}">
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Banner</label>
                    <input class="form-control" type="file" id="formFile" name="banner">
                </div>

                <div class="mb-3">
                    <label>Content</label>
                    <input id="x" type="hidden" name="body" value="{{ $data->body }}">
                    <trix-editor input="x"></trix-editor>
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ URL::previous() }}" class="btn bg-secondary text-white">Back</a>
            </form>
        </div>
    </div>
@endsection
