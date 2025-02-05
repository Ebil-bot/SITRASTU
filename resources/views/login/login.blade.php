@extends('layout.register-app')

@section('login')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="col-lg-5">
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input class="form-control" id="email" name="email" type="email" value="{{ old('email') }}" placeholder="name@example.com" />
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="password" name="password" type="password" placeholder="password" />
                    <label for="password">Password</label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" id="password" type="checkbox" value="" />
                    <label class="form-check-label" for="password">Remember Password</label>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                    <a class="small" href="password.html">Forgot Password?</a>
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center py-3">
            <div class="small"><a href="/register">Need an account? Sign up!</a></div>
        </div>
    </div>
</div>
@endsection