@extends('frontend.layouts.app')

@section('title', $setting->site_name ?? 'Website Kampus')

@section('content')

{{-- ═══════════════════════════════════════════════
     HERO BANNER (dari database)
════════════════════════════════════════════════ --}}
<div class="container-fluid carousel-header px-0">
    @if($banners->count())
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
     1. SAMBUTAN KETUA PRODI (statis)
════════════════════════════════════════════════ --}}
<section class="sambutan-section">
    <div class="container">
        <div class="row align-items-center g-5">

            {{-- Foto --}}
            <div class="col-lg-5 col-10 col-sm-8 col-md-6 mx-auto mx-md-0 reveal-left">
                <div class="sambutan-img-wrap text-center">
                    <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=480&h=460&fit=crop"
                         alt="Ketua Program Studi"
                         loading="lazy">
                    <div class="sambutan-name-card">
                        <p class="mb-0 fw-bold" style="font-size:.95rem;color:var(--color-primary);">
                            Dr. Ahmad Fauzi, M.Kom.
                        </p>
                        <p class="mb-0" style="font-size:.78rem;color:#868e96;">
                            Ketua Program Studi Informatika
                        </p>
                    </div>
                </div>
            </div>

            {{-- Teks --}}
            <div class="col-lg-7 col-12 reveal-right">
                <span class="section-eyebrow">Sambutan</span>
                <h2 class="section-title">Sambutan Ketua Program Studi</h2>
                <div class="section-divider mt-3 mb-4"></div>

                <blockquote class="sambutan-quote-block">
                    "Kami berkomitmen mencetak lulusan yang unggul secara akademik,
                    berkarakter kuat, dan mampu bersaing di era global yang terus berkembang pesat."
                </blockquote>

                <p style="color:#4a5568;line-height:1.85;font-size:.93rem;margin-bottom:1rem;">
                    Selamat datang di Program Studi Informatika. Program studi kami terus
                    berkembang dengan menghadirkan kurikulum yang adaptif terhadap kebutuhan
                    industri, didukung oleh tenaga pengajar berpengalaman dan fasilitas
                    laboratorium modern.
                </p>
                <p style="color:#4a5568;line-height:1.85;font-size:.93rem;margin-bottom:1.75rem;">
                    Kami mendorong setiap mahasiswa untuk aktif berinovasi, berkolaborasi
                    lintas disiplin, dan memberikan kontribusi nyata bagi masyarakat melalui
                    teknologi yang bertanggung jawab.
                </p>

                <div class="d-flex gap-3 flex-wrap">
                    <a href="#" class="btn btn-brand rounded-pill px-4">
                        Profil Lengkap &nbsp;<i class="bi bi-arrow-right"></i>
                    </a>
                    <a href="#" class="btn btn-outline-brand rounded-pill px-4">
                        Hubungi Kami
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════
     2. HIGHLIGHT BERITA TERBARU (statis)
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

            {{-- Featured --}}
            <div class="col-lg-5 reveal reveal-delay-1">
                <div class="news-card h-100">
                    <div class="news-thumb news-thumb-featured">
                        <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=600&h=270&fit=crop"
                             alt="Berita Utama" loading="lazy">
                        <span class="news-cat news-cat-primary">Unggulan</span>
                    </div>
                    <div class="news-body">
                        <div class="news-date">
                            <i class="bi bi-calendar3"></i> 18 Juni 2025
                        </div>
                        <h3 class="news-title news-title-featured">
                            <a href="#">
                                Mahasiswa Informatika Raih Juara 1 Nasional dalam Kompetisi
                                Kecerdasan Buatan 2025
                            </a>
                        </h3>
                        <p class="news-excerpt">
                            Tim mahasiswa program studi Informatika berhasil meraih posisi
                            pertama dalam ajang bergengsi National AI Competition 2025 yang
                            diikuti lebih dari 200 tim dari seluruh Indonesia. Prestasi ini
                            menjadi kebanggaan kampus dan membuktikan kualitas pendidikan
                            yang kami berikan.
                        </p>
                        <a href="#" class="news-readmore">
                            Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- 4 Berita Kecil --}}
            <div class="col-lg-7">
                <div class="row g-4">

                    <div class="col-sm-6 reveal reveal-delay-2">
                        <div class="news-card h-100">
                            <div class="news-thumb news-thumb-small">
                                <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=400&h=175&fit=crop"
                                     alt="Berita 2" loading="lazy">
                                <span class="news-cat news-cat-gold">Akademik</span>
                            </div>
                            <div class="news-body">
                                <div class="news-date"><i class="bi bi-calendar3"></i> 12 Juni 2025</div>
                                <h3 class="news-title news-title-small">
                                    <a href="#">Kurikulum Baru 2025 Resmi Diterapkan, Fokus pada AI dan Cybersecurity</a>
                                </h3>
                                <a href="#" class="news-readmore mt-auto">Baca <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 reveal reveal-delay-3">
                        <div class="news-card h-100">
                            <div class="news-thumb news-thumb-small">
                                <img src="https://images.unsplash.com/photo-1532094349884-543559285b07?w=400&h=175&fit=crop"
                                     alt="Berita 3" loading="lazy">
                                <span class="news-cat news-cat-primary">Riset</span>
                            </div>
                            <div class="news-body">
                                <div class="news-date"><i class="bi bi-calendar3"></i> 05 Juni 2025</div>
                                <h3 class="news-title news-title-small">
                                    <a href="#">Dosen Prodi Informatika Publikasikan Riset di Jurnal Internasional Q1</a>
                                </h3>
                                <a href="#" class="news-readmore mt-auto">Baca <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 reveal reveal-delay-2">
                        <div class="news-card h-100">
                            <div class="news-thumb news-thumb-small">
                                <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=400&h=175&fit=crop"
                                     alt="Berita 4" loading="lazy">
                                <span class="news-cat news-cat-red">Kegiatan</span>
                            </div>
                            <div class="news-body">
                                <div class="news-date"><i class="bi bi-calendar3"></i> 28 Mei 2025</div>
                                <h3 class="news-title news-title-small">
                                    <a href="#">Seminar Industri Hadirkan 5 Pakar Teknologi dari Perusahaan Fortune 500</a>
                                </h3>
                                <a href="#" class="news-readmore mt-auto">Baca <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 reveal reveal-delay-3">
                        <div class="news-card h-100">
                            <div class="news-thumb news-thumb-small">
                                <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=400&h=175&fit=crop"
                                     alt="Berita 5" loading="lazy">
                                <span class="news-cat news-cat-blue">Pengumuman</span>
                            </div>
                            <div class="news-body">
                                <div class="news-date"><i class="bi bi-calendar3"></i> 20 Mei 2025</div>
                                <h3 class="news-title news-title-small">
                                    <a href="#">Pendaftaran Beasiswa Prestasi Tahun Akademik 2025/2026 Dibuka</a>
                                </h3>
                                <a href="#" class="news-readmore mt-auto">Baca <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════
     3. AGENDA TERDEKAT (statis)
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

            {{-- Agenda 1 --}}
            <div class="col-md-6 col-lg-4 reveal reveal-delay-1">
                <div class="agenda-card">
                    <div class="agenda-date-box">
                        <span class="day">15</span>
                        <span class="month">Jul</span>
                    </div>
                    <div class="agenda-content">
                        <p class="agenda-title">Seminar Nasional Kecerdasan Buatan & Big Data 2025</p>
                        <div class="agenda-meta">
                            <span><i class="bi bi-clock me-1"></i>08.00 – 12.00</span>
                            <span><i class="bi bi-geo-alt me-1"></i>Aula Utama Kampus</span>
                        </div>
                        <span class="agenda-tag tag-seminar">Seminar</span>
                    </div>
                </div>
            </div>

            {{-- Agenda 2 --}}
            <div class="col-md-6 col-lg-4 reveal reveal-delay-2">
                <div class="agenda-card">
                    <div class="agenda-date-box">
                        <span class="day">22</span>
                        <span class="month">Jul</span>
                    </div>
                    <div class="agenda-content">
                        <p class="agenda-title">Workshop Penulisan Karya Ilmiah untuk Jurnal Internasional</p>
                        <div class="agenda-meta">
                            <span><i class="bi bi-clock me-1"></i>09.00 – 15.00</span>
                            <span><i class="bi bi-geo-alt me-1"></i>Lab Komputer Lt. 2</span>
                        </div>
                        <span class="agenda-tag tag-workshop">Workshop</span>
                    </div>
                </div>
            </div>

            {{-- Agenda 3 --}}
            <div class="col-md-6 col-lg-4 reveal reveal-delay-3">
                <div class="agenda-card">
                    <div class="agenda-date-box">
                        <span class="day">30</span>
                        <span class="month">Jul</span>
                    </div>
                    <div class="agenda-content">
                        <p class="agenda-title">Wisuda Sarjana & Pascasarjana Periode II Tahun 2025</p>
                        <div class="agenda-meta">
                            <span><i class="bi bi-clock me-1"></i>09.00 WIB</span>
                            <span><i class="bi bi-geo-alt me-1"></i>Gedung Serbaguna</span>
                        </div>
                        <span class="agenda-tag tag-wisuda">Wisuda</span>
                    </div>
                </div>
            </div>

            {{-- Agenda 4 --}}
            <div class="col-md-6 col-lg-4 reveal reveal-delay-1">
                <div class="agenda-card">
                    <div class="agenda-date-box">
                        <span class="day">05</span>
                        <span class="month">Ags</span>
                    </div>
                    <div class="agenda-content">
                        <p class="agenda-title">Orientasi Mahasiswa Baru Tahun Akademik 2025/2026</p>
                        <div class="agenda-meta">
                            <span><i class="bi bi-clock me-1"></i>07.30 – Selesai</span>
                            <span><i class="bi bi-geo-alt me-1"></i>Kampus Utama</span>
                        </div>
                        <span class="agenda-tag tag-lainnya">Lainnya</span>
                    </div>
                </div>
            </div>

            {{-- Agenda 5 --}}
            <div class="col-md-6 col-lg-4 reveal reveal-delay-2">
                <div class="agenda-card">
                    <div class="agenda-date-box">
                        <span class="day">12</span>
                        <span class="month">Ags</span>
                    </div>
                    <div class="agenda-content">
                        <p class="agenda-title">Kuliah Tamu: Transformasi Digital di Era Industri 5.0</p>
                        <div class="agenda-meta">
                            <span><i class="bi bi-clock me-1"></i>13.00 – 15.30</span>
                            <span><i class="bi bi-geo-alt me-1"></i>Ruang Seminar A</span>
                        </div>
                        <span class="agenda-tag tag-seminar">Seminar</span>
                    </div>
                </div>
            </div>

            {{-- Agenda 6 --}}
            <div class="col-md-6 col-lg-4 reveal reveal-delay-3">
                <div class="agenda-card">
                    <div class="agenda-date-box">
                        <span class="day">20</span>
                        <span class="month">Ags</span>
                    </div>
                    <div class="agenda-content">
                        <p class="agenda-title">Pelatihan Metodologi Penelitian Kuantitatif & Kualitatif</p>
                        <div class="agenda-meta">
                            <span><i class="bi bi-clock me-1"></i>08.00 – 12.00</span>
                            <span><i class="bi bi-geo-alt me-1"></i>Ruang Kelas B1</span>
                        </div>
                        <span class="agenda-tag tag-workshop">Workshop</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════
     4. STATISTIK SINGKAT (statis)
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
                    <span class="stat-number" data-count="1240">0<span class="stat-suffix">+</span></span>
                    <p class="stat-label">Mahasiswa Aktif</p>
                </div>
            </div>

            <div class="col-auto d-none d-lg-flex align-items-center stat-sep reveal"></div>

            <div class="col-6 col-md-4 col-lg-2 reveal reveal-delay-2">
                <div class="stat-item">
                    <div class="stat-icon-wrap"><i class="bi bi-person-badge-fill"></i></div>
                    <span class="stat-number" data-count="48">0</span>
                    <p class="stat-label">Dosen Pengampu</p>
                </div>
            </div>

            <div class="col-auto d-none d-lg-flex align-items-center stat-sep reveal"></div>

            <div class="col-6 col-md-4 col-lg-2 reveal reveal-delay-3">
                <div class="stat-item">
                    <div class="stat-icon-wrap"><i class="bi bi-mortarboard-fill"></i></div>
                    <span class="stat-number" data-count="3500">0<span class="stat-suffix">+</span></span>
                    <p class="stat-label">Alumni Lulus</p>
                </div>
            </div>

            <div class="col-auto d-none d-lg-flex align-items-center stat-sep reveal"></div>

            <div class="col-6 col-md-4 col-lg-2 reveal reveal-delay-4">
                <div class="stat-item">
                    <div class="stat-icon-wrap"><i class="bi bi-journal-richtext"></i></div>
                    <span class="stat-number" data-count="120">0<span class="stat-suffix">+</span></span>
                    <p class="stat-label">Publikasi Ilmiah</p>
                </div>
            </div>

            <div class="col-auto d-none d-lg-flex align-items-center stat-sep reveal"></div>

            <div class="col-6 col-md-4 col-lg-2 reveal reveal-delay-4">
                <div class="stat-item">
                    <div class="stat-icon-wrap"><i class="bi bi-patch-check-fill"></i></div>
                    {{-- Angka "A" bukan angka, jadi tidak perlu counter --}}
                    <span class="stat-number" style="font-size:clamp(2rem,2rem + 1vw,3rem);">A</span>
                    <p class="stat-label">Akreditasi BAN-PT</p>
                </div>
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
