@extends('layouts.app')

@php
    $text = langData();
@endphp

@section('title')
    {{ $text['title'] ?? 'Default Judul' }}
@endsection

@section('content')
    <div class="left-content">
        <img src="{{ asset('images/warehouse.png') }}" alt="{{ $text['gambar'] ?? 'Default Alt Text' }}">
    </div>
    <div class="right-content">
        <h1>{{ $text['desc'] ?? 'Default Description' }}</h1>
        <p>{{ $text['sub_desc'] ?? 'Default Sub Description' }}</p>
    </div>
@endsection
