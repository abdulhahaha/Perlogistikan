@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Inventory Details</h2>

    <a href="{{ route('inventory.detail.add') }}" class="btn btn-primary mb-3">Add Inventory Item</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Receive Date</th>
                <th>Location</th>
                <th>PLT ID</th>
                <th>Material</th>
                <th>Material Description</th>
                <th>Uom</th>
                <th>Unrestricted</th>
                <th>Blocked</th>
                <th>Remarks</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventoryDetails as $inventoryDetail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $inventoryDetail->receive_date }}</td>
                <td>{{ $inventoryDetail->location }}</td>
                <td>{{ $inventoryDetail->plt_id }}</td>
                <td>{{ $inventoryDetail->material }}</td>
                <td>{{ $inventoryDetail->material_description }}</td>
                <td>{{ $inventoryDetail->uom }}</td>
                <td>{{ $inventoryDetail->unrestricted }}</td>
                <td>{{ $inventoryDetail->blocked }}</td>
                <td>{{ $inventoryDetail->remarks }}</td>
                <td>
                    <a href="{{ route('inventory.detail.edit', $inventoryDetail->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('inventory.detail.destroy', $inventoryDetail->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
