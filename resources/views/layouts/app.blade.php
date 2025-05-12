<head>
    {{-- ... meta tags ... --}}
    <title>@yield('title', 'Panti Asuhan Rumah Harapan')</title> {{-- Ganti default title --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- Icomoon (Jika Anda punya file icomoon.css di public/assets/icomoon/) -->
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/icomoon/icomoon.css') }}"> --}}
    {{-- Alternatif: Font Awesome jika lebih mudah --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Custom CSS untuk User -->
    <link rel="stylesheet" href="{{ asset('css/user-styles.css') }}">

    @stack('styles')
</head>
<body>
    {{-- <div class="preloader"></div> --}} {{-- Akan kita aktifkan nanti --}}

    {{-- Navbar akan ditambahkan di sini nanti --}}
    {{-- <header>
        @include('partials.user._navbar')
    </header> --}}

    <main>
        @yield('content')
    </main>

    {{-- Footer akan ditambahkan di sini nanti --}}
    {{-- <footer>
        @include('partials.user._footer')
    </footer> --}}

    <!-- jQuery (Jika ada script dari template yang membutuhkannya) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Jarallax (jika ingin digunakan untuk efek parallax) -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/jarallax@2/dist/jarallax.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/jarallax@2/dist/jarallax-video.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/jarallax@2/dist/jarallax-element.min.js"></script> --}}


    <!-- Custom JS untuk User -->
    <script src="{{ asset('js/user-scripts.js') }}"></script>

    {{-- Inisialisasi Jarallax jika digunakan --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (typeof jarallax !== 'undefined') {
                jarallax(document.querySelectorAll('.jarallax'), {
                    speed: 0.2 // default speed
                });
            }
        });
    </script> --}}

    @stack('scripts')
</body>
</html>