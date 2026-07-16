@extends('frontend.layouts.app')

@section('title', $setting->site_name ?? 'Website Kampus')

@section('content')

{{-- ═══════════════════════════════════════════════
     HERO BANNER (dari database)
════════════════════════════════════════════════ --}}
<div class="container-fluid carousel-header px-0">
    @if(isset($banners) && $banners->count())
    <div id="carouselId"
         class="carousel slide carousel-fade h-100"
         data-bs-ride="carousel"
         data-bs-interval="6000">

        <div class="carousel-indicators">
            @foreach($banners as $banner)
            <button type="button"
                    data-bs-target="#carouselId"
                    data-bs-slide-to="{{ $loop->index }}"
                    class="{{ $loop->first ? 'active' : '' }}"
                    aria-current="{{ $loop->first ? 'true' : 'false' }}"
                    aria-label="Slide {{ $loop->index + 1 }}">
            </button>
            @endforeach
        </div>

        <div class="carousel-inner h-100" role="listbox">
            @foreach($banners as $banner)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img src="{{ asset('storage/'.$banner->image) }}"
                     alt="{{ $banner->title }}"
                     loading="{{ $loop->first ? 'eager' : 'lazy' }}">
                <div class="carousel-caption">
                    <div class="px-2">
                        @if($banner->subtitle)
                            <h5 class="text-white fw-semibold">{{ $banner->subtitle }}</h5>
                        @endif
                        <h1 class="text-white">{{ $banner->title }}</h1>
                        @if($banner->description)
                            <p class="text-white">{{ $banner->description }}</p>
                        @endif
                        @if($banner->button_link)
                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                            <a class="btn btn-gold rounded-pill shadow-sm px-4"
                               href="{{ $banner->button_link }}">
                                {{ $banner->button_text ?? 'Daftar Sekarang' }}
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button"
                data-bs-target="#carouselId" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Sebelumnya</span>
        </button>
        <button class="carousel-control-next" type="button"
                data-bs-target="#carouselId" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Berikutnya</span>
        </button>
    </div>
    @endif
</div>


{{-- ═══════════════════════════════════════════════
     1. SAMBUTAN KETUA PRODI (Dinamis - WelcomeMessage)
════════════════════════════════════════════════ --}}
@if(isset($sambutan))
<section class="sambutan-section">
    <div class="container">
        <div class="row align-items-center g-5">

            {{-- Foto --}}
            <div class="col-lg-5 col-10 col-sm-8 col-md-6 mx-auto mx-md-0 reveal-left">
                <div class="sambutan-img-wrap text-center">
                    <img src="{{ $sambutan->kaprodi_image ? asset('storage/' . $sambutan->kaprodi_image) : 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=480&h=460&fit=crop' }}"
                         alt="{{ $sambutan->kaprodi_name }}"
                         loading="lazy">
                    <div class="sambutan-name-card">
                        <p class="mb-0 fw-bold" style="font-size:.95rem;color:var(--color-primary);">
                            {{ $sambutan->kaprodi_name }}
                        </p>
                        <p class="mb-0" style="font-size:.78rem;color:#868e96;">
                            {{ $sambutan->kaprodi_title }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Teks --}}
            <div class="col-lg-7 col-12 reveal-right">
                <span class="section-eyebrow">Sambutan</span>
                <h2 class="section-title">Quotes</h2>
                <div class="section-divider mt-3 mb-4"></div>

                @if($sambutan->quote)
                <blockquote class="sambutan-quote-block">
                    "{{ $sambutan->quote }}"
                </blockquote>
                @endif

                @if($sambutan->welcome_text_1)
                <p style="color:#4a5568;line-height:1.85;font-size:.93rem;margin-bottom:1rem;">
                    {{ $sambutan->welcome_text_1 }}
                </p>
                @endif

                @if($sambutan->welcome_text_2)
                <p style="color:#4a5568;line-height:1.85;font-size:.93rem;margin-bottom:1.75rem;">
                    {{ $sambutan->welcome_text_2 }}
                </p>
                @endif

                <div class="d-flex gap-3 flex-wrap">
                    @if($sambutan->profile_link)
                    <a href="{{ $sambutan->profile_link }}" class="btn btn-brand rounded-pill px-4">
                        Profil Lengkap &nbsp;<i class="bi bi-arrow-right"></i>
                    </a>
                    @endif

                    @if($sambutan->contact_link)
                    <a href="{{ $sambutan->contact_link }}" class="btn btn-outline-brand rounded-pill px-4">
                        Hubungi Kami
                    </a>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>
