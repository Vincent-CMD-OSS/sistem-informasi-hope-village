<aside class="admin-sidebar">
    <div class="logo-container">
        <a href="{{ route('admin.dashboard') }}">{{ config('app.name', 'Rumah Harapan') }}</a>
    </div>

    <div class="menu-header">Menu Utama</div>
    <ul>
        {{-- 
            Cara menambahkan class 'active':
            Request::routeIs('admin.dashboard') ? 'active' : ''
            atau
            request()->is('admin/dashboard*') ? 'active' : '' (gunakan pola URL)
        --}}
        <li class="{{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <span class="menu-icon">D</span> <!-- Placeholder Ikon -->
                Dashboard
            </a>
        </li>
        <li class="{{ Request::routeIs('admin.profile*') ? 'active' : '' }}">
            <a href="#"> {{-- Ganti # dengan route('admin.profile') nanti --}}
                <span class="menu-icon">P</span> <!-- Placeholder Ikon -->
                Profil
            </a>
        </li>
        <li class="{{ Request::routeIs('admin.kegiatan*') ? 'active' : '' }}">
            <a href="#"> {{-- Ganti # dengan route('admin.kegiatan.index') nanti --}}
                <span class="menu-icon">K</span> <!-- Placeholder Ikon -->
                Kegiatan
            </a>
        </li>
        <li class="{{ Request::routeIs('admin.jadwal*') ? 'active' : '' }}">
            <a href="#"> {{-- Ganti # dengan route('admin.jadwal.index') nanti --}}
                <span class="menu-icon">J</span> <!-- Placeholder Ikon -->
                Jadwal
            </a>
        </li>
        <li class="{{ Request::routeIs('admin.kebutuhan*') ? 'active' : '' }}">
            <a href="#"> {{-- Ganti # dengan route('admin.kebutuhan.index') nanti --}}
                <span class="menu-icon">B</span> <!-- Placeholder Ikon -->
                Kebutuhan
            </a>
        </li>
        <li class="{{ Request::routeIs('admin.donasi*') ? 'active' : '' }}">
            <a href="#"> {{-- Ganti # dengan route('admin.donasi.index') nanti --}}
                <span class="menu-icon">N</span> <!-- Placeholder Ikon -->
                Donasi
            </a>
        </li>
    </ul>

    {{-- Bisa tambahkan menu lain atau footer sidebar di sini --}}
</aside>