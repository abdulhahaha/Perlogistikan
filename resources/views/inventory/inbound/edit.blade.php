@extends('layouts.app')

@php
    $text = langData();
@endphp

@section('title', $text['edit'] ?? 'Edit Inbound')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">{{ $text['edit'] ?? 'Edit' }} {{ $text['inbound'] ?? 'Inbound' }} {{ $text['inventory'] ?? 'Data' }}</h2>
    
    <form action="{{ route('inventory.inbound.update', $inbound->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="receive_date">{{ $text['date1'] ?? 'Receive Date' }}</label>
            <input type="date" name="receive_date" id="receive_date" class="form-control" value="{{ old('receive_date', $inbound->receive_date) }}" required>
        </div>

        <div class="form-group">
            <label for="no_document">{{ $text['no_doc'] ?? 'No. Document' }}</label>
            <input type="text" name="no_document" id="no_document" class="form-control" value="{{ old('no_document', $inbound->no_document) }}" required>
        </div>

        <div class="form-group">
            <label for="consignee">{{ $text['consignee'] ?? 'Consignee' }}</label>
            <input type="text" name="consignee" id="consignee" class="form-control" value="{{ old('consignee', $inbound->consignee) }}" required>
        </div>

        <div class="form-group">
            <label for="material">{{ $text['material'] ?? 'Material' }}</label>
            <input type="text" name="material" id="material" class="form-control" value="{{ old('material', $inbound->material) }}" required>
        </div>

        <div class="form-group">
            <label for="material_description">{{ $text['material_desc'] ?? 'Material Description' }}</label>
            <input type="text" name="material_description" id="material_description" class="form-control" value="{{ old('material_description', $inbound->material_description) }}" required>
        </div>

        <div class="form-group">
            <label for="inbound_qty">{{ $text['qty'] ?? 'Inbound Quantity' }}</label>
            <input type="number" name="inbound_qty" id="inbound_qty" class="form-control" value="{{ old('inbound_qty', $inbound->inbound_qty) }}" required>
        </div>

        <div class="form-group">
            <label for="uom">{{ $text['uom'] ?? 'UOM (Unit of Measure)' }}</label>
            <input type="text" name="uom" id="uom" class="form-control" value="{{ old('uom', $inbound->uom) }}" required>
        </div>

        <div class="form-group">
            <label for="plt_id">PLT ID</label>
            <input type="text" name="plt_id" id="plt_id" class="form-control" value="{{ old('plt_id', $inbound->plt_id) }}" required>
        </div>

        <div class="form-group">
            <label for="location">{{ $text['location'] ?? 'Location' }}</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $inbound->location) }}" required>
        </div>

        <button type="submit" class="btn btn-success">{{ $text['edit'] ?? 'Update' }} {{ $text['inbound'] ?? 'Data' }}</button>
        <a href="{{ route('inventory.inbound.index') }}" class="btn btn-secondary">{{ $text['cancel'] ?? 'Cancel' }}</a>
    </form>
</div>
@endsection
