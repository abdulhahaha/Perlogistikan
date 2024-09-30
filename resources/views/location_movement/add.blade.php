@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Buat Location Movement</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('location_movement.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="from_location">From Location:</label>
            <select name="from_location" class="form-control" required>
                @foreach($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->loc_area }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="material_id">Material:</label>
            <select name="material_id" class="form-control" required>
                @foreach($materials as $material)
                    <option value="{{ $material->id }}">{{ $material->material }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="material_description">Material Description:</label>
            <input type="text" name="material_description" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="plt_id">PLT ID:</label>
            <select name="plt_id" class="form-control" required>
                @foreach($inventoryDetails as $inventoryDetail)
                    <option value="{{ $inventoryDetail->id }}">{{ $inventoryDetail->plt_id }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="qty">Quantity:</label>
            <input type="number" name="qty" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="to_location">To Location:</label>
            <select name="to_location" class="form-control" required>
                @foreach($locations as $location)
                    <option value="{{ $location->loc_area }}">{{ $location->loc_area }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
