@php
    $currentUri = request()->path();
    $isFacultySubWeb = str_starts_with($currentUri, 'fakultas-');
    $isProdiSubWeb = str_starts_with($currentUri, 'prodi-');

    // Detect faculty ID
    $facultyId = null;
    if ($isFacultySubWeb) {
        $facultyId = str_starts_with($currentUri, 'fakultas-syariah') ? 'syariah' : 'ebit';
    }

    // Detect prodi ID
    $prodiId = null;
    if ($isProdiSubWeb) {
        if (str_starts_with($currentUri, 'prodi-hki')) $prodiId = 'hki';
        elseif (str_starts_with($currentUri, 'prodi-hes')) $prodiId = 'hes';
        elseif (str_starts_with($currentUri, 'prodi-ekos')) $prodiId = 'ekos';
        elseif (str_starts_with($currentUri, 'prodi-pai')) $prodiId = 'pai';
    }
@endphp

<header>
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
        <div class="container-fluid px-md-5">
            @if($isFacultySubWeb)
                <a class="navbar-brand d-flex align-items-center" href="{{ route('frontend.fakultas.index', $facultyId) }}">
                    <img src="{{ asset('storage/'.$setting->logo) }}" alt="Logo" class="logo-campus" style="height: 50px; width: auto;">
                    <div class="ms-2 brand-text-divider">
                        <span class="brand-title">{{ $facultyId === 'syariah' ? 'FAKULTAS SYARIAH' : 'FEBIT INDAFA' }}</span>
                    </div>
                </a>
            @elseif($isProdiSubWeb)
                <a class="navbar-brand d-flex align-items-center" href="{{ route('frontend.prodi.index', $prodiId) }}">
                    <img src="{{ asset('storage/'.$setting->logo) }}" alt="Logo" class="logo-campus" style="height: 50px; width: auto;">
                    <div class="ms-2 brand-text-divider">
                        <span class="brand-title">PRODI {{ strtoupper($prodiId) }}</span>
                    </div>
                </a>
            @else
                <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                    <img src="{{ asset('storage/'.$setting->logo) }}" alt="Logo INDAFA" class="logo-campus" style="height: 50px; width: auto;">
                    <div class="ms-2 brand-text-divider">
                        <span class="brand-title">INDAFA</span>
                    </div>
                </a>
            @endif

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

                    {{-- ==========================================
                         CASE A: NAVBAR FAKULTAS
                         ========================================== --}}
                    @if($isFacultySubWeb)
                        {{-- BERANDA --}}
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom {{ $currentUri === "fakultas-{$facultyId}" ? 'active' : '' }}"
                               href="{{ route('frontend.fakultas.index', $facultyId) }}">Beranda</a>
                        </li>

                        {{-- PROFIL --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-custom dropdown-toggle" href="#" id="profilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profil
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="profilDropdown">
                                <li><a class="dropdown-item" href="{{ route('frontend.fakultas.sejarah', $facultyId) }}">Sejarah</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.fakultas.visi-misi', $facultyId) }}">Visi Misi & Tujuan</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.fakultas.pimpinan', $facultyId) }}">Pimpinan</a></li>
                            </ul>
                        </li>

                        {{-- PRODI --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-custom dropdown-toggle" href="#" id="prodiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Prodi
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="prodiDropdown">
                                @if($facultyId === 'syariah')
                                    <li><a class="dropdown-item" href="{{ route('frontend.prodi.index', 'hki') }}">Hukum Keluarga Islam</a></li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.prodi.index', 'hes') }}">Hukum Ekonomi Syariah</a></li>
                                @else
                                    <li><a class="dropdown-item" href="{{ route('frontend.prodi.index', 'ekos') }}">Ekonomi Syariah</a></li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.prodi.index', 'pai') }}">Pendidikan Agama Islam</a></li>
                                @endif
                            </ul>
                        </li>

                        {{-- AKADEMIK --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-custom dropdown-toggle" href="#" id="akademikDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Akademik
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="akademikDropdown">
                                <li><a class="dropdown-item" href="{{ route('frontend.fakultas.akademik', [$facultyId, 'dokumen']) }}">Dokumen</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.fakultas.akademik', [$facultyId, 'akreditasi']) }}">Sertifikat Akreditasi</a></li>
                            </ul>
                        </li>

                        {{-- PENGUMUMAN --}}
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom {{ str_contains($currentUri, 'pengumuman') ? 'active' : '' }}"
                               href="{{ route('frontend.fakultas.pengumuman', $facultyId) }}">Pengumuman</a>
                        </li>

                        {{-- BERITA --}}
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom {{ str_contains($currentUri, 'berita') ? 'active' : '' }}"
                               href="{{ route('frontend.fakultas.berita', $facultyId) }}">Berita</a>
                        </li>

                        {{-- KONTAK --}}
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom {{ str_contains($currentUri, 'kontak') ? 'active' : '' }}"
                               href="{{ route('frontend.fakultas.kontak', $facultyId) }}">Kontak</a>
                        </li>


                    {{-- ==========================================
                         CASE B: NAVBAR PRODI
                         ========================================== --}}
                    @elseif($isProdiSubWeb)
                        {{-- BERANDA --}}
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom {{ $currentUri === "prodi-{$prodiId}" ? 'active' : '' }}"
                               href="{{ route('frontend.prodi.index', $prodiId) }}">Beranda</a>
                        </li>

                        {{-- PROFIL --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-custom dropdown-toggle" href="#" id="profilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profil
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="profilDropdown">
                                <li><a class="dropdown-item" href="{{ route('frontend.prodi.sejarah', $prodiId) }}">Sejarah</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.prodi.visi-misi', $prodiId) }}">Visi Misi & Tujuan</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.prodi.pimpinan', $prodiId) }}">Pimpinan</a></li>
                            </ul>
                        </li>

                        {{-- AKADEMIK --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-custom dropdown-toggle" href="#" id="akademikDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Akademik
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="akademikDropdown">
                                <li><a class="dropdown-item" href="{{ route('frontend.prodi.akademik', [$prodiId, 'dokumen']) }}">Dokumen</a></li>
                                
                                {{-- PERSURATAN NESTED DROPDOWN PATTERN --}}
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">Persuratan</a>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <li><a class="dropdown-item" href="{{ route('frontend.prodi.akademik', [$prodiId, 'persuratan']) }}">Form Persuratan</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.prodi.akademik', [$prodiId, 'turnitin']) }}">Cek Turnitin</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.prodi.akademik', [$prodiId, 'kkn']) }}">Pendaftaran KKN</a></li>
                                    </ul>
                                </li>

                                <li><a class="dropdown-item" href="{{ route('frontend.prodi.akademik', [$prodiId, 'kalender']) }}">Kalender Akademik</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.prodi.akademik', [$prodiId, 'jadwal']) }}">Jadwal Kuliah</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.prodi.akademik', [$prodiId, 'kelulusan']) }}">Alur Kelulusan</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.prodi.akademik', [$prodiId, 'akreditasi']) }}">Sertifikat Akreditasi</a></li>
                            </ul>
                        </li>

                        {{-- PENGUMUMAN --}}
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom {{ str_contains($currentUri, 'pengumuman') ? 'active' : '' }}"
                               href="{{ route('frontend.prodi.pengumuman', $prodiId) }}">Pengumuman</a>
                        </li>

                        {{-- BERITA --}}
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom {{ str_contains($currentUri, 'berita') ? 'active' : '' }}"
                               href="{{ route('frontend.prodi.berita', $prodiId) }}">Berita</a>
                        </li>

                        {{-- KONTAK --}}
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom {{ str_contains($currentUri, 'kontak') ? 'active' : '' }}"
                               href="{{ route('frontend.prodi.kontak', $prodiId) }}">Kontak</a>
                        </li>


                    {{-- ==========================================
                         CASE C: NAVBAR UTAMA (INDAFA)
                         ========================================== --}}
                    @else
                        {{-- BERANDA --}}
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom {{ request()->routeIs('home') ? 'active' : '' }}"
                               href="{{ route('home') }}">Beranda</a>
                        </li>

                        {{-- PROFIL --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-custom dropdown-toggle" href="#"
                               id="profilDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Profil
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="profilDropdown">
                                <li><a class="dropdown-item" href="{{ route('frontend.profil.sejarah') }}">Sejarah</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.profil.visi-misi') }}">Visi, Misi & Tujuan</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.profil.struktur-organisasi') }}">Struktur Organisasi</a></li>
                            </ul>
                        </li>

                        {{-- FAKULTAS --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-custom dropdown-toggle" href="#"
                               id="fakultasDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Fakultas
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="fakultasDropdown">
                                <li><a class="dropdown-item" href="{{ route('frontend.fakultas.syariah') }}">Fakultas Syariah</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.fakultas.ebit') }}">Fakultas Ekonomi Bisnis Islam & Tarbiyah</a></li>
                            </ul>
                        </li>

                        {{-- UNIT & LEMBAGA --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-custom dropdown-toggle" href="#"
                               id="unitDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Unit & Lembaga
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="unitDropdown">
                                <li><a class="dropdown-item" href="{{ route('frontend.unit.lpm') }}">LPM</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.unit.lp2m') }}">LP2M</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.unit.ormawa') }}">ORMAWA</a></li>
                            </ul>
                        </li>

                        {{-- AKADEMIK --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-custom dropdown-toggle" href="#"
                               id="akademikDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Akademik
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="akademikDropdown">
                                <li><a class="dropdown-item" href="{{ route('frontend.akademik.filosofi-logo') }}">Filosofi Logo</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.akademik.penelitian') }}">Penelitian & Pengabdian</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.akademik.pmb') }}">PMB</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.akademik.prestasi') }}">Prestasi Mahasiswa</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.akademik.gallery-indafa') }}">Gallery Indafa</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.akademik.kalender') }}">Kalender Akademik</a></li>
                            </ul>
                        </li>

                        {{-- PENGUMUMAN --}}
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom {{ request()->routeIs('frontend.informasi.pengumuman') ? 'active' : '' }}"
                               href="{{ route('frontend.informasi.pengumuman') }}">
                                Pengumuman
                            </a>
                        </li>

                        {{-- BERITA --}}
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom {{ request()->routeIs('frontend.informasi.berita') ? 'active' : '' }}"
                               href="{{ route('frontend.informasi.berita') }}">
                                Berita
                            </a>
                        </li>

                        {{-- KONTAK --}}
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom {{ request()->routeIs('frontend.kontak.index') ? 'active' : '' }}"
                               href="{{ route('frontend.kontak.index') }}">
                                Kontak
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>

{{-- Additional CSS styles for nested dropdowns --}}
<style>
    .dropdown-submenu {
        position: relative;
    }
    .dropdown-submenu .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -1px;
    }
    @media (max-width: 991.98px) {
        .dropdown-submenu .dropdown-menu {
            left: 0;
            position: relative;
            margin-left: 15px;
        }
    }
</style>
