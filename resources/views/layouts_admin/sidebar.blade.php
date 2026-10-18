<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2 bg-white my-2 shadow-sm" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand px-3 py-3 m-0 d-flex align-items-center" href="{{ route('admin.dashboard') }}">
            @if(isset($setting) && $setting->logo)
                <img src="{{ asset('storage/'.$setting->logo) }}" class="navbar-brand-img rounded" style="max-height: 36px; width: auto;" alt="Logo">
            @else
                <img src="{{ asset('template-dashboard/assets/img/logo-ct-dark.png') }}" class="navbar-brand-img rounded" width="28" height="28" alt="Logo">
            @endif
            <div class="d-flex flex-column ms-2">
                <span class="font-weight-bold text-sm text-dark line-height-1">IAI DARUL FALAH</span>
                <span class="text-xxs text-secondary text-uppercase font-weight-bolder">Admin Panel</span>
            </div>
        </a>
    </div>

    @auth
        <div class="px-3 pb-2 pt-1">
            <div class="d-flex align-items-center p-2 rounded-3 border bg-light-subtle">
                <div class="avatar avatar-xs rounded-circle bg-dark text-white text-xxs font-weight-bold me-2 d-flex align-items-center justify-content-center shadow-xs">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="overflow-hidden" style="line-height: 1.2;">
                    <p class="text-xs font-weight-bold text-dark mb-0 text-truncate" style="max-width: 140px;">{{ auth()->user()->name }}</p>
                    <span class="text-xxs text-secondary text-truncate d-block" style="max-width: 140px;">{{ auth()->user()->getRoleDisplayName() }}</span>
                </div>
            </div>
        </div>
    @endauth

    <hr class="horizontal dark mt-0 mb-2">

    <div class="navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">

            {{-- DASHBOARD COLLAPSE --}}
            @php
                $dashboardActive = request()->routeIs('admin.dashboard*');
                $canSyariahDash = auth()->user()->canAccessDashboard('syariah');
                $canFebitDash = auth()->user()->canAccessDashboard('febit');
                $canLpmDash = auth()->user()->canAccessDashboard('lpm');
                $canLp2mDash = auth()->user()->canAccessDashboard('lp2m');
            @endphp
            <li class="nav-item">
                <a class="nav-link justify-content-between {{ $dashboardActive ? 'active-parent' : '' }}"
                   data-bs-toggle="collapse"
                   href="#collapseDashboard"
                   role="button"
                   aria-expanded="{{ $dashboardActive ? 'true' : 'false' }}"
                   aria-controls="collapseDashboard">
                    <div class="d-flex align-items-center">
                        <span class="nav-icon">
                            <i class="material-symbols-rounded">dashboard</i>
                        </span>
                        <span class="nav-link-text">Dashboard Panel</span>
                    </div>
                    <i class="material-symbols-rounded sidenav-arrow">expand_more</i>
                </a>
                <div class="collapse {{ $dashboardActive ? 'show' : '' }}" id="collapseDashboard">
                    <ul class="nav sub-menu-nav">
                        @if(auth()->user()->isSuperAdmin())
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.dashboard') && !request()->routeIs('admin.dashboard.*') ? 'active-sub' : '' }}" href="{{ route('admin.dashboard') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Dashboard Utama</span>
                            </a>
                        </li>
                        @endif

                        @if($canSyariahDash)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.dashboard.syariah') ? 'active-sub' : '' }}" href="{{ route('admin.dashboard.syariah') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Fakultas Syari'ah</span>
                            </a>
                        </li>
                        @endif

                        @if($canFebitDash)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.dashboard.febit') ? 'active-sub' : '' }}" href="{{ route('admin.dashboard.febit') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Fakultas FEBIT</span>
                            </a>
                        </li>
                        @endif

                        @if($canLpmDash)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.dashboard.lpm') ? 'active-sub' : '' }}" href="{{ route('admin.dashboard.lpm') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Dashboard LPM</span>
                            </a>
                        </li>
                        @endif

                        @if($canLp2mDash)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.dashboard.lp2m') ? 'active-sub' : '' }}" href="{{ route('admin.dashboard.lp2m') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Dashboard LP2M</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </li>

            {{-- PORTAL FAKULTAS & LEMBAGA --}}
            @php
                $portalActive = request()->routeIs('admin.portal.*');
                $canSyariahPortal = auth()->user()->canAccessPortal('syariah');
                $canFebitPortal = auth()->user()->canAccessPortal('febit');
                $canLpmPortal = auth()->user()->canAccessPortal('lpm');
                $canLp2mPortal = auth()->user()->canAccessPortal('lp2m');
                $showPortalSection = $canSyariahPortal || $canFebitPortal || $canLpmPortal || $canLp2mPortal;
            @endphp

            @if($showPortalSection)
            <li class="nav-header">Portal Fakultas & Lembaga</li>
            <li class="nav-item">
                <a class="nav-link justify-content-between {{ $portalActive ? 'active-parent' : '' }}"
                   data-bs-toggle="collapse"
                   href="#collapsePortal"
                   role="button"
                   aria-expanded="{{ $portalActive ? 'true' : 'false' }}"
                   aria-controls="collapsePortal">
                    <div class="d-flex align-items-center">
                        <span class="nav-icon">
                            <i class="material-symbols-rounded">web</i>
                        </span>
                        <span class="nav-link-text">Portal Fakultas & Lembaga</span>
                    </div>
                    <i class="material-symbols-rounded sidenav-arrow">expand_more</i>
                </a>
                <div class="collapse {{ $portalActive ? 'show' : '' }}" id="collapsePortal">
                    <ul class="nav sub-menu-nav">
                        @if($canSyariahPortal)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/portal/syariah*') ? 'active-sub' : '' }}" href="{{ route('admin.portal.edit', 'syariah') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Fakultas Syari'ah</span>
                            </a>
                        </li>
                        @endif

                        @if($canFebitPortal)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/portal/febit*') ? 'active-sub' : '' }}" href="{{ route('admin.portal.edit', 'febit') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Fakultas FEBIT</span>
                            </a>
                        </li>
                        @endif

                        @if($canLpmPortal)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/portal/lpm*') ? 'active-sub' : '' }}" href="{{ route('admin.portal.edit', 'lpm') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Portal LPM</span>
                            </a>
                        </li>
                        @endif

                        @if($canLp2mPortal)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/portal/lp2m*') ? 'active-sub' : '' }}" href="{{ route('admin.portal.edit', 'lp2m') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Portal LP2M</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </li>
            @endif

            {{-- WEBSITE PROGRAM STUDI --}}
            @php
                $prodiActive = request()->routeIs('admin.portal-prodi.*');
                $canHki = auth()->user()->canAccessProdi('hki');
                $canHes = auth()->user()->canAccessProdi('hes');
                $canMbs = auth()->user()->canAccessProdi('mbs');
                $canEkos = auth()->user()->canAccessProdi('ekos');
                $canPai = auth()->user()->canAccessProdi('pai');
                $showProdiSection = $canHki || $canHes || $canMbs || $canEkos || $canPai;
            @endphp

            @if($showProdiSection)
            <li class="nav-item">
                <a class="nav-link justify-content-between {{ $prodiActive ? 'active-parent' : '' }}"
                   data-bs-toggle="collapse"
                   href="#collapseProdiPortal"
                   role="button"
                   aria-expanded="{{ $prodiActive ? 'true' : 'false' }}"
                   aria-controls="collapseProdiPortal">
                    <div class="d-flex align-items-center">
                        <span class="nav-icon">
                            <i class="material-symbols-rounded">school</i>
                        </span>
                        <span class="nav-link-text">Website Program Studi</span>
                    </div>
                    <i class="material-symbols-rounded sidenav-arrow">expand_more</i>
                </a>
                <div class="collapse {{ $prodiActive ? 'show' : '' }}" id="collapseProdiPortal">
                    <ul class="nav sub-menu-nav">
                        @if(auth()->user()->isSuperAdmin() || auth()->user()->role === 'Admin Fakultas')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.portal-prodi.index') ? 'active-sub' : '' }}" href="{{ route('admin.portal-prodi.index') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Semua Website Prodi</span>
                            </a>
                        </li>
                        @endif

                        @if($canHki)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/portal-prodi/hki*') ? 'active-sub' : '' }}" href="{{ route('admin.portal-prodi.edit', 'hki') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Prodi HKI (Syari'ah)</span>
                            </a>
                        </li>
                        @endif

                        @if($canHes)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/portal-prodi/hes*') ? 'active-sub' : '' }}" href="{{ route('admin.portal-prodi.edit', 'hes') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Prodi HES (Syari'ah)</span>
                            </a>
                        </li>
                        @endif

                        @if($canMbs)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/portal-prodi/mbs*') ? 'active-sub' : '' }}" href="{{ route('admin.portal-prodi.edit', 'mbs') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Prodi MBS (FEBIT)</span>
                            </a>
                        </li>
                        @endif

                        @if($canEkos)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/portal-prodi/ekos*') ? 'active-sub' : '' }}" href="{{ route('admin.portal-prodi.edit', 'ekos') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Prodi EKOS (FEBIT)</span>
                            </a>
                        </li>
                        @endif

                        @if($canPai)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/portal-prodi/pai*') ? 'active-sub' : '' }}" href="{{ route('admin.portal-prodi.edit', 'pai') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Prodi PAI (FEBIT)</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </li>
            @endif

            {{-- MASTER DATA --}}
            @if(auth()->user()->isSuperAdmin())
            <li class="nav-header">Master Data</li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.faculties.*') ? 'active' : '' }}" href="{{ route('admin.faculties.index') }}">
                    <span class="nav-icon">
                        <i class="material-symbols-rounded">account_balance</i>
                    </span>
                    <span class="nav-link-text">Fakultas</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.study-programs.*') ? 'active' : '' }}" href="{{ route('admin.study-programs.index') }}">
                    <span class="nav-icon">
                        <i class="material-symbols-rounded">school</i>
                    </span>
                    <span class="nav-link-text">Program Studi</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}" href="{{ route('admin.pages.index') }}">
                    <span class="nav-icon">
                        <i class="material-symbols-rounded">description</i>
                    </span>
                    <span class="nav-link-text">Halaman (Pages)</span>
                </a>
            </li>
            @endif

            {{-- KONTEN & INFORMASI --}}
            <li class="nav-header">Konten & Web</li>

            {{-- BERANDA COLLAPSE --}}
            @php
                $berandaActive = request()->routeIs('admin.sambutan.*', 'admin.news.*', 'admin.agenda.*', 'admin.statistic.*', 'admin.homepage-settings.*') || request()->is('admin/pages/edit-by-slug/prestasi');
            @endphp
            <li class="nav-item">
                <a class="nav-link justify-content-between {{ $berandaActive ? 'active-parent' : '' }}"
                   data-bs-toggle="collapse"
                   href="#collapseBeranda"
                   role="button"
                   aria-expanded="{{ $berandaActive ? 'true' : 'false' }}"
                   aria-controls="collapseBeranda">
                    <div class="d-flex align-items-center">
                        <span class="nav-icon">
                            <i class="material-symbols-rounded">home</i>
                        </span>
                        <span class="nav-link-text">Beranda</span>
                    </div>
                    <i class="material-symbols-rounded sidenav-arrow">expand_more</i>
                </a>
                <div class="collapse {{ $berandaActive ? 'show' : '' }}" id="collapseBeranda">
                    <ul class="nav sub-menu-nav">
                        @if(auth()->user()->isSuperAdmin())
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.sambutan.*') ? 'active-sub' : '' }}" href="{{ route('admin.sambutan.index') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Sambutan Rektor</span>
                            </a>
                        </li>
                        @endif

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.news.*') ? 'active-sub' : '' }}" href="{{ route('admin.news.index') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Berita</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.agenda.*') ? 'active-sub' : '' }}" href="{{ route('admin.agenda.index') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Agenda</span>
                            </a>
                        </li>

                        @if(auth()->user()->isSuperAdmin())
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.statistic.*') ? 'active-sub' : '' }}" href="{{ route('admin.statistic.index') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Statistik Kampus</span>
                            </a>
                        </li>
                        @endif

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/pages/edit-by-slug/prestasi') ? 'active-sub' : '' }}" href="{{ route('admin.pages.edit-by-slug', 'prestasi') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Prestasi Mahasiswa</span>
                            </a>
                        </li>

                        @if(auth()->user()->isSuperAdmin())
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.homepage-settings.*') ? 'active-sub' : '' }}" href="{{ route('admin.homepage-settings.index') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Pengaturan Beranda</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </li>

            {{-- PROFIL KAMPUS COLLAPSE --}}
            @php
                $profilActive = request()->routeIs('admin.history.*', 'admin.vision.*', 'admin.structure.*', 'admin.lecturers.*') || request()->is('admin/pages/edit-by-slug/filosofi-logo');
            @endphp
            <li class="nav-item">
                <a class="nav-link justify-content-between {{ $profilActive ? 'active-parent' : '' }}"
                   data-bs-toggle="collapse"
                   href="#collapseProfil"
                   role="button"
                   aria-expanded="{{ $profilActive ? 'true' : 'false' }}"
                   aria-controls="collapseProfil">
                    <div class="d-flex align-items-center">
                        <span class="nav-icon">
                            <i class="material-symbols-rounded">corporate_fare</i>
                        </span>
                        <span class="nav-link-text">Profil Kampus</span>
                    </div>
                    <i class="material-symbols-rounded sidenav-arrow">expand_more</i>
                </a>
                <div class="collapse {{ $profilActive ? 'show' : '' }}" id="collapseProfil">
                    <ul class="nav sub-menu-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.history.*') ? 'active-sub' : '' }}" href="{{ route('admin.history.index') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Sejarah</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.vision.*') ? 'active-sub' : '' }}" href="{{ route('admin.vision.index') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Visi & Misi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.structure.*') ? 'active-sub' : '' }}" href="{{ route('admin.structure.index') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Struktur Organisasi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.lecturers.*') ? 'active-sub' : '' }}" href="{{ route('admin.lecturers.index') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Profil Dosen</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/pages/edit-by-slug/filosofi-logo') ? 'active-sub' : '' }}" href="{{ route('admin.pages.edit-by-slug', 'filosofi-logo') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Filosofi Logo</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- LEMBAGA & UNIT COLLAPSE --}}
            @php
                $lembagaActive = request()->is('admin/pages/edit-by-slug/ormawa') || request()->is('admin/portal/lpm*') || request()->is('admin/portal/lp2m*') || request()->is('admin/pages/edit-by-slug/lpm') || request()->is('admin/pages/edit-by-slug/lp2m');
            @endphp
            <li class="nav-item">
                <a class="nav-link justify-content-between {{ $lembagaActive ? 'active-parent' : '' }}"
                   data-bs-toggle="collapse"
                   href="#collapseLembaga"
                   role="button"
                   aria-expanded="{{ $lembagaActive ? 'true' : 'false' }}"
                   aria-controls="collapseLembaga">
                    <div class="d-flex align-items-center">
                        <span class="nav-icon">
                            <i class="material-symbols-rounded">domain</i>
                        </span>
                        <span class="nav-link-text">Lembaga & Unit</span>
                    </div>
                    <i class="material-symbols-rounded sidenav-arrow">expand_more</i>
                </a>
                <div class="collapse {{ $lembagaActive ? 'show' : '' }}" id="collapseLembaga">
                    <ul class="nav sub-menu-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('admin/portal/lpm*') || request()->is('admin/pages/edit-by-slug/lpm')) ? 'active-sub' : '' }}" href="{{ route('admin.portal.edit', 'lpm') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">LPM</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('admin/portal/lp2m*') || request()->is('admin/pages/edit-by-slug/lp2m')) ? 'active-sub' : '' }}" href="{{ route('admin.portal.edit', 'lp2m') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">LP2M</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/pages/edit-by-slug/ormawa') ? 'active-sub' : '' }}" href="{{ route('admin.pages.edit-by-slug', 'ormawa') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">ORMAWA</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- AKADEMIK COLLAPSE --}}
            @php
                $akademikActive = request()->routeIs('admin.curriculum.*', 'admin.cpl.*', 'admin.calendar.*', 'admin.guide.*', 'admin.schedule.*') || request()->is('admin/pages/edit-by-slug/pmb') || request()->is('admin/pages/edit-by-slug/penelitian') || request()->is('admin/pages/edit-by-slug/gallery-indafa');
            @endphp
            <li class="nav-item">
                <a class="nav-link justify-content-between {{ $akademikActive ? 'active-parent' : '' }}"
                   data-bs-toggle="collapse"
                   href="#collapseAkademik"
                   role="button"
                   aria-expanded="{{ $akademikActive ? 'true' : 'false' }}"
                   aria-controls="collapseAkademik">
                    <div class="d-flex align-items-center">
                        <span class="nav-icon">
                            <i class="material-symbols-rounded">menu_book</i>
                        </span>
                        <span class="nav-link-text">Akademik</span>
                    </div>
                    <i class="material-symbols-rounded sidenav-arrow">expand_more</i>
                </a>
                <div class="collapse {{ $akademikActive ? 'show' : '' }}" id="collapseAkademik">
                    <ul class="nav sub-menu-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.curriculum.*') ? 'active-sub' : '' }}" href="{{ route('admin.curriculum.index') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Kurikulum</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.cpl.*') ? 'active-sub' : '' }}" href="{{ route('admin.cpl.index') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">CPL</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.calendar.*') ? 'active-sub' : '' }}" href="{{ route('admin.calendar.index') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Kalender Akademik</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.guide.*') ? 'active-sub' : '' }}" href="{{ route('admin.guide.index') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Panduan Akademik</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.schedule.*') ? 'active-sub' : '' }}" href="{{ route('admin.schedule.index') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Jadwal Kuliah</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/pages/edit-by-slug/pmb') ? 'active-sub' : '' }}" href="{{ route('admin.pages.edit-by-slug', 'pmb') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Pendaftaran PMB</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/pages/edit-by-slug/penelitian') ? 'active-sub' : '' }}" href="{{ route('admin.pages.edit-by-slug', 'penelitian') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Penelitian & Pengabdian</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/pages/edit-by-slug/gallery-indafa') ? 'active-sub' : '' }}" href="{{ route('admin.pages.edit-by-slug', 'gallery-indafa') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Gallery INDAFA</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- PENGUMUMAN --}}
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.announcements.*') ? 'active' : '' }}" href="{{ route('admin.announcements.index') }}">
                    <span class="nav-icon">
                        <i class="material-symbols-rounded">campaign</i>
                    </span>
                    <span class="nav-link-text">Pengumuman</span>
                </a>
            </li>

            {{-- GALERI COLLAPSE --}}
            @php
                $galeriActive = request()->routeIs('admin.photo.*', 'admin.video.*');
            @endphp
            <li class="nav-item">
                <a class="nav-link justify-content-between {{ $galeriActive ? 'active-parent' : '' }}"
                   data-bs-toggle="collapse"
                   href="#collapseGaleri"
                   role="button"
                   aria-expanded="{{ $galeriActive ? 'true' : 'false' }}"
                   aria-controls="collapseGaleri">
                    <div class="d-flex align-items-center">
                        <span class="nav-icon">
                            <i class="material-symbols-rounded">photo_library</i>
                        </span>
                        <span class="nav-link-text">Galeri</span>
                    </div>
                    <i class="material-symbols-rounded sidenav-arrow">expand_more</i>
                </a>
                <div class="collapse {{ $galeriActive ? 'show' : '' }}" id="collapseGaleri">
                    <ul class="nav sub-menu-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.photo.*') ? 'active-sub' : '' }}" href="{{ route('admin.photo.index') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Galeri Foto</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.video.*') ? 'active-sub' : '' }}" href="{{ route('admin.video.index') }}">
                                <span class="sub-dot"></span>
                                <span class="sidenav-normal">Galeri Video</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- BANNER HOMEPAGE --}}
            @if(auth()->user()->isSuperAdmin())
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.banners.*') ? 'active' : '' }}" href="{{ route('admin.banners.index') }}">
                    <span class="nav-icon">
                        <i class="material-symbols-rounded">view_carousel</i>
                    </span>
                    <span class="nav-link-text">Banner Homepage</span>
                </a>
            </li>
            @endif

            {{-- DOKUMEN --}}
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.document.*') ? 'active' : '' }}" href="{{ route('admin.document.index') }}">
                    <span class="nav-icon">
                        <i class="material-symbols-rounded">folder_open</i>
                    </span>
                    <span class="nav-link-text">Dokumen</span>
                </a>
            </li>

            {{-- WEBSITE SETTING & MANAJEMEN PENGGUNA --}}
            @if(auth()->user()->isSuperAdmin())
            <li class="nav-header">Pengaturan</li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                    <span class="nav-icon">
                        <i class="material-symbols-rounded">manage_accounts</i>
                    </span>
                    <span class="nav-link-text">Manajemen Pengguna</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.website-settings.*') ? 'active' : '' }}" href="{{ route('admin.website-settings.index') }}">
                    <span class="nav-icon">
                        <i class="material-symbols-rounded">settings</i>
                    </span>
                    <span class="nav-link-text">Website Setting</span>
                </a>
            </li>
            @endif

        </ul>
    </div>

    {{-- SIDENAV FOOTER --}}
    <div class="sidenav-footer position-absolute w-100 bottom-0 p-3 bg-white border-top">
        <a class="btn btn-outline-dark btn-sm w-100 mb-2 d-flex align-items-center justify-content-center shadow-none text-xs font-weight-bold" href="{{ route('home') }}" target="_blank" style="padding: 0.55rem 1rem; border-radius: 0.625rem; border-color: #cbd5e1;">
            <i class="material-symbols-rounded text-sm me-2">public</i>
            <span>Lihat Website</span>
        </a>
        <form action="{{ route('logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="btn btn-sm w-100 mb-0 d-flex align-items-center justify-content-center text-white text-xs font-weight-bold" style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); border: none; padding: 0.55rem 1rem; border-radius: 0.625rem; box-shadow: 0 4px 12px rgba(220, 38, 38, 0.25);">
                <i class="material-symbols-rounded text-sm me-2">logout</i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>
