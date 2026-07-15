@extends('frontend.layouts.app')

@section('title', 'Visi Misi & Tujuan - Prodi Hukum Keluarga Islam')

@section('content')
<style>
    /* ==========================================================================
   7. GAYA HALAMAN VISI MISI & TUJUAN (PREMIUM STYLE)
   ========================================================================== */
.bg-light-smooth {
    background-color: #f8faf9;
}

/* Hero Section Visi Misi */
.visimisi-hero {
    background: linear-gradient(rgba(11, 83, 69, 0.88), rgba(0, 0, 0, 0.75)),
                url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=1200&auto=format&fit=crop') no-repeat center center;
    background-size: cover;
    height: 40vh;
    min-height: 300px;
}

.visimisi-divider {
    width: 80px;
    height: 4px;
    background-color: #cca43b;
    margin-top: 15px;
    border-radius: 2px;
}

/* Visi Card Premium Styling */
.visi-box {
    border: 1px solid rgba(11, 83, 69, 0.08);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03) !important;
}

.visi-accent-line {
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 150px;
    height: 4px;
    background: linear-gradient(to right, #0b5345, #cca43b);
}

.italic-quote {
    font-style: italic;
    font-size: 1.5rem;
    color: #1a1a1a !important;
    font-family: 'Georgia', serif;
}

/* Icon / Box Decorator */
.icon-shape {
    width: 60px;
    height: 60px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.bg-dark-green-smooth {
    background-color: rgba(11, 83, 69, 0.1);
}

.bg-gold-smooth {
    background-color: rgba(204, 164, 59, 0.12);
}

/* Misi & Tujuan List Item Mechanics */
.misi-tujuan-card {
    border-bottom: 4px solid #0b5345;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.misi-tujuan-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.06) !important;
}

/* Desain Penomoran List Bergaya Premium */
.list-number {
    background-color: #0b5345;
    color: #ffffff;
    font-weight: 700;
    font-size: 0.85rem;
    min-width: 26px;
    height: 26px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 2px;
}

.list-number-gold {
    background-color: #cca43b;
    color: #ffffff;
    font-size: 0.9rem;
    min-width: 26px;
    height: 26px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 2px;
}

/* ==========================================================================
   RESPONSIF MOBILE (VISI MISI)
   ========================================================================== */
@media (max-width: 767.98px) {
    .italic-quote {
        font-size: 1.2rem;
    }

    .visi-box {
        padding: 2.5rem 1.5rem !important;
    }

    .misi-tujuan-card {
        padding: 2rem 1.5rem !important;
    }
}
</style>
<section class="visimisi-hero d-flex align-items-center">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Arah & Komitmen</h5>
        <h1 class="display-4 fw-bold text-uppercase">Visi, Misi & Tujuan</h1>
        <div class="visimisi-divider mx-auto"></div>
    </div>
</section>

<section class="py-5 bg-light-smooth">
    <div class="container py-4">

        {{-- ═══════════════════════════════════════════════
             VISI UTAMA (Dinamis - Vision)
             ════════════════════════════════════════════════ --}}
        <div class="row justify-content-center mb-5">
            <div class="col-lg-10">
                <div class="visi-box text-center p-5 bg-white rounded-4 shadow-sm position-relative overflow-hidden">
                    <div class="visi-accent-line"></div>
                    <span class="text-gold fw-bold text-uppercase tracking-widest d-block mb-2">Our Vision</span>
                    <h2 class="fw-bold text-dark-green mb-4">VISI</h2>
                    <h3 class="fw-medium text-dark leading-relaxed italic-quote">
                        "{{ $vision->vision_text ?? 'Visi belum dikonfigurasi.' }}"
                    </h3>
                </div>
            </div>
        </div>

        <div class="row g-4">
            {{-- ═══════════════════════════════════════════════
                 MISI PRODI (Dinamis - VisionMissionItem type: mission)
                 ════════════════════════════════════════════════ --}}
            <div class="col-lg-6">
                <div class="misi-tujuan-card p-4 p-md-5 bg-white rounded-4 shadow-sm h-100">
                    <div class="d-flex align-items-center mb-4">
                        <div class="icon-shape bg-dark-green-smooth text-dark-green me-3">
                            <i class="bi bi-rocket-takeoff fs-3"></i>
                        </div>
                        <div>
                            <span class="text-muted small text-uppercase tracking-wider d-block">Our Mission</span>
                            <h2 class="fw-bold text-dark-green mb-0">MISI</h2>
                        </div>
                    </div>

                    <ul class="list-unstyled custom-list">
                        @if(isset($missions) && $missions->count() > 0)
                            @foreach($missions as $mission)
                            <li class="d-flex align-items-start mb-3">
                                <span class="list-number me-3">{{ $loop->iteration }}</span>
                                <p class="text-muted mb-0">{{ $mission->content }}</p>
                            </li>
                            @endforeach
                        @else
                            <li class="text-muted text-center py-3">Data misi belum tersedia.</li>
                        @endif
                    </ul>
                </div>
            </div>

            {{-- ═══════════════════════════════════════════════
                 TUJUAN PRODI (Dinamis - VisionMissionItem type: objective)
                 ════════════════════════════════════════════════ --}}
            <div class="col-lg-6">
                <div class="misi-tujuan-card p-4 p-md-5 bg-white rounded-4 shadow-sm h-100">
                    <div class="d-flex align-items-center mb-4">
                        <div class="icon-shape bg-gold-smooth text-gold me-3">
                            <i class="bi bi-trophy fs-3"></i>
                        </div>
                        <div>
                            <span class="text-muted small text-uppercase tracking-wider d-block">Our Objectives</span>
                            <h2 class="fw-bold text-dark-green mb-0">TUJUAN</h2>
                        </div>
                    </div>

                    <ul class="list-unstyled custom-list">
                        @if(isset($objectives) && $objectives->count() > 0)
                            @foreach($objectives as $objective)
                            <li class="d-flex align-items-start mb-3">
                                <span class="list-number-gold me-3"><i class="bi bi-check2"></i></span>
                                <p class="text-muted mb-0">{{ $objective->content }}</p>
                            </li>
                            @endforeach
                        @else
                            <li class="text-muted text-center py-3">Data tujuan belum tersedia.</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
