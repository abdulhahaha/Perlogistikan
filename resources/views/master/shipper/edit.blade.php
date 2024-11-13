@extends('layouts.app')

@section('title', 'Edit Shipper')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Edit Shipper</h1>
        
        <form action="{{ route('master.shipper.update', $shipper->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="code">Code:</label>
                <input type="text" name="code" id="code" class="form-control" value="{{ $shipper->code }}" required>
            </div>
            <div class="form-group">
                <label for="shipper">Shipper Name:</label>
                <input type="text" name="shipper" id="shipper" class="form-control" value="{{ $shipper->shipper }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="1" {{ $shipper->status ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$shipper->status ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('master.shipper.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
