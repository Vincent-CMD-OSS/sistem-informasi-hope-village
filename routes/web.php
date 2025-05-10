<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth; // Pastikan Auth di-import jika digunakan di callback rute '/'

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    if (Auth::check()) { // Pastikan Auth sudah di-import
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('login');
});

// Grup Rute untuk Autentikasi Admin
Route::controller(AuthController::class)->group(function () {
    Route::get('login', 'showLoginForm')
        ->middleware('guest') // Tambahkan middleware 'guest' di sini
        ->name('login');

    Route::post('login', 'login')
        ->middleware('guest') // Tambahkan middleware 'guest' di sini
        ->name('login.submit');

    Route::post('logout', 'logout')
        ->middleware('auth')  // Tambahkan middleware 'auth' di sini
        ->name('logout.submit');
});


// Grup Rute untuk Area Admin yang Dilindungi Autentikasi
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');
});