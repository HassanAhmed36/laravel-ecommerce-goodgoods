@extends('layout.master')
@section('main_section')
    <div class="container" style="min-height: 73vh">
        <div class="col-6 mx-auto">
            <h3 class="mb-4 fw-bold">Rigester Now !</h3>
            <form action="{{ route('submit.rigester') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="exampleInputEmail1" class="form-label">User Name</label>
                        <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class=" col-6 mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="col-12 mb-3">
                        <label for="exampleInputPassword1" class="form-label">User Image</label>
                        <input type="file" name="user_image" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="col-12 mb-3">
                        <span>Already have an account? <a href="{{ route('login') }}">Login</a></span>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-dark">Rigester </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
