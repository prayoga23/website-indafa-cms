<footer class="footer-campus text-white pt-5">
    <div class="container">
        <div class="row gy-4">
            {{-- ABOUT --}}
            <div class="col-lg-4 col-md-6">
                <h4 class="fw-bold mb-3">{{ $setting->site_name ?? 'Prodi HKI' }}</h4>
                <p class="text-white-50">
                    {{ $setting->tagline ?? 'Program Studi Hukum Keluarga Islam Institut Agama Islam Darul Falah Bondowoso.' }}
                </p>
            </div>

            {{-- MENU --}}
            <div class="col-lg-4 col-md-6">
                <h5 class="fw-semibold mb-3">Tautan Cepat</h5>
                <ul class="list-unstyled footer-links">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('frontend.profil.sejarah') }}">Profil & Sejarah</a></li>
                    <li><a href="{{ route('frontend.akademik.kurikulum') }}">Akademik</a></li>
                    <li><a href="{{ route('news.index') }}">Berita & Informasi</a></li>
                    <li><a href="{{ route('contact.index') }}">Kontak Kami</a></li>
                </ul>
            </div>

            {{-- KONTAK --}}
            <div class="col-lg-4 col-md-12">
                <h5 class="fw-semibold mb-3">Kontak</h5>
                <p class="text-white-50 mb-1">
                    <i class="bi bi-geo-alt me-1"></i> {{ $setting->address ?? 'Bondowoso, Jawa Timur' }}
                </p>
                <p class="text-white-50 mb-1">
                    <i class="bi bi-telephone me-1"></i> {{ $setting->phone ?? '-' }}
                </p>
                <p class="text-white-50">
                    <i class="bi bi-envelope me-1"></i> {{ $setting->email ?? 'info@kampus.ac.id' }}
                </p>
            </div>
        </div>

        {{-- COPYRIGHT --}}
        <div class="border-top border-light mt-4 pt-3 text-center">
            <small class="text-white-50">
                © {{ date('Y') }} {{ $setting->site_name ?? 'Prodi HKI' }}. All rights reserved.
            </small>
        </div>
    </div>
</footer>

