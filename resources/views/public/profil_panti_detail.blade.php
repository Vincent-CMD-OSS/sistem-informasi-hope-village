{{-- resources/views/public/profil_panti_detail.blade.php --}}
@extends('layouts.user')

@section('title', isset($profilPanti) ? 'Profil - ' . ($identitasPanti->nama_panti ?? 'Panti Asuhan') : 'Profil Panti Asuhan')

@push('styles')
    {{-- Pastikan path ini benar menuju file CSS yang sudah kamu buat --}}
    {{-- Jika CSS ada di resources/css/sections/namafile.css dan diimpor di app.css, baris ini mungkin tidak perlu --}}
    {{-- Jika CSS adalah file terpisah di public/css, maka ini benar: --}}
    <link rel="stylesheet" href="{{ asset('css/public_profil_detail.css') }}">
@endpush

@section('content')

@if(isset($profilPanti))
    {{-- Hero Section Kecil untuk Judul Halaman --}}
    <section class="page-hero-section animate-fade-in" style="{{ $profilPanti->tentang_kami_img ? 'background-image: url(' . asset('storage/' . $profilPanti->tentang_kami_img) . ');' : '' }}">
        <div class="container text-center">
            <h1 class="page-title">{{ $identitasPanti->nama_panti ?? 'Profil Panti Asuhan' }}</h1>
            @if($profilPanti->slogan)
            <p class="page-slogan">"{{ $profilPanti->slogan }}"</p>
            @endif
        </div>
    </section>

    <div class="container profil-detail-container my-5">

        {{-- Tentang Kami --}}
        <section id="tentang-kami-detail" class="profil-content-section animate-section">
            <div class="section-header text-center">
                <h2 class="section-heading">Tentang Kami</h2>
                <div class="divider"></div>
            </div>
            <div class="row align-items-center gy-4 mt-4">
                @if($profilPanti->tentang_kami_img)
                <div class="col-md-6">
                    <div class="image-container">
                        <img src="{{ asset('storage/' . $profilPanti->tentang_kami_img) }}" alt="Tentang {{ $identitasPanti->nama_panti ?? 'Panti Asuhan' }}" class="content-image">
                    </div>
                </div>
                @endif
                <div class="{{ $profilPanti->tentang_kami_img ? 'col-md-6' : 'col-md-12' }}">
                    <div class="text-content">
                        {!! nl2br(e($profilPanti->tentang_kami_deskripsi)) !!}
                    </div>
                </div>
            </div>
        </section>

        {{-- Sejarah Singkat --}}
        @if($profilPanti->sejarah_singkat_deskripsi)
        <section id="sejarah-detail" class="profil-content-section animate-section">
            <div class="section-header text-center">
                <h2 class="section-heading">Sejarah Singkat</h2>
                <div class="divider"></div>
            </div>
            <div class="row align-items-center gy-4 mt-4 {{ $profilPanti->sejarah_singkat_img ? 'flex-md-row-reverse' : '' }}"> {{-- Tukar posisi jika ada gambar --}}
                @if($profilPanti->sejarah_singkat_img)
                <div class="col-md-6">
                     <div class="image-container">
                        <img src="{{ asset('storage/' . $profilPanti->sejarah_singkat_img) }}" alt="Sejarah {{ $identitasPanti->nama_panti ?? 'Panti Asuhan' }}" class="content-image">
                    </div>
                </div>
                @endif
                <div class="{{ $profilPanti->sejarah_singkat_img ? 'col-md-6' : 'col-md-12' }}">
                    <div class="text-content">
                        {!! nl2br(e($profilPanti->sejarah_singkat_deskripsi)) !!}
                    </div>
                </div>
            </div>
        </section>
        @endif

        {{-- Visi & Misi --}}
        @if($profilPanti->visi_deskripsi || $profilPanti->misi_deskripsi)
        <section id="visi-misi-detail" class="profil-content-section animate-section">
            <div class="section-header text-center">
                <h2 class="section-heading">Visi & Misi</h2>
                <div class="divider"></div>
            </div>
            <div class="row align-items-start gy-4 mt-4"> {{-- align-items-start agar box visi dan misi sejajar atas --}}
                 @if($profilPanti->visi_misi_img)
                <div class="col-lg-5 col-md-6 order-md-2"> {{-- Gambar di kanan pada medium screen, di atas pada small --}}
                     <div class="image-container mb-4 mb-md-0">
                        <img src="{{ asset('storage/' . $profilPanti->visi_misi_img) }}" alt="Visi Misi {{ $identitasPanti->nama_panti ?? 'Panti Asuhan' }}" class="content-image">
                    </div>
                </div>
                @endif
                <div class="{{ $profilPanti->visi_misi_img ? 'col-lg-7 col-md-6 order-md-1' : 'col-md-12' }}">
                    @if($profilPanti->visi_deskripsi)
                    <div class="vision-mission-box">
                        <h3 class="sub-section-heading">Visi</h3>
                        <div class="text-content">
                            {!! nl2br(e($profilPanti->visi_deskripsi)) !!}
                        </div>
                    </div>
                    @endif
                    @if($profilPanti->misi_deskripsi)
                    <div class="vision-mission-box">
                        <h3 class="sub-section-heading">Misi</h3>
                        <div class="text-content">
                            {!! nl2br(e($profilPanti->misi_deskripsi)) !!}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </section>
        @endif

        {{-- Struktur Organisasi --}}
        @if($profilPanti->struktur_organisasi_img_utama || (isset($strukturAnggota) && $strukturAnggota->isNotEmpty()))
        <section id="struktur-organisasi-detail" class="profil-content-section animate-section">
            <div class="section-header text-center">
                <h2 class="section-heading">Struktur Organisasi</h2>
                <div class="divider"></div>
            </div>
            @if($profilPanti->struktur_organisasi_img_utama)
                <div class="struktur-img-container text-center"> {{-- Bungkus gambar struktur --}}
                    <img src="{{ asset('storage/' . $profilPanti->struktur_organisasi_img_utama) }}" alt="Struktur Organisasi {{ $identitasPanti->nama_panti ?? 'Panti Asuhan' }}" class="img-fluid content-image-full">
                </div>
            @endif

            @if(isset($strukturAnggota) && $strukturAnggota->isNotEmpty())
                <div class="anggota-carousel-wrapper">
                    <h4 class="list-heading">Anggota Pengurus</h4>
                    <div class="anggota-carousel">
                        @foreach($strukturAnggota as $anggota)
                            <div class="anggota-card">
                                <div class="anggota-card-image-wrapper">
                                    @if($anggota->foto_path)
                                        <img src="{{ asset('storage/' . $anggota->foto_path) }}" alt="{{ $anggota->nama }}" class="anggota-card-img">
                                    @else
                                        <img src="{{ asset('images/placeholder_avatar.png') }}" alt="Avatar" class="anggota-card-img">
                                    @endif
                                </div>
                                <div class="anggota-card-content">
                                    <h5 class="anggota-nama">{{ $anggota->nama }}</h5>
                                    <p class="anggota-jabatan">{{ $anggota->jabatan }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </section>
        @endif

        {{-- Tim Pendiri --}}
        @if($profilPanti->tim_pendiri_img_utama || (isset($timPendiri) && $timPendiri->isNotEmpty()))
        <section id="tim-pendiri-detail" class="profil-content-section animate-section">
            <div class="section-header text-center">
                <h2 class="section-heading">Tim Pendiri</h2>
                <div class="divider"></div>
            </div>
            @if($profilPanti->tim_pendiri_img_utama)
                 <div class="struktur-img-container text-center"> {{-- Bungkus gambar tim pendiri --}}
                    <img src="{{ asset('storage/' . $profilPanti->tim_pendiri_img_utama) }}" alt="Tim Pendiri {{ $identitasPanti->nama_panti ?? 'Panti Asuhan' }}" class="img-fluid content-image-full">
                </div>
            @endif

            @if(isset($timPendiri) && $timPendiri->isNotEmpty())
                <div class="anggota-carousel-wrapper">
                    <h4 class="list-heading">Anggota Pendiri</h4>
                    <div class="anggota-carousel">
                        @foreach($timPendiri as $pendiri)
                            <div class="anggota-card">
                                <div class="anggota-card-image-wrapper">
                                    @if($pendiri->foto_path)
                                        <img src="{{ asset('storage/' . $pendiri->foto_path) }}" alt="{{ $pendiri->nama }}" class="anggota-card-img">
                                    @else
                                        <img src="{{ asset('images/placeholder_avatar.png') }}" alt="Avatar" class="anggota-card-img">
                                    @endif
                                </div>
                                <div class="anggota-card-content">
                                    <h5 class="anggota-nama">{{ $pendiri->nama }}</h5>
                                    <p class="anggota-jabatan">{{ $pendiri->jabatan_atau_peran }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </section>
        @endif

    </div>
@else
    <div class="container my-5 text-center empty-state">
        {{-- SVG bisa diganti dengan Font Awesome icon jika lebih mudah --}}
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
        <h3 class="my-3">Oops! Informasi Belum Tersedia</h3>
        <p>Mohon maaf, informasi profil panti asuhan saat ini belum dapat ditampilkan.</p>
        <a href="{{ route('home') }}" class="btn btn-primary mt-3">Kembali ke Beranda</a>
    </div>
@endif

@endsection

@push('scripts')
    {{-- Script untuk animasi section saat scroll (Intersection Observer) --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sections = document.querySelectorAll('.animate-section');
            const options = {
                root: null, // relative to document viewport
                rootMargin: '0px', // margin around root
                threshold: 0.1 // 10% of item is visible
            };

            const observer = new IntersectionObserver(function (entries, observer) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        // observer.unobserve(entry.target); // Opsional: berhenti mengamati setelah animasi pertama
                    }
                });
            }, options);

            sections.forEach(section => {
                observer.observe(section);
            });
        });
    </script>
@endpush