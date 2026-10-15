<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2 bg-white my-2 shadow-sm" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand px-4 py-3 m-0 d-flex align-items-center" href="{{ route('admin.dashboard') }}">
            @if(isset($setting) && $setting->logo)
                <img src="{{ asset('storage/'.$setting->logo) }}" class="navbar-brand-img" style="max-height: 32px; width: auto;" alt="Logo">
            @else
                <img src="{{ asset('template-dashboard/assets/img/logo-ct-dark.png') }}" class="navbar-brand-img" width="26" height="26" alt="Logo">
            @endif
            <div class="d-flex flex-column ms-2">
                <span class="font-weight-bold text-sm text-dark line-height-1">IAI DARUL FALAH</span>
                <span class="text-xxs text-secondary text-uppercase font-weight-bolder">Admin Panel</span>
            </div>
        </a>
    </div>

    <hr class="horizontal dark mt-0 mb-2">

    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main" style="height: calc(100vh - 210px);">
        <ul class="navbar-nav">

            {{-- DASHBOARD --}}
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : 'text-dark' }}" href="{{ route('admin.dashboard') }}">
                    <i class="material-symbols-rounded opacity-5">dashboard</i>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            {{-- MASTER DATA --}}
            <li class="nav-header">Master Data</li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.faculties.*') ? 'active' : 'text-dark' }}" href="{{ route('admin.faculties.index') }}">
                    <i class="material-symbols-rounded opacity-5">account_balance</i>
                    <span class="nav-link-text ms-1">Fakultas</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.study-programs.*') ? 'active' : 'text-dark' }}" href="{{ route('admin.study-programs.index') }}">
                    <i class="material-symbols-rounded opacity-5">school</i>
                    <span class="nav-link-text ms-1">Program Studi</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.pages.*') ? 'active' : 'text-dark' }}" href="{{ route('admin.pages.index') }}">
                    <i class="material-symbols-rounded opacity-5">description</i>
                    <span class="nav-link-text ms-1">Halaman (Pages)</span>
                </a>
            </li>

            {{-- KONTEN & INFORMASI --}}
            <li class="nav-header">Konten & Web</li>

            {{-- BERANDA COLLAPSE --}}
            @php
                $berandaActive = request()->routeIs('admin.sambutan.*', 'admin.news.*', 'admin.agenda.*', 'admin.statistic.*', 'admin.homepage-settings.*') || request()->is('admin/pages/edit-by-slug/prestasi');
            @endphp
            <li class="nav-item">
                <a class="nav-link text-dark d-flex align-items-center justify-content-between"
                   data-bs-toggle="collapse"
                   href="#collapseBeranda"
                   role="button"
                   aria-expanded="{{ $berandaActive ? 'true' : 'false' }}"
                   aria-controls="collapseBeranda">
                    <div class="d-flex align-items-center">
                        <i class="material-symbols-rounded opacity-5">home</i>
                        <span class="nav-link-text ms-1">Beranda</span>
                    </div>
                    <i class="material-symbols-rounded sidenav-arrow">keyboard_arrow_down</i>
                </a>
                <div class="collapse {{ $berandaActive ? 'show' : '' }}" id="collapseBeranda">
                    <ul class="nav ms-4 ps-2 border-start">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.sambutan.*') ? 'active-sub' : '' }}" href="{{ route('admin.sambutan.index') }}">
                                <span class="sidenav-normal">Sambutan Rektor</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.news.*') ? 'active-sub' : '' }}" href="{{ route('admin.news.index') }}">
                                <span class="sidenav-normal">Berita</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.agenda.*') ? 'active-sub' : '' }}" href="{{ route('admin.agenda.index') }}">
                                <span class="sidenav-normal">Agenda</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.statistic.*') ? 'active-sub' : '' }}" href="{{ route('admin.statistic.index') }}">
                                <span class="sidenav-normal">Statistik Kampus</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/pages/edit-by-slug/prestasi') ? 'active-sub' : '' }}" href="{{ route('admin.pages.edit-by-slug', 'prestasi') }}">
                                <span class="sidenav-normal">Prestasi Mahasiswa</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.homepage-settings.*') ? 'active-sub' : '' }}" href="{{ route('admin.homepage-settings.index') }}">
                                <span class="sidenav-normal">Pengaturan Beranda</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- PROFIL KAMPUS COLLAPSE --}}
            @php
                $profilActive = request()->routeIs('admin.history.*', 'admin.vision.*', 'admin.structure.*', 'admin.lecturers.*') || request()->is('admin/pages/edit-by-slug/filosofi-logo');
            @endphp
            <li class="nav-item">
                <a class="nav-link text-dark d-flex align-items-center justify-content-between"
                   data-bs-toggle="collapse"
                   href="#collapseProfil"
                   role="button"
                   aria-expanded="{{ $profilActive ? 'true' : 'false' }}"
                   aria-controls="collapseProfil">
                    <div class="d-flex align-items-center">
                        <i class="material-symbols-rounded opacity-5">corporate_fare</i>
                        <span class="nav-link-text ms-1">Profil Kampus</span>
                    </div>
                    <i class="material-symbols-rounded sidenav-arrow">keyboard_arrow_down</i>
                </a>
                <div class="collapse {{ $profilActive ? 'show' : '' }}" id="collapseProfil">
                    <ul class="nav ms-4 ps-2 border-start">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.history.*') ? 'active-sub' : '' }}" href="{{ route('admin.history.index') }}">
                                <span class="sidenav-normal">Sejarah</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.vision.*') ? 'active-sub' : '' }}" href="{{ route('admin.vision.index') }}">
                                <span class="sidenav-normal">Visi & Misi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.structure.*') ? 'active-sub' : '' }}" href="{{ route('admin.structure.index') }}">
                                <span class="sidenav-normal">Struktur Organisasi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.lecturers.*') ? 'active-sub' : '' }}" href="{{ route('admin.lecturers.index') }}">
                                <span class="sidenav-normal">Profil Dosen</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/pages/edit-by-slug/filosofi-logo') ? 'active-sub' : '' }}" href="{{ route('admin.pages.edit-by-slug', 'filosofi-logo') }}">
                                <span class="sidenav-normal">Filosofi Logo</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- LEMBAGA & UNIT COLLAPSE --}}
            @php
                $lembagaActive = request()->is('admin/pages/edit-by-slug/lpm') || request()->is('admin/pages/edit-by-slug/lp2m') || request()->is('admin/pages/edit-by-slug/ormawa');
            @endphp
            <li class="nav-item">
                <a class="nav-link text-dark d-flex align-items-center justify-content-between"
                   data-bs-toggle="collapse"
                   href="#collapseLembaga"
                   role="button"
                   aria-expanded="{{ $lembagaActive ? 'true' : 'false' }}"
                   aria-controls="collapseLembaga">
                    <div class="d-flex align-items-center">
                        <i class="material-symbols-rounded opacity-5">domain</i>
                        <span class="nav-link-text ms-1">Lembaga & Unit</span>
                    </div>
                    <i class="material-symbols-rounded sidenav-arrow">keyboard_arrow_down</i>
                </a>
                <div class="collapse {{ $lembagaActive ? 'show' : '' }}" id="collapseLembaga">
                    <ul class="nav ms-4 ps-2 border-start">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/pages/edit-by-slug/lpm') ? 'active-sub' : '' }}" href="{{ route('admin.pages.edit-by-slug', 'lpm') }}">
                                <span class="sidenav-normal">LPM</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/pages/edit-by-slug/lp2m') ? 'active-sub' : '' }}" href="{{ route('admin.pages.edit-by-slug', 'lp2m') }}">
                                <span class="sidenav-normal">LP2M</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/pages/edit-by-slug/ormawa') ? 'active-sub' : '' }}" href="{{ route('admin.pages.edit-by-slug', 'ormawa') }}">
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
                <a class="nav-link text-dark d-flex align-items-center justify-content-between"
                   data-bs-toggle="collapse"
                   href="#collapseAkademik"
                   role="button"
                   aria-expanded="{{ $akademikActive ? 'true' : 'false' }}"
                   aria-controls="collapseAkademik">
                    <div class="d-flex align-items-center">
                        <i class="material-symbols-rounded opacity-5">menu_book</i>
                        <span class="nav-link-text ms-1">Akademik</span>
                    </div>
                    <i class="material-symbols-rounded sidenav-arrow">keyboard_arrow_down</i>
                </a>
                <div class="collapse {{ $akademikActive ? 'show' : '' }}" id="collapseAkademik">
                    <ul class="nav ms-4 ps-2 border-start">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.curriculum.*') ? 'active-sub' : '' }}" href="{{ route('admin.curriculum.index') }}">
                                <span class="sidenav-normal">Kurikulum</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.cpl.*') ? 'active-sub' : '' }}" href="{{ route('admin.cpl.index') }}">
                                <span class="sidenav-normal">CPL</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.calendar.*') ? 'active-sub' : '' }}" href="{{ route('admin.calendar.index') }}">
                                <span class="sidenav-normal">Kalender Akademik</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.guide.*') ? 'active-sub' : '' }}" href="{{ route('admin.guide.index') }}">
                                <span class="sidenav-normal">Panduan Akademik</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.schedule.*') ? 'active-sub' : '' }}" href="{{ route('admin.schedule.index') }}">
                                <span class="sidenav-normal">Jadwal Kuliah</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/pages/edit-by-slug/pmb') ? 'active-sub' : '' }}" href="{{ route('admin.pages.edit-by-slug', 'pmb') }}">
                                <span class="sidenav-normal">Pendaftaran PMB</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/pages/edit-by-slug/penelitian') ? 'active-sub' : '' }}" href="{{ route('admin.pages.edit-by-slug', 'penelitian') }}">
                                <span class="sidenav-normal">Penelitian & Pengabdian</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin/pages/edit-by-slug/gallery-indafa') ? 'active-sub' : '' }}" href="{{ route('admin.pages.edit-by-slug', 'gallery-indafa') }}">
                                <span class="sidenav-normal">Gallery INDAFA</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- PENGUMUMAN --}}
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.announcements.*') ? 'active' : 'text-dark' }}" href="{{ route('admin.announcements.index') }}">
                    <i class="material-symbols-rounded opacity-5">campaign</i>
                    <span class="nav-link-text ms-1">Pengumuman</span>
                </a>
            </li>

            {{-- GALERI COLLAPSE --}}
            @php
                $galeriActive = request()->routeIs('admin.photo.*', 'admin.video.*');
            @endphp
            <li class="nav-item">
                <a class="nav-link text-dark d-flex align-items-center justify-content-between"
                   data-bs-toggle="collapse"
                   href="#collapseGaleri"
                   role="button"
                   aria-expanded="{{ $galeriActive ? 'true' : 'false' }}"
                   aria-controls="collapseGaleri">
                    <div class="d-flex align-items-center">
                        <i class="material-symbols-rounded opacity-5">photo_library</i>
                        <span class="nav-link-text ms-1">Galeri</span>
                    </div>
                    <i class="material-symbols-rounded sidenav-arrow">keyboard_arrow_down</i>
                </a>
                <div class="collapse {{ $galeriActive ? 'show' : '' }}" id="collapseGaleri">
                    <ul class="nav ms-4 ps-2 border-start">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.photo.*') ? 'active-sub' : '' }}" href="{{ route('admin.photo.index') }}">
                                <span class="sidenav-normal">Galeri Foto</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.video.*') ? 'active-sub' : '' }}" href="{{ route('admin.video.index') }}">
                                <span class="sidenav-normal">Galeri Video</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- BANNER HOMEPAGE --}}
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.banners.*') ? 'active' : 'text-dark' }}" href="{{ route('admin.banners.index') }}">
                    <i class="material-symbols-rounded opacity-5">view_carousel</i>
                    <span class="nav-link-text ms-1">Banner Homepage</span>
                </a>
            </li>

            {{-- DOKUMEN --}}
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.document.*') ? 'active' : 'text-dark' }}" href="{{ route('admin.document.index') }}">
                    <i class="material-symbols-rounded opacity-5">folder_open</i>
                    <span class="nav-link-text ms-1">Dokumen</span>
                </a>
            </li>

            {{-- WEBSITE SETTING --}}
            <li class="nav-header">Pengaturan</li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.website-settings.*') ? 'active' : 'text-dark' }}" href="{{ route('admin.website-settings.index') }}">
                    <i class="material-symbols-rounded opacity-5">settings</i>
                    <span class="nav-link-text ms-1">Website Setting</span>
                </a>
            </li>

        </ul>
    </div>

    {{-- SIDENAV FOOTER --}}
    <div class="sidenav-footer position-absolute w-100 bottom-0 p-3">
        <a class="btn btn-outline-dark btn-sm w-100 mb-2 d-flex align-items-center justify-content-center shadow-none" href="{{ route('home') }}" target="_blank">
            <i class="material-symbols-rounded text-sm me-1">public</i>
            <span>Lihat Website</span>
        </a>
        <form action="{{ route('logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit" class="btn bg-gradient-danger btn-sm w-100 mb-0 d-flex align-items-center justify-content-center">
                <i class="material-symbols-rounded text-sm me-1">logout</i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>
