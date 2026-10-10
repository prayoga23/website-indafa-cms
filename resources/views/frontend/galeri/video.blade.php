@extends('frontend.layouts.app')

@section('title', 'Galeri Video - Prodi Hukum Keluarga Islam')

@section('content')
<!-- Hero Section Video -->
<section class="video-hero d-flex align-items-center">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Dokumentasi Multimedia</h5>
        <h1 class="display-4 fw-bold text-uppercase">Galeri Video</h1>
        <div class="video-divider mx-auto"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-2">

        {{-- ═══════════════════════════════════════════════
             SECTION 1: VIDEO UTAMA / FEATURED VIDEO
             ════════════════════════════════════════════════ --}}
        @if($featuredVideo)
        <div class="row mb-5">
            <div class="col-12">
                <div class="featured-video-card bg-white rounded-4 overflow-hidden shadow-sm">
                    <div class="row g-0">
                        <div class="col-lg-7">
                            <div class="ratio ratio-16x9 featured-video-wrapper">
                                <iframe src="https://www.youtube.com/embed/{{ $featuredVideo->youtube_id }}?rel=0"
                                        title="{{ $featuredVideo->title }}"
                                        allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                        <div class="col-lg-5 d-flex flex-column justify-content-center p-4 p-md-5">
                            <div class="mb-2">
                                <span class="badge bg-gold text-uppercase fw-bold px-3 py-1.5 fs-7 tracking-wider">Sorotan Utama</span>
                            </div>
                            <h3 class="fw-bold text-dark-green mb-3">{{ $featuredVideo->title }}</h3>
                            <p class="text-secondary small lh-lg text-justify mb-0">
                                {{ $featuredVideo->description ?? 'Tidak ada deskripsi tambahan untuk video dokumentasi utama ini.' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        {{-- ═══════════════════════════════════════════════
             SECTION 2: KISI VIDEO REGULER
             ════════════════════════════════════════════════ --}}
        <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
            <h4 class="fw-bold text-dark-green mb-0 text-uppercase tracking-wide fs-5">Daftar Putar & Liputan Kegiatan</h4>
        </div>

        <div class="row g-4">
            @if(isset($videos) && $videos->count() > 0)
                @foreach($videos as $video)
                    @php
                        // Normalisasi string tag kategori untuk styling badge
                        $categoryClean = Str::lower($video->category);
                        $badgeClass = 'bg-green-light text-dark-green';

                        if (Str::contains($categoryClean, 'aktivitas') || Str::contains($categoryClean, 'highlight')) {
                            $badgeClass = 'bg-gold-light text-gold-style';
                        }
                    @endphp

                    <div class="col-md-6 col-lg-4">
                        <div class="video-card bg-white rounded-4 overflow-hidden shadow-sm h-100 d-flex flex-column">
                            <div class="video-thumb-box position-relative">
                                <img src="https://img.youtube.com/vi/{{ $video->youtube_id }}/mqdefault.jpg"
                                     alt="{{ $video->title }}"
                                     class="w-100 h-100 object-fit-cover"
                                     style="min-height: 200px;">

                                <div class="video-overlay d-flex align-items-center justify-content-center">
                                    <a href="https://www.youtube.com/watch?v={{ $video->youtube_id }}"
                                       target="_blank"
                                       class="play-btn rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-play-fill text-white fs-3 ms-1"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body p-4 d-flex flex-column flex-grow-1">
                                <span class="badge {{ $badgeClass }} align-self-start mb-2 font-monospace px-2 py-1 text-uppercase fw-bold small">
                                    {{ $video->category ?? 'Dokumentasi' }}
                                </span>
                                <h5 class="fw-bold text-dark-green card-title mb-2 text-truncate-2" title="{{ $video->title }}">
                                    {{ $video->title }}
                                </h5>
                                <p class="text-muted small mt-auto mb-0">
                                    <i class="bi bi-clock me-1"></i> Durasi: {{ $video->duration ?? 'Selesai' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center py-5 bg-white rounded-4 shadow-sm">
                    <p class="text-muted mb-0">Belum ada daftar putar video dokumentasi kegiatan.</p>
                </div>
            @endif
        </div>

        {{-- ═══════════════════════════════════════════════
             PAGINATION NAVIGATION
             ════════════════════════════════════════════════ --}}
        @if(isset($videos) && $videos->hasPages())
            <nav class="mt-5">
                <ul class="pagination justify-content-center custom-video-pagination">
                    {{-- Previous Page Link --}}
                    @if ($videos->onFirstPage())
                        <li class="page-item disabled"><span class="page-link"><i class="bi bi-chevron-left"></i></span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $videos->previousPageUrl() }}"><i class="bi bi-chevron-left"></i></a></li>
                    @endif

                    {{-- Loop Halaman --}}
                    @foreach ($videos->getUrlRange(1, $videos->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $videos->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($videos->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $videos->nextPageUrl() }}"><i class="bi bi-chevron-right"></i></a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link"><i class="bi bi-chevron-right"></i></span></li>
                    @endif
                </ul>
            </nav>
        @endif

    </div>
</section>

{{-- Sedikit tambahan CSS agar line-clamp berjalan semisal judul video terlalu panjang --}}
<style>
    .text-truncate-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>

<!-- ==========================================================================
     STYLE CSS (INTEGRATED PREMIUM LOOK UNTUK HALAMAN GALERI VIDEO)
     ========================================================================== -->
<style>
/* Utilities & Colors */
.text-dark-green { color: #0b5345 !important; }
.text-gold-style { color: #b38f32 !important; }
.bg-dark-green { background-color: #0b5345 !important; }
.bg-gold { background-color: #cca43b !important; }
.bg-premium-light { background-color: #f4f7f6; }
.text-justify { text-align: justify; }

/* Hero Section Style */
.video-hero {
    background: linear-gradient(rgba(11, 83, 69, 0.95), rgba(0, 0, 0, 0.85)),
                url('https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?q=80&w=1200&auto=format&fit=crop') no-repeat center center;
    background-size: cover;
    height: 35vh;
    min-height: 280px;
}
.video-divider {
    width: 60px;
    height: 4px;
    background-color: #cca43b;
    margin-top: 15px;
    border-radius: 2px;
}

/* Featured Video Mechanics */
.featured-video-card {
    border: 1px solid rgba(11, 83, 69, 0.05);
}
.featured-video-wrapper iframe {
    border: none;
}

/* Video Grid Card Mechanics */
.video-card {
    border: 1px solid rgba(11, 83, 69, 0.04);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.video-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(11, 83, 69, 0.07) !important;
}
.video-thumb-box {
    height: 210px;
    overflow: hidden;
    background-color: #000;
}

/* Video Overlay & Play Button Mechanics */
.video-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(11, 83, 69, 0.4);
    transition: background-color 0.3s ease;
}
.video-card:hover .video-overlay {
    background-color: rgba(11, 83, 69, 0.7);
}
.play-btn {
    width: 55px;
    height: 55px;
    background-color: #cca43b;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    text-decoration: none;
    transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}
.video-card:hover .play-btn {
    transform: scale(1.15);
    background-color: #0b5345;
    border: 2px solid #ffffff;
}

/* Typography Utilities */
.card-title {
    font-size: 1.08rem;
    line-height: 1.4;
}
.text-truncate-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* Light Badges Background */
.bg-gold-light { background-color: rgba(204, 164, 59, 0.12); }
.bg-green-light { background-color: rgba(11, 83, 69, 0.08); }

/* Pagination Controls */
.custom-video-pagination .page-link {
    color: #0b5345;
    border-color: #dee2e6;
    padding: 8px 14px;
    font-weight: 600;
}
.custom-video-pagination .page-item.active .page-link {
    background-color: #0b5345;
    border-color: #0b5345;
    color: #ffffff;
}
.custom-video-pagination .page-link:hover {
    background-color: rgba(11, 83, 69, 0.05);
}
</style>
@endsection
