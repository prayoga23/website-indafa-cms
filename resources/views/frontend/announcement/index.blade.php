@extends('frontend.layouts.app')

@section('title', 'Pengumuman')

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
                    <pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse">
                        <circle cx="2" cy="2" r="1" fill="rgba(255, 255, 255, 0.2)" />
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
                <rect x="70%" y="10%" width="300" height="150" fill="url(#dots)" />
            </svg>
        </div>

        {{-- Lingkaran Glow --}}
        <div class="position-absolute rounded-circle" style="width: 300px; height: 300px; background: rgba(14, 165, 233, 0.2); filter: blur(80px); top: -50px; left: -50px; z-index: 0;"></div>

        {{-- Konten Utama Header --}}
        <div class="container text-center py-4 position-relative" style="max-width: 900px; z-index: 2;">
            <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill text-uppercase fw-bold mb-3" style="letter-spacing: 1px; font-size: 0.75rem;">
                Papan Informasi
            </span>
            <h3 class="text-white display-4 fw-bold mb-3" style="font-family: 'Poppins', sans-serif;">Pengumuman Kampus</h3>
            <p class="fs-5 text-muted mb-4" style="color: #94a3b8 !important;">Informasi resmi, agenda akademik, dan maklumat penting civitas akademika</p>

            <ol class="breadcrumb justify-content-center mb-0 bg-transparent p-0">
                <li class="breadcrumb-item"><a href="/" class="text-info text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white-50">Pengumuman</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid py-5 bg-light">
        <div class="container py-4">

            <div class="row">
                <div class="col-lg-10 mx-auto">

                    @foreach($announcements as $item)
                        {{-- ITEM LIST PENGUMUMAN --}}
                        <div class="card border-0 shadow-sm p-4 mb-3" style="border-radius: 12px; transition: transform 0.2s ease, box-shadow 0.2s ease;">
                            <div class="row align-items-center g-3">

                                {{-- KOLOM TANGGAL (Desain Lencana yang Jelas) --}}
                                <div class="col-md-3 col-lg-2">
                                    <div class="bg-primary-subtle text-primary text-center py-2 px-3 rounded-3 fw-semibold small">
                                        <i class="far fa-calendar-alt me-2"></i>{{ $item->created_at->format('d M Y') }}
                                    </div>
                                </div>

                                {{-- KOLOM JUDUL PENGUMUMAN --}}
                                <div class="col-md-6 col-lg-8">
                                    <h5 class="mb-0 fw-bold">
                                        <a href="{{ route('announcements.show', $item->slug) }}" class="text-dark text-decoration-none d-block lh-base" style="transition: color 0.2s;">
                                            {{ $item->title }}
                                        </a>
                                    </h5>
                                </div>

                                {{-- KOLOM TOMBOL DETAIL --}}
                                <div class="col-md-3 col-lg-2 text-md-end">
                                    <a href="{{ route('announcements.show', $item->slug) }}"
                                       class="btn-hover-bg btn btn-primary text-white py-2 px-4 w-100 text-center fw-medium"
                                       style="border-radius: 8px; font-size: 0.9rem;">
                                        Detail <i class="fas fa-arrow-right ms-1" style="font-size: 0.8rem;"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    @endforeach

                    {{-- PAGINATION --}}
                    <div class="d-flex justify-content-center mt-5">
                        {{ $announcements->links() }}
                    </div>

                </div>
            </div>

        </div>
    </div>
    @endsection
