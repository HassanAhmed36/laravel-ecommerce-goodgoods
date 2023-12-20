@extends('layout.master')
@section('main_section')
    <div class="">
        <div class="row">
            <div class="col-6">
                <h4 class="my-3 fw-bold">Update Profile</h4>
                <form action="{{ route('update.info') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" value="{{ Auth::user()->name }}">
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <button class="btn btn-dark">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <h4 class="my-3 fw-bold">Update Password</h4>
                <form action="{{ route('update.password') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">password</label>
                            <input type="password" class="form-control" name="password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation">
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12 mb-3">
                            <button class="btn btn-dark">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-6">
                <h4 class="my-3 fw-bold">Update Image</h4>
                <form action="{{ route('update.image') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="" class="form-label">User image</label>
                            <input type="file" class="form-control" name="user_image">
                            @error('user_image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-12 mb-3">
                            <button class="btn btn-dark">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-6 my-auto">
                <p>Want to delete Your Profile? </p>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Delete Account
                </button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('delete.profile') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Want to Delete your Account?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <input type="password" class="form-control" placeholder="Enter Your Password" name="password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
            </form>
        </div>
    </div>
    </div>
@endsection
