@extends('admin.layouts.app')
@section('content')
    <div class="card shadow mb-4">
        @include('admin.alert')
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-0 text-gray-800">Tables</h1>
                </div>
                <div class="col-6">
                    <a href="{{ route('tables.create') }}" class="btn btn-primary float-right">Add Tables</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Table No</th>
                            <th>Restaurant</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <!--<tfoot>
                        <tr>
                            <th>Table No</th>
                            <th>Restaurant</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>-->
                    <tbody>
                        {{-- tables get --}}
                        @foreach ($tables as $table)
                            <tr>
                                <td>{{ $table->table_number }}</td>
                                <td>{{ $table->restaurant->name }}</td>
                                <td>
                                    @if ($table->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Deactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('tables.edit', $table->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('tables.destroy', $table->id) }}" method="POST"
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
