@extends('layouts.app')

@section('title', 'Tambah Adjusment')

@section('content')
    <div class="container">
        <h1 class="mb-4">Tambah Adjustment</h1>

        <form action="{{ route('adjusment.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="date" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Referensi</label>
                <input type="text" name="reference" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Lokasi</label>
                <input type="text" name="location" class="form-control" required>
            </div>
            <div class="form-group">
                <label>PLT ID</label>
                <input type="text" name="plt_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Material</label>
                <input type="text" name="material" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Deskripsi Material</label>
                <input type="text" name="material_description" class="form-control" required>
            </div>
            <div class="form-group">
                <label>UOM</label>
                <input type="text" name="uom" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Quantity</label>
                <input type="number" name="qty" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
