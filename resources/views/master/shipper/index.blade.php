@extends('layouts.app')

@php
    $text = langData();
@endphp

@section('title', $text['shipper_master'] ?? 'Shipper Master')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">{{ $text['shipper_master'] ?? 'Shipper Master' }}</h1>
        
        <div class="mb-3">
            <a href="{{ route('master.shipper.add') }}" class="btn btn-primary">{{ $text['add_data'] ?? 'Add New Shipper' }}</a>
        </div>

        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>{{ $text['code'] ?? 'Code' }}</th>
                    <th>{{ $text['shipper'] ?? 'Shipper' }}</th>
                    <th>{{ $text['status'] ?? 'Status' }}</th>
                    <th>{{ $text['action'] ?? 'Actions' }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shippers as $index => $shipper)
                    <tr>
                        <td>{{ $loop->iteration }}</td> 
                        <td>{{ $shipper->code }}</td>
                        <td>{{ $shipper->shipper }}</td>
                        <td>
                            <span class="badge {{ $shipper->status ? 'badge-success' : 'badge-danger' }}">
                                {{ $shipper->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('master.shipper.edit', $shipper->id) }}" class="btn btn-sm btn-warning">
                            {{ $text['edit'] ?? 'Edit' }}
                            </a>
                            <form action="{{ route('master.shipper.destroy', $shipper->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                {{ $text['delete'] ?? 'Delete' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Menambahkan pagination jika data shipper terlalu banyak -->
        <div class="d-flex justify-content-center">
            {{ $shippers->links() }}
        </div>
    </div>
@endsection
