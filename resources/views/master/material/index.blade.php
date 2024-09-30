@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Material Master</h1>

        <div class="mb-3">
            <a href="{{ route('master.material.add') }}" class="btn btn-primary">Add New Material</a>
        </div>
        
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>Material</th>
                <th>Material Description</th>
                <th>UOM</th>
                <th>Check</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($materials as $material)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $material->material }}</td>
                    <td>{{ $material->material_description }}</td>
                    <td>{{ $material->uom }}</td>
                    <td>{{ $material->check ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('master.material.edit', $material->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('master.material.destroy', $material->id) }}" method="POST">
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
