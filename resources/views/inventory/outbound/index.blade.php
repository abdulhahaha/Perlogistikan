@extends('layouts.app')

@php
    $text = langData();
@endphp

@section('title', $text['outbound'] ?? 'Outbound')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-center mx-auto mb-0">{{ $text['outbound'] ?? 'Outbound' }}</h2>
        <div class="actions ml-auto">
            <a href="{{ route('inventory.outbound.add') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle"></i> {{ $text['add_data'] ?? 'Add Data' }}
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Outbound -->
    <div class="table-responsive mx-auto" style="max-width: 1000px;">
        <table class="table table-striped table-hover">
            <thead class="thead-light">
            <tr>
                <th>No.</th>
                <th>{{ $text['date2'] ?? 'Shipped Date' }}</th>
                <th>{{ $text['no_doc'] ?? 'No. Document' }}</th>
                <th>{{ $text['shipper'] ?? 'Shipper' }}</th>
                <th>PLT ID</th>
                <th>{{ $text['location'] ?? 'Location' }}</th>
                <th>{{ $text['material'] ?? 'Material' }}</th>
                <th>{{ $text['material_desc'] ?? 'Material Description' }}</th>
                <th>{{ $text['qty'] ?? 'Quantity' }}</th>
                <th>{{ $text['uom'] ?? 'UOM' }}</th>
                <th>{{ $text['remarks'] ?? 'Remarks' }}</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($outbounds as $outbound)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $outbound->shipped_date }}</td>
                    <td>{{ $outbound->no_document }}</td>
                    <td>{{ $outbound->shipper }}</td>
                    <td>{{ $outbound->plt_id }}</td>
                    <td>{{ $outbound->location }}</td>
                    <td>{{ $outbound->material }}</td>
                    <td>{{ $outbound->material_description }}</td>
                    <td>{{ $outbound->inbound_qty }}</td>
                    <td>{{ $outbound->uom }}</td>
                    <td>{{ $outbound->remarks }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
