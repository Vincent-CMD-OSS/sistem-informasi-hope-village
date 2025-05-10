<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Panel') - {{ config('app.name', 'Panti Asuhan Rumah Harapan') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        /* Reset sederhana */
        body, html { margin: 0; padding: 0; font-family: 'Figtree', sans-serif; background-color: #f8f9fa; color: #333; }
        * { box-sizing: border-box; }

        .admin-layout {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styling */
        .admin-sidebar {
            width: 260px;
            background-color: #343a40; /* Warna gelap untuk sidebar */
            color: #adb5bd; /* Warna teks terang di sidebar */
            padding: 20px 0;
            position: fixed; /* Fix sidebar */
            height: 100%;
            overflow-y: auto; /* Scroll jika konten sidebar panjang */
            transition: width 0.3s ease;
        }
        .admin-sidebar .logo-container {
            padding: 0 25px 20px 25px; /* Tambah padding kiri kanan agar logo tidak mepet */
            text-align: center;
            border-bottom: 1px solid #495057;
            margin-bottom: 20px;
        }
        .admin-sidebar .logo-container a {
            font-size: 1.5em;
            font-weight: 600;
            color: #ffffff;
            text-decoration: none;
        }
        .admin-sidebar .menu-header {
            padding: 10px 25px;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: .05em;
            font-weight: 600;
            color: #869099; /* Warna header menu lebih pudar */
        }
        .admin-sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .admin-sidebar ul li a {
            display: flex; /* Menggunakan flex untuk ikon dan teks */
            align-items: center;
            padding: 12px 25px;
            color: #adb5bd;
            text-decoration: none;
            font-size: 0.95rem;
            transition: background-color 0.2s ease, color 0.2s ease;
        }
        .admin-sidebar ul li a:hover,
        .admin-sidebar ul li.active a {
            background-color: #495057; /* Warna hover/active */
            color: #ffffff;
            border-left: 3px solid #007bff; /* Indikator aktif di kiri */
            padding-left: 22px; /* Sesuaikan padding agar tetap rata */
        }
        .admin-sidebar ul li a .menu-icon { /* Placeholder untuk ikon */
            margin-right: 12px;
            width: 20px; /* Ukuran ikon */
            text-align: center;
            display: inline-block;
        }

        /* Main Content Wrapper (meliputi topbar dan content area) */
        .main-content-wrapper {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            margin-left: 260px; /* Sesuaikan dengan lebar sidebar */
            transition: margin-left 0.3s ease;
        }

        /* Topbar Styling */
        .admin-topbar {
            background-color: #ffffff;
            padding: 0 25px;
            height: 60px; /* Tinggi topbar */
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e9ecef;
            position: sticky; /* Agar topbar tetap di atas saat scroll konten */
            top: 0;
            z-index: 1000;
        }
        .admin-topbar .page-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #495057;
        }
        .admin-topbar .user-actions {
            display: flex;
            align-items: center;
        }
        .admin-topbar .user-info {
            margin-right: 15px;
            color: #495057;
        }
        .admin-topbar .logout-btn {
            background-color: #dc3545; /* Warna tombol logout */
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.875rem;
            transition: background-color 0.2s ease;
        }
        .admin-topbar .logout-btn:hover {
            background-color: #c82333;
        }

        /* Content Area Styling */
        .content-area {
            padding: 25px;
            flex-grow: 1;
            background-color: #f8f9fa; /* Latar belakang area konten */
        }
        .content-area .card {
            background-color: #ffffff;
            border: 1px solid #e9ecef;
            border-radius: .375rem; /* Sesuai referensi (Creative Tim) */
            box-shadow: 0 0.75rem 1.5rem rgba(18,38,63,.03); /* Shadow halus */
            margin-bottom: 1.5rem;
        }
        .content-area .card-header {
            padding: 1rem 1.5rem;
            margin-bottom: 0;
            background-color: #ffffff;
            border-bottom: 1px solid #e9ecef;
            font-size: 1.1rem;
            font-weight: 600;
        }
        .content-area .card-body {
            padding: 1.5rem;
        }
        /* Breadcrumbs (jika ingin ditambahkan nanti) */
        /* .breadcrumb { display: flex; list-style: none; padding: 0; margin: 0 0 1rem 0; font-size: 0.875rem; } */
        /* .breadcrumb-item + .breadcrumb-item::before { content: "/"; padding: 0 .5rem; color: #6c757d; } */
        /* .breadcrumb-item a { color: #007bff; text-decoration: none; } */
        /* .breadcrumb-item.active { color: #6c757d; } */

    </style>
    @stack('styles') <!-- Untuk CSS tambahan per halaman -->
</head>
<body class="font-sans antialiased">
    <div class="admin-layout">
        @include('partials.admin._sidebar')

        <div class="main-content-wrapper">
            @include('partials.admin._topbar')

            <main class="content-area">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts') <!-- Untuk JS tambahan per halaman -->
</body>
</html>