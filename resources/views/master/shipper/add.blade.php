@extends('layouts.app')

@section('title', 'Add Shipper')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Create Shipper</h1>
        
        <form action="{{ route('shippers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="code">Code:</label>
                <input type="text" name="code" id="code" class="form-control" required placeholder="Enter Shipper Code">
            </div>
            <div class="form-group">
                <label for="shipper">Shipper Name:</label>
                <input type="text" name="shipper" id="shipper" class="form-control" required placeholder="Enter Shipper Name">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('master.shipper.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