@endif


{{-- ═══════════════════════════════════════════════
     2. HIGHLIGHT BERITA TERBARU (Dinamis - News)
════════════════════════════════════════════════ --}}
<section class="berita-section">
    <div class="container">

        {{-- Header --}}
        <div class="d-flex align-items-end justify-content-between flex-wrap gap-3 mb-5">
            <div class="reveal">
                <span class="section-eyebrow">Informasi</span>
                <h2 class="section-title mb-1">Berita Terbaru</h2>
                <div class="section-divider mt-2"></div>
            </div>
            <a href="#" class="btn btn-outline-brand rounded-pill px-4 reveal">
                Semua Berita &nbsp;<i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-4">

            {{-- Featured News (Berita Utama) --}}
            @if(isset($featuredNews))
            <div class="col-lg-5 reveal reveal-delay-1">
                <div class="news-card h-100">
                    <div class="news-thumb news-thumb-featured">
                        <img src="{{ asset('storage/' . $featuredNews->thumbnail) }}"
                             alt="{{ $featuredNews->title }}" loading="lazy">
                        <span class="news-cat news-cat-primary">Terbaru</span>
                    </div>
                    <div class="news-body">
                        <div class="news-date">
                            <i class="bi bi-calendar3"></i> {{ $featuredNews->created_at->translatedFormat('d F Y') }}
                        </div>
                        <h3 class="news-title news-title-featured">
                            <a href="{{ url('berita/'.$featuredNews->slug) }}">
                                {{ $featuredNews->title }}
                            </a>
                        </h3>
                        <p class="news-excerpt">
                            {{ Str::limit(strip_tags($featuredNews->content), 180) }}
                        </p>
                        <a href="{{ url('berita/'.$featuredNews->slug) }}" class="news-readmore">
                            Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endif

            {{-- List Berita Kecil --}}
            <div class="{{ isset($featuredNews) ? 'col-lg-7' : 'col-lg-12' }}">
                <div class="row g-4">
                    @if(isset($news) && $news->count() > 0)
                        @foreach($news as $item)
                        <div class="col-sm-6 reveal reveal-delay-{{ $loop->iteration }}">
                            <div class="news-card h-100">
                                <div class="news-thumb news-thumb-small">
                                    <img src="{{ asset('storage/' . $item->thumbnail) }}"
                                         alt="{{ $item->title }}" loading="lazy">
                                    <span class="news-cat news-cat-gold">Berita</span>
                                </div>
                                <div class="news-body">
                                    <div class="news-date"><i class="bi bi-calendar3"></i> {{ $item->created_at->translatedFormat('d F Y') }}</div>
                                    <h3 class="news-title news-title-small">
                                        <a href="{{ url('berita/'.$item->slug) }}">{{ $item->title }}</a>
                                    </h3>
                                    <a href="{{ url('berita/'.$item->slug) }}" class="news-readmore mt-auto">Baca <i class="bi bi-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <p class="text-muted text-center">Belum ada berita terbaru.</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════
     3. AGENDA TERDEKAT (Dinamis - Agenda)
