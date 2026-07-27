@extends('frontend.layouts.app')

@section('title', $program->name . ' - ' . ($setting->site_name ?? 'Website Kampus'))

@section('content')

{{-- =========================
    THEME VARIABLES & UTILITY STYLES
========================= --}}
<style>
    :root{
        --color-primary: #0a6666;
        --color-primary-dark: #053b3b;
        --color-primary-darker: #043d3d;
        --color-accent: #b88d21;
        --color-accent-light: #e0b13c;

        /* Background section palette */
        --bg-soft-teal:   #f0f7f7;
        --bg-soft-gold:   #fdf8ef;
        --bg-soft-slate:  #f4f6f8;
        --bg-soft-white:  #ffffff;
    }

    /* ===== Section spacing ===== */
    .section-py{ padding-top: 5rem; padding-bottom: 5rem; }
    @media (max-width: 767.98px){
        .section-py{ padding-top: 2.75rem; padding-bottom: 2.75rem; }
    }

    .section-eyebrow{
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: .78rem;
        display: block;
        margin-bottom: .5rem;
        color: var(--color-accent);
    }

    .section-title{
        font-weight: 800;
        color: var(--color-primary);
        font-size: clamp(1.5rem, 1.1rem + 1.6vw, 2.5rem);
        line-height: 1.25;
    }

    .section-divider{
        width: 50px;
        height: 3px;
        margin: 1rem auto;
        background: var(--color-accent);
    }
    .section-divider.align-start{ margin-left: 0; }

    .section-lead{
        color: #6c757d;
        font-size: .95rem;
    }

    .section-header{
        max-width: 640px;
    }

    /* ===== Cards & hover ===== */
    .card-hover{
        transition: transform .25s ease, box-shadow .25s ease;
    }
    .card-hover:hover{
        transform: translateY(-6px);
        box-shadow: 0 1rem 2rem rgba(0,0,0,.08) !important;
    }
    @media (max-width: 767.98px){
        .card-hover:hover{ transform: none; }
        .card-hover:active{ transform: scale(.99); }
    }

    .text-zoom-wrap{ overflow: hidden; }
    .text-zoom-wrap img{ transition: transform .4s ease; }
    .text-zoom-wrap:hover img{ transform: scale(1.06); }

    /* ===== Buttons ===== */
    .btn-brand{
        background-color: var(--color-primary);
        border-color: var(--color-primary);
        color: #fff;
        font-weight: 600;
        transition: filter .2s ease;
    }
    .btn-brand:hover{ filter: brightness(1.08); color: #fff; }

    .btn-outline-brand{
        color: var(--color-primary);
        border-color: var(--color-primary);
        font-weight: 600;
        background: transparent;
        transition: background-color .2s ease, color .2s ease;
    }
    .btn-outline-brand:hover{ background-color: var(--color-primary); color: #fff; }

    .btn-gold{
        background: linear-gradient(135deg, var(--color-accent-light) 0%, var(--color-accent) 100%);
        border: none;
        color: #fff;
        font-weight: 700;
        transition: filter .2s ease;
    }
    .btn-gold:hover{ filter: brightness(1.05); color: #fff; }

    @media (max-width: 575.98px){
        .btn-stack-mobile{ width: 100%; }
    }

    /* ===== Badges ===== */
    .badge-soft-gold{
        background-color: rgba(184, 141, 33, .08);
        color: var(--color-accent);
        border: 1px solid rgba(184, 141, 33, .25);
        font-weight: 600;
    }
    .badge-brand{
        background-color: var(--color-primary);
        color: #fff;
        font-weight: 600;
    }

    .icon-circle{
        width: 100px;
        height: 100px;
        background: #fff;
        border: 1px solid rgba(224, 177, 60, .15);
    }

    /* ===== CTA sections ===== */
    .cta-section{
        background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-darker) 100%);
    }

    /* ===== Text clamp helpers ===== */
    .line-clamp-2{
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .line-clamp-3{
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* ==============================================
       HERO BANNER — overlay diperterang
    =============================================== */
    .prodi-carousel-container {
        position: relative;
        width: 100%;
        overflow: hidden;
    }
    .prodi-hero-item {
        height: 75vh;
        min-height: 550px;
        background-size: cover;
        background-position: center;
        position: relative;
        display: flex;
        align-items: center;
    }

    /* Hapus overlay background gelap pada hero slideshow */
    .prodi-hero-item::before {
        content: '';
        display: none;
    }

    @media (max-width: 767.98px) {
        .prodi-hero-item {
            height: 60vh;
            min-height: 400px;
        }
        .prodi-hero-item::before {
            display: none;
        }
    }

    /* ==============================================
       SECTION BACKGROUNDS — supaya tidak kaku
    =============================================== */

    /* Tentang Prodi & Visi Misi */
    .section-profil {
        background: var(--bg-soft-teal);
        /* aksen garis tipis atas dari warna emas */
        border-top: 3px solid rgba(184,141,33,.18);
    }
    /* dekorasi blob lembut di belakang kolom kiri */
    .section-profil .profil-blob {
        position: relative;
    }
    .section-profil .profil-blob::before {
        content: '';
        position: absolute;
        top: -40px; left: -40px;
        width: 220px; height: 220px;
        background: radial-gradient(circle, rgba(10,102,102,.07) 0%, transparent 70%);
        border-radius: 50%;
        pointer-events: none;
        z-index: 0;
    }

    /* Berita & Artikel */
    .section-news {
        background: linear-gradient(160deg, #f7fbfb 0%, var(--bg-soft-gold) 100%);
        border-top: 1px solid rgba(10,102,102,.08);
        border-bottom: 1px solid rgba(10,102,102,.08);
    }

    /* Pengumuman */
    .section-announcement {
        background: var(--bg-soft-slate);
        position: relative;
        overflow: hidden;
    }
    /* garis dekorasi diagonal di pojok kanan atas */
    .section-announcement::after {
        content: '';
        position: absolute;
        top: -60px; right: -60px;
        width: 240px; height: 240px;
        background: radial-gradient(circle, rgba(184,141,33,.08) 0%, transparent 65%);
        border-radius: 50%;
        pointer-events: none;
    }

    /* Dosen */
    .section-dosen {
        background: linear-gradient(180deg, #ffffff 0%, var(--bg-soft-teal) 100%);
        border-top: 1px solid rgba(10,102,102,.1);
    }

    /* Galeri */
    .section-galeri {
        background: var(--bg-soft-gold);
        border-top: 1px solid rgba(184,141,33,.12);
        border-bottom: 1px solid rgba(184,141,33,.12);
    }

    /* ===== News Card Specific ===== */
    .news-card{
        background: #fff;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 .25rem .75rem rgba(0,0,0,.06);
        transition: transform .25s ease, box-shadow .25s ease;
        height: 100%;
    }
    .news-card:hover{
        transform: translateY(-6px);
        box-shadow: 0 1rem 2rem rgba(0,0,0,.10);
    }
    .news-thumb{
        position: relative;
        height: 180px;
        overflow: hidden;
    }
    .news-thumb img{
        width: 100%; height: 100%; object-fit: cover;
        transition: transform .5s ease;
    }
    .news-card:hover .news-thumb img{ transform: scale(1.08); }
    .news-body{ padding: 1.25rem; display: flex; flex-direction: column; flex: 1; }
    .news-readmore{ margin-top: auto; display: inline-flex; align-items: center; gap: .4rem; font-size: .85rem; font-weight: 700; color: var(--color-primary); text-decoration: none; }
</style>

{{-- =========================
    HERO BANNER PRODI (SLIDER MURNI DARI DATABASE BANNER)
========================= --}}
<div id="heroProdiCarousel" class="carousel slide prodi-carousel-container carousel-fade" data-bs-ride="carousel">

    {{-- Indicators --}}
    @if($banners->count() > 1)
        <div class="carousel-indicators" style="z-index: 3;">
            @foreach($banners as $index => $b)
                <button type="button" data-bs-target="#heroProdiCarousel" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}"></button>
            @endforeach
        </div>
    @endif

    <div class="carousel-inner">
        @if($banners->count() > 0)
            @foreach($banners as $index => $banner)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}" data-bs-interval="5000">
                    <div class="prodi-hero-item" style="background-image: url('{{ asset('storage/'.$banner->image) }}');">
                        <div class="container position-relative text-white" style="z-index: 2; padding-top: 4rem; padding-bottom: 4rem;">
                            <div class="row">
                                <div class="col-lg-8 text-center text-md-start">
                                    <h1 class="display-4 fw-extrabold text-capitalize mb-3">
                                        {{ $banner->title }}
                                    </h1>
                                    <p class="lead opacity-75 mb-4 fs-6">
                                        {{ $banner->description }}
                                    </p>
                                    @if($banner->button_link)
                                        <a class="btn btn-gold py-3 px-4 rounded-pill" href="{{ $banner->button_link }}">
                                            {{ $banner->button_text ?? 'Informasi Pendaftaran' }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="carousel-item active">
                <div class="prodi-hero-item" style="background-image: url('{{ asset('storage/banners/otoYXSrIydgSL8DpfylH0mSQJD7CGa5MsaMOuPpK.png') }}');">
                    <div class="container position-relative text-white" style="z-index: 2;">
                        <div class="row">
                            <div class="col-lg-8 text-center text-md-start">
                                <h1 class="display-4 fw-extrabold text-capitalize mb-3">{{ $program->name }}</h1>
                                <p class="lead opacity-75 mb-4 fs-6">Selamat datang di halaman resmi program studi.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    @if($banners->count() > 1)
        <button class="carousel-control-prev" type="button" data-bs-target="#heroProdiCarousel" data-bs-slide="prev" style="z-index: 3;">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroProdiCarousel" data-bs-slide="next" style="z-index: 3;">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    @endif
</div>

{{-- =========================
    TENTANG PRODI & VISI MISI
    Background: soft teal — nuansa warna brand, terasa segar
========================= --}}
<section class="section-py section-profil">
    <div class="container">
        <div class="row g-4 g-lg-5 align-items-center">
            <div class="col-lg-6 profil-blob">
                <span class="section-eyebrow">PROFIL PRODI</span>
                <h2 class="section-title mb-3">Mengenal Lebih Dekat</h2>
                <div class="section-divider align-start"></div>
                <div class="text-muted lh-lg mb-4" style="text-align: justify;">
                    {!! $program->description !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white"
                     style="border-top: 4px solid var(--color-accent) !important;">
                    <h4 class="fw-bold text-dark mb-3"><i class="bi bi-eye-fill me-2 text-muted"></i> Visi</h4>
                    <p class="text-muted mb-4">{{ $program->vision ?? 'Menjadi Program Studi Unggul dan Berdaya Saing Global.' }}</p>

                    <hr class="my-4 opacity-50">

                    <h4 class="fw-bold text-dark mb-3"><i class="bi bi-bullseye me-2 text-muted"></i> Misi</h4>
                    <div class="text-muted">
                        {!! $program->mission ?? 'Misi belum ditambahkan oleh administrator.' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- =========================
    BERITA & ARTIKEL TERBARU PRODI
    Background: gradient teal → gold — hangat & informatif
========================= --}}
<section class="section-py section-news">
    <div class="container">
        <div class="text-center mx-auto mb-4 mb-md-5 section-header">
            <span class="section-eyebrow">WARTA PRODI</span>
            <h2 class="section-title">Berita & Kegiatan Terbaru</h2>
         

        @if($news && $news->count() > 0)
            <div class="row g-3 g-md-4">
                @foreach($news as $item)
                    <div class="col-sm-6 col-lg-4">
                        <div class="news-card d-flex flex-column h-100">
                            <div class="news-thumb text-zoom-wrap position-relative" style="height: 200px; overflow: hidden;">
                                <span class="badge position-absolute top-0 start-0 m-3 badge-brand rounded-pill px-2 py-1 small" style="z-index:2;">Info Prodi</span>
                                @if($item->thumbnail)
                                    <img src="{{ asset('storage/'.$item->thumbnail) }}" alt="{{ $item->title }}" class="w-100 h-100 object-fit-cover">
                                @else
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-secondary bg-opacity-10 text-muted">
                                        <i class="bi bi-image fs-2 text-muted"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="news-body p-3 d-flex flex-column flex-grow-1">
                                <span class="text-muted small mb-2 d-block">
                                    <i class="bi bi-calendar3 me-1"></i> {{ $item->created_at->format('d M Y') }}
                                </span>
                                <h5 class="news-title line-clamp-2 fw-bold" style="font-size:1.05rem; color: var(--color-primary);">
                                    {{ $item->title }}
                                </h5>
                                <p class="news-excerpt line-clamp-3 text-muted small lh-base">
                                    {{ Str::limit(strip_tags($item->content), 100) }}
                                </p>
                                <a href="{{ route('news.show', $item->slug) }}" class="news-readmore mt-auto text-decoration-none pt-2">
                                    Baca Selengkapnya <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center p-5 bg-white rounded-4 shadow-sm">
                <i class="bi bi-newspaper display-4 text-muted"></i>
                <p class="text-muted mt-3 mb-0">Belum ada berita terbaru untuk Program Studi ini.</p>
            </div>
        @endif
    </div>
</section>

{{-- =========================
    PENGUMUMAN GLOBAL (KAMPUS)
    Background: soft slate — netral, beda dari sekitarnya
========================= --}}
<section class="section-py section-announcement">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 mb-md-5 gap-3">
            <div>
                <span class="section-eyebrow">PENGUMUMAN RESMI</span>
                <h2 class="section-title mb-0">Agenda & Pengumuman Kampus</h2>
            </div>
            <a href="{{ route('announcements.index') }}" class="btn btn-outline-brand px-4 py-2 rounded-pill btn-stack-mobile">
                Semua Pengumuman <i class="bi bi-megaphone ms-1"></i>
            </a>
        </div>

        <div class="row g-3 g-md-4">
            @foreach($announcements as $announcement)
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm h-100 rounded-4 card-hover bg-white"
                         style="border-left: 4px solid var(--color-accent) !important;">
                        <div class="card-body p-3 p-md-4 d-flex flex-column justify-content-between">
                            <div>
                                <div class="text-muted small mb-2 d-flex align-items-center" style="font-size: 12px;">
                                    <i class="bi bi-clock me-2" style="color: var(--color-accent);"></i> {{ $announcement->publish_date ?? $announcement->created_at->format('d M Y') }}
                                </div>
                                <h6 class="fw-bold mb-2 fs-5 lh-sm" style="color: var(--color-primary);">{{ Str::limit($announcement->title, 70) }}</h6>
                                <p class="text-muted small lh-base mb-4">
                                    {{ Str::limit(strip_tags($announcement->excerpt ?? $announcement->content), 110) }}
                                </p>
                            </div>
                            <div>
                                <a href="{{ route('announcements.show', $announcement->slug) }}" class="btn btn-gold w-100 rounded-pill px-3 py-2" style="font-size: 13px;">
                                    Lihat Detail Pengumuman
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- =========================
    DOSEN / TENAGA PENDIDIK PRODI
    Background: white → teal gradient — elegan, transisi halus
========================= --}}
<section class="section-py section-dosen">
    <div class="container">
        <div class="text-center mx-auto mb-4 mb-md-5 section-header">
            <span class="section-eyebrow">STAF PENGAJAR</span>
            <h2 class="section-title">Dosen Pembimbing & Pengajar</h2>
            <div class="section-divider"></div>
            <p class="section-lead">Didukung oleh tenaga pendidik profesional, ahli di bidangnya, dan berkomitmen penuh bagi kesuksesan mahasiswa</p>
        </div>

        @if($program->lecturers->count())
            <div class="row g-3 g-md-4 justify-content-center">
                @foreach($program->lecturers as $lecturer)
                    <div class="col-6 col-sm-4 col-lg-3">
                        <div class="card border-0 shadow-sm rounded-4 text-center overflow-hidden card-hover h-100 bg-white">
                            <div class="text-zoom-wrap bg-secondary bg-opacity-10" style="height: 240px;">
                                @if($lecturer->photo)
                                    <img src="{{ asset('storage/'.$lecturer->photo) }}" alt="{{ $lecturer->name }}" class="w-100 h-100 object-fit-cover">
                                @else
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center text-muted">
                                        <i class="bi bi-person-bounding-box display-4"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body p-3">
                                <h6 class="fw-bold mb-1 text-dark line-clamp-2" style="font-size: 0.95rem;">{{ $lecturer->name }}</h6>
                                <small class="text-muted d-block mb-2">{{ $lecturer->nidn ?? 'NIDN Belum Terdaftar' }}</small>
                                <span class="badge badge-soft-gold rounded-pill px-2 py-1 small">{{ $lecturer->specialization ?? 'Dosen Tetap' }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center p-4">
                <p class="text-muted">Data dosen pengajar belum diinputkan.</p>
            </div>
        @endif
    </div>
</section>

{{-- =========================
    GALERI DOKUMENTASI PRODI
    Background: soft gold — hangat, cocok untuk konten visual/foto
========================= --}}
<section class="section-py section-galeri">
    <div class="container">
        <div class="text-center mx-auto mb-4 mb-md-5 section-header">
            <span class="section-eyebrow">DOKUMENTASI</span>
            <h2 class="section-title">Galeri Aktivitas Mahasiswa</h2>
            <div class="section-divider"></div>
            <p class="section-lead">Potret serunya laboratorium, praktikum lapangan, dan dokumentasi kegiatan mahasiswa prodi</p>
        </div>

        @if($program->galleries->count())
            <div class="row g-2 g-md-3">
                @foreach($program->galleries as $gallery)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="card border-0 rounded-4 overflow-hidden shadow-sm text-zoom-wrap bg-dark" style="height: 180px;">
                            <img src="{{ asset('storage/'.$gallery->image) }}" alt="Gallery Prodi" class="w-100 h-100 object-fit-cover opacity-85">
                            <div class="position-absolute bottom-0 start-0 w-100 p-2 p-md-3 bg-gradient bg-dark bg-opacity-50 text-white">
                                <p class="small mb-0 text-truncate fw-semibold">{{ $gallery->title }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center p-4">
                <p class="text-muted">Belum ada dokumentasi foto.</p>
            </div>
        @endif
    </div>
</section>

{{-- =========================
    CTA PMB FOOTER
========================= --}}
<section class="section-py text-white text-center position-relative overflow-hidden cta-section">
    <div class="container position-relative" style="z-index: 2;">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <span class="badge bg-white bg-opacity-10 text-uppercase px-3 py-2 rounded-pill small mb-3 border border-white border-opacity-20"
                      style="letter-spacing: 2px; color: var(--color-accent-light);">
                    Penerimaan Mahasiswa Baru {{ date('Y') }}
                </span>
                <h2 class="fw-extrabold mb-3 text-white" style="font-size: clamp(1.6rem, 1.1rem + 2vw, 2.75rem);">
                    Mari Bergabung Bersama <br><span style="color: var(--color-accent-light);">{{ $program->name }}</span>
                </h2>
                <p class="lead mx-auto mb-4 fs-6 opacity-75 px-md-5">
                    Rancang masa depan cemerlang dengan pendidikan berkualitas tinggi, fasilitas mutakhir, serta jaringan alumni yang luas.
                </p>
                <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                    <a href="#" class="btn btn-gold px-5 py-3 rounded-pill shadow btn-stack-mobile">
                        Daftar Online Sekarang <i class="bi bi-rocket-takeoff-fill ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
