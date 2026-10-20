@extends('frontend.layouts.app')

@section('title', 'Berita')

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
                {{-- Pola Grid --}}
                <rect width="100%" height="100%" fill="url(#grid)" />
                {{-- Pola Titik-Titik di Sisi Kanan Atas --}}
                <rect x="70%" y="10%" width="300" height="150" fill="url(#dots)" />
            </svg>
        </div>

        {{-- Lingkaran Abstrak Glow di Latar Belakang --}}
        <div class="position-absolute rounded-circle" style="width: 300px; height: 300px; background: rgba(14, 165, 233, 0.2); filter: blur(80px); top: -50px; left: -50px; z-index: 0;"></div>
        <div class="position-absolute rounded-circle" style="width: 250px; height: 250px; background: rgba(99, 102, 241, 0.15); filter: blur(70px); bottom: -50px; right: 10%; z-index: 0;"></div>

        {{-- Konten Utama (Dinaikkan Z-Index-nya agar di atas pola) --}}
        <div class="container text-center py-4 position-relative" style="max-width: 900px; z-index: 2;">
            <span class="badge bg-info-subtle text-info px-3 py-2 rounded-pill transform text-uppercase fw-bold mb-3" style="letter-spacing: 1px; font-size: 0.75rem;">
                Ruang Informasi
            </span>
            <h3 class="text-white display-4 fw-bold mb-3" style="font-family: 'Poppins', sans-serif;">Berita Kampus</h3>
            <p class="fs-5 text-muted mb-4" style="color: #94a3b8 !important;">Informasi resmi dan seputar kegiatan terbaru di lingkungan civitas akademika</p>

            <ol class="breadcrumb justify-content-center mb-0 bg-transparent p-0">
                <li class="breadcrumb-item"><a href="/" class="text-info text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white-50">Berita</li>
            </ol>
        </div>
    </div>
    <div class="container-fluid causes py-5 bg-light">
        <div class="container py-4">

            <div class="row g-4">
                @foreach($news as $item)
                    <div class="col-lg-6 col-xl-4">
                        <div class="causes-item card h-100 border-0 shadow-sm" style="border-radius: 12px; overflow: hidden;">

                            {{-- THUMBNAIL BERITA --}}
                            <div class="causes-img position-relative overflow-hidden">
                                @if($item->thumbnail)
                                    <img src="{{ asset('storage/'.$item->thumbnail) }}" class="img-fluid w-100" alt="{{ $item->title }}" style="height: 240px; object-fit: cover;" onerror="this.onerror=null;this.src='{{ asset('assets/img/blog-1.jpg') }}';">
                                @else
                                    <img src="{{ asset('assets/img/blog-1.jpg') }}" class="img-fluid w-100" alt="No Image" style="height: 240px; object-fit: cover;">
                                @endif

                                <div class="causes-link pb-2 px-3">
                                    <small class="text-white">
                                        <i class="fa fa-calendar-alt text-primary me-2"></i>{{ $item->created_at->format('d M Y') }}
                                    </small>
                                </div>
                            </div>

                            {{-- KONTEN CARD --}}
                            <div class="causes-content p-4 d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="mb-3 fw-bold text-dark" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; min-height: 48px; line-height: 1.5;">
                                        {{ $item->title }}
                                    </h5>

                                    <p class="mb-4 small text-muted" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.6;">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 120) }}
                                    </p>
                                </div>

                                <div class="mt-auto">
                                    <a class="btn-hover-bg btn btn-primary text-white py-2 px-3 w-100 text-center fw-medium" style="border-radius: 8px;" href="{{ route('news.show', $item->slug) }}">
                                        Baca Selengkapnya
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            {{-- PAGINATION --}}
            <div class="d-flex justify-content-center mt-5">
                {{ $news->links() }}
            </div>

        </div>
    </div>
    @endsection
