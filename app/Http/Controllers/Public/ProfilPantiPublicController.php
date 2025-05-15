<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\ProfilPanti;
use App\Models\StrukturOrganisasiAnggota; // Jika ingin menampilkan daftar anggota
use App\Models\TimPendiriAnggota;       // Jika ingin menampilkan daftar anggota
use Illuminate\Http\Request;

class ProfilPantiPublicController extends Controller
{
    public function index()
    {
        $profilPanti = ProfilPanti::first(); // Ambil data profil utama

        if (!$profilPanti) {
            // Handle jika data profil panti tidak ditemukan, bisa redirect ke homepage atau tampilkan pesan
            // Untuk sekarang, kita biarkan view yang menghandle jika $profilPanti null
        }

        // Ambil data anggota struktur dan tim pendiri jika ingin ditampilkan
        $strukturAnggota = $profilPanti ? StrukturOrganisasiAnggota::where('profil_panti_id', $profilPanti->id)->orderBy('urutan', 'asc')->get() : collect();
        $timPendiri = $profilPanti ? TimPendiriAnggota::where('profil_panti_id', $profilPanti->id)->orderBy('urutan', 'asc')->get() : collect();

        return view('public.profil_panti_detail', compact(
            'profilPanti',
            'strukturAnggota',
            'timPendiri'
        ));
    }
}