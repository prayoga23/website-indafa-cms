@extends('frontend.layouts.app')

@section('title', $announcement->title)

@section('content')

    <div class="container-fluid position-relative py-5 overflow-hidden"
         style="background-color: #0f172a; background-image: radial-gradient(at 0% 0%, rgba(30, 41, 59, 0.8) 0, transparent 50%), radial-gradient(at 50% 0%, rgba(14, 165, 233, 0.15) 0, transparent 50%), radial-gradient(at 100% 0%, rgba(99, 102, 241, 0.15) 0, transparent 50%); border-bottom: 1px solid rgba(255, 255, 255, 0.05);">

        {{-- Elemen Ornamen Geometris Transparan (SVG Tersemat) --}}
        <div class="position-absolute top-0 start-0 w-100 h-100 opacity-25 pointer-events-none" style="z-index: 1;">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%">
                <defs>
                    <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M 40 0 L 0 0 0 40" fill="none" stroke="rgba(255, 255, 255, 0.15)" stroke-width="1"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>

        {{-- Lingkaran Glow --}}
        <div class="position-absolute rounded-circle" style="width: 300px; height: 300px; background: rgba(14, 165, 233, 0.2); filter: blur(80px); top: -50px; left: -50px; z-index: 0;"></div>

        {{-- Konten Utama Header --}}
        <div class="container text-center py-4 position-relative" style="max-width: 900px; z-index: 2;">
            <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill text-uppercase fw-bold mb-3" style="letter-spacing: 1px; font-size: 0.75rem;">
                <i class="fas fa-check-circle me-1"></i> Pengumuman Resmi
            </span>
            <h1 class="text-white display-5 fw-bold mb-3" style="font-family: 'Poppins', sans-serif; line-height: 1.3;">
                {{ $announcement->title }}
            </h1>

            <ol class="breadcrumb justify-content-center mb-0 bg-transparent p-0">
                <li class="breadcrumb-item"><a href="/" class="text-info text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('announcements.index') }}" class="text-info text-decoration-none">Pengumuman</a></li>
                <li class="breadcrumb-item active text-white-50">Detail</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid py-5 bg-light">
        <div class="container py-2">
            <div class="row g-4">

                {{-- DETAIL PENGUMUMAN (Kiri) --}}
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm" style="border-radius: 12px; overflow: hidden;">
                        <div class="card-body p-4 p-md-5">

                            {{-- Metadata Informasi Atas --}}
                            <div class="d-flex align-items-center flex-wrap gap-2 mb-4 text-muted small">
                                <span class="badge bg-primary px-2 py-1">Active</span>
                                <span>
                                    <i class="far fa-calendar-alt me-1"></i> Dipublikasikan: <strong>{{ $announcement->created_at->format('d F Y') }}</strong>
                                </span>
                            </div>

                            <hr class="mb-4" style="opacity: 0.1;">

                            {{-- Isi Teks Isi Pengumuman --}}
                            <div class="announcement-body text-dark lh-lg fs-5">
                                {!! $announcement->content !!}
                            </div>

                            {{-- Jika Ada Lampiran Berkas PDF/File --}}
                            @if($announcement->file)
                                <div class="mt-5 p-4 rounded-3 bg-danger-subtle border border-danger-subtle d-sm-flex align-items-center justify-content-between gap-3">
                                    <div class="mb-3 mb-sm-0">
                                        <h6 class="text-danger fw-bold mb-1"><i class="fas fa-file-pdf me-2"></i>Dokumen Lampiran Tersedia</h6>
                                        <small class="text-muted">Silakan unduh dokumen pendukung resmi melalui tombol di samping.</small>
                                    </div>
                                    <a href="{{ asset('storage/'.$announcement->file) }}"
                                       target="_blank"
                                       class="btn btn-danger px-4 py-2 fw-medium flex-shrink-0"
                                       style="border-radius: 8px;">
                                        <i class="fas fa-download me-2"></i> Unduh Lampiran
                                    </a>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>

                {{-- SIDEBAR PENGUMUMAN TERBARU (Kanan) --}}
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm sticky-top" style="border-radius: 12px; overflow: hidden; top: 20px;">
                        <div class="card-header bg-primary text-white py-3 border-0">
                            <h5 class="mb-0 text-white fw-bold"><i class="fas fa-bullhorn me-2"></i>Terbaru Lainnya</h5>
                        </div>
                        <div class="card-body p-4">
                            @foreach($latestAnnouncements as $item)
                                <div class="mb-3 pb-3 border-bottom last-border-0">
                                    <a href="{{ route('announcements.show', $item->slug) }}" class="text-dark d-block fw-semibold text-decoration-none hover-primary lh-base mb-1" style="transition: color 0.2s;">
                                        {{ $item->title }}
                                    </a>
                                    <small class="text-muted d-block small">
                                        <i class="far fa-calendar me-1"></i> {{ $item->created_at->format('d M Y') }}
                                    </small>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endsection
