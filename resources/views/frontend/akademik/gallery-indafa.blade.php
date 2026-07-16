@extends('frontend.layouts.app')

@section('title', 'Gallery INDAFA | INDAFA Bondowoso')

@section('content')
<!-- Hero Section -->
<section class="page-hero" style="background: linear-gradient(rgba(11, 83, 69, 0.85), rgba(0, 0, 0, 0.75)), url('{{ (isset($page) && $page->featured_image) ? asset('storage/' . $page->featured_image) : asset('assets/img/carousel-3.jpg') }}') no-repeat center center; background-size: cover;">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Dokumentasi</h5>
        <h1 class="display-4 fw-bold text-uppercase">{{ isset($page) ? $page->title : 'Gallery INDAFA' }}</h1>
        <div class="page-hero-divider mx-auto"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-3">
        <div class="text-center mb-5">
            <span class="page-section-eyebrow">Dokumentasi Visual</span>
            <h2 class="page-section-title">Galeri Kegiatan Kampus</h2>
            <div class="page-section-divider mx-auto mt-2"></div>
        </div>

        @if(isset($page) && trim(strip_tags($page->content)) != '')
            <div class="info-card p-4 mb-5 border-0 shadow-sm bg-white rounded-4 text-secondary" style="line-height:1.8;">
                {!! $page->content !!}
            </div>
        @endif

        <div class="page-gallery-grid">
            <div class="page-gallery-item">
                <img src="{{ asset('assets/img/gallery-1.jpg') }}" alt="Gedung Kampus" loading="lazy">
                <div class="gallery-hover"><i class="bi bi-zoom-in"></i></div>
            </div>
            <div class="page-gallery-item">
                <img src="{{ asset('assets/img/gallery-2.jpg') }}" alt="Kegiatan Akademik" loading="lazy">
                <div class="gallery-hover"><i class="bi bi-zoom-in"></i></div>
            </div>
            <div class="page-gallery-item">
                <img src="{{ asset('assets/img/gallery-3.jpg') }}" alt="Prosesi Wisuda" loading="lazy">
                <div class="gallery-hover"><i class="bi bi-zoom-in"></i></div>
            </div>
            <div class="page-gallery-item">
                <img src="{{ asset('assets/img/gallery-4.jpg') }}" alt="Mahasiswa Baru" loading="lazy">
                <div class="gallery-hover"><i class="bi bi-zoom-in"></i></div>
            </div>
            <div class="page-gallery-item">
                <img src="{{ asset('assets/img/gallery-5.jpg') }}" alt="Seminar Nasional" loading="lazy">
                <div class="gallery-hover"><i class="bi bi-zoom-in"></i></div>
            </div>
            <div class="page-gallery-item">
                <img src="{{ asset('assets/img/carousel-3.jpg') }}" alt="Fasilitas Kampus" loading="lazy">
                <div class="gallery-hover"><i class="bi bi-zoom-in"></i></div>
            </div>
        </div>
    </div>
</section>
@endsection
