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
