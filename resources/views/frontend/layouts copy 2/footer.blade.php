<div class="container-fluid footer bg-dark text-body py-5">
    <div class="container py-5">
        <div class="row g-5">

            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item">
                    @if($setting?->logo)
                        <img src="{{ asset('storage/'.$setting->logo) }}" height="70" class="mb-4">
                    @else
                        <h4 class="mb-4 text-white">IAI Darul Falah</h4>
                    @endif

                    <p class="mb-4 text-white-50">
                        {{ $setting->tagline }}
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="mb-4 text-white">Hubungi Kami</h4>
                    <span class="text-white-50 mb-2">
                        <i class="fas fa-map-marker-alt me-2"></i> {{ $setting->address }}
                    </span>
                    <span class="text-white-50 mb-2">
                        <i class="fas fa-phone-alt me-2"></i> {{ $setting->phone }}
                    </span>
                    <a href="mailto:{{ $setting->email }}" class="text-white-50 mb-2 text-decoration-none">
                        <i class="fas fa-envelope me-2"></i> {{ $setting->email }}
                    </a>
                </div>
            </div>

            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="mb-4 text-white">Lokasi</h4>
                    <div class="ratio ratio-16x9">
                        {!! $setting->google_maps !!}
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item">
                    <h4 class="mb-4 text-white">Galeri Kampus</h4>
                    <div class="row g-2 mb-4">
                        <div class="col-4">
                            <div class="footer-gallery">
                                {{-- <img src="img/gallery-footer-1.jpg" class="img-fluid w-100" alt="Galeri 1" /> --}}
                                <div class="footer-search-icon">
                                    <a href="img/gallery-footer-1.jpg" data-lightbox="footerGallery-1" class="my-auto">
                                        <i class="fas fa-search-plus text-white"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="footer-gallery">
                                {{-- <img src="img/gallery-footer-2.jpg" class="img-fluid w-100" alt="Galeri 2" /> --}}
                                <div class="footer-search-icon">
                                    <a href="img/gallery-footer-2.jpg" data-lightbox="footerGallery-2" class="my-auto">
                                        <i class="fas fa-search-plus text-white"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="footer-gallery">
                                {{-- <img src="img/gallery-footer-3.jpg" class="img-fluid w-100" alt="Galeri 3" /> --}}
                                <div class="footer-search-icon">
                                    <a href="img/gallery-footer-3.jpg" data-lightbox="footerGallery-3" class="my-auto">
                                        <i class="fas fa-search-plus text-white"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="footer-gallery">
                                {{-- <img src="img/gallery-footer-4.jpg" class="img-fluid w-100" alt="Galeri 4" /> --}}
                                <div class="footer-search-icon">
                                    <a href="img/gallery-footer-4.jpg" data-lightbox="footerGallery-4" class="my-auto">
                                        <i class="fas fa-search-plus text-white"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="footer-gallery">
                                {{-- <img src="img/gallery-footer-5.jpg" class="img-fluid w-100" alt="Galeri 5" /> --}}
                                <div class="footer-search-icon">
                                    <a href="img/gallery-footer-5.jpg" data-lightbox="footerGallery-5" class="my-auto">
                                        <i class="fas fa-search-plus text-white"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="footer-gallery">
                                {{-- <img src="img/gallery-footer-6.jpg" class="img-fluid w-100" alt="Galeri 6" /> --}}
                                <div class="footer-search-icon">
                                    <a href="img/gallery-footer-6.jpg" data-lightbox="footerGallery-6" class="my-auto">
                                        <i class="fas fa-search-plus text-white"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-white-50 custom-footer-text">
                        {!! $setting->footer_text !!}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
