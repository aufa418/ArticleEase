@extends('app')

@section('content')
    <br>
    @if (Session()->has('LoginError'))
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <i data-feather="alert-triangle"></i>
            <div>
                {{ session('LoginError') }}
            </div>
        </div>
    @endif
    <div class="card mx-auto" style="width: 50%;">
        <div class="card-body">
            <h2 class="card-title text-center">Login</h2>
            <hr>
            <form action="/login" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>

                <p>Not yet have Account? <a href="/register" style="text-decoration: none">Register</a></p>

                <button type="submit" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>
@endsection
