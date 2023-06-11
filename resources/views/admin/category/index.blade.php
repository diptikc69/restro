@extends('admin.layouts.app')
@section('content')
    @include('admin.alert')
    <div class="card">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-0 text-gray-800">Categories</h1>
                </div>
                <div class="col-6">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary float-right">Add Category</a>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td><img src="{{ asset('storage/' . $item->image) ?? null }}" width="50" height="50" />
                            </td>
                            <td>
                                <a href="{{ route('categories.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('categories.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('Are you sure?')" type="submit"
                                        class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
