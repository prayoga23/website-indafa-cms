<footer class="footer-campus text-white pt-5">

    <div class="container">

        <div class="row gy-4">

            {{-- TENTANG --}}
            <div class="col-lg-4 col-md-6">
                <h4 class="fw-bold mb-3">INDAFA Bondowoso</h4>

                <p class="text-white-50">
                    Institut Agama Islam Darul Falah Bondowoso.
                    Mencetak generasi unggul berlandaskan ilmu dan iman.
                </p>

                <div class="d-flex gap-3 mt-3">
                    <a href="#" class="text-white-50" aria-label="Facebook"><i class="bi bi-facebook fs-5"></i></a>
                    <a href="#" class="text-white-50" aria-label="Instagram"><i class="bi bi-instagram fs-5"></i></a>
                    <a href="#" class="text-white-50" aria-label="YouTube"><i class="bi bi-youtube fs-5"></i></a>
                    <a href="#" class="text-white-50" aria-label="WhatsApp"><i class="bi bi-whatsapp fs-5"></i></a>
                </div>
            </div>

            {{-- MENU --}}
            <div class="col-lg-2 col-md-6">
                <h5 class="fw-semibold mb-3">Menu</h5>

                <ul class="list-unstyled footer-links">
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('frontend.profil.sejarah') }}">Profil</a></li>
                    <li><a href="{{ route('frontend.informasi.berita') }}">Berita</a></li>
                    <li><a href="{{ route('frontend.informasi.pengumuman') }}">Pengumuman</a></li>
                    <li><a href="{{ route('frontend.kontak.index') }}">Kontak</a></li>
                </ul>
            </div>

            {{-- AKADEMIK --}}
            <div class="col-lg-3 col-md-6">
                <h5 class="fw-semibold mb-3">Akademik</h5>

                <ul class="list-unstyled footer-links">
                    <li><a href="{{ route('frontend.akademik.kalender') }}">Kalender Akademik</a></li>
                    <li><a href="{{ route('frontend.akademik.pmb') }}">Penerimaan Mahasiswa Baru</a></li>
                    <li><a href="{{ route('frontend.akademik.prestasi') }}">Prestasi Mahasiswa</a></li>
                    <li><a href="{{ route('frontend.akademik.gallery-indafa') }}">Gallery INDAFA</a></li>
                </ul>
            </div>

            {{-- KONTAK --}}
            <div class="col-lg-3 col-md-6">
                <h5 class="fw-semibold mb-3">Kontak</h5>

                <p class="text-white-50 mb-2">
                    <i class="bi bi-geo-alt me-2"></i>{{ $setting->address ?? 'Bondowoso, Jawa Timur' }}
                </p>
                <p class="text-white-50 mb-2">
                    <i class="bi bi-envelope me-2"></i>{{ $setting->email ?? 'info@iaidafa.ac.id' }}
                </p>
                <p class="text-white-50 mb-0">
                    <i class="bi bi-telephone me-2"></i>{{ $setting->phone ?? '(0332) 123456' }}
                </p>
            </div>

        </div>

        {{-- COPYRIGHT --}}
        <div class="border-top border-light mt-4 pt-3 text-center">
            <small class="text-white-50">
                &copy; {{ date('Y') }} Institut Agama Islam Darul Falah Bondowoso. All rights reserved.
            </small>
        </div>

    </div>

</footer>
