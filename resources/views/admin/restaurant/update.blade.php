@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Edit Restaurant</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('restaurants.update', $restaurant->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="catName" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="catName" value="{{ $restaurant->name }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="catName" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="catName"
                        value="{{ $restaurant->email }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="catName" class="form-label">Phone No</label>
                    <input type="text" name="phone" class="form-control" id="catName"
                        value="{{ $restaurant->phone }}">
                    @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Leave a comment here"
                        value="{{ $restaurant->description }}">{{ $restaurant->description }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Address</label>
                    <textarea class="form-control" name="address" id="description" rows="3" placeholder="Leave a comment here"
                        value="{{ $restaurant->address }}">{{ $restaurant->address }}</textarea>
                    @error('address')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                    <img src="{{ asset('storage/' . $restaurant->image) }}" width="50" height="50">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection
