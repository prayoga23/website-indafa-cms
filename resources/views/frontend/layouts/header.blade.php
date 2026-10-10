<header>
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
        <div class="container-fluid px-md-5">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('storage/'.$setting->logo) }}"
                     alt="Logo"
                     class="logo-campus"
                     style="height: 50px; width: auto;">
                <div class="ms-2 brand-text-divider">
                    <span class="brand-title">HKI</span>
                </div>
            </a>

            <button class="navbar-toggler border-0"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarMenu"
                    aria-controls="navbarMenu"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <i class="bi bi-list fs-2 text-warning"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav ms-auto text-uppercase fw-semibold align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom active" href="{{ route('home') }}">Beranda</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-custom dropdown-toggle" href="#" id="profilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profil
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="profilDropdown">
                            <li><a class="dropdown-item" href="{{ route('frontend.profil.sejarah') }}">Sejarah Prodi</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.profil.visi-misi') }}">Visi Misi</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.profil.struktur-organisasi') }}">Struktur Organisasi</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.profil.profil-dosen') }}">Profil Dosen</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-custom dropdown-toggle" href="#" id="akademikDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Akademik
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="akademikDropdown">
                            <li><a class="dropdown-item" href="{{ route('frontend.akademik.kurikulum') }}">Kurikulum</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.akademik.cpl') }}">Capaian Pembelajaran Lulusan</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.akademik.kalender') }}">Kalender Akademik</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.akademik.panduan') }}">Panduan Akademik</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.akademik.jadwal') }}">Jadwal Kuliah</a></li>

                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-custom dropdown-toggle" href="#" id="informasiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Informasi
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="informasiDropdown">
                            <li><a class="dropdown-item" href="{{ route('frontend.informasi.berita') }}">Berita</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.informasi.pengumuman') }}">Pengumuman</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.informasi.agenda') }}">Agenda Kegiatan</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-custom dropdown-toggle" href="#" id="galeriDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Galeri
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="galeriDropdown">
                            <li><a class="dropdown-item" href="{{ route('frontend.galeri.foto') }}">Foto</a></li>
                            <li><a class="dropdown-item" href="{{ route('frontend.galeri.video') }}">Video</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="{{ route('frontend.dokumen.index') }}">
                            Dokumen
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="{{ route('frontend.hubungi.index') }}">
                            Kontak
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
