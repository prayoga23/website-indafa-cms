@extends('frontend.layouts.app')

@section('title', 'Galeri Foto - Prodi Hukum Keluarga Islam')

@section('content')
<section class="galeri-hero d-flex align-items-center">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Dokumentasi Visual</h5>
        <h1 class="display-4 fw-bold text-uppercase">Galeri Kegiatan</h1>
        <div class="galeri-divider mx-auto"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-2">

        {{-- ═══════════════════════════════════════════════
             NAVIGASI FILTER KATEGORI (URL PARAMETER BASED)
             ════════════════════════════════════════════════ --}}
        <div class="row mb-5">
            <div class="col-12">
                <ul class="nav nav-pills justify-content-center custom-galeri-pills gap-2 flex-wrap">
                    <li class="nav-item">
                        <a href="{{ route('frontend.galeri.foto', ['category' => 'all']) }}"
                           class="nav-link rounded-pill px-4 py-2 text-uppercase fw-bold small {{ $currentCategory == 'all' ? 'active' : '' }}">
                           Semua Foto
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="{{ route('frontend.galeri.foto', ['category' => 'Praktik Peradilan']) }}"
                           class="nav-link rounded-pill px-4 py-2 text-uppercase fw-bold small {{ $currentCategory == 'Praktik Peradilan' ? 'active' : '' }}">
                           Praktik Peradilan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('frontend.galeri.foto', ['category' => 'Seminar & Workshop']) }}"
                           class="nav-link rounded-pill px-4 py-2 text-uppercase fw-bold small {{ $currentCategory == 'Seminar & Workshop' ? 'active' : '' }}">
                           Seminar & Workshop
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('frontend.galeri.foto', ['category' => 'Aktivitas Mahasiswa']) }}"
                           class="nav-link rounded-pill px-4 py-2 text-uppercase fw-bold small {{ $currentCategory == 'Aktivitas Mahasiswa' ? 'active' : '' }}">
                           Aktivitas Mahasiswa
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>

        {{-- ═══════════════════════════════════════════════
             GRID FOTO DINAMIS
             ════════════════════════════════════════════════ --}}
        <div class="row g-4">
            @if(isset($photos) && $photos->count() > 0)
                @foreach($photos as $photo)
                    @php
                        // Menentukan variasi warna badge berdasarkan string nama kategori
                        $categoryClean = Str::lower($photo->category);
                        $badgeClass = 'bg-green-light text-dark-green';

                        if (Str::contains($categoryClean, 'seminar') || Str::contains($categoryClean, 'workshop')) {
                            $badgeClass = 'bg-gold-light text-gold-style';
                        }

                        // Konfigurasi path gambar dari storage lokal ataupun URL eksternal
                        $imageUrl = (Str::startsWith($photo->image_path, ['http://', 'https://']))
                                    ? $photo->image_path
                                    : asset('storage/' . $photo->image_path);
                    @endphp

                    <div class="col-sm-6 col-md-4">
                        <div class="gallery-item bg-white rounded-4 overflow-hidden shadow-sm h-100">
                            <div class="gallery-img-box position-relative">
                                <img src="{{ $imageUrl }}" alt="{{ $photo->title }}" class="img-fluid w-100" style="height: 240px; object-fit: cover;">
                                <div class="gallery-overlay d-flex align-items-center justify-content-center">
                                    <a href="{{ $imageUrl }}" class="btn-view-photo rounded-circle" target="_blank" data-lightbox="gallery" data-title="{{ $photo->title }}">
                                        <i class="bi bi-fullscreen text-dark-green fs-5"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="p-3 border-top-0">
                                <span class="badge {{ $badgeClass }} mb-2 font-monospace px-2 py-1 text-uppercase fw-bold small">
                                    {{ $photo->category }}
                                </span>
                                <h6 class="fw-bold text-dark-green mb-1 text-truncate" title="{{ $photo->title }}">
                                    {{ $photo->title }}
                                </h6>
                                <span class="text-muted small">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ \Carbon\Carbon::parse($photo->activity_date)->translatedFormat('F Y') }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center py-5 bg-white rounded-4 shadow-sm">
                    <p class="text-muted mb-0">Belum ada dokumentasi foto untuk kategori ini.</p>
                </div>
            @endif
        </div>

        {{-- ═══════════════════════════════════════════════
             PAGINATION NAVIGATION
             ════════════════════════════════════════════════ --}}
        @if(isset($photos) && $photos->hasPages())
            <nav class="mt-5">
                <ul class="pagination justify-content-center custom-gallery-pagination">
                    {{-- Previous Page Link --}}
                    @if ($photos->onFirstPage())
                        <li class="page-item disabled"><span class="page-link"><i class="bi bi-chevron-left"></i></span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $photos->previousPageUrl() }}"><i class="bi bi-chevron-left"></i></a></li>
                    @endif

                    {{-- Loop Halaman --}}
                    @foreach ($photos->getUrlRange(1, $photos->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $photos->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($photos->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $photos->nextPageUrl() }}"><i class="bi bi-chevron-right"></i></a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link"><i class="bi bi-chevron-right"></i></span></li>
                    @endif
                </ul>
            </nav>
        @endif

    </div>
</section>

<!-- ==========================================================================
     STYLE CSS (INTEGRATED PREMIUM LOOK UNTUK HALAMAN GALERI FOTO)
     ========================================================================== -->
<style>
/* Utilities & Colors */
.text-dark-green { color: #0b5345 !important; }
.text-gold-style { color: #b38f32 !important; }
.bg-premium-light { background-color: #f4f7f6; }

/* Hero Section Style */
.galeri-hero {
    background: linear-gradient(rgba(11, 83, 69, 0.95), rgba(0, 0, 0, 0.85)),
                url('https://images.unsplash.com/photo-1492691527719-9d1e07e534b4?q=80&w=1200&auto=format&fit=crop') no-repeat center center;
    background-size: cover;
    height: 35vh;
    min-height: 280px;
}
.galeri-divider {
    width: 60px;
    height: 4px;
    background-color: #cca43b;
    margin-top: 15px;
    border-radius: 2px;
}

/* Custom Pills Filter */
.custom-galeri-pills .nav-link {
    background-color: #ffffff;
    color: #0b5345;
    border: 1px solid rgba(11, 83, 69, 0.15);
    font-size: 0.82rem;
    letter-spacing: 0.3px;
    transition: all 0.2s ease;
}
.custom-galeri-pills .nav-link:hover,
.custom-galeri-pills .nav-link.active {
    background-color: #0b5345 !important;
    border-color: #0b5345 !important;
    color: #ffffff !important;
}

/* Gallery Item Card Structure */
.gallery-item {
    border: 1px solid rgba(11, 83, 69, 0.04);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.gallery-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(11, 83, 69, 0.07) !important;
}

/* Image Hover & Overlay Effects */
.gallery-img-box {
    height: 240px;
    overflow: hidden;
}
.gallery-img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}
.gallery-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(11, 83, 69, 0.75);
    opacity: 0;
    transition: opacity 0.3s ease;
}
.gallery-item:hover .gallery-img-box img {
    transform: scale(1.08);
}
.gallery-item:hover .gallery-overlay {
    opacity: 1;
}

/* Glassmorphism View Button */
.btn-view-photo {
    width: 48px;
    height: 48px;
    background-color: #ffffff;
    border: none;
    display: d-flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    transform: translateY(15px);
    transition: transform 0.3s ease;
    text-decoration: none;
}
.gallery-item:hover .btn-view-photo {
    transform: translateY(0);
}
.btn-view-photo:hover {
    background-color: #cca43b;
}
.btn-view-photo:hover i {
    color: #ffffff !important;
}

/* Light Badges Background */
.bg-gold-light { background-color: rgba(204, 164, 59, 0.12); }
.bg-green-light { background-color: rgba(11, 83, 69, 0.08); }

/* Pagination Styling */
.custom-gallery-pagination .page-link {
    color: #0b5345;
    border-color: #dee2e6;
    padding: 8px 14px;
    font-weight: 600;
}
.custom-gallery-pagination .page-item.active .page-link {
    background-color: #0b5345;
    border-color: #0b5345;
    color: #ffffff;
}
.custom-gallery-pagination .page-link:hover {
    background-color: rgba(11, 83, 69, 0.05);
}
</style>
@endsection
