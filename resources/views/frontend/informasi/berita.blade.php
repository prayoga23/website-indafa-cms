@extends('frontend.layouts.app')

@section('title', 'Berita & Informasi - Prodi Hukum Keluarga Islam')

@section('content')
<!-- Hero Section Berita -->
<section class="berita-hero d-flex align-items-center">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Kabar Terkini</h5>
        <h1 class="display-4 fw-bold text-uppercase">Berita & Artikel</h1>
        <div class="berita-divider mx-auto"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-2">

        {{-- ═══════════════════════════════════════════════
             SECTION 1: BERITA UTAMA / FEATURED POST
             ════════════════════════════════════════════════ --}}
        @if($featuredNews && (!request()->has('page') || request()->page == 1))
            <div class="row mb-5">
                <div class="col-12">
                    <div class="featured-news-card bg-white rounded-4 overflow-hidden shadow-sm d-flex flex-column flex-lg-row">
                        <div class="featured-img-wrapper position-relative flex-grow-1" style="min-width: 45%;">
                            <img src="{{ $featuredNews->thumbnail_url ?: asset('assets/img/blog-1.jpg') }}"
                                 alt="{{ $featuredNews->title }}" class="featured-img w-100 h-100" style="object-fit: cover; min-height: 300px;"
                                 onerror="this.onerror=null;this.src='{{ asset('assets/img/blog-1.jpg') }}';">
                            <span class="badge bg-gold position-absolute top-0 start-0 m-4 px-3 py-2 text-uppercase fw-bold">Berita Utama</span>
                        </div>
                        <div class="featured-content p-4 p-md-5 d-flex flex-column justify-content-center">
                            <div class="meta-info d-flex gap-3 text-muted small mb-3">
                                <span><i class="bi bi-calendar3 text-gold me-1"></i> {{ \Carbon\Carbon::parse($featuredNews->created_at)->translatedFormat('d F Y') }}</span>
                                <span><i class="bi bi-person text-gold me-1"></i> {{ $featuredNews->user->name ?? 'Admin HKI' }}</span>
                            </div>
                            <h2 class="fw-bold text-dark-green mb-3">{{ $featuredNews->title }}</h2>
                            <p class="text-secondary mb-4 text-justify">
                                {{ Str::limit(strip_tags($featuredNews->content), 280, '...') }}
                            </p>
                            <div>
                                <a href="{{ url('berita/'.$featuredNews->slug) }}" class="btn btn-dark-green px-4 py-2 rounded-pill fw-semibold">
                                    Baca Selengkapnya <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- ═══════════════════════════════════════════════
             SECTION 2: KISI BERITA REGULER
             ════════════════════════════════════════════════ --}}
        <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
            <h4 class="fw-bold text-dark-green mb-0 text-uppercase tracking-wide fs-5">Artikel & Informasi Terbaru</h4>
            <div class="news-filter">
                <form action="{{ route('frontend.informasi.berita') }}" method="GET" id="filterForm">
                    <select name="category" class="form-select form-select-sm rounded-pill px-3 border-secondary-subtle" onchange="document.getElementById('filterForm').submit();">
                        <option value="Semua Kategori" {{ request('category') == 'Semua Kategori' ? 'selected' : '' }}>Semua Kategori</option>
                        <option value="Akademik" {{ request('category') == 'Akademik' ? 'selected' : '' }}>Akademik</option>
                        <option value="Prestasi" {{ request('category') == 'Prestasi' ? 'selected' : '' }}>Prestasi</option>
                        <option value="Kegiatan" {{ request('category') == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                    </select>
                </form>
            </div>
        </div>

        <div class="row g-4">
            @if(isset($regularNews) && $regularNews->count() > 0)
                @foreach($regularNews as $news)
                    @php
                        // Logika deteksi badge kategori sederhana berbasis konten kata kunci
                        $cleanContent = Str::lower($news->content . $news->title);
                        $badgeLabel = 'Info';
                        if (Str::contains($cleanContent, ['akademik', 'kuliah', 'siakad'])) $badgeLabel = 'Akademik';
                        elseif (Str::contains($cleanContent, ['kunjungan', 'simposium', 'kegiatan', 'praktik'])) $badgeLabel = 'Kegiatan';
                        elseif (Str::contains($cleanContent, ['juara', 'prestasi', 'penghargaan'])) $badgeLabel = 'Prestasi';
                    @endphp

                    <div class="col-md-6 col-lg-4">
                        <div class="news-card bg-white rounded-4 overflow-hidden shadow-sm h-100 d-flex flex-column">
                            <div class="card-img-box position-relative" style="height: 220px; overflow: hidden;">
                                <img src="{{ $news->thumbnail_url ?: asset('assets/img/blog-1.jpg') }}"
                                     alt="{{ $news->title }}" class="w-100 h-100" style="object-fit: cover;"
                                     onerror="this.onerror=null;this.src='{{ asset('assets/img/blog-1.jpg') }}';">
                                <span class="badge bg-dark-green position-absolute bottom-0 start-0 m-3">{{ $badgeLabel }}</span>
                            </div>
                            <div class="card-body p-4 d-flex flex-column flex-grow-1">
                                <div class="text-muted small mb-2">
                                    <i class="bi bi-calendar3 me-1 text-gold"></i> {{ \Carbon\Carbon::parse($news->created_at)->translatedFormat('d M Y') }}
                                </div>
                                <h5 class="fw-bold text-dark-green card-title mb-3">{{ $news->title }}</h5>
                                <p class="text-secondary small mb-4 text-justify line-clamp">
                                    {{ Str::limit(strip_tags($news->content), 130, '...') }}
                                </p>
                                <a href="{{ url('berita/'.$news->slug) }}" class="mt-auto text-gold fw-bold text-decoration-none small text-uppercase tracking-wider hover-gold">
                                    Selengkapnya <i class="bi bi-chevron-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center py-5 bg-white rounded-4 shadow-sm">
                    <p class="text-muted mb-0">Tidak ada artikel atau berita yang ditemukan.</p>
                </div>
            @endif
        </div>

        {{-- ═══════════════════════════════════════════════
             PAGINATION NAVIGATION
             ════════════════════════════════════════════════ --}}
        @if($regularNews->hasPages())
            <nav class="mt-5">
                <ul class="pagination justify-content-center custom-news-pagination">
                    {{-- Previous Page Link --}}
                    @if ($regularNews->onFirstPage())
                        <li class="page-item disabled"><span class="page-link"><i class="bi bi-chevron-left"></i></span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $regularNews->previousPageUrl() }}"><i class="bi bi-chevron-left"></i></a></li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($regularNews->getUrlRange(1, $regularNews->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $regularNews->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($regularNews->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $regularNews->nextPageUrl() }}"><i class="bi bi-chevron-right"></i></a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link"><i class="bi bi-chevron-right"></i></span></li>
                    @endif
                </ul>
            </nav>
        @endif

    </div>
</section>

<!-- ==========================================================================
     STYLE CSS (INTEGRATED PREMIUM LOOK UNTUK BERITA & ARTIKEL)
     ========================================================================== -->
<style>
/* Utilities & Colors */
.text-dark-green { color: #0b5345 !important; }
.text-gold { color: #cca43b !important; }
.bg-dark-green { background-color: #0b5345 !important; }
.bg-gold { background-color: #cca43b !important; }
.bg-premium-light { background-color: #f4f7f6; }
.text-justify { text-align: justify; }

/* Hero Section Style */
.berita-hero {
    background: linear-gradient(rgba(11, 83, 69, 0.95), rgba(0, 0, 0, 0.85)),
                url('https://images.unsplash.com/photo-1504711434969-e33886168f5c?q=80&w=1200&auto=format&fit=crop') no-repeat center center;
    background-size: cover;
    height: 35vh;
    min-height: 280px;
}
.berita-divider {
    width: 60px;
    height: 4px;
    background-color: #cca43b;
    margin-top: 15px;
    border-radius: 2px;
}

/* Featured Post Mechanics */
.featured-news-card {
    border: 1px solid rgba(11, 83, 69, 0.05);
}
.featured-img-wrapper {
    min-height: 300px;
    max-height: 450px;
}
.featured-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.featured-content {
    flex: 1.2;
}
.btn-dark-green {
    background-color: #0b5345;
    color: #ffffff;
    border: none;
    transition: all 0.3s ease;
}
.btn-dark-green:hover {
    background-color: #cca43b;
    color: #ffffff;
    transform: translateY(-2px);
}

/* Regular News Grid Cards */
.news-card {
    border: 1px solid rgba(11, 83, 69, 0.04);
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
}
.news-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(11, 83, 69, 0.07) !important;
}
.card-img-box {
    height: 210px;
    overflow: hidden;
}
.card-img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}
.news-card:hover .card-img-box img {
    transform: scale(1.06);
}
.card-title {
    font-size: 1.12rem;
    line-height: 1.4;
}
.line-clamp {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.hover-gold {
    transition: color 0.2s ease;
}
.hover-gold:hover {
    color: #0b5345 !important;
}

/* News Pagination Styling */
.custom-news-pagination .page-link {
    color: #0b5345;
    border-color: #dee2e6;
    padding: 10px 16px;
    font-weight: 600;
    transition: all 0.2s ease;
}
.custom-news-pagination .page-item.active .page-link {
    background-color: #0b5345;
    border-color: #0b5345;
    color: #ffffff;
}
.custom-news-pagination .page-link:hover {
    background-color: rgba(11, 83, 69, 0.05);
    color: #0b5345;
}
</style>
@endsection
