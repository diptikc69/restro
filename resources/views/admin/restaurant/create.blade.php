@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Add Restaurant</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('restaurants.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="catName" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="catName">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="catName" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="catName">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="catName" class="form-label">Phone No</label>
                    <input type="text" name="phone" class="form-control" id="catName">
                    @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Leave a comment here"></textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Address</label>
                    <textarea class="form-control" name="address" id="description" rows="3" placeholder="Leave a comment here"></textarea>
                    @error('address')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection
