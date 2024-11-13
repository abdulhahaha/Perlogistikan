@extends('layouts.app')

@php
    $text = langData();
@endphp

@section('title', $text['inbound'] ?? 'Add Inbound')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">{{ $text['add_data'] ?? 'Add New' }} {{ $text['inbound'] ?? 'Inbound' }} {{ $text['inventory'] ?? 'Data' }}</h2>

    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <form action="{{ route('inbound.store') }}" method="POST">
                @csrf

                <!-- Receive Date -->
                <div class="form-group">
                    <label for="receive_date">{{ $text['date1'] ?? 'Receive Date' }}</label>
                    <input type="date" name="receive_date" class="form-control" id="receive_date" required>
                </div>

                <!-- No. Document -->
                <div class="form-group">
                    <label for="no_document">{{ $text['no_doc'] ?? 'No. Document' }}</label>
                    <input type="text" name="no_document" class="form-control" id="no_document" required>
                </div>

                <!-- Consignee -->
                <div class="form-group">
                    <label for="consignee">{{ $text['consignee'] ?? 'Consignee' }}</label>
                    <input type="text" name="consignee" class="form-control" id="consignee" required>
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

                <!-- Qty -->
                <div class="form-group">
                    <label for="inbound_qty">{{ $text['qty'] ?? 'Qty' }}</label>
                    <input type="number" name="inbound_qty" class="form-control" id="inbound_qty" required>
                </div>

                <!-- Uom -->
                <div class="form-group">
                    <label for="uom">{{ $text['uom'] ?? 'Uom' }}</label>
                    <input type="text" name="uom" class="form-control" id="uom" required>
                </div>

                <!-- PLT ID -->
                <div class="form-group">
                    <label for="plt_id">PLT ID</label>
                    <input type="text" name="plt_id" class="form-control" id="plt_id" required>
                </div>

                <!-- Location -->
                <div class="form-group">
                    <label for="location">{{ $text['location'] ?? 'Location' }}</label>
                    <input type="text" name="location" class="form-control" id="location" required>
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
