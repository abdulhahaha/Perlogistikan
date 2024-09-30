@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Location Movements</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="mb-3">
    <a href="{{ route('location_movement.add') }}" class="btn btn-primary mb-3">Add Location Movement</a>
    </div>

    <table class="table table-striped table-hover">
        <thead class="thead-dark">
            <tr>
                <th>No.</th>
                <th>Date</th>
                <th>From Location</th>
                <th>Material</th>
                <th>Material Description</th>
                <th>PLT ID</th>
                <th>Quantity</th>
                <th>To Location</th>
            </tr>
        </thead>
        <tbody>
            @foreach($location_movement as $movement)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $movement->date }}</td>
                    <td>{{ $movement->fromLocation->loc_area }}</td>
                    <td>{{ $movement->material->material }}</td>
                    <td>{{ $movement->material_description }}</td>
                    <td>{{ $movement->plt_id }}</td>
                    <td>{{ $movement->qty }}</td>
                    <td>{{ $movement->toLocation->loc_area }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
