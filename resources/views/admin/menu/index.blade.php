@extends('admin.layouts.app')
@section('content')
    <div class="card shadow mb-4">
        @include('admin.alert')
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-0 text-gray-800">Menus</h1>
                </div>
                <div class="col-6">
                    <a href="{{ route('menus.create') }}" class="btn btn-primary float-right">Add Menus</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($menus as $menu)
                            <tr>
                                <td>{{ $menu->name }}</td>
                                <td>{{ $menu->description }}</td>
                                <td>{{ $menu->price }}</td>
                                <td><img src="{{ asset('storage/' . $menu->image) }}" alt="" width="100px"></td>
                                <td>
                                    @if ($menu->status == 1)
                                        <a href="" class="btn btn-success">Active</a>
                                    @else
                                        <a href="" class="btn btn-danger">Inactive</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button onclick="return confirm('Are you sure?')" type="submit"
                                            class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        {{-- menu show data table end
                            --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
