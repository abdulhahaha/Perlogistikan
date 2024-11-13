@extends('layouts.app')

@php
    $text = langData();
@endphp

@section('title', $text['edit'] ?? 'Edit Location')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">{{ $text['edit'] ?? 'Edit Location' }}</h1>
        
        <form action="{{ route('master.location.update', $location->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="area">{{ $text['area'] ?? 'Area' }}:</label>
                <input type="text" name="area" id="area" class="form-control" value="{{ $location->area }}" required>
            </div>
            <div class="form-group">
                <label for="whname">{{ $text['wh_name'] ?? 'WH Name' }}:</label>
                <input type="text" name="whname" id="whname" class="form-control" value="{{ $location->whname }}" required>
            </div>
            <div class="form-group">
                <label for="aisle">{{ $text['aisle'] ?? 'Aisle' }}:</label>
                <input type="text" name="aisle" id="aisle" class="form-control" value="{{ $location->aisle }}" required>
            </div>
            <div class="form-group">
                <label for="level">{{ $text['level'] ?? 'Level' }}:</label>
                <input type="text" name="level" id="level" class="form-control" value="{{ $location->level }}" required>
            </div>
            <div class="form-group">
                <label for="row">{{ $text['row'] ?? 'Row' }}:</label>
                <input type="text" name="row" id="row" class="form-control" value="{{ $location->row }}" required>
            </div>
            <div class="form-group">
                <label for="loc_area">{{ $text['loc_area'] ?? 'Location Area' }}:</label>
                <input type="text" name="loc_area" id="loc_area" class="form-control" value="{{ $location->loc_area }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('master.location.index') }}" class="btn btn-secondary">{{ $text['cancel'] ?? 'Cancel' }}</a>
        </form>
    </div>
@endsection
