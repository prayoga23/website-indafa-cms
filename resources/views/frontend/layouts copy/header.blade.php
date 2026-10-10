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

                    {{-- FAKULTAS --}}
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle"
                           href="#"
                           data-bs-toggle="dropdown">

                            Fakultas

                        </a>

                        <ul class="dropdown-menu">

                            @foreach($facultiesMenu as $faculty)

                                <li>
                                    <a class="dropdown-item"
                                       href="{{ route('faculties.show',$faculty->slug) }}">
                                        {{ $faculty->name }}
                                    </a>
                                </li>

                            @endforeach

                        </ul>

                    </li>

                    {{-- PRODI --}}
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle"
                           href="#"
                           data-bs-toggle="dropdown">

                            Program Studi

                        </a>

                        <ul class="dropdown-menu">

                            @foreach($programsMenu as $program)

                                <li>
                                    <a class="dropdown-item"
                                       href="{{ route('programs.show',$program->slug) }}">
                                        {{ $program->name }}
                                    </a>
                                </li>

                            @endforeach

                        </ul>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('news.index') }}">
                            Berita
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('announcements.index') }}">
                            Pengumuman
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('gallery.index') }}">
                            Galeri
                        </a>
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
