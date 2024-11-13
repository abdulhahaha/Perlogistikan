@extends('layouts.app')

@php
    $text = langData();
@endphp

@section('title', $text['detail'] ?? 'Detail')

@section('content')
<div class="container">
    <h2 class="mb-4">{{ $text['detail'] ?? 'Detail' }}</h2>

    <a href="{{ route('inventory.detail.add') }}" class="btn btn-primary mb-3">{{ $text['add_data'] ?? 'Add Data' }}</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>{{ $text['date1'] ?? 'Date' }}</th>
                <th>{{ $text['location'] ?? 'Location' }}</th>
                <th>PLT ID</th>
                <th>{{ $text['material'] ?? 'Material' }}</th>
                <th>{{ $text['material_desc'] ?? 'Material Description' }}</th>
                <th>{{ $text['uom'] ?? 'UOM' }}</th>
                <th>{{ $text['unrestricted'] ?? 'Unrestricted' }}</th>
                <th>{{ $text['blocked'] ?? 'Blocked' }}</th>
                <th>{{ $text['remarks'] ?? 'Remarks' }}</th>
                <th>{{ $text['action'] ?? 'Actions' }}</th>
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
                    <a href="{{ route('inventory.detail.edit', $inventoryDetail->id) }}" class="btn btn-warning btn-sm">{{ $text['edit'] ?? 'Edit' }}</a>
                    <form action="{{ route('inventory.detail.destroy', $inventoryDetail->id) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ $text['confirm_delete'] ?? 'Are you sure?' }}');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">{{ $text['delete'] ?? 'Delete' }}</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
