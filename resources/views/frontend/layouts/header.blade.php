<header>
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
        <div class="container-fluid px-3 px-xl-5">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                @if($setting?->logo)
                    <img src="{{ asset('storage/'.$setting->logo) }}"
                         alt="{{ $setting->site_name ?? 'Logo' }}"
                         class="logo-campus"
                         style="height: 50px; width: auto;">
                @endif
                <div class="ms-2 brand-text-divider">
                    <span class="brand-title">{{ $setting?->site_name ?? 'INDAFA' }}</span>
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
                    {{-- 1. BERANDA --}}
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            Beranda
                        </a>
                    </li>

                    {{-- 2. PROFIL --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-custom dropdown-toggle" href="#" id="profilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profil
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="profilDropdown">
                            @if(isset($pagesMenu) && $pagesMenu->count() > 0)
                                @foreach($pagesMenu as $page)
                                    <li><a class="dropdown-item" href="{{ route('page.show', $page->slug) }}">{{ $page->title }}</a></li>
                                @endforeach
                            @else
                                <li><a class="dropdown-item" href="{{ route('frontend.profil.sejarah') }}">Sejarah</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.profil.visi-misi') }}">Visi, Misi & Tujuan</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.profil.struktur-organisasi') }}">Struktur Organisasi</a></li>
                                <li><a class="dropdown-item" href="{{ url('/filosofi-logo') }}">Filosofi Logo</a></li>
                                <li><a class="dropdown-item" href="{{ route('frontend.profil.profil-dosen') }}">Profil Dosen</a></li>
                            @endif
                        </ul>
                    </li>

                    {{-- 3. FAKULTAS & PRODI (Submenu Flyout) --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-custom dropdown-toggle" href="#" id="fakultasProdiDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Fakultas & Prodi
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="fakultasProdiDropdown">
                            @if(isset($facultiesMenu) && $facultiesMenu->count() > 0)
                                @foreach($facultiesMenu as $faculty)
                                    @php
                                        $prodis = $faculty->studyPrograms ?? collect();
                                        $slug = strtolower($faculty->slug ?? '');
                                        $isSyariah = str_contains($slug, 'syariah') || str_contains(strtolower($faculty->name), 'syariah');
                                        $isTarbiyah = str_contains($slug, 'tarbiyah') || str_contains(strtolower($faculty->name), 'tarbiyah') || str_contains($slug, 'ebit');
                                    @endphp
                                    <li class="dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle d-flex align-items-center justify-content-between"
                                           href="{{ route('faculties.show', $faculty->slug) }}">
                                            <span>{{ $faculty->name }}</span>
                                            <i class="bi bi-chevron-right ms-2 submenu-arrow"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-dark">
                                            @if($prodis->count() > 0)
                                                @foreach($prodis as $prodi)
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('programs.show', $prodi->slug) }}">
                                                            {{ $prodi->name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            @elseif($isSyariah)
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('programs.show', 'hukum-keluarga-islam') }}">
                                                        Prodi Hukum Keluarga Islam (HKI)
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('programs.show', 'hukum-ekonomi-syariah') }}">
                                                        Prodi Hukum Ekonomi Syariah (HES)
                                                    </a>
                                                </li>
                                            @elseif($isTarbiyah)
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('programs.show', 'manajemen-bisnis-syariah') }}">
                                                        Prodi Manajemen Bisnis Syariah (MBS)
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('programs.show', 'ekonomi-syariah') }}">
                                                        Prodi Ekonomi Syariah (EKOS)
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('programs.show', 'pendidikan-agama-islam') }}">
                                                        Prodi Pendidikan Agama Islam (PAI)
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </li>
                                @endforeach
                            @else
                                {{-- Fallback Statis Sesuai Mockup Foto --}}
                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle d-flex align-items-center justify-content-between"
                                       href="{{ route('faculties.show', 'fakultas-ilmu-syariah') }}">
                                        <span>Fakultas Ilmu Syariah</span>
                                        <i class="bi bi-chevron-right ms-2 submenu-arrow"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('programs.show', 'hukum-keluarga-islam') }}">
                                                Prodi Hukum Keluarga Islam (HKI)
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('programs.show', 'hukum-ekonomi-syariah') }}">
                                                Prodi Hukum Ekonomi Syariah (HES)
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="dropdown-submenu">
                                    <a class="dropdown-item dropdown-toggle d-flex align-items-center justify-content-between"
                                       href="{{ route('faculties.show', 'fakultas-tarbiyah') }}">
                                        <span>Fakultas Tarbiyah</span>
                                        <i class="bi bi-chevron-right ms-2 submenu-arrow"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('programs.show', 'manajemen-bisnis-syariah') }}">
                                                Prodi Manajemen Bisnis Syariah (MBS)
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('programs.show', 'ekonomi-syariah') }}">
                                                Prodi Ekonomi Syariah (EKOS)
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('programs.show', 'pendidikan-agama-islam') }}">
                                                Prodi Pendidikan Agama Islam (PAI)
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        </ul>
                    </li>

                    {{-- 4. UNIT & LEMBAGA --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-custom dropdown-toggle" href="#" id="unitDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Unit & Lembaga
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="unitDropdown">
                            <li><a class="dropdown-item" href="{{ url('/lpm') }}">LPM</a></li>
                            <li><a class="dropdown-item" href="{{ url('/lp2m') }}">LP2M</a></li>
                        </ul>
                    </li>

                    {{-- 5. AKADEMIK --}}
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

                    {{-- 6. PENGUMUMAN --}}
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('announcements.*') ? 'active' : '' }}" href="{{ route('announcements.index') }}">
                            Pengumuman
                        </a>
                    </li>

                    {{-- 7. BERITA --}}
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('news.*') ? 'active' : '' }}" href="{{ route('news.index') }}">
                            Berita
                        </a>
                    </li>

                    {{-- 8. KONTAK --}}
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('contact.*') || request()->routeIs('frontend.hubungi.*') ? 'active' : '' }}" href="{{ route('contact.index') }}">
                            Kontak
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var submenuToggles = document.querySelectorAll('.dropdown-submenu > .dropdown-toggle');
        submenuToggles.forEach(function(toggle) {
            toggle.addEventListener('click', function(e) {
                var href = this.getAttribute('href');
                var hasValidHref = href && href !== '#' && href !== 'javascript:void(0);';
                var isArrow = e.target.closest('.submenu-arrow');

                // Jika klik pada teks/nama fakultas (bukan ikon panah), langsung navigasi ke Beranda Fakultas (tanda hijau)
                if (!isArrow && hasValidHref) {
                    return; // Biarkan browser menuju halaman fakultas
                }

                // Jika klik pada panah chevron di HP, toggle submenu
                e.preventDefault();
                e.stopPropagation();

                var parentLi = this.closest('.dropdown-submenu');
                var submenu = parentLi ? parentLi.querySelector(':scope > .dropdown-menu') : null;

                if (parentLi && parentLi.parentElement) {
                    var siblings = parentLi.parentElement.querySelectorAll(':scope > .dropdown-submenu');
                    siblings.forEach(function(sib) {
                        if (sib !== parentLi) {
                            sib.classList.remove('show', 'open');
                            var sibMenu = sib.querySelector(':scope > .dropdown-menu');
                            if (sibMenu) sibMenu.style.display = '';
                        }
                    });
                }

                if (parentLi) {
                    if (parentLi.classList.contains('show') || parentLi.classList.contains('open')) {
                        parentLi.classList.remove('show', 'open');
                        if (submenu) submenu.style.display = '';
                    } else {
                        parentLi.classList.add('show', 'open');
                        if (submenu) submenu.style.display = 'block';
                    }
                }
            });
        });

        // Tutup submenu saat klik di luar navbar
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.custom-navbar')) {
                document.querySelectorAll('.dropdown-submenu').forEach(function(item) {
                    item.classList.remove('show', 'open');
                    var sub = item.querySelector(':scope > .dropdown-menu');
                    if (sub) sub.style.display = '';
                });
            }
        });
    });
</script>
