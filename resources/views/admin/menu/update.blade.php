@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Add Restaurant</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('menus.update', $menu->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="catName" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="catName" value="{{ $menu->name }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="catName" class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" id="catName" value="{{ $menu->price }}">
                    @error('price')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description*</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Leave a comment here">{{ $menu->description }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <select class="form-select form-control" aria-label="Default select example" name="category_id">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $menu->category_id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
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
                            <option value="{{ $restaurant->id }}"
                                {{ $restaurant->id == $menu->restaurant_id ? 'selected' : '' }}> {{ $restaurant->name }}
                            </option>
                        @endforeach
                        @error('restaurant_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                    <img src="{{ asset('storage/' . $menu->image) }}" width="50" height="50" class="mt-3" />
                    @error('image')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection
