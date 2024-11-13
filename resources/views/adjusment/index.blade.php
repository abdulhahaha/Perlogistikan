@extends('layouts.app')

@php
    $text = langData();
@endphp

@section('title', 'Adjusment')

@section('content')
    <div class="container">
        <h1 class="mb-4">Adjusment</h1>

        <a href="{{ route('adjusment.create') }}" class="btn btn-primary mb-3">Tambah Adjustment</a>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Referensi</th>
                        <th>Lokasi</th>
                        <th>PLT ID</th>
                        <th>Material</th>
                        <th>Deskripsi Material</th>
                        <th>UOM</th>
                        <th>Qty</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($adjusments as $adjusment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $adjusment->date }}</td>
                            <td>{{ $adjusment->reference }}</td>
                            <td>{{ $adjusment->location }}</td>
                            <td>{{ $adjusment->plt_id }}</td>
                            <td>{{ $adjusment->material }}</td>
                            <td>{{ $adjusment->material_description }}</td>
                            <td>{{ $adjusment->uom }}</td>
                            <td>{{ $adjusment->qty }}</td>
                            <td>
                                <a href="{{ route('adjusment.edit', $adjusment->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('adjusment.destroy', $adjusment->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
