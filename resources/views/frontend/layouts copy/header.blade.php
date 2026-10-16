<header>

    {{-- TOPBAR --}}

    <div class="topbar">

        <div class="container">

            <div class="row">

                <div class="col-md-6">

                    <div class="topbar-left">

                        @if($setting?->email)
                            <span>
                                <i class="bi bi-envelope-fill"></i>
                                {{ $setting->email }}
                            </span>
                        @endif

                        @if($setting?->phone)
                            <span class="ms-3">
                                <i class="bi bi-telephone-fill"></i>
                                {{ $setting->phone }}
                            </span>
                        @endif

                    </div>

                </div>

                <div class="col-md-6 text-end">

                    @if($setting?->facebook)
                        <a href="{{ $setting->facebook }}" target="_blank">
                            <i class="bi bi-facebook"></i>
                        </a>
                    @endif

                    @if($setting?->instagram)
                        <a href="{{ $setting->instagram }}" target="_blank">
                            <i class="bi bi-instagram"></i>
                        </a>
                    @endif

                    @if($setting?->twitter)
                        <a href="{{ $setting->twitter }}" target="_blank">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                    @endif

                    @if($setting?->linkedin)
                        <a href="{{ $setting->linkedin }}" target="_blank">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    @endif

                </div>

            </div>

        </div>

    </div>

    {{-- NAVBAR --}}

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">

        <div class="container">

            <a class="navbar-brand d-flex align-items-center"
               href="">

                @if($setting?->logo)

                    <img src="{{ asset('storage/'.$setting->logo) }}"
                         alt="{{ $setting->site_name }}"
                         height="60">

                @endif

            </a>

            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mainNavbar">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse"
                 id="mainNavbar">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('home') }}">
                            Beranda
                        </a>
                    </li>

                    {{-- PROFIL --}}
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle"
                           href="#"
                           data-bs-toggle="dropdown">

                            Profil

                        </a>

                        <ul class="dropdown-menu">

                            @foreach($pagesMenu as $page)

                                <li>
                                    <a class="dropdown-item"
                                       href="{{ route('page.show',$page->slug) }}">
                                        {{ $page->title }}
                                    </a>
                                </li>

                            @endforeach

                        </ul>

                    </li>

                    {{-- FAKULTAS (Menggabungkan Fakultas & Program Studi) --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle"
                           href="#"
                           id="fakultasDropdown"
                           role="button"
                           data-bs-toggle="dropdown"
                           aria-expanded="false">
                            Fakultas
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="fakultasDropdown">
                            @php
                                $allProdis = isset($programsMenu) ? $programsMenu : (\App\Models\StudyProgram::all() ?? collect());

                                $findProdiSlug = function($code, $fallbackSlug) use ($allProdis) {
                                    $found = $allProdis->first(function($p) use ($code, $fallbackSlug) {
                                        $slug = strtolower($p->slug ?? '');
                                        $name = strtolower($p->name ?? '');
                                        return str_contains($slug, $code) || str_contains($slug, $fallbackSlug) || str_contains($name, $code);
                                    });
                                    return $found ? $found->slug : $fallbackSlug;
                                };

                                $slugHki = $findProdiSlug('hki', 'hukum-keluarga-islam');
                                $slugHes = $findProdiSlug('hes', 'hukum-ekonomi-syariah');
                                $slugMbs = $findProdiSlug('mbs', 'manajemen-bisnis-syariah');
                                $slugEkos = $findProdiSlug('ekos', 'ekonomi-syariah');
                                $slugPai = $findProdiSlug('pai', 'pendidikan-agama-islam');

                                $syariahFac = isset($facultiesMenu) ? $facultiesMenu->first(function($f) {
                                    $s = strtolower($f->slug ?? '');
                                    $n = strtolower($f->name ?? '');
                                    return str_contains($s, 'syariah') || str_contains($n, 'syariah');
                                }) : null;

                                $tarbiyahFac = isset($facultiesMenu) ? $facultiesMenu->first(function($f) {
                                    $s = strtolower($f->slug ?? '');
                                    $n = strtolower($f->name ?? '');
                                    return str_contains($s, 'tarbiyah') || str_contains($n, 'tarbiyah') || str_contains($s, 'ebit');
                                }) : null;

                                $slugSyariah = $syariahFac?->slug ?? 'fakultas-ilmu-syariah';
                                $slugTarbiyah = $tarbiyahFac?->slug ?? 'fakultas-tarbiyah';
                            @endphp

                            {{-- Submenu 1: Fakultas Ilmu Syariah --}}
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle d-flex align-items-center justify-content-between"
                                   href="{{ route('faculties.show', $slugSyariah) }}">
                                    <span>Fakultas Ilmu Syariah</span>
                                    <i class="bi bi-chevron-right ms-2 submenu-arrow"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('programs.show', $slugHki) }}">
                                            Prodi Hukum Keluarga Islam (HKI)
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('programs.show', $slugHes) }}">
                                            Prodi Hukum Ekonomi Syariah (HES)
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- Submenu 2: Fakultas Tarbiyah --}}
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle d-flex align-items-center justify-content-between"
                                   href="{{ route('faculties.show', $slugTarbiyah) }}">
                                    <span>Fakultas Tarbiyah</span>
                                    <i class="bi bi-chevron-right ms-2 submenu-arrow"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('programs.show', $slugMbs) }}">
                                            Prodi Manajemen Bisnis Syariah (MBS)
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('programs.show', $slugEkos) }}">
                                            Prodi Ekonomi Syariah (EKOS)
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('programs.show', $slugPai) }}">
                                            Prodi Pendidikan Agama Islam (PAI)
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('contact.index') }}">
                            Kontak
                        </a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>

