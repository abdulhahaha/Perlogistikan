@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Add Material</h1>
        
        <form action="{{ route('materials.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="material">Material:</label>
                <input type="text" name="material" id="material" class="form-control" required placeholder="Enter Material">
            </div>
            <div class="form-group">
                <label for="material_description">Material Description:</label>
                <input type="text" name="material_description" id="material_description" class="form-control" required placeholder="Enter Material Description">
            </div>
            <div class="form-group">
                <label for="uom">Unit of Measurement (UOM):</label>
                <input type="text" name="uom" id="uom" class="form-control" required placeholder="Enter Unit of Measurement">
            </div>
            <div class="form-group">
                <label for="check">Check:</label>
                <select name="check" id="check" class="form-control" required>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('master.material.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
