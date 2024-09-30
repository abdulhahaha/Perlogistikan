@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Location Master</h1>
        <div class="mb-3">
            <a href="{{ route('master.location.add') }}" class="btn btn-primary">Add New Location</a>
        </div>
    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>Area</th>
                <th>WH Name</th>
                <th>Aisle</th>
                <th>Level</th>
                <th>Row</th>
                <th>Loc Area</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($locations as $location)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $location->area }}</td>
                    <td>{{ $location->whname }}</td>
                    <td>{{ $location->aisle }}</td>
                    <td>{{ $location->level }}</td>
                    <td>{{ $location->row }}</td>
                    <td>{{ $location->loc_area }}</td>
                    <td>
                        <a href="{{ route('master.location.edit', $location->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('master.location.destroy', $location->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
