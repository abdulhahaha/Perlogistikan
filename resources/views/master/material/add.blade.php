@extends('layouts.app')

@php
    $text = langData();
@endphp

@section('title', $text['add_data'] ?? 'Add Material')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">{{  $text['add_data'] ?? 'Add Material' }}</h1>
        
        <form action="{{ route('materials.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="material">{{ $text['material'] ?? 'Material' }}</label>
                <input type="text" name="material" id="material" class="form-control" required placeholder="Enter Material">
            </div>
            <div class="form-group">
                <label for="material_description">{{ $text['material_desc'] ?? 'Material Description' }}</label>
                <input type="text" name="material_description" id="material_description" class="form-control" required placeholder="Enter Material Description">
            </div>
            <div class="form-group">
                <label for="uom">{{ $text['uom'] ?? 'Unit Of Measurement (UOM)' }}</label>
                <input type="text" name="uom" id="uom" class="form-control" required placeholder="Enter Unit of Measurement">
            </div>
            <div class="form-group">
                <label for="check">{{ $text['check'] ?? 'Check' }}</label>
                <select name="check" id="check" class="form-control" required>
                    <option value="1">{{ $text['yes'] ?? 'Yes' }}</option>
                    <option value="0">{{ $text['no'] ?? 'No' }}</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">{{ $text['save'] ?? 'Save' }}</button>
            <a href="{{ route('master.material.index') }}" class="btn btn-secondary">{{ $text['cancel'] ?? 'Cancel' }}</a>
        </form>
    </div>
@endsection
