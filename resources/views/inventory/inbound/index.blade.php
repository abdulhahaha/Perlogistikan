@extends('layouts.app')

@php
    $text = langData(); // Memuat semua teks bahasa ke dalam variabel $text
@endphp

@section('title', $text['inbound'] ?? 'Inbound')

@section('content')
<div class="container">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-center mx-auto mb-0">{{ $text['inbound'] ?? 'Inbound' }}</h2>
        <div class="actions">
            <!-- Tombol dengan Ikon di Kanan -->
            <a href="{{ route('inventory.inbound.import') }}" class="btn btn-secondary mr-2">
                <i class="fas fa-file-import"></i> {{ $text['import'] ?? 'Import' }}
            </a>
            <a href="{{ route('inventory.inbound.add') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> {{ $text['add_data'] ?? 'Add Data' }}
            </a>
        </div>
    </div>

    <!-- Tabel Data di Tengah -->
    <div class="table-responsive mx-auto mb-4" style="max-width: 800px;">
        <table class="table table-striped table-hover text-center">
            <thead class="thead-light">
                <tr>
                    <th>No.</th>
                    <th>{{ $text['date1'] ?? 'Date' }}</th>
                    <th>{{ $text['no_doc'] ?? 'Document No.' }}</th>
                    <th>{{ $text['consignee'] ?? 'Consignee' }}</th>
                    <th>{{ $text['material'] ?? 'Material' }}</th>
                    <th>{{ $text['material_desc'] ?? 'Material Description' }}</th>
                    <th>{{ $text['qty'] ?? 'Quantity' }}</th>
                    <th>{{ $text['uom'] ?? 'UOM' }}</th>
                    <th>PLT ID</th>
                    <th>{{ $text['location'] ?? 'Location' }}</th>
                    <th>{{ $text['action'] ?? 'Actions' }}</th> <!-- Tambahkan kolom Actions -->
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
                            <i class="fas fa-edit"></i> {{ $text['edit'] ?? 'Edit' }}
                        </a>

                        <!-- Tombol Delete -->
                        <form action="{{ route('inventory.inbound.destroy', $inbound->id) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ $text['confirm_delete'] ?? 'Are you sure you want to delete this item?' }}');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash-alt"></i> {{ $text['delete'] ?? 'Delete' }}
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
