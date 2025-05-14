{{-- resources/views/public/partials/_operasional.blade.php --}}
<section id="operasional" class="operasional-section">
    <div class="operasional-background-blob"></div>
    <div class="container position-relative" style="z-index: 2;">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-1 operasional-content-left mb-5 mb-lg-0">
                <div class="operasional-pre-title d-flex align-items-center mb-2">
                    <span class="line me-2"></span>
                    <span>Tumbuh Dengan Harapan</span>
                </div>
                <h2 class="operasional-main-title mb-4">Mengenai Jam Operasional</h2>

                <ul class="list-unstyled operasional-info-list">
                    <li class="d-flex align-items-start mb-4">
                        <div class="icon-wrapper jam-operasional me-3">
                            <i class="fas fa-clock"></i> {{-- Ganti dengan ikon yang sesuai jika ada --}}
                        </div>
                        <div>
                            <h4 class="item-title">Jam Operasional</h4>
                            <p class="item-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Urna, tortor tempus.</p>
                        </div>
                    </li>
                    <li class="d-flex align-items-start mb-4">
                        <div class="icon-wrapper kunjungan me-3">
                            <i class="fas fa-calendar-check"></i> {{-- Ganti dengan ikon yang sesuai --}}
                        </div>
                        <div>
                            <h4 class="item-title">Kunjungan</h4>
                            <p class="item-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Urna, tortor tempus.</p>
                        </div>
                    </li>
                    <li class="d-flex align-items-start">
                        <div class="icon-wrapper lokasi me-3">
                            <i class="fas fa-map-marker-alt"></i> {{-- Ganti dengan ikon yang sesuai --}}
                        </div>
                        <div>
                            <h4 class="item-title">Lokasi</h4>
                            <p class="item-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Urna, tortor tempus.</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6 order-lg-2 operasional-content-right">
                <div class="operasional-image-card">
                    <img src="{{ asset('images/panti_building_example.jpg') }}" alt="Panti Asuhan Rumah Harapan" class="img-fluid">
                    <div class="image-caption">
                        Panti Asuhan Rumah Harapan
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>