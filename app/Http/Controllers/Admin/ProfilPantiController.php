<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilPanti;
use App\Models\StrukturOrganisasiAnggota;
use App\Models\TimPendiriAnggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException; // Import ValidationException

class ProfilPantiController extends Controller
{
    public function edit()
    {
        $profil = ProfilPanti::getData();
        // Ambil data yang mungkin dikirim oleh redirect dari store/update anggota jika ada error
        $editStrukturAnggota = session('editStrukturAnggota');
        $editTimPendiri = session('editTimPendiri');

        // Hapus dari session agar tidak muncul lagi pada refresh berikutnya
        session()->forget(['editStrukturAnggota', 'editTimPendiri']);

        return view('admin.profil_panti.edit', [
            'profil' => $profil,
            'strukturAnggota' => $profil->strukturOrganisasiAnggota()->orderBy('urutan')->get(),
            'timPendiri' => $profil->timPendiriAnggota()->orderBy('urutan')->get(),
            'editStrukturAnggota' => $editStrukturAnggota,
            'editTimPendiri' => $editTimPendiri,
        ]);
    }

    public function update(Request $request)
    {
        // ... (kode update profil utama sudah oke) ...
        $profil = ProfilPanti::getData();

        $validatedData = $request->validate([
            'slogan' => 'nullable|string|max:255',
            'tentang_kami_deskripsi' => 'nullable|string',
            'tentang_kami_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            // ... field lain ...
            'lokasi_img' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [], [ // Custom attribute names (opsional, tapi baik untuk user-friendly messages)
            'tentang_kami_img' => 'Gambar Tentang Kami',
            'sejarah_singkat_img' => 'Gambar Sejarah Singkat',
            // ... dan seterusnya untuk field gambar
        ]);
        // ... (sisa logika update profil utama) ...
        $dataToUpdate = $request->except(['_token', '_method']); // Ambil semua kecuali token dan method

        $imageFields = [
            'tentang_kami_img', 'sejarah_singkat_img', 'visi_misi_img',
            'struktur_organisasi_img_utama', 'tim_pendiri_img_utama', 'lokasi_img'
        ];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                // Pastikan field ada di validatedData sebelum memprosesnya lebih lanjut
                // (ini penting jika field tidak required dan tidak dikirim)
                if (array_key_exists($field, $validatedData)) {
                    if ($profil->$field && Storage::disk('public')->exists($profil->$field)) {
                        Storage::disk('public')->delete($profil->$field);
                    }
                    $path = $request->file($field)->store('profil_panti_images', 'public');
                    $dataToUpdate[$field] = $path;
                }
            } elseif ($request->boolean("remove_{$field}")) {
                if ($profil->$field && Storage::disk('public')->exists($profil->$field)) {
                    Storage::disk('public')->delete($profil->$field);
                }
                $dataToUpdate[$field] = null;
            } else {
                // Jika tidak ada file baru dan tidak ada remove, jangan ubah field gambar di $dataToUpdate
                // kecuali jika field tersebut tidak ada di request (misalnya tidak di-validate).
                // Untuk aman, hanya masukkan field yang di-validate atau yang di-handle secara eksplisit (seperti remove).
                // Jika $validatedData sudah mencakup semua field teks, maka $dataToUpdate = $validatedData; sudah cukup untuk teks.
                // Kita perlu memastikan field gambar tidak di-overwrite menjadi null jika tidak ada aksi.
                if (!array_key_exists($field, $dataToUpdate) && !$request->boolean("remove_{$field}")) {
                     unset($dataToUpdate[$field]); // Jangan update field gambar jika tidak ada file baru & tidak di-remove
                }
            }
        }
        // Untuk field teks, kita bisa ambil langsung dari $validatedData
        $textFields = array_diff(array_keys($validatedData), $imageFields);
        foreach($textFields as $textField){
            if(isset($validatedData[$textField])){
                $dataToUpdate[$textField] = $validatedData[$textField];
            }
        }


