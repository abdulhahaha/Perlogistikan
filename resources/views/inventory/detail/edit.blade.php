@extends('layouts.app')

@php
    $text = langData();
@endphp

@section('title', isset($inventoryDetail) ? $text['edit'] ?? 'Edit Inventory' : $text['add_data'] ?? 'Add Inventory')

@section('content')
<div class="container">
    <h2>{{ isset($inventoryDetail) ? $text['edit'] ?? 'Edit' : $text['add_data'] ?? 'Add' }} {{ $text['inventory'] ?? 'Inventory' }} {{ $text['material'] ?? 'Item' }}</h2>

    <form action="{{ isset($inventoryDetail) ? route('inventory.detail.update', $inventoryDetail->id) : route('inventory.store') }}" method="POST">
        @csrf
        @if(isset($inventoryDetail))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="receive_date">{{ $text['date1'] ?? 'Receive Date' }}</label>
            <input type="date" name="receive_date" id="receive_date" class="form-control" value="{{ old('receive_date', isset($inventoryDetail) ? $inventoryDetail->receive_date : '') }}" required>
        </div>

        <div class="form-group">
            <label for="location">{{ $text['location'] ?? 'Location' }}</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', isset($inventoryDetail) ? $inventoryDetail->location : '') }}" required>
        </div>

        <div class="form-group">
            <label for="plt_id">PLT ID</label>
            <input type="text" name="plt_id" id="plt_id" class="form-control" value="{{ old('plt_id', isset($inventoryDetail) ? $inventoryDetail->plt_id : '') }}" required>
        </div>

        <div class="form-group">
            <label for="material">{{ $text['material'] ?? 'Material' }}</label>
            <input type="text" name="material" id="material" class="form-control" value="{{ old('material', isset($inventoryDetail) ? $inventoryDetail->material : '') }}" required>
        </div>

        <div class="form-group">
            <label for="material_description">{{ $text['material_desc'] ?? 'Material Description' }}</label>
            <textarea name="material_description" id="material_description" class="form-control">{{ old('material_description', isset($inventoryDetail) ? $inventoryDetail->material_description : '') }}</textarea>
        </div>

        <div class="form-group">
            <label for="uom">{{ $text['uom'] ?? 'UOM (Unit of Measure)' }}</label>
            <input type="text" name="uom" id="uom" class="form-control" value="{{ old('uom', isset($inventoryDetail) ? $inventoryDetail->uom : '') }}" required>
        </div>

        <div class="form-group">
            <label for="unrestricted">{{ $text['unrestricted'] ?? 'Unrestricted Quantity' }}</label>
            <input type="number" name="unrestricted" id="unrestricted" class="form-control" value="{{ old('unrestricted', isset($inventoryDetail) ? $inventoryDetail->unrestricted : '') }}" required>
        </div>

        <div class="form-group">
            <label for="blocked">{{ $text['blocked'] ?? 'Blocked Quantity' }}</label>
            <input type="number" name="blocked" id="blocked" class="form-control" value="{{ old('blocked', isset($inventoryDetail) ? $inventoryDetail->blocked : '') }}" required>
        </div>

        <div class="form-group">
            <label for="remarks">{{ $text['remarks'] ?? 'Remarks' }}</label>
            <textarea name="remarks" id="remarks" class="form-control">{{ old('remarks', isset($inventoryDetail) ? $inventoryDetail->remarks : '') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">{{ isset($inventoryDetail) ? $text['edit'] ?? 'Update' : $text['add_data'] ?? 'Add' }} {{ $text['material'] ?? 'Item' }}</button>
        <a href="{{ route('inventory.detail.index') }}" class="btn btn-secondary">{{ $text['cancel'] ?? 'Cancel' }}</a>
    </form>
</div>
@endsection
