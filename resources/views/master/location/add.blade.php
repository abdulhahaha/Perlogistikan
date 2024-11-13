@extends('layouts.app')

@php
    $text = langData();
@endphp

@section('title', $text['add_data'] ?? 'Add Location')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">{{ $text['add_data'] ?? 'Add Location' }}</h1>
        
        <form action="{{ route('locations.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="area">{{ $text['area'] ?? 'Area' }}:</label>
                <input type="text" name="area" id="area" class="form-control" required placeholder="Enter Area">
            </div>
            <div class="form-group">
                <label for="whname">{{ $text['wh_name'] ?? 'WH Name' }}:</label>
                <input type="text" name="whname" id="whname" class="form-control" required placeholder="Enter Warehouse Name">
            </div>
            <div class="form-group">
                <label for="aisle">{{ $text['aisle'] ?? 'Aisle' }}:</label>
                <input type="text" name="aisle" id="aisle" class="form-control" required placeholder="Enter Aisle">
            </div>
            <div class="form-group">
                <label for="level">{{ $text['level'] ?? 'Level' }}:</label>
                <input type="text" name="level" id="level" class="form-control" required placeholder="Enter Level">
            </div>
            <div class="form-group">
                <label for="row">{{ $text['row'] ?? 'Row' }}:</label>
                <input type="text" name="row" id="row" class="form-control" required placeholder="Enter Row">
            </div>
            <div class="form-group">
                <label for="loc_area">{{ $text['loc_area'] ?? 'Location Area' }}:</label>
                <input type="text" name="loc_area" id="loc_area" class="form-control" required placeholder="Enter Location Area">
            </div>
            <button type="submit" class="btn btn-primary">{{ $text['save'] ?? 'Save' }}</button>
            <a href="{{ route('master.location.index') }}" class="btn btn-secondary">{{ $text['cancel'] ?? 'Cancel' }}</a>
        </form>
    </div>
@endsection
