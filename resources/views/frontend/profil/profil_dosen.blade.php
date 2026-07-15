@extends('frontend.layouts.app')

@section('title', 'Profil Dosen - Prodi Hukum Keluarga Islam')

@section('content')
<section class="dosen-hero d-flex align-items-center">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Pakar & Akademisi</h5>
        <h1 class="display-4 fw-bold text-uppercase">Profil Dosen</h1>
        <div class="dosen-divider mx-auto"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-4">
        <div class="text-center max-w-md mx-auto mb-5">
            <h2 class="fw-bold text-dark-green text-uppercase tracking-wide">Dewan Pengajar HKI</h2>
            <p class="text-muted">Didukung oleh tenaga pendidik profesional, kompeten, dan berintegritas tinggi di bidangnya.</p>
        </div>

        <div class="row g-4 justify-content-center">
            @if(isset($lecturers) && $lecturers->count() > 0)
                @foreach($lecturers as $lecturer)
                <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                    <div class="dosen-card shadow-sm">
                        <div class="dosen-img-box">
                            <img src="{{ $lecturer->photo ? asset('storage/' . $lecturer->photo) : 'https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=400&auto=format&fit=crop' }}"
                                 alt="{{ $lecturer->name }}"
                                 class="dosen-img">

                            @if($lecturer->position)
                                <div class="dosen-overlay-badge">{{ $lecturer->position }}</div>
                            @endif
                        </div>

                        <div class="dosen-info text-center">
                            <h5 class="dosen-name">{{ $lecturer->name }}</h5>

                            {{-- Menggunakan kolom education/bio sebagai penanda fokus bidang keahlian --}}
                            <span class="dosen-expert">{{ $lecturer->education ?? 'Dosen Tetap' }}</span>

                            @if($lecturer->nidn)
                                <p class="dosen-nidn text-muted mb-3">NUPTK. {{ $lecturer->nidn }}</p>
                            @else
                                <p class="dosen-nidn text-muted mb-3">-</p>
                            @endif

                            {{-- Tautan media sosial/akademik --}}
                            {{-- <div class="dosen-socials d-flex justify-content-center gap-2">
                                <a href="#" class="btn-social google-scholar" title="Google Scholar">
                                    <i class="bi bi-mortarboard-fill"></i>
                                </a>
                                <a href="#" class="btn-social sinta" title="SINTA ID">S</a>
                                <a href="#" class="btn-social email" title="Email">
                                    <i class="bi bi-envelope-fill"></i>
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <p class="text-muted py-4">Data dewan pengajar belum tersedia.</p>
                </div>
            @endif
        </div>
    </div>
</section>

<style>
/* Utilities */
.text-dark-green { color: #0b5345 !important; }
.text-gold { color: #cca43b !important; }
.bg-premium-light { background-color: #f4f7f6; }
.max-w-md { max-width: 550px; }

/* Hero Section Style */
.dosen-hero {
    background: linear-gradient(rgba(11, 83, 69, 0.9), rgba(0, 0, 0, 0.8)),
                url('https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=1200&auto=format&fit=crop') no-repeat center center;
    background-size: cover;
    height: 35vh;
    min-height: 280px;
}
.dosen-divider {
    width: 60px;
    height: 4px;
    background-color: #cca43b;
    margin-top: 15px;
    border-radius: 2px;
}

/* Dosen Premium Card Styling */
.dosen-card {
    background: #ffffff;
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid rgba(11, 83, 69, 0.05);
    transition: transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1), box-shadow 0.4s ease;
}

.dosen-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 35px rgba(11, 83, 69, 0.1) !important;
}

/* Image Mechanics */
.dosen-img-box {
    width: 100%;
    height: 260px;
    position: relative;
    overflow: hidden;
    background-color: #f0f0f0;
}

.dosen-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: top center;
    transition: transform 0.5s ease;
}

.dosen-card:hover .dosen-img {
    transform: scale(1.06);
}

/* Overlay Status Badge */
.dosen-overlay-badge {
    position: absolute;
    bottom: 12px;
    left: 12px;
    background-color: #0b5345;
    color: #cca43b;
    font-size: 0.75rem;
    font-weight: 700;
    padding: 4px 12px;
    border-radius: 20px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border: 1px solid rgba(204, 164, 59, 0.3);
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
}

/* Detail Profil Teks */
.dosen-info {
    padding: 20px 15px;
}

.dosen-name {
    font-size: 1.05rem;
    font-weight: 700;
    color: #1a1a1a;
    line-height: 1.3;
    margin-bottom: 6px;
    height: 42px; /* Menjaga tinggi teks nama tetap sejajar */
    display: flex;
    align-items: center;
    justify-content: center;
}

.dosen-expert {
    display: inline-block;
    font-size: 0.8rem;
    color: #0b5345;
    font-weight: 600;
    background-color: rgba(11, 83, 69, 0.06);
    padding: 2px 10px;
    border-radius: 4px;
    margin-bottom: 4px;
}

.dosen-nidn {
    font-size: 0.78rem;
    letter-spacing: 0.5px;
}

/* Social & Link Badges */
.btn-social {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.85rem;
    text-decoration: none;
    font-weight: 700;
    transition: all 0.3s ease;
}

.google-scholar {
    background-color: rgba(66, 133, 244, 0.1);
    color: #4285f4;
}
.google-scholar:hover {
    background-color: #4285f4;
    color: #ffffff;
}

.sinta {
    background-color: rgba(244, 180, 0, 0.1);
    color: #b38f32;
    font-family: 'Georgia', serif;
}
.sinta:hover {
    background-color: #cca43b;
    color: #ffffff;
}

.email {
    background-color: rgba(11, 83, 69, 0.1);
    color: #0b5345;
}
.email:hover {
    background-color: #0b5345;
    color: #ffffff;
}
</style>
@endsection
