<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">
            IAI DAFA
        </span>
    </a>

    <div class="sidebar">

        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                       class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header">MASTER DATA</li>

                <li class="nav-item">
                    <a href="{{ route('admin.faculties.index') }}"
                       class="nav-link {{ request()->routeIs('admin.faculties.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-university"></i>
                        <p>Fakultas</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.study-programs.index') }}"
                       class="nav-link {{ request()->routeIs('admin.study-programs.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p>Program Studi</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.pages.index') }}"
                       class="nav-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Halaman (Pages)</p>
                    </a>
                </li>

                <li class="nav-header">KONTEN</li>

                <li class="nav-item has-treeview {{ request()->routeIs('admin.sambutan.*', 'admin.news.*', 'admin.agenda.*', 'admin.statistic.*') || request()->is('admin/pages/edit-by-slug/prestasi') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.sambutan.*', 'admin.news.*', 'admin.agenda.*', 'admin.statistic.*') || request()->is('admin/pages/edit-by-slug/prestasi') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Beranda
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.sambutan.index') }}" class="nav-link {{ request()->routeIs('admin.sambutan.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sambutan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.news.index') }}" class="nav-link {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Berita</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.agenda.index') }}" class="nav-link {{ request()->routeIs('admin.agenda.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Agenda</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.statistic.index') }}" class="nav-link {{ request()->routeIs('admin.statistic.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Statistik</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pages.edit-by-slug', 'prestasi') }}" class="nav-link {{ request()->is('admin/pages/edit-by-slug/prestasi') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Prestasi Mahasiswa</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview {{ request()->routeIs('admin.history.*', 'admin.vision.*', 'admin.structure.*', 'admin.lecturers.*') || request()->is('admin/pages/edit-by-slug/filosofi-logo') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.history.*', 'admin.vision.*', 'admin.structure.*', 'admin.lecturers.*') || request()->is('admin/pages/edit-by-slug/filosofi-logo') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>
                            Profil
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.history.index') }}" class="nav-link {{ request()->routeIs('admin.history.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sejarah Prodi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.vision.index') }}" class="nav-link {{ request()->routeIs('admin.vision.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Visi-misi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.structure.index') }}" class="nav-link {{ request()->routeIs('admin.structure.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Struktur Organisasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.lecturers.index') }}" class="nav-link {{ request()->routeIs('admin.lecturers.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profil Dosen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pages.edit-by-slug', 'filosofi-logo') }}" class="nav-link {{ request()->is('admin/pages/edit-by-slug/filosofi-logo') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Filosofi Logo</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview {{ request()->is('admin/pages/edit-by-slug/lpm') || request()->is('admin/pages/edit-by-slug/lp2m') || request()->is('admin/pages/edit-by-slug/ormawa') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('admin/pages/edit-by-slug/lpm') || request()->is('admin/pages/edit-by-slug/lp2m') || request()->is('admin/pages/edit-by-slug/ormawa') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>
                            Unit & Lembaga
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.pages.edit-by-slug', 'lpm') }}" class="nav-link {{ request()->is('admin/pages/edit-by-slug/lpm') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>LPM</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pages.edit-by-slug', 'lp2m') }}" class="nav-link {{ request()->is('admin/pages/edit-by-slug/lp2m') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>LP2M</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pages.edit-by-slug', 'ormawa') }}" class="nav-link {{ request()->is('admin/pages/edit-by-slug/ormawa') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ORMAWA</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview {{ request()->routeIs('admin.curriculum.*', 'admin.cpl.*', 'admin.calendar.*', 'admin.guide.*', 'admin.schedule.*') || request()->is('admin/pages/edit-by-slug/pmb') || request()->is('admin/pages/edit-by-slug/penelitian') || request()->is('admin/pages/edit-by-slug/gallery-indafa') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.curriculum.*', 'admin.cpl.*', 'admin.calendar.*', 'admin.guide.*', 'admin.schedule.*') || request()->is('admin/pages/edit-by-slug/pmb') || request()->is('admin/pages/edit-by-slug/penelitian') || request()->is('admin/pages/edit-by-slug/gallery-indafa') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book-reader"></i>
                        <p>
                            Akademik
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.curriculum.index') }}" class="nav-link {{ request()->routeIs('admin.curriculum.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kurikulum</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.cpl.index') }}" class="nav-link {{ request()->routeIs('admin.cpl.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>CPL</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.calendar.index') }}" class="nav-link {{ request()->routeIs('admin.calendar.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kalender Akademik</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.guide.index') }}" class="nav-link {{ request()->routeIs('admin.guide.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Panduan Akademik</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.schedule.index') }}" class="nav-link {{ request()->routeIs('admin.schedule.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jadwal Kuliah</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pages.edit-by-slug', 'pmb') }}" class="nav-link {{ request()->is('admin/pages/edit-by-slug/pmb') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pendaftaran PMB</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pages.edit-by-slug', 'penelitian') }}" class="nav-link {{ request()->is('admin/pages/edit-by-slug/penelitian') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penelitian & Pengabdian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pages.edit-by-slug', 'gallery-indafa') }}" class="nav-link {{ request()->is('admin/pages/edit-by-slug/gallery-indafa') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gallery INDAFA</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.announcements.index') }}"
                       class="nav-link {{ request()->routeIs('admin.announcements.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>Pengumuman</p>
                    </a>
                </li>

                <li class="nav-item has-treeview {{ request()->routeIs('admin.photo.*', 'admin.video.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.photo.*', 'admin.video.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                            Galery
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.photo.index') }}" class="nav-link {{ request()->routeIs('admin.photo.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Foto</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.video.index') }}" class="nav-link {{ request()->routeIs('admin.video.*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Video</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.banners.index') }}"
                       class="nav-link {{ request()->routeIs('admin.banners.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-image"></i>
                        <p>Banner Homepage</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.document.index') }}"
                       class="nav-link {{ request()->routeIs('admin.document.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>Dokumen</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.website-settings.index') }}"
                       class="nav-link {{ request()->routeIs('admin.website-settings.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Website Setting</p>
                    </a>
                </li>

            </ul>

        </nav>

    </div>

</aside>
