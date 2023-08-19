@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="m-2">
            <h3>My Profile </h3>
        </div>

        <div class="card-body">
            <div>
                @if (Session::has('message'))
                    <div class="alert alert-success text-center" role="alert">
                        <strong>Success!</strong> {{ Session::get('message') }}
                    </div>
                @endif
            </div>
            <form method="POST" action="{{ route('admin.update-profile') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="Name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="catName" value="{{ $user->name }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="Password" class="form-label"> Password</label>
                    <input type="text" name="password" class="form-control" id="catName">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="Confirm Password" class="form-label">Confirm Password</label>
                    <input type="text" name="password" class="form-control" id="catName">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- <div class="mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <input type="number" name="email" class="form-control" id="catName" value="{{ $user->email }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div> --}}
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                    <img src="{{ asset('storage/' . $user->image) }}" width="50" height="50" class="mt-3" />
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection
