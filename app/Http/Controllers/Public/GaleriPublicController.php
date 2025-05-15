<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Galeri; // Import model Galeri
use Illuminate\Http\Request;

class GaleriPublicController extends Controller
{
    public function index(Request $request)
    {
        // Ambil item galeri yang sudah 'published'
        // Diurutkan berdasarkan tanggal_kegiatan DESC, lalu created_at DESC
        // Dengan paginasi
        $galeriItems = Galeri::where('status_publikasi', 'published')
                            ->orderBy('tanggal_kegiatan', 'desc')
                            ->orderBy('created_at', 'desc')
                            ->paginate(9); // Tampilkan 9 item per halaman, sesuaikan

        return view('public.galeri_index', compact('galeriItems'));
    }

    // Method untuk menampilkan detail (nanti)
    /*
    public function show($id)
    {
        $galeriItem = Galeri::where('status_publikasi', 'published')->findOrFail($id);
        return view('public.galeri_show', compact('galeriItem'));
    }
    */
}