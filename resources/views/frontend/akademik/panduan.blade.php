@extends('frontend.layouts.app')

@section('title', 'Panduan Akademik - Prodi Hukum Keluarga Islam')

@section('content')
<section class="panduan-hero d-flex align-items-center">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Pusat Informasi</h5>
        <h1 class="display-4 fw-bold text-uppercase">Panduan Akademik</h1>
        <div class="panduan-divider mx-auto"></div>
    </div>
</section>

<!-- Konten Utama Panduan Akademik -->
<section class="py-5 bg-premium-light">
    <div class="container py-4">

        {{-- ═══════════════════════════════════════════════
             SECTION 1: UNDUH BUKU PEDOMAN UTAMA
             ════════════════════════════════════════════════ --}}
        <div class="text-center max-w-md mx-auto mb-4">
            <h2 class="fw-bold text-dark-green text-uppercase tracking-wide">Buku Pedoman Utama</h2>
            <p class="text-muted">Akses cepat dokumen regulasi dan orientasi akademik resmi program studi.</p>
        </div>

        <div class="row g-4 mb-5 justify-content-center">
            @if(isset($guidebooks) && $guidebooks->count() > 0)
                @foreach($guidebooks as $book)
                    <div class="col-md-5">
                        <div class="book-card p-4 shadow-sm bg-white d-flex align-items-start gap-3 h-100">
                            {{-- Icon Wrapper Class & Icon Class Dinamis --}}
                            <div class="book-icon {{ $book->icon_wrapper_class ?? 'bg-light-green text-dark-green' }}">
                                <i class="{{ $book->icon_class ?? 'bi bi-book-half' }} fs-2"></i>
                            </div>
                            <div class="flex-grow-1 d-flex flex-column h-100">
                                <div>
                                    <span class="badge {{ $book->badge_class ?? 'bg-gold-badge' }} mb-2">
                                        {{ $book->badge_text }}
                                    </span>
                                    <h5 class="fw-bold text-dark mb-1">{{ $book->title }}</h5>
                                    <p class="text-muted small mb-3">{{ $book->description }}</p>
                                </div>
                                <div class="mt-auto">
                                    @if($book->file_path)
                                        <a href="{{ asset('storage/' . $book->file_path) }}" target="_blank" class="btn btn-outline-dark-green btn-sm rounded-pill px-3 fw-semibold">
                                            <i class="bi bi-download me-1"></i> Download PDF
                                        </a>
                                    @else
                                        <button class="btn btn-light btn-sm rounded-pill px-3 fw-semibold text-muted" disabled>
                                            <i class="bi bi-file-earmark-lock"></i> File Belum Tersedia
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-10 text-center py-4 bg-white rounded-4 shadow-sm">
                    <p class="text-muted mb-0">Dokumen buku pedoman belum diunggah.</p>
                </div>
            @endif
        </div>

        {{-- ═══════════════════════════════════════════════
             SECTION 2: ALUR PROSEDUR AKADEMIK (TIMELINE INTERAKTIF)
             ════════════════════════════════════════════════ --}}
        <div class="text-center max-w-md mx-auto mb-5 mt-5">
            <h2 class="fw-bold text-dark-green text-uppercase tracking-wide">Alur Prosedur Penting</h2>
            <p class="text-muted">Ikuti langkah sistematis berikut untuk kelancaran administrasi studi Anda.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">

                {{-- Nav Tabs Alur --}}
                <ul class="nav nav-pills justify-content-center custom-flow-pills mb-5 gap-2" id="flowTab" role="tablist">
                    @if(isset($procedures) && $procedures->count() > 0)
                        @foreach($procedures as $flowType => $steps)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{ $loop->first ? 'active' : '' }}"
                                        id="{{ $flowType }}-tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#flow-{{ $flowType }}"
                                        type="button"
                                        role="tab"
                                        aria-controls="flow-{{ $flowType }}"
                                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                    @if(Str::lower($flowType) == 'krs')
                                        <i class="bi bi-pencil-square me-2"></i>
                                    @else
                                        <i class="bi bi-file-earmark-text me-2"></i>
                                    @endif
                                    Alur {{ strtoupper($flowType) }}
                                </button>
                            </li>
                        @endforeach
                    @endif
                </ul>

                {{-- Tab Contents Alur --}}
                <div class="tab-content" id="flowTabContent">
                    @if(isset($procedures) && $procedures->count() > 0)
                        @foreach($procedures as $flowType => $steps)
                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                 id="flow-{{ $flowType }}"
                                 role="tabpanel"
                                 aria-labelledby="{{ $flowType }}-tab">

                                <div class="flow-timeline">
                                    @foreach($steps as $step)
                                        <div class="flow-step">
                                            <div class="flow-badge">{{ $step->step_number }}</div>
                                            <div class="flow-content shadow-sm bg-white p-4 rounded-4">
                                                <h5 class="fw-bold text-dark-green mb-2">{{ $step->title }}</h5>
                                                <p class="text-muted small mb-0">{{ $step->description }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        @endforeach
                    @else
                        <div class="text-center py-5 bg-white rounded-4 shadow-sm">
                            <p class="text-muted mb-0">Data alur prosedur akademik belum tersedia.</p>
                        </div>
                    @endif
                </div>

            </div>
        </div>

    </div>
</section>
<style>
/* Utilities */
.text-dark-green { color: #0b5345 !important; }
.text-gold { color: #cca43b !important; }
.bg-dark-green { background-color: #0b5345 !important; }
.bg-gold { background-color: #cca43b !important; }
.bg-premium-light { background-color: #f4f7f6; }
.max-w-md { max-width: 550px; }

/* Hero Section Style */
.panduan-hero {
    background: linear-gradient(rgba(11, 83, 69, 0.9), rgba(0, 0, 0, 0.8)),
                url('https://images.unsplash.com/photo-1434030216411-0b793f4b4173?q=80&w=1200&auto=format&fit=crop') no-repeat center center;
    background-size: cover;
    height: 35vh;
    min-height: 280px;
}
.panduan-divider {
    width: 60px;
    height: 4px;
    background-color: #cca43b;
    margin-top: 15px;
    border-radius: 2px;
}

/* Book Card Layout */
.book-card {
    border: 1px solid rgba(11, 83, 69, 0.05);
    border-radius: 16px;
    transition: transform 0.3s ease;
}
.book-card:hover {
    transform: translateY(-4px);
}
.book-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}
.bg-light-green { background-color: rgba(11, 83, 69, 0.08); }
.bg-light-gold { background-color: rgba(204, 164, 59, 0.1); }

.bg-gold-badge {
    background-color: #cca43b;
    color: #ffffff;
}

.btn-outline-dark-green {
    border-color: #0b5345;
    color: #0b5345;
    background: transparent;
    transition: all 0.3s ease;
}
.btn-outline-dark-green:hover {
    background-color: #0b5345;
    color: #ffffff;
}

/* Custom Pills untuk Alur */
.custom-flow-pills .nav-link {
    background-color: #ffffff;
    color: #0b5345;
    font-weight: 600;
    padding: 12px 24px;
    border-radius: 30px;
    border: 1px solid rgba(11, 83, 69, 0.1);
    box-shadow: 0 2px 5px rgba(0,0,0,0.02);
    transition: all 0.3s ease;
}
.custom-flow-pills .nav-link.active,
.custom-flow-pills .nav-link:hover {
    background-color: #0b5345 !important;
    color: #ffffff !important;
    border-color: #0b5345;
}

/* Timeline Vertical Flow Mechanics */
.flow-timeline {
    position: relative;
    padding-left: 50px;
}
.flow-timeline::before {
    content: '';
    position: absolute;
    top: 5px;
    left: 20px;
    bottom: 5px;
    width: 3px;
    background: linear-gradient(to bottom, #0b5345, #cca43b, #0b5345);
    border-radius: 2px;
}

.flow-step {
    position: relative;
    margin-bottom: 30px;
}
.flow-step:last-child {
    margin-bottom: 0;
}

.flow-badge {
    position: absolute;
    top: 15px;
    left: -50px;
    width: 42px;
    height: 42px;
    background-color: #0b5345;
    color: #cca43b;
    font-weight: 700;
    font-size: 1.1rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 4px solid #f4f7f6;
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
    z-index: 2;
}

.flow-step:nth-child(even) .flow-badge {
    background-color: #cca43b;
    color: #0b5345;
}

.flow-content {
    border: 1px solid rgba(11, 83, 69, 0.04);
    transition: border-color 0.3s ease;
}
.flow-content:hover {
    border-color: rgba(11, 83, 69, 0.2);
}
</style>
@endsection