</header>

<style>
    .dropdown-submenu {
        position: relative;
    }
    .dropdown-submenu > .dropdown-toggle::after {
        display: none !important;
    }
    .dropdown-submenu > .dropdown-toggle .submenu-arrow {
        font-size: 0.75rem;
        transition: transform 0.2s ease;
    }
    @media (min-width: 992px) {
        .dropdown-submenu > .dropdown-menu {
            position: absolute !important;
            top: 0 !important;
            left: 100% !important;
            margin-top: -6px !important;
            margin-left: 2px !important;
            display: none !important;
        }
        .dropdown-submenu:hover > .dropdown-menu,
        .dropdown-submenu.show > .dropdown-menu {
            display: block !important;
        }
        .dropdown-submenu:hover > .dropdown-toggle .submenu-arrow,
        .dropdown-submenu.show > .dropdown-toggle .submenu-arrow {
            transform: translateX(3px);
        }
    }
    @media (max-width: 991.98px) {
        .dropdown-submenu > .dropdown-menu {
            position: static !important;
            float: none !important;
            display: none;
            padding-left: 15px !important;
        }
        .dropdown-submenu.show > .dropdown-menu {
            display: block !important;
        }
        .dropdown-submenu.show > .dropdown-toggle .submenu-arrow {
            transform: rotate(90deg);
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var submenuToggles = document.querySelectorAll('.dropdown-submenu > .dropdown-toggle');
        submenuToggles.forEach(function(toggle) {
            toggle.addEventListener('click', function(e) {
                var href = this.getAttribute('href');
                var hasValidHref = href && href !== '#' && href !== 'javascript:void(0);';
                var isArrow = e.target.closest('.submenu-arrow');

                // Jika klik pada teks/nama fakultas (bukan panah), langsung navigasi ke Beranda Fakultas
                if (!isArrow && hasValidHref) {
                    return; // Biarkan navigasi browser
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
                            sib.classList.remove('show');
                            var sibMenu = sib.querySelector(':scope > .dropdown-menu');
                            if (sibMenu) sibMenu.style.display = '';
                        }
                    });
                }

                if (parentLi) {
                    if (parentLi.classList.contains('show')) {
                        parentLi.classList.remove('show');
                        if (submenu) submenu.style.display = '';
                    } else {
                        parentLi.classList.add('show');
                        if (submenu) submenu.style.display = 'block';
                    }
                }
            });
        });
    });
</script>
