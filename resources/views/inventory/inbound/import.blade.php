@extends('layouts.app')

@php
    $text = langData();
@endphp

@section('title', $text['import'] ?? 'Import Inbound')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">{{ $text['import'] ?? 'Import' }} {{ $text['inbound'] ?? 'Data' }}</h2>

    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <form action="{{ route('inventory.inbound.import') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Input File -->
                <div class="form-group">
                    <label for="file">{{ $text['choose_file'] ?? 'Choose File' }}</label>
                    <input type="file" name="file" class="form-control" id="file" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-file-import"></i> {{ $text['import'] ?? 'Import' }} {{ $text['data'] ?? 'Data' }}
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
