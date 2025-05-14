<nav class="navbar">
    <div class="navbar-container d-flex align-items-center justify-content-between">
        <a href="{{ url('/') }}" class="navbar-brand">Rumah Harapan</a>
        <ul class="navbar-menu d-flex">
        <li><a href="{{ url('/') }}"><i class="bi bi-house-check"></i> Beranda</a></li>
        <li><a href="{{ url('/profil') }}"><i class="bi bi-person-vcard-fill"></i> Profil</a></li>
        <li><a href="{{ url('/galeri') }}"><i class="bi bi-collection-play"></i> Galeri</a></li>
        <li><a href="{{ url('/operasional') }}"><i class="bi bi-calendar-check-fill"></i> Operasional</a></li>
        <li><a href="{{ url('/kegiatan') }}"><i class="bi bi-calendar-event-fill"></i> Kegiatan</a></li>
        <li><a href="{{ url('/kebutuhan') }}"><i class="bi bi-list-check"></i> Kebutuhan</a></li>
        <li><a href="{{ url('/donasi') }}"><i class="bi bi-gift-fill me-1"></i> Donasi</a></li>
        </ul>

    </div>
</nav>


<link rel="stylesheet" href="{{ asset('css/_navbar.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

