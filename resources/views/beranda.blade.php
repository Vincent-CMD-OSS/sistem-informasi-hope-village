@extends('layouts.app')

@section('title', 'Beranda - ' . config('app.name', 'Rumah Harapan'))

@section('content')
    {{-- Section Hero --}}
    @include('partials.user._hero')

    {{-- Section Profil (Akan ditambahkan nanti) --}}
    {{-- @include('partials.user._profil') --}}

    {{-- Section Galeri (Akan ditambahkan nanti) --}}
    {{-- @include('partials.user._galeri') --}}

    {{-- Section Operasional (Akan ditambahkan nanti) --}}
    {{-- @include('partials.user._operasional') --}}

    {{-- Section Donasi (Akan ditambahkan nanti) --}}
    {{-- @include('partials.user._donasi') --}}
@endsection