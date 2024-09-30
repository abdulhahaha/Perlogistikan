@extends('layouts.app')

@section('title', 'Pallet Movements')

@section('header', 'Pallet Movements List')

@section('content')
<div class="container">
    <h2>Daftar Pallet Movements</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="mb-3">
    <a href="{{ route('pallet_movement.add') }}" class="btn btn-primary mb-3">Add Pallet Movement</a>
    </div>
<table class="table table-striped table-hover">
        <thead class="thead-dark">
        <tr>
            <th>Date</th>
            <th>From PLT ID</th>
            <th>To PLT ID</th>
            <th>Material</th>
            <th>Material Description</th>
            <th>Location</th>
            <th>Quantity</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pallet_movement as $movement)
        <tr>
            <td>{{ $movement->date }}</td>
            <td>{{ $movement->fromPlt->id }}</td>
            <td>{{ $movement->toPlt->id }}</td>
            <td>{{ $movement->material->name }}</td>
            <td>{{ $movement->material->description }}</td>
            <td>{{ $movement->location->name }}</td>
            <td>{{ $movement->qty }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
