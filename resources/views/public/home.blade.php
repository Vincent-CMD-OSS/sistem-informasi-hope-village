<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panti Asuhan Rumah Harapan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>
<body>

    {{-- Include Sections --}}
    
    @include('public.partials._hero')
    @include('public.partials._profil')
    @include('public.partials._galeri')
    @include('public.partials._operasional')
    @include('public.partials._donasi')
    @include('public.partials._kontak')
    {{-- Include section lain jika ada --}}
</body>
</html>