════════════════════════════════════════════════ --}}
<section class="agenda-section">
    <div class="container">

        <div class="d-flex align-items-end justify-content-between flex-wrap gap-3 mb-5">
            <div class="reveal">
                <span class="section-eyebrow">Jadwal</span>
                <h2 class="section-title mb-1">Agenda Terdekat</h2>
                <div class="section-divider mt-2"></div>
            </div>
            <a href="#" class="btn btn-outline-brand rounded-pill px-4 reveal">
                Semua Agenda &nbsp;<i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-4">
            @if(isset($agendas) && $agendas->count() > 0)
                @foreach($agendas as $agenda)
                @php
                    $date = \Carbon\Carbon::parse($agenda->event_date);
                    // Format jam: jika end_time kosong, tampilkan start_time saja
                    $timeFormat = $agenda->start_time;
                    if($agenda->end_time) {
                        $timeFormat .= ' - ' . $agenda->end_time;
                    }
                @endphp
                <div class="col-md-6 col-lg-4 reveal reveal-delay-{{ $loop->iteration }}">
                    <div class="agenda-card">
                        <div class="agenda-date-box">
                            <span class="day">{{ $date->format('d') }}</span>
                            <span class="month">{{ $date->translatedFormat('M') }}</span>
                        </div>
                        <div class="agenda-content">
                            <p class="agenda-title">{{ $agenda->title }}</p>
                            <div class="agenda-meta">
                                <span><i class="bi bi-clock me-1"></i>{{ $timeFormat }}</span>
                                <span><i class="bi bi-geo-alt me-1"></i>{{ $agenda->location }}</span>
                            </div>
                            @if($agenda->tag)
                                <span class="agenda-tag tag-seminar">{{ $agenda->tag }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12">
                    <p class="text-muted text-center">Tidak ada agenda terdekat.</p>
                </div>
            @endif
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════
     4. STATISTIK SINGKAT (Dinamis - CampusStatistic)
════════════════════════════════════════════════ --}}
<section class="stats-section">
    <div class="container">

        <div class="text-center mb-5 reveal">
            <span class="section-eyebrow" style="color:var(--color-accent-light);">Angka Bicara</span>
            <h2 class="section-title" style="color:#fff;">Kampus Kami dalam Angka</h2>
            <div class="section-divider mx-auto mt-3"></div>
        </div>

        <div class="row justify-content-center align-items-stretch g-0">

            <div class="col-6 col-md-4 col-lg-2 reveal reveal-delay-1">
                <div class="stat-item">
                    <div class="stat-icon-wrap"><i class="bi bi-people-fill"></i></div>
                    <span class="stat-number" data-count="{{ $stats->students_count ?? 0 }}">0<span class="stat-suffix">+</span></span>
                    <p class="stat-label">Mahasiswa Aktif</p>
                </div>
            </div>

            <div class="col-auto d-none d-lg-flex align-items-center stat-sep reveal"></div>

            <div class="col-6 col-md-4 col-lg-2 reveal reveal-delay-2">
                <div class="stat-item">
                    <div class="stat-icon-wrap"><i class="bi bi-person-badge-fill"></i></div>
                    <span class="stat-number" data-count="{{ $stats->lecturers_count ?? 0 }}">0</span>
                    <p class="stat-label">Dosen Pengampu</p>
                </div>
            </div>

            <div class="col-auto d-none d-lg-flex align-items-center stat-sep reveal"></div>

            <div class="col-6 col-md-4 col-lg-2 reveal reveal-delay-3">
                <div class="stat-item">
                    <div class="stat-icon-wrap"><i class="bi bi-mortarboard-fill"></i></div>
                    <span class="stat-number" data-count="{{ $stats->alumni_count ?? 0 }}">0<span class="stat-suffix">+</span></span>
                    <p class="stat-label">Alumni Lulus</p>
                </div>
            </div>

            <div class="col-auto d-none d-lg-flex align-items-center stat-sep reveal"></div>

            <div class="col-6 col-md-4 col-lg-2 reveal reveal-delay-4">
                <div class="stat-item">
                    <div class="stat-icon-wrap"><i class="bi bi-journal-richtext"></i></div>
                    <span class="stat-number" data-count="{{ $stats->programs_count ?? 0 }}">0<span class="stat-suffix">+</span></span>
                    <p class="stat-label">Program Studi</p> {{-- Diubah dari publikasi menjadi Program Studi sesuai isi model --}}
                </div>
            </div>

            <div class="col-auto d-none d-lg-flex align-items-center stat-sep reveal"></div>



        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════
     5. FAKULTAS
