@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-center mx-auto mb-0">INBOUND</h2>
        <div class="actions ml-auto">
            <!-- Tombol dengan Ikon di Kanan -->
            <a href="{{ route('inventory.inbound.import') }}" class="btn btn-secondary mr-2">
                <i class="fas fa-file-import"></i> Import
            </a>
            <a href="{{ route('inventory.inbound.add') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> Add Data
            </a>
        </div>
    </div>

    <!-- Tabel Data di Tengah -->
    <div class="table-responsive mx-auto" style="max-width: 800px;">
        <table class="table table-striped table-hover">
            <thead class="thead-light">
            <tr>
                <th>No.</th>
                <th>Receive Date</th>
                <th>No. Document</th>
                <th>Consignee</th>
                <th>Material</th>
                <th>Material Description</th>
                <th>Qty</th>
                <th>Uom</th>
                <th>PLT ID</th>
                <th>Location</th>
                <th>Actions</th> <!-- Tambahkan kolom Actions -->
            </tr>
        </thead>
        <tbody>
            @foreach ($inbounds as $inbound)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $inbound->receive_date }}</td>
                <td>{{ $inbound->no_document }}</td>
                <td>{{ $inbound->consignee }}</td>
                <td>{{ $inbound->material }}</td>
                <td>{{ $inbound->material_description }}</td>
                <td>{{ $inbound->inbound_qty }}</td>
                <td>{{ $inbound->uom }}</td>
                <td>{{ $inbound->plt_id }}</td>
                <td>{{ $inbound->location }}</td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="{{ route('inventory.inbound.edit', $inbound->id) }}" class="btn btn-sm btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>

                    <!-- Tombol Delete -->
                    <form action="{{ route('inventory.inbound.destroy', $inbound->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this item?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash-alt"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
