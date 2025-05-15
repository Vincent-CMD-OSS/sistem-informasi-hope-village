{{-- resources/views/public/galeri_index.blade.php --}}
@extends('layouts.user')

@section('title', 'Galeri Kegiatan - Panti Asuhan Rumah Harapan')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/public_galeri_index.css') }}"> {{-- CSS Khusus Halaman Ini --}}
@endpush

@section('content')

{{-- Hero Section Kecil untuk Judul Halaman Galeri --}}
<section class="page-hero-section galeri-hero animate-fade-in">
    <div class="container text-center">
        <h1 class="page-title">Galeri Kegiatan</h1>
        <p class="page-slogan">Dokumentasi momen dan kegiatan inspiratif di Rumah Harapan.</p>
    </div>
</section>

<div class="container galeri-list-container my-5">
    @if($galeriItems->isEmpty())
        <div class="row">
            <div class="col-12 text-center empty-state">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                <h3 class="my-3">Galeri Masih Kosong</h3>
                <p>Belum ada foto atau video kegiatan yang dipublikasikan saat ini. Silakan kunjungi kembali nanti!</p>
                <a href="{{ route('home') }}" class="btn btn-primary mt-3">Kembali ke Beranda</a>
            </div>
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach($galeriItems as $item)
            <div class="col d-flex align-items-stretch">
                <div class="galeri-card animate-section">
                    <div class="galeri-card-img-wrapper">
                        <a href="#"> {{-- Nanti ganti ke route('public.galeri.show', $item->id) --}}
                            <img src="{{ $item->gambar ? Storage::url($item->gambar) : asset('images/placeholder-galeri-item.jpg') }}"
                                 alt="{{ $item->judul }}" class="galeri-card-img">
                        </a>
                        @if($item->tanggal_kegiatan)
                        <div class="galeri-card-date">
                            <span class="day">{{ $item->tanggal_kegiatan->format('d') }}</span>
                            <span class="month-year">{{ $item->tanggal_kegiatan->format('M Y') }}</span>
                        </div>
                        @endif
                    </div>
                    <div class="galeri-card-body">
                        <h5 class="galeri-card-title">
                             <a href="#">{{-- Nanti ganti ke route('public.galeri.show', $item->id) --}}
                                {{ Str::limit($item->judul, 50) }}
                            </a>
                        </h5>
                        <p class="galeri-card-text">
                            {{ Str::limit(strip_tags($item->deskripsi), 90, '...') }}
                        </p>
                        {{-- <a href="#" class="btn btn-outline-primary btn-sm galeri-card-readmore">Lihat Detail</a> --}}
                         {{-- Nanti ganti ke route('public.galeri.show', $item->id) --}}
                    </div>
                    <div class="galeri-card-footer">
                        <small class="text-muted">Diposting: {{ $item->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination Links --}}
        <div class="mt-5 d-flex justify-content-center">
            {{ $galeriItems->links() }}
        </div>
    @endif
</div>

@endsection

@push('scripts')
    {{-- Script untuk animasi section saat scroll (Intersection Observer) --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sections = document.querySelectorAll('.animate-section'); // Targetkan .galeri-card juga jika ingin per card
            const options = { threshold: 0.1 };
            const observer = new IntersectionObserver(function (entries, observer) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                    }
                });
            }, options);
            sections.forEach(section => { observer.observe(section); });
        });
    </script>
@endpush