════════════════════════════════════════════════ --}}
<section class="fakultas-section">
    <div class="container">

        <div class="text-center mb-5 reveal">
            <span class="section-eyebrow">Akademik</span>
            <h2 class="section-title mb-1">Fakultas</h2>
            <div class="section-divider mx-auto mt-3"></div>
            <p class="section-lead mt-3 mx-auto" style="max-width:600px;">
                INDAFA memiliki beberapa fakultas yang siap membentuk generasi unggul berlandaskan nilai-nilai keislaman.
            </p>
        </div>

        <div class="row g-4 justify-content-center">

            {{-- Card Fakultas 1 --}}
            <div class="col-md-6 col-lg-4 reveal reveal-delay-1">
                <div class="fakultas-card">
                    <div class="fakultas-card-img">
                        <img src="{{ asset('assets/img/carousel-1.jpg') }}"
                             alt="Fakultas Syariah" loading="lazy">
                        <div class="fakultas-overlay"></div>
                        <span class="fakultas-prodi-count">
                            <i class="bi bi-book"></i> 2 Program Studi
                        </span>
                    </div>
                    <div class="fakultas-card-body">
                        <h3>Fakultas Syariah</h3>
                        <p>Fakultas yang menyelenggarakan pendidikan di bidang hukum Islam dengan fokus pada Hukum Keluarga Islam dan Hukum Ekonomi Syariah untuk mencetak lulusan berkompeten.</p>
                        <a href="#" class="fakultas-link">
                            Lihat Detail <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Card Fakultas 2 --}}
            <div class="col-md-6 col-lg-4 reveal reveal-delay-2">
                <div class="fakultas-card">
                    <div class="fakultas-card-img">
                        <img src="{{ asset('assets/img/carousel-2.jpg') }}"
                             alt="Fakultas Ekonomi Bisnis Islam & Tarbiyah" loading="lazy">
                        <div class="fakultas-overlay"></div>
                        <span class="fakultas-prodi-count">
                            <i class="bi bi-book"></i> 2 Program Studi
                        </span>
                    </div>
                    <div class="fakultas-card-body">
                        <h3>Fakultas Ekonomi Bisnis Islam & Tarbiyah</h3>
                        <p>Fakultas yang mengembangkan keilmuan ekonomi syariah dan pendidikan Islam, mencetak pendidik serta ekonom muda yang berlandaskan nilai-nilai keislaman.</p>
                        <a href="#" class="fakultas-link">
                            Lihat Detail <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════
     6. PROGRAM STUDI
