@php
    $currentUri = request()->path();
    $isFacultySubWeb = str_starts_with($currentUri, 'fakultas-');
    $isProdiSubWeb = str_starts_with($currentUri, 'prodi-');
    $isLpmSubWeb = str_starts_with($currentUri, 'lpm');
    $isLp2mSubWeb = str_starts_with($currentUri, 'lp2m');

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
        elseif (str_starts_with($currentUri, 'prodi-mbs')) $prodiId = 'mbs';
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
                        <span class="brand-title">{{ $facultyId === 'syariah' ? 'FAKULTAS ILMU SYARIAH' : 'FAKULTAS TARBIYAH' }}</span>
                    </div>
                </a>
            @elseif($isProdiSubWeb)
                <a class="navbar-brand d-flex align-items-center prodi-navbar-brand" href="{{ route('frontend.prodi.index', $prodiId) }}">
                    <img src="{{ asset('storage/'.$setting->logo) }}" alt="Logo" class="logo-campus" style="height: 50px; width: auto;">
                    <div class="ms-2 brand-text-divider">
                        <span class="brand-title">PRODI {{ strtoupper($prodiId) }}</span>
                    </div>
                </a>
            @elseif($isLpmSubWeb)
                <a class="navbar-brand d-flex align-items-center" href="{{ route('frontend.lpm.index') }}">
                    <img src="{{ asset('storage/'.$setting->logo) }}" alt="Logo LPM" class="logo-campus" style="height: 50px; width: auto;">
                    <div class="ms-2 brand-text-divider">
                        <span class="brand-title">LPM INDAFA</span>
                    </div>
                </a>
            @elseif($isLp2mSubWeb)
                <a class="navbar-brand d-flex align-items-center" href="{{ route('frontend.lp2m.index') }}">
                    <img src="{{ asset('storage/'.$setting->logo) }}" alt="Logo LP2M" class="logo-campus" style="height: 50px; width: auto;">
                    <div class="ms-2 brand-text-divider">
                        <span class="brand-title">LP2M INDAFA</span>
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
                <ul class="navbar-nav ms-auto text-uppercase fw-semibold align-items-lg-center {{ $isProdiSubWeb ? 'prodi-navbar-nav' : '' }}">

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
                                    <li><a class="dropdown-item" href="{{ route('frontend.prodi.index', 'hki') }}">Prodi Hukum Keluarga Islam (HKI)</a></li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.prodi.index', 'hes') }}">Prodi Hukum Ekonomi Syariah (HES)</a></li>
                                @else
                                    <li><a class="dropdown-item" href="{{ route('frontend.prodi.index', 'mbs') }}">Prodi Manajemen Bisnis Syariah (MBS)</a></li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.prodi.index', 'ekos') }}">Prodi Ekonomi Syariah (EKOS)</a></li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.prodi.index', 'pai') }}">Prodi Pendidikan Agama Islam (PAI)</a></li>
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
                                
                                {{-- PERSURATAN NESTED DROPDOWN --}}
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle d-flex align-items-center justify-content-between" href="#">
                                        <span>Persuratan</span>
                                        <i class="bi bi-chevron-right ms-2 submenu-arrow"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <li><a class="dropdown-item" href="{{ route('frontend.fakultas.akademik', [$facultyId, 'persuratan']) }}">Form Persuratan</a></li>
                                        <li class="dropdown-submenu dropdown-submenu-down">
                                            <a class="dropdown-item dropdown-toggle d-flex align-items-center justify-content-between" href="#">
                                                <span>Layanan Digital</span>
                                                <i class="bi bi-chevron-down ms-2 submenu-arrow"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-dark">
                                                <li><a class="dropdown-item" href="{{ route('frontend.fakultas.akademik', [$facultyId, 'turnitin']) }}">Cek Turnitin</a></li>
                                                <li><a class="dropdown-item" href="{{ route('frontend.fakultas.akademik', [$facultyId, 'kkn']) }}">Pendaftaran KKN</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li><a class="dropdown-item" href="{{ route('frontend.fakultas.akademik', [$facultyId, 'kalender']) }}">Kalender Akademik</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.fakultas.akademik', [$facultyId, 'jadwal']) }}">Jadwal Kuliah</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.fakultas.akademik', [$facultyId, 'kelulusan']) }}">Alur Kelulusan</a></li>
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
                                <li><a class="dropdown-item" href="{{ route('frontend.prodi.dosen', $prodiId) }}">Profil Dosen</a></li>
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
                                    <a class="dropdown-item dropdown-toggle d-flex align-items-center justify-content-between" href="#">
                                        <span>Persuratan</span>
                                        <i class="bi bi-chevron-right ms-2 submenu-arrow"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <li><a class="dropdown-item" href="{{ route('frontend.prodi.akademik', [$prodiId, 'persuratan']) }}">Form Persuratan</a></li>
                                        <li class="dropdown-submenu dropdown-submenu-down">
                                            <a class="dropdown-item dropdown-toggle d-flex align-items-center justify-content-between" href="#">
                                                <span>Layanan Digital</span>
                                                <i class="bi bi-chevron-down ms-2 submenu-arrow"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-dark">
                                                <li><a class="dropdown-item" href="{{ route('frontend.prodi.akademik', [$prodiId, 'turnitin']) }}">Cek Turnitin</a></li>
                                                <li><a class="dropdown-item" href="{{ route('frontend.prodi.akademik', [$prodiId, 'kkn']) }}">Pendaftaran KKN</a></li>
                                            </ul>
                                        </li>
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
                         CASE C: NAVBAR SUB-WEBSITE LPM
                         ========================================== --}}
                    @elseif($isLpmSubWeb)
                        {{-- BERANDA --}}
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom {{ request()->routeIs('frontend.lpm.index') ? 'active' : '' }}"
                               href="{{ route('frontend.lpm.index') }}">Beranda</a>
                        </li>

                        {{-- PROFIL --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-custom dropdown-toggle {{ request()->routeIs('frontend.lpm.profil') ? 'active' : '' }}"
                               href="#" id="lpmProfilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profil
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="lpmProfilDropdown">
                                <li><a class="dropdown-item" href="{{ route('frontend.lpm.profil', 'sejarah') }}">Sejarah</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lpm.profil', 'visi-misi') }}">Visi & Misi</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lpm.profil', 'struktur-organisasi') }}">Struktur Organisasi</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lpm.profil', 'sdm') }}">Sumber Daya Manusia</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lpm.profil', 'tupoksi') }}">Tugas Pokok & Fungsi</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lpm.profil', 'rkat') }}">RKAT LPM</a></li>
                            </ul>
                        </li>

                        {{-- BIDANG PENGAWASAN --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-custom dropdown-toggle {{ request()->routeIs('frontend.lpm.pengawasan') ? 'active' : '' }}"
                               href="#" id="lpmPengawasanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Bidang Pengawasan
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="lpmPengawasanDropdown">
                                <li><a class="dropdown-item" href="{{ route('frontend.lpm.pengawasan', 'pedoman') }}">Pedoman Institut</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lpm.pengawasan', 'kalender') }}">Kalender Akademik</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lpm.pengawasan', 'kontrak-kinerja') }}">Kontrak Kinerja</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lpm.pengawasan', 'monev-kinerja') }}">Monev Kinerja</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lpm.pengawasan', 'audit-kinerja') }}">Laporan Audit Kinerja</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lpm.pengawasan', 'rtm') }}">RTM (Rapat Tinjauan Tahunan)</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lpm.pengawasan', 'rtl') }}">RTL (Rapat Tinjauan Manajemen)</a></li>
                            </ul>
                        </li>

                        {{-- BIDANG PENJAMINAN --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-custom dropdown-toggle {{ request()->routeIs('frontend.lpm.penjaminan') ? 'active' : '' }}"
                               href="#" id="lpmPenjaminanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Bidang Penjaminan
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="lpmPenjaminanDropdown">
                                <li><a class="dropdown-item" href="{{ route('frontend.lpm.penjaminan', 'kebijakan-mutu') }}">Kebijakan Mutu</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lpm.penjaminan', 'spmi') }}">Sistem Penjaminan Mutu Internal</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lpm.penjaminan', 'ami') }}">Audit Mutu Internal</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lpm.penjaminan', 'peraturan-akreditasi') }}">Peraturan Akreditasi</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lpm.penjaminan', 'data-akreditasi') }}">Data Akreditasi</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lpm.penjaminan', 'laporan-kepuasan') }}">Laporan Kepuasan</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lpm.penjaminan', 'monev-gjm-gkm') }}">Monev GJM & GKM</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lpm.penjaminan', 'kalender-mutu') }}">Kalender Mutu</a></li>
                            </ul>
                        </li>

                        {{-- PENGUMUMAN --}}
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom {{ request()->routeIs('frontend.lpm.pengumuman') ? 'active' : '' }}"
                               href="{{ route('frontend.lpm.pengumuman') }}">Pengumuman</a>
                        </li>

                        {{-- BERITA --}}
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom {{ request()->routeIs('frontend.lpm.berita') ? 'active' : '' }}"
                               href="{{ route('frontend.lpm.berita') }}">Berita</a>
                        </li>

                        {{-- KONTAK --}}
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom {{ request()->routeIs('frontend.lpm.kontak') ? 'active' : '' }}"
                               href="{{ route('frontend.lpm.kontak') }}">Kontak</a>
                        </li>


                    {{-- ==========================================
                         CASE D: NAVBAR SUB-WEBSITE LP2M
                         ========================================== --}}
                    @elseif($isLp2mSubWeb)
                        {{-- BERANDA --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-custom dropdown-toggle {{ request()->routeIs('frontend.lp2m.index') ? 'active' : '' }}"
                               href="{{ route('frontend.lp2m.index') }}" id="lp2mBerandaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Beranda
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="lp2mBerandaDropdown">
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.index') }}">Beranda LP2M</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.index') }}#pengumuman">Pengumuman</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.index') }}#berita">Berita</a></li>
                            </ul>
                        </li>

                        {{-- PROFIL --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-custom dropdown-toggle {{ request()->routeIs('frontend.lp2m.profil') ? 'active' : '' }}"
                               href="#" id="lp2mProfilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profil
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="lp2mProfilDropdown">
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.profil', 'sejarah') }}">Sejarah LP2M</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.profil', 'visi-misi') }}">Visi, Misi, dan Tujuan</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.profil', 'tupoksi') }}">Tugas Pokok dan Fungsi</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.profil', 'dokumen-resmi') }}">Dokumen Resmi</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.profil', 'struktur-organisasi') }}">Struktur Organisasi</a></li>
                            </ul>
                        </li>

                        {{-- RISET --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-custom dropdown-toggle {{ request()->routeIs('frontend.lp2m.riset') ? 'active' : '' }}"
                               href="#" id="lp2mRisetDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Riset
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="lp2mRisetDropdown">
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle d-flex align-items-center justify-content-between" href="#">
                                        <span>Jurnal</span>
                                        <i class="bi bi-chevron-right ms-2 submenu-arrow"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <li><a class="dropdown-item" href="{{ route('frontend.lp2m.riset', 'jurnal') }}#profil">Profil Jurnal</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.lp2m.riset', 'jurnal') }}#rekap">Rekap Jurnal</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.lp2m.riset', 'jurnal') }}#jrce">JRCE</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.lp2m.riset', 'jurnal') }}#ejournal">E-Journal</a></li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.riset', 'penelitian') }}">Penelitian (Litapdimas)</a></li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle d-flex align-items-center justify-content-between" href="#">
                                        <span>Pengabdian Litapdimas</span>
                                        <i class="bi bi-chevron-right ms-2 submenu-arrow"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <li><a class="dropdown-item" href="{{ route('frontend.lp2m.riset', 'pengabdian') }}#simapel">Simapel</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.lp2m.riset', 'pengabdian') }}#sipemas">Sipemas</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.lp2m.riset', 'pengabdian') }}#kerjasama">Kerjasama Antar Instansi</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle d-flex align-items-center justify-content-between" href="#">
                                        <span>HKI</span>
                                        <i class="bi bi-chevron-right ms-2 submenu-arrow"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <li><a class="dropdown-item" href="{{ route('frontend.lp2m.riset', 'hki') }}#hakcipta">Layanan Pengajuan Hak Cipta</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.lp2m.riset', 'hki') }}#rekaphki">Rekap HKI</a></li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.riset', 'rekap-penelitian') }}">Rekapitulasi Penelitian</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.riset', 'rekap-pengabdian') }}">Rekapitulasi Pengabdian</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.riset', 'sdgs') }}">Relevansi Penelitian & PKM dengan SDGs</a></li>
                            </ul>
                        </li>

                        {{-- PUSAT --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-custom dropdown-toggle {{ request()->routeIs('frontend.lp2m.pusat') ? 'active' : '' }}"
                               href="#" id="lp2mPusatDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pusat
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="lp2mPusatDropdown">
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.pusat', 'penelitian') }}">Pusat Penelitian</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.pusat', 'pengabdian') }}">Pusat Pengabdian Masyarakat</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.pusat', 'publikasi') }}">Pusat Publikasi Ilmiah</a></li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle d-flex align-items-center justify-content-between" href="#">
                                        <span>Pusat Studi</span>
                                        <i class="bi bi-chevron-right ms-2 submenu-arrow"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <li><a class="dropdown-item" href="{{ route('frontend.lp2m.pusat', 'psga') }}">Pusat Studi Gender dan Anak</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.lp2m.pusat', 'psmasb') }}">Pusat Studi Moderasi Agama dan Sosial Budaya</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.lp2m.pusat', 'psis') }}">Pusat Studi Islam dan Sains</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.lp2m.pusat', 'psk') }}">Pusat Studi Kerjasama</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        {{-- LAYANAN --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-custom dropdown-toggle {{ request()->routeIs('frontend.lp2m.layanan') ? 'active' : '' }}"
                               href="#" id="lp2mLayananDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Layanan
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="lp2mLayananDropdown">
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.layanan', 'sop') }}">SOP</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.layanan', 'motto-maklumat') }}">Motto dan Maklumat Pelayanan</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.layanan', 'panduan-pedoman') }}">Panduan dan Pedoman</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.layanan', 'surat-online') }}">Layanan Pembuatan Surat Online</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.layanan', 'notulensi-rapat') }}">Hasil Notulensi Rapat/Meeting LP2M</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.layanan', 'dokumen-kerjasama') }}">Dokumen Kerjasama Kumpulan SK</a></li>
                            </ul>
                        </li>

                        {{-- SURVEI --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-custom dropdown-toggle {{ request()->routeIs('frontend.lp2m.survei') ? 'active' : '' }}"
                               href="#" id="lp2mSurveiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Survei
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="lp2mSurveiDropdown">
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.survei', 'indeks-kepuasan') }}">Indeks Kepuasan Pelanggan</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.survei', 'kolaborasi') }}">Survei Penelitian & PKM Kolaborasi</a></li>
                            </ul>
                        </li>

                        {{-- KONTAK --}}
                        <li class="nav-item">
                            <a class="nav-link nav-link-custom {{ request()->routeIs('frontend.lp2m.kontak') ? 'active' : '' }}"
                               href="{{ route('frontend.lp2m.kontak') }}">Kontak</a>
                        </li>


                    {{-- ==========================================
                         CASE E: NAVBAR UTAMA (INDAFA)
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
                                <li>
                                    <a class="dropdown-item" href="{{ route('frontend.fakultas.syariah') }}" target="_blank" rel="noopener noreferrer">
                                        Fakultas Ilmu Syariah
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('frontend.fakultas.ebit') }}" target="_blank" rel="noopener noreferrer">
                                        Fakultas Tarbiyah
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- PROGRAM STUDI --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-custom dropdown-toggle" href="#"
                               id="prodiDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Program Studi
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="prodiDropdown">
                                <li><a class="dropdown-item" href="{{ route('frontend.prodi.index', 'hki') }}" target="_blank" rel="noopener noreferrer">Prodi Hukum Keluarga Islam (HKI)</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.prodi.index', 'hes') }}" target="_blank" rel="noopener noreferrer">Prodi Hukum Ekonomi Syariah (HES)</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.prodi.index', 'mbs') }}" target="_blank" rel="noopener noreferrer">Prodi Manajemen Bisnis Syariah (MBS)</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.prodi.index', 'ekos') }}" target="_blank" rel="noopener noreferrer">Prodi Ekonomi Syariah (EKOS)</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.prodi.index', 'pai') }}" target="_blank" rel="noopener noreferrer">Prodi Pendidikan Agama Islam (PAI)</a></li>
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
                                <li><a class="dropdown-item" href="{{ route('frontend.lpm.index') }}" target="_blank" rel="noopener noreferrer">LPM</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.index') }}" target="_blank" rel="noopener noreferrer">LP2M</a></li>
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
                                <li><a class="dropdown-item" href="{{ route('frontend.akademik.gallery-indafa') }}">Gallery Indafa</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.akademik.kalender') }}">Kalender Akademik</a></li>
                            </ul>
                        </li>

                        {{-- KEMAHASISWAAN --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-link-custom dropdown-toggle" href="#"
                               id="kemahasiswaanDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Kemahasiswaan
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="kemahasiswaanDropdown">
                                <li><a class="dropdown-item" href="{{ route('frontend.unit.ormawa') }}" target="_blank" rel="noopener noreferrer">ORMAWA</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.akademik.prestasi') }}">Prestasi Kemahasiswaan</a></li>
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

{{-- Custom CSS styles for nested multi-level dropdown menus --}}
<style>
    /* Submenu container */
    .dropdown-submenu {
        position: relative;
    }

    /* Remove standard Bootstrap dropdown caret on submenus */
    .dropdown-submenu > .dropdown-toggle::after {
        display: none !important;
    }

    /* Chevron arrow indicator styling */
    .dropdown-submenu > .dropdown-toggle .submenu-arrow {
        font-size: 0.75rem;
        transition: transform 0.2s ease, color 0.2s ease;
        opacity: 0.85;
    }

    /* Standard dropdown-menu styling enhancement */
    .custom-navbar .dropdown-menu {
        background-color: #0b5345 !important;
        border: 1px solid rgba(204, 164, 59, 0.35) !important;
        border-radius: 8px !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35) !important;
        padding: 8px 0 !important;
        min-width: 230px;
    }

    /* Dropdown item link styling */
    .custom-navbar .dropdown-item {
        color: #ffffff !important;
        font-size: 0.88rem;
        font-weight: 500;
        padding: 9px 18px !important;
        transition: all 0.2s ease-in-out;
        white-space: nowrap;
    }

    .custom-navbar .dropdown-item:hover,
    .custom-navbar .dropdown-item:focus {
        background-color: #cca43b !important;
        color: #0b5345 !important;
        font-weight: 600;
    }

    /* DESKTOP VIEW (min-width: 992px) */
    @media (min-width: 992px) {
        /* Geser logo & teks brand Prodi sedikit ke kanan */
        .prodi-navbar-brand {
            margin-left: 5rem !important;
        }
        /* Shift prodi navbar items to the left on desktop for ideal dropdown space */
        .custom-navbar .navbar-nav.prodi-navbar-nav {
            margin-right: 5rem !important;
        }
        @media (min-width: 1200px) {
            .custom-navbar .navbar-nav.prodi-navbar-nav {
                margin-right: 7rem !important;
            }
        }

        /* Top-level dropdown alignment (opens to the right by default) */
        .custom-navbar .navbar-nav > .nav-item.dropdown > .dropdown-menu {
            left: 0 !important;
            right: auto !important;
        }

        /* Top-level dropdown alignment when flipped due to viewport boundary */
        .custom-navbar .navbar-nav > .nav-item.dropdown > .dropdown-menu.dropdown-menu-end,
        .custom-navbar .navbar-nav > .nav-item.dropdown.flyout-left > .dropdown-menu {
            right: 0 !important;
            left: auto !important;
        }

        /* Hover trigger for 1st level navbar dropdowns */
        .custom-navbar .navbar-nav .nav-item.dropdown:hover > .dropdown-menu {
            display: block !important;
            margin-top: 0;
            animation: navDropdownFade 0.22s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* ALL Submenus 2nd & 3rd Level Flyout Positioning (Fly out to the RIGHT by default) */
        .dropdown-submenu > .dropdown-menu {
            position: absolute !important;
            top: 0 !important;
            left: 100% !important;
            right: auto !important;
            float: none !important;
            margin-top: -6px !important;
            margin-left: 2px !important;
            margin-right: 0 !important;
            display: none !important;
            min-width: 220px;
            background-color: #074338 !important; /* Richer dark green for nested depth */
            border: 1px solid rgba(204, 164, 59, 0.4) !important;
            border-radius: 8px !important;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.45) !important;
            z-index: 1070 !important;
        }

        /* Flyout positioning when flipping left if screen edge is reached */
        .dropdown-submenu.flyout-left > .dropdown-menu {
            left: auto !important;
            right: 100% !important;
            margin-left: 0 !important;
            margin-right: 2px !important;
        }

        /* Flyout display on hover or open class */
        .dropdown-submenu:hover > .dropdown-menu,
        .dropdown-submenu.show > .dropdown-menu,
        .dropdown-submenu.open > .dropdown-menu {
            display: block !important;
            animation: navSubmenuSlideInRight 0.22s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }

        .dropdown-submenu.flyout-left:hover > .dropdown-menu,
        .dropdown-submenu.flyout-left.show > .dropdown-menu,
        .dropdown-submenu.flyout-left.open > .dropdown-menu {
            animation: navSubmenuSlideInLeft 0.22s cubic-bezier(0.16, 1, 0.3, 1) !important;
        }

        /* Parent item active highlight when submenu is open */
        .dropdown-submenu:hover > .dropdown-toggle,
        .dropdown-submenu.show > .dropdown-toggle,
        .dropdown-submenu.open > .dropdown-toggle {
            background-color: #cca43b !important;
            color: #0b5345 !important;
            font-weight: 600;
        }

        .dropdown-submenu:hover > .dropdown-toggle .submenu-arrow,
        .dropdown-submenu.show > .dropdown-toggle .submenu-arrow,
        .dropdown-submenu.open > .dropdown-toggle .submenu-arrow {
            color: #0b5345 !important;
            transform: translateX(4px);
        }

        .dropdown-submenu.flyout-left:hover > .dropdown-toggle .submenu-arrow,
        .dropdown-submenu.flyout-left.show > .dropdown-toggle .submenu-arrow,
        .dropdown-submenu.flyout-left.open > .dropdown-toggle .submenu-arrow {
            transform: translateX(-4px);
        }
    }

    /* MOBILE VIEW (max-width: 991.98px) */
    @media (max-width: 991.98px) {
        .dropdown-submenu > .dropdown-menu {
            position: static !important;
            top: auto !important;
            left: auto !important;
            float: none !important;
            margin: 4px 0 6px 12px !important;
            padding: 4px 0 4px 8px !important;
            background-color: rgba(0, 0, 0, 0.25) !important;
            border-left: 3px solid #cca43b !important;
            border-top: none !important;
            border-right: none !important;
            border-bottom: none !important;
            border-radius: 4px !important;
            box-shadow: none !important;
            display: none !important;
        }

        .dropdown-submenu.show > .dropdown-menu,
        .dropdown-submenu.open > .dropdown-menu {
            display: block !important;
        }

        .dropdown-submenu.show > .dropdown-toggle .submenu-arrow,
        .dropdown-submenu.open > .dropdown-toggle .submenu-arrow {
            transform: rotate(90deg);
        }
    }

    /* Animations */
    @keyframes navDropdownFade {
        from {
            opacity: 0;
            transform: translateY(6px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Downward Inline Submenu (e.g. Layanan Digital inside Persuratan) */
    .dropdown-submenu-down > .dropdown-menu {
        position: static !important;
        top: auto !important;
        left: auto !important;
        right: auto !important;
        float: none !important;
        margin: 4px 8px 6px 12px !important;
        padding: 4px 0 4px 8px !important;
        background-color: rgba(0, 0, 0, 0.3) !important;
        border-left: 2px solid #cca43b !important;
        border-top: none !important;
        border-right: none !important;
        border-bottom: none !important;
        border-radius: 4px !important;
        box-shadow: none !important;
        display: none !important;
        min-width: unset !important;
        width: calc(100% - 16px) !important;
    }

    .dropdown-submenu-down:hover > .dropdown-menu,
    .dropdown-submenu-down.show > .dropdown-menu,
    .dropdown-submenu-down.open > .dropdown-menu {
        display: block !important;
        animation: navDropdownFade 0.22s cubic-bezier(0.16, 1, 0.3, 1) !important;
    }

    .dropdown-submenu-down > .dropdown-toggle .submenu-arrow {
        transition: transform 0.2s ease, color 0.2s ease;
    }

    .dropdown-submenu-down:hover > .dropdown-toggle .submenu-arrow,
    .dropdown-submenu-down.show > .dropdown-toggle .submenu-arrow,
    .dropdown-submenu-down.open > .dropdown-toggle .submenu-arrow {
        color: #0b5345 !important;
        transform: rotate(180deg) !important;
    }

    @keyframes navSubmenuSlideInRight {
        from {
            opacity: 0;
            transform: translateX(-6px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes navSubmenuSlideInLeft {
        from {
            opacity: 0;
            transform: translateX(6px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to detect if submenu exceeds right window boundary & flip direction to left
        function checkDropdownOverflow(element) {
            if (window.innerWidth < 992) return;
            if (element.classList.contains('dropdown-submenu-down')) return;

            var submenu = element.querySelector(':scope > .dropdown-menu');
            if (!submenu) return;

            // Check if parent element is already flying left
            var parentSubmenu = element.parentElement ? element.parentElement.closest('.dropdown-submenu') : null;
            if (parentSubmenu && parentSubmenu.classList.contains('flyout-left')) {
                element.classList.add('flyout-left');
                return;
            }

            var wasHidden = false;
            if (window.getComputedStyle(submenu).display === 'none') {
                submenu.style.visibility = 'hidden';
                submenu.style.display = 'block';
                wasHidden = true;
            }

            var rect = submenu.getBoundingClientRect();
            var windowWidth = window.innerWidth || document.documentElement.clientWidth;

            if (rect.right > windowWidth - 15) {
                element.classList.add('flyout-left');
                if (element.classList.contains('nav-item')) {
                    submenu.classList.add('dropdown-menu-end');
                }
            } else {
                element.classList.remove('flyout-left');
            }

            if (wasHidden) {
                submenu.style.display = '';
                submenu.style.visibility = '';
            }
        }

        // Attach hover overflow check for desktop
        var allSubmenuLis = document.querySelectorAll('.dropdown-submenu, .navbar-nav .nav-item.dropdown');
        allSubmenuLis.forEach(function(item) {
            item.addEventListener('mouseenter', function() {
                checkDropdownOverflow(this);
            });
        });

        // Click handler for mobile & desktop fallback
        var submenuToggles = document.querySelectorAll('.dropdown-submenu > .dropdown-toggle');
        submenuToggles.forEach(function(toggle) {
            toggle.addEventListener('click', function(e) {
                var href = this.getAttribute('href');
                var hasValidHref = href && href !== '#' && href !== 'javascript:void(0);';

                // Desktop: jika klik pada nama fakultas/menu ber-link, langsung arahkan ke beranda fakultas
                if (window.innerWidth >= 992 && hasValidHref) {
                    return;
                }

                // Mobile: jika klik pada teks (bukan panah chevron), langsung arahkan ke beranda fakultas
                var isArrow = e.target.closest('.submenu-arrow');
                if (window.innerWidth < 992 && !isArrow && hasValidHref) {
                    return;
                }

                e.preventDefault();
                e.stopPropagation();

                var parentLi = this.parentElement;
                var submenu = this.nextElementSibling;

                checkDropdownOverflow(parentLi);

                // Close sibling submenus at the same level
                var siblingLis = parentLi.parentElement.querySelectorAll(':scope > .dropdown-submenu');
                siblingLis.forEach(function(sib) {
                    if (sib !== parentLi) {
                        sib.classList.remove('show', 'open');
                        var sibMenu = sib.querySelector(':scope > .dropdown-menu');
                        if (sibMenu) sibMenu.style.display = '';
                    }
                });

                // Toggle active state
                if (parentLi.classList.contains('show') || parentLi.classList.contains('open')) {
                    parentLi.classList.remove('show', 'open');
                    if (submenu) submenu.style.display = '';
                } else {
                    parentLi.classList.add('show', 'open');
                    if (submenu) submenu.style.display = 'block';
                }
            });
        });

        // Close submenus when clicking outside
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.custom-navbar')) {
                document.querySelectorAll('.dropdown-submenu').forEach(function(item) {
                    item.classList.remove('show', 'open');
                    var sub = item.querySelector(':scope > .dropdown-menu');
                    if (sub) sub.style.display = '';
                });
            }
        });

        // Re-check on window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 992) {
                document.querySelectorAll('.dropdown-submenu').forEach(function(item) {
                    checkDropdownOverflow(item);
                });
            }
        });
    });
</script>
