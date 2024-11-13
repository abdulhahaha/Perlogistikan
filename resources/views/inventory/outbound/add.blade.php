@extends('layouts.app')

@php
    $text = langData();
@endphp

@section('title', $text['add_data'] ?? 'Add Outbound')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">{{ $text['add_data'] ?? 'Add New' }} {{ $text['outbound'] ?? 'Outbound' }} {{ $text['inventory'] ?? 'Data' }}</h2>

    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <form action="{{ route('inventory.store') }}" method="POST">
                @csrf

                <!-- Shipped Date -->
                <div class="form-group">
                    <label for="shipped_date">{{ $text['date2'] ?? 'Shipped Date' }}</label>
                    <input type="date" name="shipped_date" class="form-control" id="shipped_date" required>
                </div>

                <!-- No. Document -->
                <div class="form-group">
                    <label for="no_document">{{ $text['no_doc'] ?? 'No. Document' }}</label>
                    <input type="text" name="no_document" class="form-control" id="no_document" required>
                </div>

                <!-- Shipper -->
                <div class="form-group">
                    <label for="shipper">{{ $text['shipper'] ?? 'Shipper' }}</label>
                    <input type="text" name="shipper" class="form-control" id="shipper" required>
                </div>

                <!-- PLT ID -->
                <div class="form-group">
                    <label for="plt_id">PLT ID</label>
                    <input type="text" name="plt_id" class="form-control" id="plt_id">
                </div>

                <!-- Location -->
                <div class="form-group">
                    <label for="location">{{ $text['location'] ?? 'Location' }}</label>
                    <input type="text" name="location" class="form-control" id="location">
                </div>

                <!-- Material -->
                <div class="form-group">
                    <label for="material">{{ $text['material'] ?? 'Material' }}</label>
                    <input type="text" name="material" class="form-control" id="material" required>
                </div>

                <!-- Material Description -->
                <div class="form-group">
                    <label for="material_description">{{ $text['material_desc'] ?? 'Material Description' }}</label>
                    <textarea name="material_description" class="form-control" id="material_description" required></textarea>
                </div>

                <!-- Quantity -->
                <div class="form-group">
                    <label for="inbound_qty">{{ $text['qty'] ?? 'Quantity' }}</label>
                    <input type="number" name="inbound_qty" class="form-control" id="inbound_qty" required>
                </div>

                <!-- Uom -->
                <div class="form-group">
                    <label for="uom">{{ $text['uom'] ?? 'UOM' }}</label>
                    <input type="text" name="uom" class="form-control" id="uom" required>
                </div>

                <!-- Remarks -->
                <div class="form-group">
                    <label for="remarks">{{ $text['remarks'] ?? 'Remarks' }}</label>
                    <textarea name="remarks" class="form-control" id="remarks"></textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-plus-circle"></i> {{ $text['add_data'] ?? 'Add Data' }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