════════════════════════════════════════════════ --}}
<section class="prodi-section">
    <div class="container">

        <div class="text-center mb-5 reveal">
            <span class="section-eyebrow">Pilihan Jurusan</span>
            <h2 class="section-title mb-1">Program Studi</h2>
            <div class="section-divider mx-auto mt-3"></div>
            <p class="section-lead mt-3 mx-auto" style="max-width:600px;">
                Temukan program studi yang sesuai dengan minat dan bakat Anda untuk membangun karier masa depan.
            </p>
        </div>

        <div class="row g-4 justify-content-center">

            {{-- Prodi 1 --}}
            <a href="{{ route('frontend.prodi.index', 'hki') }}" class="col-6 col-md-4 col-lg-3 reveal reveal-delay-1 text-decoration-none text-dark">
                <div class="prodi-card">
                    <div class="prodi-icon">
                        <i class="bi bi-bank"></i>
                    </div>
                    <span class="prodi-jenjang">Strata 1 (S1)</span>
                    <h4>Hukum Keluarga Islam</h4>
                    <p class="prodi-fakultas">Fakultas Syariah</p>
                    <span class="prodi-akreditasi">
                        <i class="bi bi-patch-check-fill"></i> Terakreditasi
                    </span>
                </div>
            </a>

            {{-- Prodi 2 --}}
            <a href="{{ route('frontend.prodi.index', 'hes') }}" class="col-6 col-md-4 col-lg-3 reveal reveal-delay-2 text-decoration-none text-dark">
                <div class="prodi-card">
                    <div class="prodi-icon">
                        <i class="bi bi-currency-exchange"></i>
                    </div>
                    <span class="prodi-jenjang">Strata 1 (S1)</span>
                    <h4>Hukum Ekonomi Syariah</h4>
                    <p class="prodi-fakultas">Fakultas Syariah</p>
                    <span class="prodi-akreditasi">
                        <i class="bi bi-patch-check-fill"></i> Terakreditasi
                    </span>
                </div>
            </a>

            {{-- Prodi 3 --}}
            <a href="{{ route('frontend.prodi.index', 'ekos') }}" class="col-6 col-md-4 col-lg-3 reveal reveal-delay-3 text-decoration-none text-dark">
                <div class="prodi-card">
                    <div class="prodi-icon">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>
                    <span class="prodi-jenjang">Strata 1 (S1)</span>
                    <h4>Ekonomi Syariah</h4>
                    <p class="prodi-fakultas">Fakultas Ekonomi Bisnis Islam & Tarbiyah</p>
                    <span class="prodi-akreditasi">
                        <i class="bi bi-patch-check-fill"></i> Terakreditasi
                    </span>
                </div>
            </a>

            {{-- Prodi 4 --}}
            <a href="{{ route('frontend.prodi.index', 'pai') }}" class="col-6 col-md-4 col-lg-3 reveal reveal-delay-4 text-decoration-none text-dark">
                <div class="prodi-card">
                    <div class="prodi-icon">
                        <i class="bi bi-mortarboard"></i>
                    </div>
                    <span class="prodi-jenjang">Strata 1 (S1)</span>
                    <h4>Pendidikan Agama Islam</h4>
                    <p class="prodi-fakultas">Fakultas Ekonomi Bisnis Islam & Tarbiyah</p>
                    <span class="prodi-akreditasi">
                        <i class="bi bi-patch-check-fill"></i> Terakreditasi
                    </span>
                </div>
            </a>

        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════
     7. PENGUMUMAN
