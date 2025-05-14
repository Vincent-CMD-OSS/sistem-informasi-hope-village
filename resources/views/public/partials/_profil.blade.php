{{-- resources/views/public/partials/_profil.blade.php --}}
<section id="profil" class="profil-section">
    <div class="container content-container">
        {{-- PENYESUAIAN JARAK: Ubah gx-lg-5 menjadi gx-lg-3 atau gx-lg-4 --}}
        <div class="row align-items-center gy-5 gx-lg-4">
            {{-- Kolom Gambar --}}
            <div class="col-lg-6 col-md-12 order-lg-1 order-md-2 order-2 text-center text-lg-start">
                <div class="profil-images-wrapper">
                    <div class="profil-images-column-stacked">
                        <img src="{{ asset('assets/images/gambar11.jpg') }}" alt="Kegiatan edukasi keluarga di Panti Asuhan" class="img-fluid profil-image-top-stack">
                        <img src="{{ asset('assets/images/Gambar12.jpg') }}" alt="Anak-anak membaca buku bersama" class="img-fluid profil-image-bottom-stack">
                    </div>
                    <div class="profil-image-column-main">
                        <img src="{{ asset('assets/images/Gambar13.jpg') }}" alt="Gedung Panti Asuhan Rumah Harapan" class="img-fluid profil-image-center">
                    </div>
                </div>
            </div>

            {{-- Kolom Teks --}}
            <div class="col-lg-6 col-md-12 order-lg-2 order-md-1 order-1">
                <div class="profil-text-content">
                    <p class="sub-heading">Siapa Kami?</p>
                    <h2 class="section-title">Tentang Kami</h2>
                    <p class="section-description">
                        Hope Village adalah komunitas peduli anak yang hadir untuk memberikan
                        tempat tinggal, pendidikan, dan kasih sayang bagi anak-anak yatim dan
                        terlantar di pedesaan Indonesia. Dengan fasilitas seperti sekolah, gereja,
                        klinik medis, dan akses air bersih, kami berkomitmen menciptakan
                        lingkungan yang aman dan penuh harapan agar setiap anak bisa tumbuh,
                        belajar, dan meraih masa depan yang lebih baik. Bersama para sponsor
                        dan relawan, kami membangun bukan hanya rumah, tetapi juga harapan
                        dan masa depan yang cerah bagi generasi mendatang.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>