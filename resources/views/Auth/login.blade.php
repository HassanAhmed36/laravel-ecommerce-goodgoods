@extends('layout.master')
@section('main_section')
    <div class="container" style="height: 73vh">
        <div class="col-6 mx-auto">
            <h4 class="mb-4 fw-bold">Login to your Account</h4>
            <form action="{{ route('submit.login') }}" method="POST" >
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <span>Dont have an account? <a href="{{ route('register') }}">Rigester here</a></span>
                </div>
                <button type="submit" class="btn btn-dark">Login</button>
            </form>
        </div>
    </div>
@endsection
