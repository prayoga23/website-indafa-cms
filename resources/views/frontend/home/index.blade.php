@extends('frontend.layouts.app')

@section('title', $setting->site_name ?? 'Website Kampus')

@section('content')

{{-- ═══════════════════════════════════════════════
     HERO BANNER (dari database)
════════════════════════════════════════════════ --}}
<div class="container-fluid carousel-header px-0">
    <div class="carousel-inner h-100">
        <div class="carousel-item active">
            <img src="{{ asset('storage/gallery/2.png') }}"
                 alt="IAI Darul Falah Bondowoso"
                 loading="eager">
            <div class="carousel-caption">
                <div class="px-2">
                    <span class="hero-badge-gold">
                        Institut Agama Islam Darul Falah (IAI) Darul Falah Bondowoso
                    </span>

                    <h1 class="hero-title-coba">
                        Selamat Datang di <br>
                        <span class="text-mint">IAI Darul Falah Bondowoso</span>
                    </h1>

                    <p class="hero-desc-coba">
                        Mencetak lulusan perguruan tinggi Islam yang profesional, berintegritas, dan mampu merespons tantangan zaman berlandaskan nilai-nilai kepesantrenan.
                    </p>

                    <div class="d-flex justify-content-center gap-3 flex-wrap align-items-center mt-3">
                        <a class="hero-btn-white"
                           href="#sambutan-rektor">
                            Pelajari Lebih Lanjut
                        </a>
                        <a class="hero-btn-outline"
                           href="{{ route('frontend.akademik.pmb') }}">
                            Pendaftaran Mahasiswa Baru
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Animasi Panah Ke Bawah (Scroll Down Indicator) -->
    <a href="#sambutan-rektor" class="scroll-down-arrow" aria-label="Scroll ke bawah">
        <i class="bi bi-chevron-down"></i>
    </a>
</div>


