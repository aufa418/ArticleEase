<div class="card">
    <div class="card-body">
        <h3 class="card-title text-center">Your Content</h3>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Update At</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->updated_at }}</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic outlined example">
                                <a href="content/{{ $data->id }}" type="button" class="btn btn-primary">Show</a>
                                <a href="{{ route('content.edit', $data->id) }}" type="button"
                                    class="btn btn-warning">Edit</a>
                                <form action="{{ route('content.destroy', $data->id) }}" class="btn btn-danger btn-sm"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="imageOld" value="{{ $data->banner }}">
                                    <button type="submit" class="btn text-white btn-sm p-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
