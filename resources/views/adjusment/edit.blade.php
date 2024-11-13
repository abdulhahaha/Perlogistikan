@extends('layouts.app')

@section('title', 'Edit Adjusment')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit Adjusment</h1>

        <form action="{{ route('adjusment.update', $adjusment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="date" class="form-control" value="{{ $adjusment->date }}" required>
            </div>
            <div class="form-group">
                <label>Referensi</label>
                <input type="text" name="reference" class="form-control" value="{{ $adjusment->reference }}" required>
            </div>
            <div class="form-group">
                <label>Lokasi</label>
                <input type="text" name="location" class="form-control" value="{{ $adjusment->location }}" required>
            </div>
            <div class="form-group">
                <label>PLT ID</label>
                <input type="text" name="plt_id" class="form-control" value="{{ $adjusment->plt_id }}" required>
            </div>
            <div class="form-group">
                <label>Material</label>
                <input type="text" name="material" class="form-control" value="{{ $adjusment->material }}" required>
            </div>
            <div class="form-group">
                <label>Deskripsi Material</label>
                <input type="text" name="material_description" class="form-control" value="{{ $adjusment->material_description }}" required>
            </div>
            <div class="form-group">
                <label>UOM</label>
                <input type="text" name="uom" class="form-control" value="{{ $adjusment->uom }}" required>
            </div>
            <div class="form-group">
                <label>Quantity</label>
                <input type="number" name="qty" class="form-control" value="{{ $adjusment->qty }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
