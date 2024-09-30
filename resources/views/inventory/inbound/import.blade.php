@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Import Data</h2>

    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <form action="{{ route('inventory.inbound.import') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Input File -->
                <div class="form-group">
                    <label for="file">Choose File</label>
                    <input type="file" name="file" class="form-control" id="file" required>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-file-import"></i> Import Data
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
