@extends('layouts.app')

@section('title', 'Add Pallet Movement')

@section('header', 'Add New Pallet Movement')

@section('content')
<div class="container">
    <h2>Buat Pallet Movement</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pallet_movement.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="from_plt_id">From PLT ID:</label>
            <select name="from_plt_id" class="form-control" required>
                @foreach($inventoryDetails as $inventoryDetail)
                    <option value="{{ $inventoryDetail->id }}">{{ $inventoryDetail->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="to_plt_id">To PLT ID:</label>
            <select name="to_plt_id" class="form-control" required>
                @foreach($inventoryDetails as $inventoryDetail)
                    <option value="{{ $inventoryDetail->id }}">{{ $inventoryDetail->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="material_id">Material:</label>
            <select name="material_id" class="form-control" required>
                @foreach($materials as $material)
                    <option value="{{ $material->id }}">{{ $material->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="location_id">Location:</label>
            <select name="location_id" class="form-control" required>
                @foreach($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="qty">Quantity:</label>
            <input type="number" name="qty" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
