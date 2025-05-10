@extends('layouts.admin')

@section('title', 'Dashboard Admin') {{-- Mengatur judul tab browser --}}

@section('page-title', 'Dashboard') {{-- Mengatur judul yang tampil di topbar --}}

@section('content')
<div class="card">
    <div class="card-header">
        Selamat Datang!
    </div>
    <div class="card-body">
        <p>Anda berhasil login ke panel administrasi Panti Asuhan Rumah Harapan.</p>
        <p>Ini adalah halaman dashboard. Konten spesifik untuk dashboard akan ditampilkan di sini.</p>
        {{-- Konten dashboard lainnya akan ditambahkan di sini --}}
    </div>
</div>

{{-- Contoh card lain jika perlu --}}
{{-- <div class="card">
    <div class="card-header">
        Statistik Singkat
    </div>
    <div class="card-body">
        <p>Info statistik bisa ditaruh di sini...</p>
    </div>
</div> --}}
@endsection

@push('styles')
{{-- <link rel="stylesheet" href="{{ asset('css/dashboard-specific.css') }}"> --}}
{{-- CSS khusus untuk halaman dashboard bisa ditaruh di sini jika perlu --}}
@endpush

@push('scripts')
{{-- <script src="{{ asset('js/dashboard-specific.js') }}"></script> --}}
{{-- JS khusus untuk halaman dashboard bisa ditaruh di sini jika perlu --}}
@endpush