        $profil->update($dataToUpdate);
        return redirect()->route('admin.profil.panti.edit')->with('success', 'Profil panti berhasil diperbarui.');
    }


    // --- CRUD Struktur Organisasi Anggota ---
    public function storeStrukturAnggota(Request $request)
    {
        $profilPanti = ProfilPanti::getData();
        try {
            $validatedData = $request->validate([
                'nama_anggota' => 'required|string|max:255',
                'jabatan' => 'required|string|max:255',
                'foto_anggota' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'deskripsi_singkat' => 'nullable|string',
                'urutan' => 'nullable|integer|min:0',
            ]);

            $validatedData['profil_panti_id'] = $profilPanti->id;

            if ($request->hasFile('foto_anggota')) {
                $path = $request->file('foto_anggota')->store('struktur_anggota_images', 'public');
                $validatedData['foto_anggota'] = $path;
            }

            StrukturOrganisasiAnggota::create($validatedData);
            return redirect()->route('admin.profil.panti.edit')->with('success_struktur', 'Anggota struktur berhasil ditambahkan.');

        } catch (ValidationException $e) {
            return redirect()->route('admin.profil.panti.edit')
                ->withErrors($e->validator, 'struktur_store') // Error bag untuk form tambah
                ->withInput(); // Kirim kembali old input
        }
    }

    public function editStrukturAnggota(StrukturOrganisasiAnggota $strukturOrganisasiAnggota)
    {
        // Menggunakan session flash untuk mengirim data ke method edit utama
        // agar modal bisa terbuka otomatis dengan data yang benar.
        return redirect()->route('admin.profil.panti.edit')
            ->with('editStrukturAnggota', $strukturOrganisasiAnggota);
    }

    public function updateStrukturAnggota(Request $request, StrukturOrganisasiAnggota $strukturOrganisasiAnggota)
    {
        $errorBagName = 'struktur_update_' . $strukturOrganisasiAnggota->id;
        try {
            $validatedData = $request->validate([
                'nama_anggota' => 'required|string|max:255',
                'jabatan' => 'required|string|max:255',
                'foto_anggota' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'deskripsi_singkat' => 'nullable|string',
                'urutan' => 'nullable|integer|min:0',
                'remove_foto_anggota' => 'nullable|boolean',
            ]);

            $dataToUpdate = $validatedData;
            unset($dataToUpdate['remove_foto_anggota']);

            if ($request->hasFile('foto_anggota')) {
                if ($strukturOrganisasiAnggota->foto_anggota && Storage::disk('public')->exists($strukturOrganisasiAnggota->foto_anggota)) {
                    Storage::disk('public')->delete($strukturOrganisasiAnggota->foto_anggota);
                }
                $path = $request->file('foto_anggota')->store('struktur_anggota_images', 'public');
                $dataToUpdate['foto_anggota'] = $path;
            } elseif ($request->boolean('remove_foto_anggota')) {
                if ($strukturOrganisasiAnggota->foto_anggota && Storage::disk('public')->exists($strukturOrganisasiAnggota->foto_anggota)) {
                    Storage::disk('public')->delete($strukturOrganisasiAnggota->foto_anggota);
                }
                $dataToUpdate['foto_anggota'] = null;
            }

            $strukturOrganisasiAnggota->update($dataToUpdate);
            return redirect()->route('admin.profil.panti.edit')->with('success_struktur', 'Anggota struktur berhasil diperbarui.');

        } catch (ValidationException $e) {
            return redirect()->route('admin.profil.panti.edit')
                ->withErrors($e->validator, $errorBagName)
                ->withInput()
                ->with('editStrukturAnggota', $strukturOrganisasiAnggota); // Kirim kembali data anggota untuk prefill form
        }
    }

    public function destroyStrukturAnggota(StrukturOrganisasiAnggota $strukturOrganisasiAnggota)
    {
        // ... (kode destroy sudah oke) ...
        if ($strukturOrganisasiAnggota->foto_anggota && Storage::disk('public')->exists($strukturOrganisasiAnggota->foto_anggota)) {
            Storage::disk('public')->delete($strukturOrganisasiAnggota->foto_anggota);
        }
        $strukturOrganisasiAnggota->delete();
        return redirect()->route('admin.profil.panti.edit')->with('success_struktur', 'Anggota struktur berhasil dihapus.');
    }


    // --- CRUD Tim Pendiri Anggota ---
    public function storeTimPendiri(Request $request)
    {
        $profilPanti = ProfilPanti::getData();
        try {
            $validatedData = $request->validate([
                'nama_pendiri' => 'required|string|max:255',
                'peran_atau_jabatan' => 'nullable|string|max:255',
                'deskripsi_kontribusi' => 'nullable|string',
                'foto_pendiri' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'urutan' => 'nullable|integer|min:0',
            ]);

            $validatedData['profil_panti_id'] = $profilPanti->id;

            if ($request->hasFile('foto_pendiri')) {
                $path = $request->file('foto_pendiri')->store('pendiri_anggota_images', 'public');
                $validatedData['foto_pendiri'] = $path;
            }

            TimPendiriAnggota::create($validatedData);
            return redirect()->route('admin.profil.panti.edit')->with('success_pendiri', 'Anggota tim pendiri berhasil ditambahkan.');

        } catch (ValidationException $e) {
            return redirect()->route('admin.profil.panti.edit')
                ->withErrors($e->validator, 'pendiri_store') // Error bag untuk form tambah
                ->withInput();
        }
    }

    public function editTimPendiri(TimPendiriAnggota $timPendiriAnggota)
    {
        return redirect()->route('admin.profil.panti.edit')
            ->with('editTimPendiri', $timPendiriAnggota);
    }

    public function updateTimPendiri(Request $request, TimPendiriAnggota $timPendiriAnggota)
    {
        $errorBagName = 'pendiri_update_' . $timPendiriAnggota->id;
        try {
            $validatedData = $request->validate([
                'nama_pendiri' => 'required|string|max:255',
                'peran_atau_jabatan' => 'nullable|string|max:255',
                'deskripsi_kontribusi' => 'nullable|string',
                'foto_pendiri' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'urutan' => 'nullable|integer|min:0',
                'remove_foto_pendiri' => 'nullable|boolean',
            ]);

            $dataToUpdate = $validatedData;
            unset($dataToUpdate['remove_foto_pendiri']);

            if ($request->hasFile('foto_pendiri')) {
                if ($timPendiriAnggota->foto_pendiri && Storage::disk('public')->exists($timPendiriAnggota->foto_pendiri)) {
                    Storage::disk('public')->delete($timPendiriAnggota->foto_pendiri);
                }
                $path = $request->file('foto_pendiri')->store('pendiri_anggota_images', 'public');
                $dataToUpdate['foto_pendiri'] = $path;
            } elseif ($request->boolean('remove_foto_pendiri')) {
                if ($timPendiriAnggota->foto_pendiri && Storage::disk('public')->exists($timPendiriAnggota->foto_pendiri)) {
                    Storage::disk('public')->delete($timPendiriAnggota->foto_pendiri);
                }
                $dataToUpdate['foto_pendiri'] = null;
            }

            $timPendiriAnggota->update($dataToUpdate);
            return redirect()->route('admin.profil.panti.edit')->with('success_pendiri', 'Anggota tim pendiri berhasil diperbarui.');

        } catch (ValidationException $e) {
            return redirect()->route('admin.profil.panti.edit')
                ->withErrors($e->validator, $errorBagName)
                ->withInput()
                ->with('editTimPendiri', $timPendiriAnggota);
        }
    }

    public function destroyTimPendiri(TimPendiriAnggota $timPendiriAnggota)
    {
        // ... (kode destroy sudah oke) ...
        if ($timPendiriAnggota->foto_pendiri && Storage::disk('public')->exists($timPendiriAnggota->foto_pendiri)) {
            Storage::disk('public')->delete($timPendiriAnggota->foto_pendiri);
        }
        $timPendiriAnggota->delete();
        return redirect()->route('admin.profil.panti.edit')->with('success_pendiri', 'Anggota tim pendiri berhasil dihapus.');
    }
}