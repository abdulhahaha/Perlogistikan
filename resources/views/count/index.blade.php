@extends('layouts.app')

@section('title', 'Count')

@section('content')
    <div class="container">
        <h1 class="mb-4">Daftar Inventory</h1>

        <!-- Tombol untuk mengecek inventory otomatis -->
        <div class="mb-3">
            <a href="{{ route('count.check') }}" class="btn btn-primary">Cek Inventory</a>
        </div>

        <!-- Tabel daftar inventory -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Material</th>
                        <th>Deskripsi Material</th>
                        <th>Lokasi</th>
                        <th>Lokasi Aktual</th>
                        <th>UOM</th>
                        <th>Qty</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($counts as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->material }}</td>
                            <td>{{ $data->material_description }}</td>
                            <td>{{ $data->location ? 'Y' : 'N' }}</td>
                            <td>{{ $data->actual_location }}</td>
                            <td>{{ $data->uom }}</td>
                            <td>{{ $data->qty }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if ($counts->isEmpty())
            <div class="alert alert-warning" role="alert">
                Tidak ada data inventory yang tersedia.
            </div>
        @endif
    </div>
@endsection