════════════════════════════════════════════════ --}}
<section class="pengumuman-section">
    <div class="container">

        <div class="d-flex align-items-end justify-content-between flex-wrap gap-3 mb-5">
            <div class="reveal">
                <span class="section-eyebrow">Informasi</span>
                <h2 class="section-title mb-1">Pengumuman</h2>
                <div class="section-divider mt-2"></div>
            </div>
            <a href="#" class="btn btn-outline-brand rounded-pill px-4 reveal">
                Semua Pengumuman &nbsp;<i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-4">

            {{-- Pengumuman 1 --}}
            <div class="col-md-6 reveal reveal-delay-1">
                <a href="#" class="pengumuman-card">
                    <div class="pengumuman-icon-box">
                        <i class="bi bi-megaphone"></i>
                    </div>
                    <div class="pengumuman-content">
                        <p class="pengumuman-title">Jadwal Ujian Akhir Semester Genap Tahun Akademik 2025/2026</p>
                        <div class="pengumuman-meta">
                            <span><i class="bi bi-calendar3 me-1"></i>10 Juli 2026</span>
                            <span><i class="bi bi-building me-1"></i>Akademik</span>
                        </div>
                        <span class="pengumuman-badge pengumuman-badge-penting">Penting</span>
                    </div>
                </a>
            </div>

            {{-- Pengumuman 2 --}}
            <div class="col-md-6 reveal reveal-delay-2">
                <a href="#" class="pengumuman-card">
                    <div class="pengumuman-icon-box">
                        <i class="bi bi-megaphone"></i>
                    </div>
                    <div class="pengumuman-content">
                        <p class="pengumuman-title">Pendaftaran Mahasiswa Baru Gelombang II Tahun Akademik 2026/2027</p>
                        <div class="pengumuman-meta">
                            <span><i class="bi bi-calendar3 me-1"></i>05 Juli 2026</span>
                            <span><i class="bi bi-building me-1"></i>PMB</span>
                        </div>
                        <span class="pengumuman-badge">PMB</span>
                    </div>
                </a>
            </div>

            {{-- Pengumuman 3 --}}
            <div class="col-md-6 reveal reveal-delay-3">
                <a href="#" class="pengumuman-card">
                    <div class="pengumuman-icon-box">
                        <i class="bi bi-megaphone"></i>
                    </div>
                    <div class="pengumuman-content">
                        <p class="pengumuman-title">Pengumuman Hasil Seleksi Beasiswa Prestasi Akademik 2026</p>
                        <div class="pengumuman-meta">
                            <span><i class="bi bi-calendar3 me-1"></i>01 Juli 2026</span>
                            <span><i class="bi bi-building me-1"></i>Kemahasiswaan</span>
                        </div>
                        <span class="pengumuman-badge">Beasiswa</span>
                    </div>
                </a>
            </div>

            {{-- Pengumuman 4 --}}
            <div class="col-md-6 reveal reveal-delay-4">
                <a href="#" class="pengumuman-card">
                    <div class="pengumuman-icon-box">
                        <i class="bi bi-megaphone"></i>
                    </div>
                    <div class="pengumuman-content">
                        <p class="pengumuman-title">Jadwal Pelaksanaan KKN Semester Genap 2025/2026</p>
                        <div class="pengumuman-meta">
                            <span><i class="bi bi-calendar3 me-1"></i>25 Juni 2026</span>
                            <span><i class="bi bi-building me-1"></i>LP2M</span>
                        </div>
                        <span class="pengumuman-badge">Kegiatan</span>
                    </div>
                </a>
            </div>

        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════
     8. PRESTASI MAHASISWA
