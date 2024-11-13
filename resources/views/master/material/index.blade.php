@extends('layouts.app')

@php
    $text = langData();
@endphp

@section('title', $text['material_master'] ?? 'Material Master')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">{{ $text['material_master'] ?? 'Material Master' }}</h1>

        <div class="mb-3">
            <a href="{{ route('master.material.add') }}" class="btn btn-primary">{{ $text['add_data'] ?? 'Add New Material' }}</a>
        </div>
        
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>{{ $text['material'] ?? 'Material' }}</th>
                <th>{{ $text['material_desc'] ?? 'Material Description' }}</th>
                <th>{{ $text['uom'] ?? 'UOM' }}</th>
                <th>{{ $text['check'] ?? 'Check' }}</th>
                <th>{{ $text['action'] ?? 'Actions' }}</th>
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
                        <a href="{{ route('master.material.edit', $material->id) }}" class="btn btn-sm btn-warning">
                        {{ $text['edit'] ?? 'Edit' }}</a>
                        <form action="{{ route('master.material.destroy', $material->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">{{ $text['delete'] ?? 'Delete' }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
