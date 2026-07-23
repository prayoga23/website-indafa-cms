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
                                    <li><a class="dropdown-item" href="{{ route('frontend.prodi.index', 'mbs') }}">Manajemen Bisnis Syariah</a></li>
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
                                @if($facultyId === 'syariah')
                                    <li><a class="dropdown-item" href="{{ route('frontend.fakultas.akademik', [$facultyId, 'dokumen']) }}">Dokumen</a></li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.fakultas.akademik', [$facultyId, 'akreditasi']) }}">Sertifikat Akreditasi</a></li>
                                @else
                                    <li><a class="dropdown-item" href="{{ route('frontend.fakultas.akademik', [$facultyId, 'dokumen']) }}">Dokumen</a></li>
                                    
                                    {{-- PERSURATAN NESTED DROPDOWN --}}
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle" href="#">Persuratan</a>
                                        <ul class="dropdown-menu dropdown-menu-dark">
                                            <li><a class="dropdown-item" href="{{ route('frontend.fakultas.akademik', [$facultyId, 'persuratan']) }}">Form Persuratan</a></li>
                                            <li class="dropdown-submenu">
                                                <a class="dropdown-item dropdown-toggle" href="#">Layanan Digital</a>
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
                                @endif
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
                                        <li class="dropdown-submenu">
                                            <a class="dropdown-item dropdown-toggle" href="#">Layanan Digital</a>
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
                                <li><a class="dropdown-item" href="{{ route('frontend.lpm.penjaminan', 'laporan-kepuasan') }}">Laporan Kepuasan Monev GJM & GKM</a></li>
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
                                    <a class="dropdown-item dropdown-toggle" href="#">Jurnal</a>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <li><a class="dropdown-item" href="{{ route('frontend.lp2m.riset', 'jurnal') }}#profil">Profil Jurnal</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.lp2m.riset', 'jurnal') }}#rekap">Rekap Jurnal</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.lp2m.riset', 'jurnal') }}#jrce">JRCE</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.lp2m.riset', 'jurnal') }}#egalita">EGALITA</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.lp2m.riset', 'jurnal') }}#ejournal">E-Journal</a></li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.riset', 'penelitian') }}">Penelitian (Litapdimas)</a></li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">Pengabdian Litapdimas</a>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <li><a class="dropdown-item" href="{{ route('frontend.lp2m.riset', 'pengabdian') }}#simapel">Simapel</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.lp2m.riset', 'pengabdian') }}#sipemas">Sipemas</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.lp2m.riset', 'pengabdian') }}#kerjasama">Kerjasama Antar Instansi</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">HKI</a>
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
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.pusat', 'p2km') }}">Pusat Pelayanan Kesehatan Masyarakat (P2KM)</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.pusat', 'p3sr') }}">Pusat Pengelola & Pengembangan Sistem Remunerasi (P3SR)</a></li>
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle" href="#">Pusat Studi</a>
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
                                <li><a class="dropdown-item" href="{{ route('frontend.lpm.index') }}">LPM</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.lp2m.index') }}">LP2M</a></li>
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
    .dropdown-submenu > .dropdown-menu {
        position: relative !important;
        top: 0 !important;
        left: 0 !important;
        float: none !important;
        margin: 4px 0 4px 10px !important;
        padding: 4px 0 4px 6px !important;
        background-color: rgba(255, 255, 255, 0.07) !important;
        border-left: 2px solid #cca43b !important;
        border-top: none !important;
        border-right: none !important;
        border-bottom: none !important;
        border-radius: 4px !important;
        box-shadow: none !important;
        display: none;
    }
    .dropdown-submenu:hover > .dropdown-menu,
    .dropdown-submenu.show > .dropdown-menu,
    .dropdown-submenu.open > .dropdown-menu {
        display: block !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.dropdown-submenu > .dropdown-toggle').forEach(function(element) {
            element.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var parentLi = this.parentElement;
                var submenu = this.nextElementSibling;
                if (submenu && submenu.classList.contains('dropdown-menu')) {
                    if (submenu.style.display === 'block') {
                        submenu.style.display = 'none';
                        parentLi.classList.remove('show', 'open');
                    } else {
                        submenu.style.display = 'block';
                        parentLi.classList.add('show', 'open');
                    }
                }
            });
        });
    });
</script>
