<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\JadwalOperasionalHarian;  // Sesuaikan nama model
use App\Models\JadwalOperasionalKhusus; // Sesuaikan nama model
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Untuk grouping hari

class OperasionalPublicController extends Controller
{
    public function index()
    {
        // Ambil Jadwal Operasional Harian
        // Di-group berdasarkan hari dan diurutkan jam mulai
        $jadwalHarianGrouped = JadwalOperasionalHarian::orderBy('jam_buka', 'asc')
            ->get()
            ->groupBy(function ($item) {
                // Pastikan 'hari' adalah string yang bisa di-capitalize
                return ucwords(strtolower($item->hari));
            });

        // Urutkan hari secara manual jika perlu (Senin, Selasa, ...)
        $urutanHari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $jadwalHarianSorted = collect($urutanHari)->mapWithKeys(function ($hari) use ($jadwalHarianGrouped) {
            return [$hari => $jadwalHarianGrouped->get($hari, collect())]; // Beri collection kosong jika hari tidak ada jadwal
        })->filter(fn($slots) => $slots->isNotEmpty()); // Hapus hari yang tidak punya slot jadwal sama sekali


        // Ambil Jadwal Operasional Khusus yang akan datang atau sedang berlangsung
        $jadwalKhusus = JadwalOperasionalKhusus::where('tanggal', '>=', Carbon::today())
            ->orderBy('tanggal', 'asc')
            ->take(10) // Ambil 10 jadwal khusus terdekat, sesuaikan
            ->get();

        return view('public.operasional_index', compact(
            'jadwalHarianSorted', // Gunakan yang sudah diurutkan harinya
            'jadwalKhusus'
        ));
    }
}