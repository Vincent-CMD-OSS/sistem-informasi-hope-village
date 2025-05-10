<header class="admin-topbar">
    <div class="page-title">
        @yield('page-title', 'Dashboard') {{-- Judul halaman default, bisa di-override dari view konten --}}
    </div>
    <div class="user-actions">
        @if (Auth::check())
            <span class="user-info">Halo, <strong>{{ Auth::user()->nama }}</strong>!</span>
            <form method="POST" action="{{ route('logout.submit') }}" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Keluar</button>
            </form>
        @endif
    </div>
</header>