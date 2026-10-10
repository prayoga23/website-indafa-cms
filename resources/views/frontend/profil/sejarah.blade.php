@extends('frontend.layouts.app')

@section('title', 'Sejarah - Prodi Hukum Keluarga Islam')

@section('content')
<style>
    /* ==========================================================================
   6. GAYA HALAMAN SEJARAH
   ========================================================================== */
.text-dark-green {
    color: #0b5345 !important;
}

.text-gold {
    color: #cca43b !important;
}

/* Hero Section Sejarah */
.history-hero {
    background: linear-gradient(rgba(11, 83, 69, 0.85), rgba(0, 0, 0, 0.75)),
                url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1200&auto=format&fit=crop') no-repeat center center;
    background-size: cover;
    height: 40vh;
    min-height: 300px;
}

.history-divider {
    width: 80px;
    height: 4px;
    background-color: #cca43b;
    margin-top: 15px;
    border-radius: 2px;
}

/* Image Wrapper Decorator */
.history-img-wrapper img {
    transition: transform 0.5s ease;
}
.history-img-wrapper:hover img {
    transform: scale(1.05);
}

/* TIMELINE ARCHITECTURE */
.timeline-container {
    max-width: 850px;
    padding: 20px 0;
}

.timeline-line {
    position: absolute;
    left: 50%;
    top: 0;
    bottom: 0;
    width: 3px;
    background-color: #cca43b;
    transform: translateX(-50%);
    z-index: 1;
}

.timeline-item {
    width: 50%;
    padding-right: 40px;
    text-align: right;
}

/* Mengatur posisi kolom ganjil-genap timeline */
.timeline-item.inverted {
    margin-left: auto;
    padding-right: 0;
    padding-left: 40px;
    text-align: left;
}

.timeline-badge {
    position: absolute;
    right: -10px;
    top: 26px;
    width: 20px;
    height: 20px;
    background-color: #0b5345;
    border: 4px solid #cca43b;
    border-radius: 50%;
    z-index: 2;
    transition: all 0.3s ease;
}

.timeline-item.inverted .timeline-badge {
    left: -10px;
    right: auto;
}

.timeline-card {
    border-top: 4px solid #0b5345;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.timeline-item.inverted .timeline-card {
    border-top: 4px solid #cca43b;
}

.timeline-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.08) !important;
}

/* RESPONSIF MOBILE UTK TIMELINE */
@media (max-width: 767.98px) {
    .timeline-line {
        left: 20px;
    }

    .timeline-item {
        width: 100% !important;
        padding-left: 45px !important;
        padding-right: 0 !important;
        text-align: left !important;
    }

    .timeline-badge {
        left: 10px !important;
        right: auto !important;
    }

    .timeline-card {
        border-top: 4px solid #0b5345 !important;
    }
}
</style>
<section class="history-hero d-flex align-items-center">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Mengenal Lebih Dekat</h5>
        <h1 class="display-4 fw-bold text-uppercase">Sejarah Prodi</h1>
        <div class="history-divider mx-auto"></div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">

        {{-- ═══════════════════════════════════════════════
             LATAR BELAKANG PENDIRIAN (Dinamis - HistoryInfo)
             ════════════════════════════════════════════════ --}}
        @if(isset($historyInfo))
        <div class="row g-4 align-items-center mb-5">
            <div class="col-lg-6">
                <div class="pe-lg-4">
                    <h2 class="fw-bold text-dark-green mb-3">
                        {{ $historyInfo->title ?? 'Latar Belakang Pendirian' }}
                    </h2>
                    @if($historyInfo->text_1)
                    <p class="text-muted leading-relaxed">
                        {{ $historyInfo->text_1 }}
                    </p>
                    @endif
                    @if($historyInfo->text_2)
                    <p class="text-muted leading-relaxed">
                        {{ $historyInfo->text_2 }}
                    </p>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative overflow-hidden rounded-4 shadow-md history-img-wrapper">
                    <img src="{{ $historyInfo->image ? asset('storage/' . $historyInfo->image) : 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=800&auto=format&fit=crop' }}"
                         class="img-fluid w-60"
                         alt="{{ $historyInfo->title ?? 'Foto Kampus' }}">
                    <div class="img-accent-border"></div>
                </div>
            </div>
        </div>
        @else
        <div class="text-center py-4">
            <p class="text-muted">Data latar belakang sejarah belum tersedia.</p>
        </div>
        @endif

        <hr class="my-5 opacity-25">

        {{-- ═══════════════════════════════════════════════
             MILESTONE & TIMELINE (Dinamis - HistoryTimeline)
             ════════════════════════════════════════════════ --}}
        {{-- <div class="row">
            <div class="col-100 text-center mb-5">
                <h2 class="fw-bold text-dark-green">Milestone & Perkembangan</h2>
                <p class="text-muted">Perjalanan panjang Program Studi menuju keunggulan akademik.</p>
            </div>
        </div> --}}

        {{-- <div class="timeline-container position-relative mx-auto">
            <div class="timeline-line"></div>

            @if(isset($timelines) && $timelines->count() > 0)
                @foreach($timelines as $timeline)
                <div class="timeline-item position-relative mb-5 {{ $loop->even ? 'inverted' : '' }}">
                    <div class="timeline-badge"></div>
                    <div class="timeline-card p-4 bg-white rounded-3 shadow-sm">
                        <span class="badge {{ $loop->odd ? 'bg-gold' : 'bg-dark-green' }} text-white mb-2 px-3 py-2 rounded-pill fw-bold">
                            {{ $timeline->year }}
                        </span>
                        <h4 class="fw-bold text-dark-green">{{ $timeline->title }}</h4>
                        <p class="text-muted mb-0 small">
                            {{ $timeline->description }}
                        </p>
                    </div>
                </div>
                @endforeach
            @else
                <div class="text-center">
                    <p class="text-muted">Belum ada data lini masa perjalanan prodi.</p>
                </div>
            @endif

        </div> --}}
    </div>
</section>
@endsection