{{-- ═══════════════════════════════════════════════
     1. SAMBUTAN REKTOR (Bento Glassmorphism Layout dari coba.html)
════════════════════════════════════════════════ --}}
@if(isset($sambutan))
<section class="sambutan-bento-section py-5 py-lg-6 relative" id="sambutan-rektor">
    <!-- Decorative background glow -->
    <div class="sambutan-bg-glow"></div>
    
    <div class="container relative z-1">
        <div class="row align-items-center g-5">

            {{-- Foto Rektor (Left Bento Card - coba.html photo layout) --}}
            <div class="col-lg-5 col-12 reveal-left">
                <div class="sambutan-photo-card">
                    <img src="{{ $sambutan->kaprodi_image ? asset('storage/' . $sambutan->kaprodi_image) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuB48YFxdgfnLW1Cp-pTW6gQlbdKxiBBDFhRbxiDwwFiYeIkcFZmZbLQwstDGEvL7DCR8lQ20PivVFFLFOicly08J44cTnoDTCgjkuG7weBNdR_-GqthPPSoE-UznG3ZVPVb_56lJJUGY-0O5QSKvNkzYa1BxXFnOFSdpheVgDKAVdbusWgGAxWQOaI4Vrm2n8YPIHzAU81cOnag5NmbRerCeCi_Gf65juBzLIHEnbM8y3bdKGsYiJFiyLoCRAt-pqJJgRnx_h2m3NM' }}"
                         alt="{{ $sambutan->kaprodi_name ?? 'Rektor IAI Darul Falah' }}"
                         class="img-fluid"
                         loading="lazy">
                </div>
            </div>

            {{-- Teks & Glassmorphism Card (Right) --}}
            <div class="col-lg-7 col-12 reveal-right">
                <div class="d-inline-flex align-items-center gap-2 mb-2">
                    <span class="eyebrow-line"></span>
                    <span class="text-uppercase fw-bold" style="color: #0B5345; font-size: 0.8rem; letter-spacing: 1.5px;">Pesan Rektor</span>
                </div>
                
                <h2 class="display-6 fw-bold mb-4" style="font-family: 'Playfair Display', Georgia, serif; color: #191c1d; line-height: 1.25;">
                    Sambutan <br><span style="color: #0B5345;">Rektor IAI Darul Falah</span>
                </h2>

                <div class="glass-card-bento p-4 p-md-5 rounded-4 relative shadow-sm mb-4">
                    <span class="quote-mark-bg">“</span>
                    <blockquote class="relative z-1 mb-0">
                        <p class="fst-italic fs-5 mb-3" style="font-family: 'Playfair Display', Georgia, serif; color: #2D3436; line-height: 1.7;">
                            "{{ $sambutan->quote ?? 'Kami berkomitmen menghasilkan lulusan Institut Agama Islam Darul Falah (IAI) Darul Falah Bondowoso yang profesional, berakhlak mulia, menguasai keilmuan integratif, serta adaptif terhadap perkembangan masyarakat dan zaman.' }}"
                        </p>
                        
                        <p class="text-secondary mb-3" style="font-family: 'Inter', sans-serif; font-size: 0.95rem; line-height: 1.8;">
                            {{ $sambutan->welcome_text_1 ?? 'Selamat datang di Institut Agama Islam Darul Falah (IAI) Darul Falah Bondowoso. Kami berkomitmen menyelenggarakan pendidikan tinggi yang berkualitas melalui kurikulum integratif yang adaptif terhadap perkembangan ilmu pengetahuan, teknologi, dan sosial masyarakat, didukung oleh tenaga pengajar profesional serta sarana pembelajaran yang memadai.' }}
                        </p>

                        @if($sambutan->welcome_text_2)
                        <p class="text-secondary mb-3" style="font-family: 'Inter', sans-serif; font-size: 0.95rem; line-height: 1.8;">
                            {{ $sambutan->welcome_text_2 }}
                        </p>
                        @endif
                        
                        <footer class="mt-4 pt-2 d-flex align-items-center gap-3">
                            <div class="footer-gold-bar"></div>
                            <div>
                                <div class="fw-bold" style="color: #0B5345; font-size: 0.95rem; letter-spacing: 0.5px;">
                                    {{ strtoupper($sambutan->kaprodi_name) }}
                                </div>
                                <div class="text-muted small mt-1" style="font-size: 0.82rem; font-weight: 500;">
                                    {{ $sambutan->kaprodi_title ?? 'Rektor IAI Darul Falah Bondowoso' }}
                                </div>
                            </div>
                        </footer>
                    </blockquote>
                </div>

                {{-- Action Buttons (Profil Lengkap & Hubungi Kami - Dipertahankan) --}}
                <div class="d-flex gap-3 flex-wrap align-items-center">
                    @if($sambutan->profile_link)
                    <a href="{{ $sambutan->profile_link }}" class="btn btn-brand rounded-pill px-4 py-2 font-bold shadow-sm">
                        Profil Lengkap &nbsp;<i class="bi bi-arrow-right"></i>
                    </a>
                    @endif

                    @if($sambutan->contact_link)
                    <a href="{{ $sambutan->contact_link }}" class="btn btn-outline-brand rounded-pill px-4 py-2 font-bold">
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
            <a href="{{ route('news.index') }}" class="btn btn-outline-brand rounded-pill px-4 reveal">
                Semua Berita &nbsp;<i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-4">

            {{-- Featured News (Berita Utama) --}}
            @if(isset($featuredNews))
            <div class="col-lg-5 reveal reveal-delay-1">
                <div class="news-card h-100">
                    <div class="news-thumb news-thumb-featured">
                        <img src="{{ $featuredNews->thumbnail_url ?: asset('assets/img/blog-1.jpg') }}"
                             alt="{{ $featuredNews->title }}" loading="lazy"
                             onerror="this.onerror=null;this.src='{{ asset('assets/img/blog-1.jpg') }}';">
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
                                    <img src="{{ $item->thumbnail_url ?: asset('assets/img/blog-' . (($loop->iteration % 4) + 1) . '.jpg') }}"
                                         alt="{{ $item->title }}" loading="lazy"
                                         onerror="this.onerror=null;this.src='{{ asset('assets/img/blog-' . (($loop->iteration % 4) + 1) . '.jpg') }}';">
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
                        <img src="{{ asset('storage/gallery/1.png') }}"
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
                        <img src="{{ asset('storage/gallery/2.png') }}"
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
            <a href="{{ route('frontend.akademik.prestasi') }}" class="btn btn-outline-brand rounded-pill px-4 reveal">
                Semua Prestasi &nbsp;<i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-4">

            {{-- Prestasi 1 --}}
            <div class="col-md-6 col-lg-4 reveal reveal-delay-1">
                <div class="prestasi-card">
                    <div class="prestasi-thumb">
                        <img src="{{ asset('storage/gallery/3.jpg') }}"
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
                        <img src="{{ asset('storage/gallery/4.png') }}"
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
                        <img src="{{ asset('storage/gallery/5. foto.jpeg') }}"
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
            <a href="{{ route('frontend.akademik.gallery-indafa') }}" class="btn btn-outline-brand rounded-pill px-4 reveal">
                Lihat Semua &nbsp;<i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="gallery-grid reveal">

            <div class="gallery-item gallery-tall">
                <img src="{{ asset('storage/gallery/6.jpeg') }}"
                     alt="Gedung Kampus" loading="lazy">
                <div class="gallery-overlay">
                    <span class="gallery-label">Gedung Kampus INDAFA</span>
                    <span class="gallery-sub">Fasilitas Utama</span>
                </div>
            </div>

            <div class="gallery-item">
                <img src="{{ asset('storage/gallery/11.jpg') }}"
                     alt="Kegiatan Akademik" loading="lazy">
                <div class="gallery-overlay">
                    <span class="gallery-label">Kegiatan Akademik</span>
                    <span class="gallery-sub">Proses Belajar Mengajar</span>
                </div>
            </div>

            <div class="gallery-item">
                <img src="{{ asset('storage/gallery/8.jpg') }}"
                     alt="Wisuda" loading="lazy">
                <div class="gallery-overlay">
                    <span class="gallery-label">Wisuda</span>
                    <span class="gallery-sub">Prosesi Kelulusan</span>
                </div>
            </div>

            <div class="gallery-item">
                <img src="{{ asset('storage/gallery/9. foto.jpg') }}"
                     alt="Kegiatan Mahasiswa" loading="lazy">
                <div class="gallery-overlay">
                    <span class="gallery-label">Kegiatan Mahasiswa</span>
                    <span class="gallery-sub">Organisasi & UKM</span>
                </div>
            </div>

            <div class="gallery-item">
                <img src="{{ asset('storage/gallery/10.jpg') }}"
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