════════════════════════════════════════════════ --}}
<section class="prestasi-section">
    <div class="container">

        <div class="d-flex align-items-end justify-content-between flex-wrap gap-3 mb-5">
            <div class="reveal">
                <span class="section-eyebrow">Kebanggaan Kampus</span>
                <h2 class="section-title mb-1">Prestasi Mahasiswa</h2>
                <div class="section-divider mt-2"></div>
            </div>
            <a href="{{ route('akademik.prestasi') }}" class="btn btn-outline-brand rounded-pill px-4 reveal">
                Semua Prestasi &nbsp;<i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-4">

            {{-- Prestasi 1 --}}
            <div class="col-md-6 col-lg-4 reveal reveal-delay-1">
                <div class="prestasi-card">
                    <div class="prestasi-thumb">
                        <img src="{{ asset('assets/img/events-1.jpg') }}"
                             alt="Lomba Debat" loading="lazy">
                        <span class="prestasi-badge prestasi-badge-gold">
                            <i class="bi bi-trophy-fill"></i> Juara 1
                        </span>
                    </div>
                    <div class="prestasi-body">
                        <span class="prestasi-event">Kompetisi Nasional 2026</span>
                        <h3>Juara 1 Lomba Debat Hukum Islam se-Jawa Timur</h3>
                        <p class="prestasi-name">
                            <i class="bi bi-person-circle"></i> Ahmad Fauzi & Tim
                        </p>
                    </div>
                </div>
            </div>

            {{-- Prestasi 2 --}}
            <div class="col-md-6 col-lg-4 reveal reveal-delay-2">
                <div class="prestasi-card">
                    <div class="prestasi-thumb">
                        <img src="{{ asset('assets/img/events-2.jpg') }}"
                             alt="Paper Competition" loading="lazy">
                        <span class="prestasi-badge prestasi-badge-silver">
                            <i class="bi bi-trophy-fill"></i> Juara 2
                        </span>
                    </div>
                    <div class="prestasi-body">
                        <span class="prestasi-event">Islamic Paper Competition 2026</span>
                        <h3>Juara 2 Lomba Karya Tulis Ilmiah Nasional</h3>
                        <p class="prestasi-name">
                            <i class="bi bi-person-circle"></i> Siti Nurhaliza
                        </p>
                    </div>
                </div>
            </div>

            {{-- Prestasi 3 --}}
            <div class="col-md-6 col-lg-4 reveal reveal-delay-3">
                <div class="prestasi-card">
                    <div class="prestasi-thumb">
                        <img src="{{ asset('assets/img/events-3.jpg') }}"
                             alt="MTQ Nasional" loading="lazy">
                        <span class="prestasi-badge prestasi-badge-bronze">
                            <i class="bi bi-trophy-fill"></i> Juara 3
                        </span>
                    </div>
                    <div class="prestasi-body">
                        <span class="prestasi-event">MTQ Tingkat Nasional 2025</span>
                        <h3>Juara 3 Musabaqah Tilawatil Qur'an Tingkat Nasional</h3>
                        <p class="prestasi-name">
                            <i class="bi bi-person-circle"></i> Muhammad Rizki
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════
     9. GALERI
════════════════════════════════════════════════ --}}
<section class="gallery-section">
    <div class="container">

        <div class="d-flex align-items-end justify-content-between flex-wrap gap-3 mb-5">
            <div class="reveal">
                <span class="section-eyebrow">Dokumentasi</span>
                <h2 class="section-title mb-1">Galeri Kampus</h2>
                <div class="section-divider mt-2"></div>
            </div>
            <a href="{{ route('akademik.gallery-indafa') }}" class="btn btn-outline-brand rounded-pill px-4 reveal">
                Lihat Semua &nbsp;<i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="gallery-grid reveal">

            <div class="gallery-item gallery-tall">
                <img src="{{ asset('assets/img/gallery-1.jpg') }}"
                     alt="Gedung Kampus" loading="lazy">
                <div class="gallery-overlay">
                    <span class="gallery-label">Gedung Kampus INDAFA</span>
                    <span class="gallery-sub">Fasilitas Utama</span>
                </div>
            </div>

            <div class="gallery-item">
                <img src="{{ asset('assets/img/gallery-2.jpg') }}"
                     alt="Kegiatan Akademik" loading="lazy">
                <div class="gallery-overlay">
                    <span class="gallery-label">Kegiatan Akademik</span>
                    <span class="gallery-sub">Proses Belajar Mengajar</span>
                </div>
            </div>

            <div class="gallery-item">
                <img src="{{ asset('assets/img/gallery-3.jpg') }}"
                     alt="Wisuda" loading="lazy">
                <div class="gallery-overlay">
                    <span class="gallery-label">Wisuda</span>
                    <span class="gallery-sub">Prosesi Kelulusan</span>
                </div>
            </div>

            <div class="gallery-item">
                <img src="{{ asset('assets/img/gallery-4.jpg') }}"
                     alt="Kegiatan Mahasiswa" loading="lazy">
                <div class="gallery-overlay">
                    <span class="gallery-label">Kegiatan Mahasiswa</span>
                    <span class="gallery-sub">Organisasi & UKM</span>
                </div>
            </div>

            <div class="gallery-item">
                <img src="{{ asset('assets/img/gallery-5.jpg') }}"
                     alt="Seminar" loading="lazy">
                <div class="gallery-overlay">
                    <span class="gallery-label">Seminar Nasional</span>
                    <span class="gallery-sub">Event Kampus</span>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════
     10. CTA PMB (PENERIMAAN MAHASISWA BARU)
