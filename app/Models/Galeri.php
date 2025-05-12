<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Untuk Str::slug

class Galeri extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terhubung dengan model.
     *
     * @var string
     */
    protected $table = 'galeri';

    /**
     * Atribut yang dapat diisi secara massal (mass assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'judul',
        'tanggal_kegiatan',
        'lokasi',
        'deskripsi',
        'gambar',
        'slug',
        'status_publikasi',
        // 'is_published', // Jika menggunakan boolean
    ];

    /**
     * Atribut yang harus di-cast ke tipe data asli.
     *
     * @var array
     */
    protected $casts = [
        'tanggal_kegiatan' => 'date',
        // 'is_published' => 'boolean', // Jika menggunakan boolean
    ];

    /**
     * Boot a new instance of the model.
     * Kita bisa menggunakan event 'creating' atau 'saving' untuk auto-generate slug.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($galeri) {
            if (empty($galeri->slug)) {
                $galeri->slug = static::generateUniqueSlug($galeri->judul);
            }
        });

        static::updating(function ($galeri) {
            // Hanya update slug jika judul berubah dan slug tidak diisi manual
            // atau jika slug belum ada (kasus data lama)
            if ($galeri->isDirty('judul') && empty($galeri->getOriginal('slug'))) {
                 $galeri->slug = static::generateUniqueSlug($galeri->judul, $galeri->id);
            } elseif (empty($galeri->slug) && !empty($galeri->judul)) { // Jika slug kosong tapi judul ada
                 $galeri->slug = static::generateUniqueSlug($galeri->judul, $galeri->id);
            }
        });
    }

    /**
     * Generate a unique slug.
     *
     * @param string $title
     * @param int|null $excludeId Untuk kasus update, agar tidak bentrok dengan diri sendiri
     * @return string
     */
    public static function generateUniqueSlug(string $title, int $excludeId = null): string
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        // Loop untuk memastikan slug unik
        while (static::slugExists($slug, $excludeId)) {
            $slug = $originalSlug . '-' . $count++;
        }
        return $slug;
    }

    /**
     * Check if a slug exists in the database.
     *
     * @param string $slug
     * @param int|null $excludeId
     * @return bool
     */
    protected static function slugExists(string $slug, int $excludeId = null): bool
    {
        $query = static::where('slug', $slug);
        if ($excludeId !== null) {
            $query->where('id', '!=', $excludeId);
        }
        return $query->exists();
    }
}