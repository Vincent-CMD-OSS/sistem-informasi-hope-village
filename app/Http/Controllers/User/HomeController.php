<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Nanti kita akan import model HeroSlide di sini
// use App\Models\HeroSlide;

class HomeController extends Controller
{
    public function index()
    {
        // Nanti kita akan mengambil data hero slides dinamis dari database
        // $heroSlides = HeroSlide::where('is_active', true)->orderBy('order', 'asc')->take(3)->get();
        // return view('beranda', compact('heroSlides'));

        // Untuk sekarang, kita tampilkan view statis dulu
        return view('beranda');
    }
}