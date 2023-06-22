@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <h3>Update Password </h3>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.change-password') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="catName" class="form-label"> Password</label>
                    <input type="text" name="password" class="form-control" id="catName">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{-- <div class="mb-3">
                    <label for="catName" class="form-label">Confirm Password</label>
                    <input type="text" name="password" class="form-control" id="catName">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div> --}}
                {{-- <div class="mb-3">
                    <label for="catName" class="form-label">Email</label>
                    <input type="number" name="email" class="form-control" id="catName" value="{{ $user->email }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div> --}}

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection
