@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Edit Material</h1>
        
        <form action="{{ route('master.material.update', $material->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="material">Material:</label>
                <input type="text" name="material" id="material" class="form-control" value="{{ $material->material }}" required>
            </div>
            <div class="form-group">
                <label for="material_description">Material Description:</label>
                <input type="text" name="material_description" id="material_description" class="form-control" value="{{ $material->material_description }}" required>
            </div>
            <div class="form-group">
                <label for="uom">Unit of Measurement (UOM):</label>
                <input type="text" name="uom" id="uom" class="form-control" value="{{ $material->uom }}" required>
            </div>
            <div class="form-group">
                <label for="check">Check:</label>
                <select name="check" id="check" class="form-control" required>
                    <option value="1" {{ $material->check ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ !$material->check ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('master.material.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
