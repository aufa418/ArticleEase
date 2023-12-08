<div class="card" style="width: 80%;">
    <div class="card-body">
        <h4 class="card-title text-center">Create New Post</h4>
        <br>
        <form action="{{ route('content.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="author" value="{{ Auth::user()->name }}">

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label">Banner</label>
                <input class="form-control" type="file" id="formFile" name="banner">
            </div>

            <div class="mb-3">
                <label>Content</label>
                <input id="x" type="hidden" name="body">
                <trix-editor input="x"></trix-editor>
            </div>

            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
