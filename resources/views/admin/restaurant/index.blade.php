@extends('admin.layouts.app')
@section('content')
    <div class="card shadow mb-4">
        @include('admin.alert')
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-0 text-gray-800">Restaurants</h1>
                </div>
                <div class="col-6">
                    <a href="{{ route('restaurants.create') }}" class="btn btn-primary float-right">Add Restaurant</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($restaurants as $restaurant)
                            <tr>
                                <td>{{ $restaurant->name }}</td>
                                <td>{{ $restaurant->email }}</td>
                                <td>{{ $restaurant->phone }}</td>
                                <td>{{ $restaurant->description }}</td>
                                <td>
                                    @if ($restaurant->status == 1)
                                        <a href="" class="btn btn-success">Active</a>
                                    @else
                                        <a href="" class="btn btn-danger">Inactive</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('restaurants.edit', $restaurant->id) }}"
                                        class="btn btn-primary">Edit</a>
                                    <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST"
                                        class="d-inline">
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
    </div>
@endsection
