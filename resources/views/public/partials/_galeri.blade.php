<!-- resources/views/public/partials/_galeri.blade.php -->
<section id="galeri" class="scrollspy-section padding-large" style="padding-top: 100px; padding-bottom: 100px;">
    <div class="container">
        <div class="row">
           <div class="col-md-12">
                {{-- Kita akan beri class khusus pada div ini untuk styling yang lebih terisolasi --}}
                <div class="galeri-section-header text-center mb-5 pb-3" style="margin-top: 5%;">
                    <p class="galeri-pre-title mb-2">
                        <span>Dokumentasi kegiatan</span>
                    </p>
                    <h2 class="galeri-main-title mb-3">Galeri Digital</h2>
                    <p class="galeri-subtitle">
                        Ikuti berbagai kegiatan, pencapaian, dan momen inspiratif dari anak-anak dan keluarga
                        besar Rumah Harapan dalam membangun masa depan yang lebih baik.
                    </p>
                </div>
            </div>
        </div>

        <div class="row mt-5 align-items-stretch"> {{-- Tambahkan align-items-stretch --}}
            <div class="col-lg-7 col-md-6 mb-4 mb-md-0"> {{-- Ubah ke col-lg-7 untuk item utama lebih besar --}}
                <div class="galeri-item h-100 d-flex flex-column"> {{-- Tambahkan h-100 dan d-flex --}}
                    <figure class="galeri-image flex-grow-1"> {{-- flex-grow-1 untuk gambar mengisi ruang --}}
                        {{-- PASTIKAN NAMA FILE GAMBAR SESUAI DENGAN YANG ADA DI public/images/ --}}
                        <img src="{{ asset('assets/images/Gambar13.jpg') }}" alt="Hope Village Media Team" class="img-fluid rounded shadow">
                        <div class="date-badge">
                            <span>05/05/2025</span>
                        </div>
                    </figure>
                    <div class="galeri-content mt-4">
                        <h3>Hope Village Media Team</h3>
                        <p>Hope Village di pedesaan Sumatra telah menyaksikan munculnya pendongeng muda.
                        Melalui fotografi dan film, mereka berbagi kisah keluarga Hope Village.</p>
                        <a href="#" class="btn-with-line mt-3">Read more</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-6"> {{-- Ubah ke col-lg-5 untuk item kecil --}}
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="galeri-item-small d-flex align-items-center"> {{-- Tambahkan align-items-center --}}
                            <figure class="galeri-image-small me-3"> {{-- Kurangi margin jika perlu me-3 --}}
                                <img src="{{ asset('assets/images/gambar11.jpg') }}" alt="Sarah" class="img-fluid rounded shadow">
                                <div class="date-badge-small">
                                    <span>dd/mm/yyyy</span>
                                </div>
                            </figure>
                            <div class="galeri-content-small">
                                <h4>Sarah</h4>
                                <p class="mb-0">Temukan perjalanan transformatif Roy dan Lena di Hope Village, tempat mereka...</p> {{-- mb-0 jika tidak ada link 'read more' --}}
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-4">
                        <div class="galeri-item-small d-flex align-items-center">
                            <figure class="galeri-image-small me-3">
                                <img src="{{ asset('assets/images/gambar11.jpg') }}" alt="Siblings" class="img-fluid rounded shadow">
                                <div class="date-badge-small">
                                    <span>dd/mm/yyyy</span>
                                </div>
                            </figure>
                            <div class="galeri-content-small">
                                <h4>Siblings</h4>
                                <p class="mb-0">A heartbreaking beginning led to an inspiring transformation. Meet Buenga, Novi...</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="galeri-item-small d-flex align-items-center">
                            <figure class="galeri-image-small me-3">
                                <img src="{{ asset('assets/images/Gambar12.jpg') }}" alt="Marchel" class="img-fluid rounded shadow">
                                <div class="date-badge-small">
                                    <span>dd/mm/yyyy</span>
                                </div>
                            </figure>
                            <div class="galeri-content-small">
                                <h4>Marchel</h4>
                                <p class="mb-0">Bertemu dengan Marchel, yang pada usia 10 tahun, tiba di Hope Village bersama adik laki-laki...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 pt-4"  style="margin-top: 60px !important;"> {{-- Tambah padding top sedikit --}}
            <div class="col-12 text-center">
                <a href="#" class="btn btn-accent btn-xlarge btn-rounded">Lihat Semua Galeri</a>
            </div>
        </div>
    </div>
</section>