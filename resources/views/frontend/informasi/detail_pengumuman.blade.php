@extends('frontend.layouts.app')

@section('title', $announcement->title)

@section('content')
<section class="bg-dark-green text-white py-5 mt-5">
    <div class="container text-center py-3">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider small mb-2">Detail Informasi</h5>
        <h1 class="fw-bold text-uppercase fs-2">Pengumuman Resmi</h1>
        <div class="berita-divider mx-auto bg-gold" style="width: 60px; height: 3px;"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container">
        <div class="row g-4">

            {{-- ═══════════════════════════════════════════════
                 KOLOM KIRI: KONTEN PENGUMUMAN
                 ════════════════════════════════════════════════ --}}
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">

                    <div class="d-flex align-items-center gap-3 text-muted small mb-3 flex-wrap border-bottom pb-3">
                        <span>
                            <i class="bi bi-calendar3 text-gold me-1"></i>
                            {{ \Carbon\Carbon::parse($announcement->publish_date)->translatedFormat('d F Y') }}
                        </span>
                        <span>
                            <i class="bi bi-eye text-gold me-1"></i>
                            {{ $announcement->views ?? 0 }} Kali Dilihat
                        </span>
                    </div>

                    <h2 class="fw-bold text-dark-green mb-4 lh-base">{{ $announcement->title }}</h2>

                    <div class="announcement-body text-secondary lh-lg text-justify position-relative">
                        {!! $announcement->content !!}
                    </div>

                    <div class="border-top mt-5 pt-4">
                        <a href="{{ route('frontend.informasi.pengumuman') }}" class="btn btn-outline-dark-green rounded-pill px-4 fw-semibold">
                            <i class="bi bi-arrow-left me-2"></i> Kembali ke Pengumuman
                        </a>
                    </div>

                </div>
            </div>

            {{-- ═══════════════════════════════════════════════
                 KOLOM KANAN: SIDEBAR PENGUMUMAN LAIN
                 ════════════════════════════════════════════════ --}}
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white sticky-top" style="top: 100px; z-index: 4;">
                    <h5 class="fw-bold text-dark-green mb-3 pb-2 border-bottom">
                        <i class="bi bi-info-circle text-gold me-2"></i>Rilis Terbaru
                    </h5>

                    @php
                        // Mengambil 4 pengumuman terbaru lainnya untuk diletakkan di sidebar
                        $latestAnnouncements = \App\Models\Announcement::where('status', 'published')
                                                ->where('id', '!=', $announcement->id)
                                                ->orderBy('publish_date', 'desc')
                                                ->take(4)
                                                ->get();
                    @endphp

                    <div class="d-flex flex-column gap-3">
                        @if($latestAnnouncements->count() > 0)
                            @foreach($latestAnnouncements as $latest)
                                <a href="{{ route('frontend.informasi.pengumuman.detail', $latest->slug) }}" class="text-decoration-none group-sidebar-item">
                                    <div class="p-2 rounded-3 hover-bg-light transition-all">
                                        <div class="text-muted small mb-1" style="font-size: 0.75rem;">
                                            <i class="bi bi-calendar3 text-gold me-1"></i>
                                            {{ \Carbon\Carbon::parse($latest->publish_date)->translatedFormat('d M Y') }}
                                        </div>
                                        <h6 class="fw-bold text-dark-green mb-0 small text-clamp-2 text-justify line-clamp">
                                            {{ $latest->title }}
                                        </h6>
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <p class="text-muted small mb-0">Tidak ada pengumuman terbaru lainnya.</p>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- Tambahan CSS Khusus agar layout text-justify rapi dan efek hover bekerja --}}
<style>
    .text-justify {
        text-align: justify;
    }
    .line-clamp {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .hover-bg-light:hover {
        background-color: #f8f9fa;
    }
    .transition-all {
        transition: all 0.2s ease-in-out;
    }
    .announcement-body img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 15px 0;
    }
</style>
@endsection
