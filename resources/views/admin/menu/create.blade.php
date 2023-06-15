@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Add Restaurant</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('menus.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="catName" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="catName">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="catName" class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" id="catName">
                    @error('price')
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
                    <select class="form-select form-control" aria-label="Default select example" name="category_id">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </select>
                </div>

                <div class="mb-3">
                    <select class="form-select form-control" aria-label="Default select example" name="restaurant_id"
                        name="category_id">
                        <option value="">Select Restaurant</option>
                        @foreach ($restaurants as $restaurant)
                            <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                        @endforeach
                        @error('restaurant_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection
