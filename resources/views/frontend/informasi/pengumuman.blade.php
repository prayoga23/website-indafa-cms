@extends('frontend.layouts.app')

@section('title', 'Pengumuman Akademik - Prodi Hukum Keluarga Islam')

@section('content')
<!-- Hero Section Pengumuman -->
<section class="pengumuman-hero d-flex align-items-center">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Papan Informasi</h5>
        <h1 class="display-4 fw-bold text-uppercase">Pengumuman Resmi</h1>
        <div class="pengumuman-divider mx-auto"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-2">

        {{-- ═══════════════════════════════════════════════
             BAR PENCARIAN & FILTER
             ════════════════════════════════════════════════ --}}
        <div class="row mb-4 g-3 justify-content-between align-items-center">
            <div class="col-md-5">
                <form action="{{ route('frontend.informasi.pengumuman') }}" method="GET">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <div class="input-group announcement-search shadow-sm rounded-pill overflow-hidden bg-white border">
                        <span class="input-group-text bg-white border-0 pe-0 text-muted"><i class="bi bi-search"></i></span>
                        <input type="text" name="search" class="form-control border-0 px-3 py-2 small"
                               placeholder="Cari kata kunci atau judul pengumuman..." value="{{ request('search') }}">
                    </div>
                </form>
            </div>

            <div class="col-md-5 d-flex gap-2 justify-content-md-end flex-wrap">
                <a href="{{ route('frontend.informasi.pengumuman', array_merge(request()->query(), ['category' => 'all'])) }}"
                   class="btn btn-filter-announcement rounded-pill px-3 py-1.5 text-uppercase fw-bold small {{ !request('category') || request('category') == 'all' ? 'active' : '' }}">
                   Semua
                </a>
                <a href="{{ route('frontend.informasi.pengumuman', array_merge(request()->query(), ['category' => 'Penting'])) }}"
                   class="btn btn-filter-announcement rounded-pill px-3 py-1.5 text-uppercase fw-bold small {{ request('category') == 'Penting' ? 'active' : '' }}">
                   Penting
                </a>
                <a href="{{ route('frontend.informasi.pengumuman', array_merge(request()->query(), ['category' => 'Pendaftaran'])) }}"
                   class="btn btn-filter-announcement rounded-pill px-3 py-1.5 text-uppercase fw-bold small {{ request('category') == 'Pendaftaran' ? 'active' : '' }}">
                   Pendaftaran
                </a>
            </div>
        </div>

        {{-- ═══════════════════════════════════════════════
             LIST DAFTAR PENGUMUMAN
             ════════════════════════════════════════════════ --}}
        <div class="row g-3">
            @if(isset($announcements) && $announcements->count() > 0)
                @foreach($announcements as $announcement)
                    @php
                        // Parsing Tanggal Menggunakan Carbon
                        $date = \Carbon\Carbon::parse($announcement->publish_date);
                        $dayNum = $date->format('d');
                        $monthText = $date->translatedFormat('F');
                        $yearText = $date->format('Y');

                        // Deteksi Otomatis Tipe Pengumuman Berdasarkan Konten/Judul untuk Desain Varian Warna
                        $cleanText = Str::lower($announcement->title . ' ' . $announcement->content);

                        if (Str::contains($cleanText, 'penting') || Str::contains($cleanText, 'darurat') || Str::contains($cleanText, 'batas')) {
                            $borderClass = 'border-start-danger';
                            $textDateClass = 'text-danger';
                            $badgeClass = 'bg-danger-light text-danger';
                            $labelBadge = 'Penting';
                        } elseif (Str::contains($cleanText, 'daftar') || Str::contains($cleanText, 'beasiswa') || Str::contains($cleanText, 'registrasi')) {
                            $borderClass = 'border-start-gold';
                            $textDateClass = 'text-gold-style';
                            $badgeClass = 'bg-gold-light text-gold-style';
                            $labelBadge = 'Pendaftaran';
                        } else {
                            $borderClass = 'border-start-green';
                            $textDateClass = 'text-dark-green';
                            $badgeClass = 'bg-green-light text-dark-green';
                            $labelBadge = 'Informasi';
                        }

                        // Mencoba ekstrak ekstensi nomor surat sederhana jika tertulis di content, jika tidak pakai format prodi
                        preg_match('/No[\.\s\:]+([^\s\<]+)/i', $announcement->content, $matches);
                        $noSurat = !empty($matches[0]) ? $matches[0] : 'No: --/Internal-HKI/' . $yearText;
                    @endphp

                    <div class="col-12">
                        <div class="announcement-strip bg-white p-4 rounded-4 shadow-sm {{ $borderClass }} d-flex flex-column flex-md-row align-items-md-center gap-3">

                            <div class="announcement-date-box text-center flex-shrink-0 d-flex flex-row flex-md-column align-items-center justify-content-center gap-2 gap-md-0">
                                <span class="day-num fw-bold {{ $textDateClass }}">{{ $dayNum }}</span>
                                <span class="month-text text-uppercase text-muted fw-semibold">{{ substr($monthText, 0, 4) }}</span>
                                <span class="year-text text-muted small d-md-block">{{ $yearText }}</span>
                            </div>

                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center gap-2 mb-2 flex-wrap">
                                    <span class="badge {{ $badgeClass }} font-monospace px-2.5 py-1 text-uppercase fw-bold tracking-wide">{{ $labelBadge }}</span>
                                    <span class="text-muted small"><i class="bi bi-hash me-1"></i> {{ $noSurat }}</span>
                                </div>
                                <h5 class="fw-bold text-dark-green mb-1 announcement-title">{{ $announcement->title }}</h5>
                                <p class="text-secondary small mb-0 text-justify">
                                    {{ $announcement->excerpt ?? Str::limit(strip_tags($announcement->content), 220, '...') }}
                                </p>
                            </div>

                            <div class="flex-shrink-0 text-md-end mt-2 mt-md-0">
                                <a href="{{ route('frontend.informasi.pengumuman.detail', $announcement->slug) }}" class="btn btn-outline-dark-green rounded-pill btn-sm px-4 fw-semibold tracking-wide">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center py-5 bg-white rounded-4 shadow-sm">
                    <p class="text-muted mb-0">Tidak ada rilis pengumuman resmi yang ditemukan.</p>
                </div>
            @endif
        </div>

        {{-- ═══════════════════════════════════════════════
             PAGINATION NAVIGATION
             ════════════════════════════════════════════════ --}}
        @if(isset($announcements) && $announcements->hasPages())
            <nav class="mt-5">
                <ul class="pagination justify-content-center custom-announcement-pagination">
                    {{-- Previous Page Link --}}
                    @if ($announcements->onFirstPage())
                        <li class="page-item disabled"><span class="page-link"><i class="bi bi-chevron-left"></i></span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $announcements->previousPageUrl() }}"><i class="bi bi-chevron-left"></i></a></li>
                    @endif

                    {{-- Urutan Halaman --}}
                    @foreach ($announcements->getUrlRange(1, $announcements->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $announcements->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($announcements->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $announcements->nextPageUrl() }}"><i class="bi bi-chevron-right"></i></a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link"><i class="bi bi-chevron-right"></i></span></li>
                    @endif
                </ul>
            </nav>
        @endif

    </div>
</section>

<!-- ==========================================================================
     STYLE CSS (INTEGRATED PREMIUM LOOK UNTUK HALAMAN PENGUMUMAN)
     ========================================================================== -->
<style>
/* Utilities & Colors */
.text-dark-green { color: #0b5345 !important; }
.text-gold-style { color: #cca43b !important; }
.bg-premium-light { background-color: #f4f7f6; }
.text-justify { text-align: justify; }

/* Hero Section Style */
.pengumuman-hero {
    background: linear-gradient(rgba(11, 83, 69, 0.95), rgba(0, 0, 0, 0.85)),
                url('https://images.unsplash.com/photo-1577563908411-5077b6dc7624?q=80&w=1200&auto=format&fit=crop') no-repeat center center;
    background-size: cover;
    height: 35vh;
    min-height: 280px;
}
.pengumuman-divider {
    width: 60px;
    height: 4px;
    background-color: #cca43b;
    margin-top: 15px;
    border-radius: 2px;
}

/* Custom Search Input */
.announcement-search .form-control:focus {
    box-shadow: none;
}

/* Button Filter Category Style */
.btn-filter-announcement {
    background-color: #ffffff;
    color: #0b5345;
    border: 1px solid rgba(11, 83, 69, 0.12);
    font-size: 0.78rem;
    letter-spacing: 0.5px;
    transition: all 0.2s ease;
}
.btn-filter-announcement:hover,
.btn-filter-announcement.active {
    background-color: #0b5345;
    border-color: #0b5345;
    color: #ffffff;
}

/* Announcement Strip Card Layout Mechanics */
.announcement-strip {
    border: 1px solid rgba(0, 0, 0, 0.03);
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
}
.announcement-strip:hover {
    transform: translateX(4px);
    box-shadow: 0 8px 20px rgba(11, 83, 69, 0.05) !important;
}

/* Accent Borders */
.border-start-danger { border-left: 5px solid #dc3545; }
.border-start-gold { border-left: 5px solid #cca43b; }
.border-start-green { border-left: 5px solid #0b5345; }

/* Date Box Structural Grid */
.announcement-date-box {
    background-color: #f8faf9;
    min-width: 85px;
    padding: 10px;
    border-radius: 12px;
    border: 1px solid #eef2f0;
}
.announcement-date-box .day-num {
    font-size: 1.8rem;
    line-height: 1.1;
}
.announcement-date-box .month-text {
    font-size: 0.82rem;
    letter-spacing: 0.5px;
}
.announcement-date-box .year-text {
    font-size: 0.78rem;
}

/* Custom Badge Colors */
.bg-danger-light { background-color: rgba(220, 53, 69, 0.08); }
.bg-gold-light { background-color: rgba(204, 164, 59, 0.12); }
.bg-green-light { background-color: rgba(11, 83, 69, 0.08); }

.announcement-title {
    font-size: 1.15rem;
    line-height: 1.4;
    letter-spacing: -0.2px;
}

/* Action Button Outlined */
.btn-outline-dark-green {
    border-color: #0b5345;
    color: #0b5345;
    font-size: 0.82rem;
    background: transparent;
    transition: all 0.2s ease;
}
.btn-outline-dark-green:hover {
    background-color: #0b5345;
    color: #ffffff;
}

/* Custom Announcement Pagination */
.custom-announcement-pagination .page-link {
    color: #0b5345;
    border-color: #dee2e6;
    padding: 8px 14px;
    font-weight: 600;
}
.custom-announcement-pagination .page-item.active .page-link {
    background-color: #0b5345;
    border-color: #0b5345;
    color: #ffffff;
}
.custom-announcement-pagination .page-link:hover {
    background-color: rgba(11, 83, 69, 0.05);
}
</style>
@endsection
