<?php

namespace App\Http\Controllers\Public; // Pastikan namespace benar

use App\Http\Controllers\Controller; // Import base Controller
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama publik (beranda).
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Nanti Anda bisa menambahkan logic untuk mengambil data di sini
        // $beritaTerbaru = Berita::latest()->take(3)->get();
        // $jumlahDonasi = Donasi::sum('jumlah');

        // return view('public.home', compact('beritaTerbaru', 'jumlahDonasi'));

        // Untuk sekarang, cukup tampilkan view
        return view('public.home');
    }

    // Anda bisa menambahkan method lain di sini untuk halaman publik lainnya
    // public function tentangKami() { ... }
    // public function kontak() { ... }
}