════════════════════════════════════════════════ --}}
<section class="cta-pmb-section">
    <div class="container">
        <div class="cta-pmb-content reveal">
            <span class="cta-pmb-eyebrow">Penerimaan Mahasiswa Baru</span>
            <h2>{!! nl2br(e($setting->cta_pmb_title ?? 'Bergabunglah Bersama Institut Agama Islam Darul Falah')) !!}</h2>
            <p>
                {{ $setting->cta_pmb_text ?? 'Wujudkan masa depan terbaik Anda. Daftarkan diri di INDAFA Bondowoso dan jadilah bagian dari generasi unggul yang berlandaskan ilmu dan iman.' }}
            </p>
            <div class="cta-pmb-buttons">
                <a href="{{ $setting->cta_pmb_link_register ?? '#' }}" class="btn-cta-gold">
                    <i class="bi bi-pencil-square"></i> Daftar Sekarang
                </a>
                <a href="{{ $setting->cta_pmb_link_info ?? '#' }}" class="btn-cta-outline">
                    <i class="bi bi-info-circle"></i> Informasi PMB
                </a>
            </div>
        </div>
    </div>
</section>


<script>
document.addEventListener("DOMContentLoaded", function () {

    /* ── Carousel ── */
    var carouselEl = document.querySelector('#carouselId');
    if (carouselEl && typeof bootstrap !== 'undefined') {
        new bootstrap.Carousel(carouselEl, {
            interval: 6000, ride: 'carousel', touch: true, pause: 'hover'
        });
    }

    /* ── Scroll Reveal ── */
    var revealEls = document.querySelectorAll('.reveal, .reveal-left, .reveal-right');

    /* Langsung tampilkan semua dulu sebagai fallback */
    function showAll() {
        revealEls.forEach(function(el) { el.classList.add('visible'); });
    }

    if (!('IntersectionObserver' in window)) {
        /* Browser lama: tampilkan semua langsung */
        showAll();
    } else {
        var revealObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.08, rootMargin: '0px 0px -20px 0px' });

        revealEls.forEach(function (el) { revealObserver.observe(el); });

        /* Safety net: paksa tampil semua setelah 2 detik jika belum muncul */
        setTimeout(function() {
            revealEls.forEach(function(el) {
                if (!el.classList.contains('visible')) {
                    el.classList.add('visible');
                }
            });
        }, 2000);
    }

    /* ── Counter Animasi ── */
    var counters = document.querySelectorAll('.stat-number[data-count]');
    if (counters.length && 'IntersectionObserver' in window) {
        var countObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                var el       = entry.target;
                var target   = parseInt(el.getAttribute('data-count'));
                var suffix   = el.querySelector('.stat-suffix') ? el.querySelector('.stat-suffix').outerHTML : '';
                var duration = 1800;
                var start    = null;
                function step(ts) {
                    if (!start) start = ts;
                    var progress = Math.min((ts - start) / duration, 1);
                    var eased    = 1 - Math.pow(1 - progress, 3);
                    el.innerHTML = Math.floor(eased * target).toLocaleString('id-ID') + suffix;
                    if (progress < 1) requestAnimationFrame(step);
                }
                requestAnimationFrame(step);
                countObserver.unobserve(el);
            });
        }, { threshold: 0.4 });
        counters.forEach(function (el) { countObserver.observe(el); });
    } else {
        /* Fallback: langsung tampilkan nilai akhir */
        counters.forEach(function(el) {
            var target = parseInt(el.getAttribute('data-count'));
            var suffix = el.querySelector('.stat-suffix') ? el.querySelector('.stat-suffix').outerHTML : '';
            el.innerHTML = target.toLocaleString('id-ID') + suffix;
        });
    }

});
</script>
@endsection
