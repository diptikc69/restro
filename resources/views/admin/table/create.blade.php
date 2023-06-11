@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Add Tables</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('tables.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="catName" class="form-label">Table No</label>
                    <input type="text" name="table_number" class="form-control" id="catName">
                    @error('table_number')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <select class="form-select form-control" name="restaurant_id">
                        <option value="">Select Restaurant</option>
                        @foreach ($restaurants as $restaurant)
                            <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection
