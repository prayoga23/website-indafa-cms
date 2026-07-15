<div class="container-fluid fixed-top px-0">
    <nav id="mainNavbar" class="navbar navbar-expand-xl navbar-light navbar-transparent backdrop-blur py-1 border-bottom border-3" style="border-color: #b88d21 !important; transition: all 0.3s ease-in-out;">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand ms-0 d-flex align-items-center">
                @if($setting?->logo)
                    <img src="{{ asset('storage/'.$setting->logo) }}"
                         alt="{{ $setting->site_name }}"
                         style="height: 50px"
                         class="brand-logo me-2">
                @endif

                <div class="d-flex flex-column justify-content-center border-start border-2 ps-2 brand-text-wrapper"
                    style="border-color: #0b666a !important;">

                    <h5 class="mb-0 fw-bold"
                        style="
                            color: #0b666a;
                            font-size: 1.5rem;
                            letter-spacing: 2px;
                            line-height: 1;
                        ">
                        HKI
                    </h5>

                </div>
            </a>

            <button class="navbar-toggler py-1 px-2 border-0"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="fa fa-bars" style="color: #0b666a; font-size: 1.2rem;"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto align-items-center">

                    {{-- BERANDA --}}
                    <a href="{{ route('home') }}"
                    class="nav-item nav-link fw-bold text-uppercase mx-2 {{ request()->routeIs('home') ? 'active-menu' : '' }}"
                    style="font-size: 0.8rem; color: #0b666a;">
                        Beranda
                    </a>

                    {{-- PROFIL --}}
                    <div class="nav-item dropdown mx-2">
                        <a href="#"
                        class="nav-link dropdown-toggle fw-bold text-uppercase"
                        data-bs-toggle="dropdown"
                        style="font-size: 0.8rem; color: #0b666a;">
                            Profil
                        </a>

                        <div class="dropdown-menu border-0 shadow rounded-3 popup-menu">

                            <a href="{{ route('profil.sejarah') }}"
                            class="dropdown-item">
                                Sejarah Prodi
                            </a>

                            <a href="{{ route('profil.visi-misi') }}"
                            class="dropdown-item">
                                Visi Misi & Tujuan
                            </a>

                            <a href="{{ route('profil.struktur') }}"
                            class="dropdown-item">
                                Struktur Organisasi
                            </a>

                            <a href="{{ route('profil.dosen') }}"
                            class="dropdown-item">
                                Profil Dosen
                            </a>

                        </div>
                    </div>

                    {{-- AKADEMIK --}}
                    <div class="nav-item dropdown mx-2">
                        <a href="#"
                        class="nav-link dropdown-toggle fw-bold text-uppercase"
                        data-bs-toggle="dropdown"
                        style="font-size: 0.8rem; color: #0b666a;">
                            Akademik
                        </a>

                        <div class="dropdown-menu border-0 shadow rounded-3 popup-menu">

                            <a href="{{ route('akademik.kurikulum') }}"
                            class="dropdown-item">
                                Kurikulum
                            </a>

                            <a href="{{ route('akademik.cpl') }}"
                            class="dropdown-item">
                                CPL
                            </a>

                            <a href="{{ route('akademik.kalender') }}"
                            class="dropdown-item">
                                Kalender Akademik
                            </a>

                            <a href="{{ route('akademik.panduan') }}"
                            class="dropdown-item">
                                Panduan Akademik
                            </a>

                            <a href="{{ route('akademik.jadwal') }}"
                            class="dropdown-item">
                                Jadwal Kuliah
                            </a>

                        </div>
                    </div>

                    {{-- INFORMASI --}}
                    <div class="nav-item dropdown mx-2">
                        <a href="#"
                        class="nav-link dropdown-toggle fw-bold text-uppercase"
                        data-bs-toggle="dropdown"
                        style="font-size: 0.8rem; color: #0b666a;">
                            Informasi
                        </a>

                        <div class="dropdown-menu border-0 shadow rounded-3 popup-menu">

                            <a href="{{ route('news.index') }}"
                            class="dropdown-item">
                                Berita
                            </a>

                            <a href="{{ route('announcements.index') }}"
                            class="dropdown-item">
                                Pengumuman
                            </a>

                            <a href=""
                            class="dropdown-item">
                                Agenda Kegiatan
                            </a>

                            <a href=""
                            class="dropdown-item">
                                Download Dokumen
                            </a>

                        </div>
                    </div>

                    {{-- GALERI --}}
                    <div class="nav-item dropdown mx-2">
                        <a href="#"
                        class="nav-link dropdown-toggle fw-bold text-uppercase"
                        data-bs-toggle="dropdown"
                        style="font-size: 0.8rem; color: #0b666a;">
                            Galeri
                        </a>

                        <div class="dropdown-menu border-0 shadow rounded-3 popup-menu">

                            <a href=""
                            class="dropdown-item">
                                Foto
                            </a>

                            <a href=""
                            class="dropdown-item">
                                Video
                            </a>

                            <a href=""
                            class="dropdown-item">
                                Dokumentasi Kegiatan
                            </a>

                        </div>
                    </div>

                    {{-- KONTAK --}}
                    <div class="nav-item dropdown mx-2">
                        <a href="#"
                        class="nav-link dropdown-toggle fw-bold text-uppercase"
                        data-bs-toggle="dropdown"
                        style="font-size: 0.8rem; color: #0b666a;">
                            Kontak
                        </a>

                        <div class="dropdown-menu border-0 shadow rounded-3 popup-menu">

                            <a href=""
                            class="dropdown-item">
                                Alamat
                            </a>

                            <a href=""
                            class="dropdown-item">
                                Peta Lokasi
                            </a>

                            <a href=""
                            class="dropdown-item">
                                Email
                            </a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </nav>
</div>
