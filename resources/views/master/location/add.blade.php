@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Add Location</h1>
        
        <form action="{{ route('locations.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="area">Area:</label>
                <input type="text" name="area" id="area" class="form-control" required placeholder="Enter Area">
            </div>
            <div class="form-group">
                <label for="whname">Warehouse Name (WH Name):</label>
                <input type="text" name="whname" id="whname" class="form-control" required placeholder="Enter Warehouse Name">
            </div>
            <div class="form-group">
                <label for="aisle">Aisle:</label>
                <input type="text" name="aisle" id="aisle" class="form-control" required placeholder="Enter Aisle">
            </div>
            <div class="form-group">
                <label for="level">Level:</label>
                <input type="text" name="level" id="level" class="form-control" required placeholder="Enter Level">
            </div>
            <div class="form-group">
                <label for="row">Row:</label>
                <input type="text" name="row" id="row" class="form-control" required placeholder="Enter Row">
            </div>
            <div class="form-group">
                <label for="loc_area">Location Area:</label>
                <input type="text" name="loc_area" id="loc_area" class="form-control" required placeholder="Enter Location Area">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('master.location.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
