@extends('frontend.layouts.app')

@section('title', 'Program Studi ' . $data['name'] . ' - INDAFA Bondowoso')

@section('content')

{{-- =========================
    THEME VARIABLES & UTILITY STYLES
========================= --}}
<style>
    :root{
        --color-primary: {{ $data['color'] }};
        --color-primary-dark: color-mix(in srgb, {{ $data['color'] }} 80%, #000);
        --color-accent: #b88d21;
        --color-accent-light: #e0b13c;

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
        position: relative;
        background: linear-gradient(135deg, #e0b13c 0%, #b88d21 50%, #946f14 100%);
        background-size: 200% 200%;
        border: none;
        color: #ffffff !important;
        font-weight: 700;
        letter-spacing: 0.5px;
        line-height: 1.4;
        box-shadow: 0 8px 24px rgba(184, 141, 33, 0.35);
        overflow: hidden;
        z-index: 1;
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        vertical-align: middle;
    }

    .btn-gold-animated {
        animation: btnPulseGlow 3s infinite alternate cubic-bezier(0.4, 0, 0.2, 1);
    }

    .btn-gold::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.35), transparent);
        transition: left 0.65s ease;
        z-index: 2;
        pointer-events: none;
    }

    .btn-gold:hover::before {
        left: 100%;
    }

    .btn-gold:hover {
        background-position: 100% 0%;
        transform: translateY(-4px) scale(1.02);
        box-shadow: 0 14px 32px rgba(184, 141, 33, 0.55), 0 0 15px rgba(224, 177, 60, 0.4);
        color: #ffffff !important;
    }

    .btn-gold:active {
        transform: translateY(-1px) scale(0.99);
        box-shadow: 0 6px 18px rgba(184, 141, 33, 0.4);
    }

    .btn-icon-rocket {
        display: inline-block;
        transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
        font-size: 1.15rem;
    }

    .btn-gold:hover .btn-icon-rocket {
        transform: translate(5px, -5px) rotate(12deg) scale(1.15);
    }

    @keyframes btnPulseGlow {
        0% {
            box-shadow: 0 6px 20px rgba(184, 141, 33, 0.35);
        }
        50% {
            box-shadow: 0 10px 28px rgba(224, 177, 60, 0.55), 0 0 18px rgba(224, 177, 60, 0.3);
        }
        100% {
            box-shadow: 0 6px 20px rgba(184, 141, 33, 0.35);
        }
    }

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

    /* ===== CTA sections ===== */
    .cta-section{
        background: {{ $data['bg_gradient'] }};
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
       HERO BANNER
    =============================================== */
    .prodi-carousel-container {
        position: relative;
        width: 100%;
        overflow: hidden;
    }
    .prodi-hero-item {
        height: 100vh;
        min-height: 600px;
        background-size: cover;
        background-position: center;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .prodi-hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: #fff;
        padding: 0 1.5rem;
        animation: heroFadeIn 1s ease both;
    }
    .prodi-hero-content .hero-eyebrow {
        font-size: .85rem;
        font-weight: 700;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: var(--color-accent-light, #e0b13c);
        display: block;
        margin-bottom: .75rem;
        opacity: .9;
    }
    .prodi-hero-content h1 {
        font-size: clamp(2.2rem, 4vw + 1rem, 4.5rem);
        font-weight: 900;
        line-height: 1.1;
        text-shadow: 0 4px 24px rgba(0,0,0,.45);
        margin-bottom: 1.25rem;
    }
    .prodi-hero-content p {
        font-size: clamp(1rem, 1.5vw + .5rem, 1.3rem);
        opacity: .88;
        max-width: 640px;
        margin: 0 auto 2rem;
        text-shadow: 0 2px 8px rgba(0,0,0,.35);
    }
    @keyframes heroFadeIn {
        from { opacity: 0; transform: translateY(28px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* --- Scroll Down Arrow (sama seperti Home) --- */
    .scroll-down-arrow {
        position: absolute;
        bottom: 28px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 20;
        color: #ffffff;
        font-size: 1.4rem;
        width: 46px;
        height: 46px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.35);
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.3s ease;
        animation: bounceDown 2.2s infinite ease-in-out;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }
    .scroll-down-arrow:hover {
        color: #FFC107;
        background: rgba(255, 255, 255, 0.28);
        border-color: #FFC107;
        transform: translateX(-50%) scale(1.12);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
    }
    @keyframes bounceDown {
        0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
        40%  { transform: translateX(-50%) translateY(12px); }
        60%  { transform: translateX(-50%) translateY(6px); }
    }

    @media (max-width: 767.98px) {
        .prodi-hero-item {
            height: 100svh;
            min-height: 500px;
        }
        .prodi-hero-content h1 {
            font-size: clamp(1.8rem, 8vw, 2.8rem);
        }
    }

    /* ==============================================
       SECTION BACKGROUNDS
    =============================================== */
    .section-profil {
        background: var(--bg-soft-teal);
        border-top: 3px solid rgba(184,141,33,.18);
    }
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

    .section-news {
        background: linear-gradient(160deg, #f7fbfb 0%, var(--bg-soft-gold) 100%);
        border-top: 1px solid rgba(10,102,102,.08);
        border-bottom: 1px solid rgba(10,102,102,.08);
    }

    .section-dosen {
        background: linear-gradient(180deg, #ffffff 0%, var(--bg-soft-teal) 100%);
        border-top: 1px solid rgba(10,102,102,.1);
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

    /* ===== Kaprodi Card ===== */
    .kaprodi-card-img-wrap {
        position: relative;
        aspect-ratio: 3 / 4.2;
        max-height: 460px;
        width: 100%;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 16px 36px rgba(0,0,0,.12);
        border: 1px solid rgba(0, 0, 0, 0.08);
        background-color: #f8f9fa;
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    .kaprodi-card-img-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top center;
        transition: transform 0.5s ease;
    }
    .kaprodi-card-img-wrap:hover img {
        transform: scale(1.04);
    }
</style>

{{-- =========================
    HERO BANNER PRODI
========================= --}}
<div id="heroProdiCarousel" class="carousel slide prodi-carousel-container carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="5000">
            <div class="prodi-hero-item" style="background-image: url('{{ asset('storage/banners/otoYXSrIydgSL8DpfylH0mSQJD7CGa5MsaMOuPpK.png') }}");">
            </div>
        </div>
    </div>

    {{-- Scroll-down arrow (same style as Home) --}}
    <a class="scroll-down-arrow" href="#tentang" onclick="smoothTo(event, '#tentang')" aria-label="Scroll ke bawah">
        <i class="bi bi-chevron-down"></i>
    </a>
</div>

<script>
    function smoothTo(e, selector) {
        e.preventDefault();
        var target = document.querySelector(selector);
        if (target) {
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }
</script>

{{-- =========================
    SAMBUTAN KAPRODI & PROFIL PRODI
========================= --}}
<section class="section-py section-profil" id="tentang">
    <div class="container">
        <div class="row g-4 g-lg-5 align-items-start">

            {{-- Foto Kaprodi --}}
            <div class="col-lg-4 col-10 col-sm-8 col-md-5 mx-auto mx-lg-0">
                <div class="text-center pt-lg-2">
                    <div class="kaprodi-card-img-wrap mb-3">
                        <img src="{{ asset('storage/lecturers/4aGdYumJLv1zF9gkf8FmB8eIrFFvVW5m276855wf.png') }}"
                             alt="{{ $data['head'] }}"
                             loading="lazy">
                    </div>
                    <h5 class="fw-bold mb-1" style="color:var(--color-primary);">{{ $data['head'] }}</h5>
                    <p class="text-muted small fw-semibold text-uppercase mb-0" style="letter-spacing:1px;">
                        Ketua Program Studi
                    </p>
                </div>
            </div>

            {{-- Deskripsi & Visi Misi --}}
            <div class="col-lg-8">
                <span class="section-eyebrow">PROFIL PRODI</span>
                <h2 class="section-title mb-2">Mengenal Prodi {{ Str::title(trim(str_replace(['(S1)', '(s1)', 'Prodi', 'prodi'], '', $data['name']))) }} (S1)</h2>
                <div class="section-divider align-start"></div>

                <blockquote class="p-4 rounded-4 bg-white border-start border-4 mb-4 shadow-sm" style="border-color: var(--color-primary) !important; line-height:1.8;">
                    <i class="bi bi-quote fs-2 me-1 opacity-75" style="color: var(--color-accent); vertical-align: -0.15em;"></i>
                    <span class="fst-italic fw-medium text-dark">
                        "Komitmen utama kami adalah mendidik dan mendampingi mahasiswa agar menjadi sarjana yang unggul, berakhlakul karimah, serta siap berkontribusi nyata bagi nusa, bangsa, dan agama."
                    </span>
                </blockquote>

                <p class="text-muted lh-lg mb-4" style="text-align: justify;">
                    {{ $data['sejarah'] }}
                </p>
            </div>
        </div>
    </div>
</section>

{{-- =========================
    BERITA & KEGIATAN TERBARU PRODI
========================= --}}
<section class="section-py section-news">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 mb-md-5 gap-3">
            <div class="text-center text-md-start">
                <span class="section-eyebrow">WARTA PRODI</span>
                <h2 class="section-title">Berita &amp; Kegiatan Terbaru</h2>
                <div class="section-divider align-start"></div>
                <p class="section-lead">Ikuti perkembangan, capaian prestasi, serta agenda akademik di Program Studi {{ $data['name'] }}</p>
            </div>
            <a href="{{ route('frontend.prodi.berita', $data['id']) }}" class="btn btn-outline-brand px-4 py-2 rounded-pill btn-stack-mobile flex-shrink-0">
                Semua Berita <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>

        @if(isset($news) && count($news) > 0)
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
                                    <i class="bi bi-calendar3 me-1"></i> {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}
                                </span>
                                <h5 class="news-title line-clamp-2 fw-bold" style="font-size:1.05rem; color: var(--color-primary);">
                                    {{ $item->title }}
                                </h5>
                                <p class="news-excerpt line-clamp-3 text-muted small lh-base">
                                    {{ Str::limit(strip_tags($item->content), 100) }}
                                </p>
                                <a href="{{ url('berita/'.$item->slug) }}" class="news-readmore mt-auto text-decoration-none pt-2">
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
    DOSEN / TENAGA PENDIDIK PRODI
========================= --}}
<section class="section-py section-dosen">
    <div class="container">
        <div class="text-center mx-auto mb-4 mb-md-5 section-header">
            <span class="section-eyebrow">STAF PENGAJAR</span>
            <h2 class="section-title">Dosen Pembimbing &amp; Pengajar</h2>
            <div class="section-divider"></div>
            <p class="section-lead">Didukung oleh tenaga pendidik profesional, ahli di bidangnya, dan berkomitmen penuh bagi kesuksesan mahasiswa</p>
        </div>

        <div class="text-center p-4">
            <p class="text-muted">Data dosen pengajar dapat dilihat di halaman pimpinan.</p>
            <a href="{{ route('frontend.prodi.pimpinan', $data['id']) }}" class="btn btn-outline-brand rounded-pill px-4">
                Lihat Pimpinan &amp; Dosen <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
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
                <h2 class="fw-bold mb-3 text-white" style="font-size: clamp(1.6rem, 1.1rem + 2vw, 2.75rem);">
                    Mari Bergabung Bersama <br><span style="color: var(--color-accent-light);">{{ $data['name'] }}</span>
                </h2>
                <p class="lead mx-auto mb-4 fs-6 opacity-75 px-md-5">
                    Rancang masa depan cemerlang dengan pendidikan berkualitas tinggi, nilai-nilai kepesantrenan, serta jaringan alumni yang luas.
                </p>
                <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-3">
                    <a href="#" class="btn btn-gold btn-gold-animated px-5 py-3 rounded-pill shadow btn-stack-mobile">
                        <span>Daftar Online Sekarang</span>
                        <i class="bi bi-rocket-takeoff-fill ms-2 btn-icon-rocket"></i>
                    </a>
                    <a href="{{ route('frontend.prodi.kontak', $data['id']) }}" class="btn btn-outline-light px-5 py-3 rounded-pill btn-stack-mobile d-inline-flex align-items-center justify-content-center">
                        <span>Hubungi Kami</span>
                        <i class="bi bi-chat-dots ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
