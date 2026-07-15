@extends('frontend.layouts.app')

@section('title', 'Agenda Kegiatan - Prodi Hukum Keluarga Islam')

@section('content')
<section class="agenda-hero d-flex align-items-center">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Kalender Aktivitas</h5>
        <h1 class="display-4 fw-bold text-uppercase">Agenda Kegiatan</h1>
        <div class="agenda-divider mx-auto"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-2">

        {{-- ═══════════════════════════════════════════════
             HEADER FILTER STATUS AGENDA
             ════════════════════════════════════════════════ --}}
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center border-bottom pb-3 mb-4 gap-3">
            <h4 class="fw-bold text-dark-green mb-0 text-uppercase tracking-wide fs-5">
                {{ $status === 'selesai' ? 'Arsip Kegiatan Selesai' : 'Rencana Kegiatan Mendatang' }}
            </h4>
            <div class="d-flex gap-2">
                <a href="{{ route('frontend.informasi.agenda', ['status' => 'akan-datang']) }}"
                   class="btn btn-agenda-status rounded-pill px-3 py-1.5 small fw-bold {{ $status !== 'selesai' ? 'active' : '' }}">
                   Akan Datang
                </a>
                <a href="{{ route('frontend.informasi.agenda', ['status' => 'selesai']) }}"
                   class="btn btn-agenda-status rounded-pill px-3 py-1.5 small fw-bold {{ $status === 'selesai' ? 'active' : '' }}">
                   Selesai
                </a>
            </div>
        </div>

        {{-- ═══════════════════════════════════════════════
             LIST ITEM AGENDA
             ════════════════════════════════════════════════ --}}
        <div class="row g-4">
            @if(isset($agendas) && $agendas->count() > 0)
                @foreach($agendas as $agenda)
                    @php
                        // Parsing komponen tanggal dengan Carbon
                        $date = \Carbon\Carbon::parse($agenda->event_date);
                        $dayNum = $date->format('d');
                        $monthText = $date->translatedFormat('F');
                        $yearText = $date->format('Y');

                        // Standarisasi label tag dan variasi warna badge
                        $currentTag = $agenda->tag ?? 'Kegiatan';
                        $isWebinar = Str::lower($currentTag) === 'webinar';
                        $badgeClass = $isWebinar ? 'bg-green-light text-dark-green' : 'bg-gold-light text-gold-style';
                        $mediaIcon = $isWebinar ? 'bi-laptop' : 'bi-geo-alt';
                    @endphp

                    <div class="col-12">
                        <div class="agenda-card bg-white rounded-4 overflow-hidden shadow-sm d-flex flex-column flex-md-row">

                            <div class="agenda-time-panel bg-dark-green text-white p-4 d-flex flex-row flex-md-column align-items-center justify-content-center text-center gap-3 gap-md-0 flex-shrink-0" style="min-width: 140px;">
                                <span class="agenda-day display-5 fw-bold text-gold">{{ $dayNum }}</span>
                                <div class="d-flex flex-column align-items-start align-items-md-center">
                                    <span class="agenda-month text-uppercase fw-semibold tracking-wider small">{{ substr($monthText, 0, 4) }}</span>
                                    <span class="agenda-year text-white-50 small">{{ $yearText }}</span>
                                </div>
                            </div>

                            <div class="agenda-body p-4 flex-grow-1 d-flex flex-column justify-content-center">
                                <div class="mb-2">
                                    <span class="badge {{ $badgeClass }} px-2.5 py-1 text-uppercase fw-bold tracking-wide font-monospace small">
                                        {{ $currentTag }}
                                    </span>
                                </div>
                                <h4 class="fw-bold text-dark-green mb-3 agenda-title">{{ $agenda->title }}</h4>

                                <div class="row g-2 text-secondary small mb-0">
                                    <div class="col-sm-6 col-md-4 d-flex align-items-center gap-2">
                                        <i class="bi bi-clock text-gold"></i>
                                        <span>
                                            {{ substr($agenda->start_time, 0, 5) }} -
                                            {{ $agenda->end_time ? substr($agenda->end_time, 0, 5) . ' WIB' : 'Selesai' }}
                                        </span>
                                    </div>
                                    <div class="col-sm-6 col-md-4 d-flex align-items-center gap-2">
                                        <i class="bi {{ $mediaIcon }} text-gold"></i>
                                        <span class="text-truncate" style="max-width: 250px;">{{ $agenda->location }}</span>
                                    </div>
                                    <div class="col-sm-6 col-md-4 d-flex align-items-center gap-2">
                                        <i class="bi bi-people text-gold"></i>
                                        <span>Khusus Mahasiswa HKI</span>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center py-5 bg-white rounded-4 shadow-sm">
                    <p class="text-muted mb-0">Tidak ada agenda kegiatan pada kategori ini.</p>
                </div>
            @endif
        </div>

        {{-- ═══════════════════════════════════════════════
             PAGINATION NAVIGATION
             ════════════════════════════════════════════════ --}}
        @if(isset($agendas) && $agendas->hasPages())
            <nav class="mt-5">
                <ul class="pagination justify-content-center custom-agenda-pagination">
                    {{-- Previous Page Link --}}
                    @if ($agendas->onFirstPage())
                        <li class="page-item disabled"><span class="page-link"><i class="bi bi-chevron-left"></i></span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $agendas->previousPageUrl() }}"><i class="bi bi-chevron-left"></i></a></li>
                    @endif

                    {{-- Loop Daftar Halaman --}}
                    @foreach ($agendas->getUrlRange(1, $agendas->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $agendas->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($agendas->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $agendas->nextPageUrl() }}"><i class="bi bi-chevron-right"></i></a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link"><i class="bi bi-chevron-right"></i></span></li>
                    @endif
                </ul>
            </nav>
        @endif

    </div>
</section>

<!-- ==========================================================================
     STYLE CSS (INTEGRATED PREMIUM LOOK UNTUK HALAMAN AGENDA KEGIATAN)
     ========================================================================== -->
<style>
/* Utilities & Colors */
.text-dark-green { color: #0b5345 !important; }
.text-gold { color: #cca43b !important; }
.text-gold-style { color: #b38f32 !important; }
.bg-dark-green { background-color: #0b5345 !important; }
.bg-premium-light { background-color: #f4f7f6; }
.bg-light-gray-panel { background-color: #fcfdfe; }

/* Hero Section Style */
.agenda-hero {
    background: linear-gradient(rgba(11, 83, 69, 0.95), rgba(0, 0, 0, 0.85)),
                url('https://images.unsplash.com/photo-1511578314322-379afb476865?q=80&w=1200&auto=format&fit=crop') no-repeat center center;
    background-size: cover;
    height: 35vh;
    min-height: 280px;
}
.agenda-divider {
    width: 60px;
    height: 4px;
    background-color: #cca43b;
    margin-top: 15px;
    border-radius: 2px;
}

/* Status Filter Buttons */
.btn-agenda-status {
    background-color: #ffffff;
    color: #0b5345;
    border: 1px solid rgba(11, 83, 69, 0.15);
    font-size: 0.82rem;
    transition: all 0.2s ease;
}
.btn-agenda-status:hover,
.btn-agenda-status.active {
    background-color: #0b5345;
    border-color: #0b5345;
    color: #ffffff;
}

/* Agenda Card Mechanics */
.agenda-card {
    border: 1px solid rgba(11, 83, 69, 0.04);
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
}
.agenda-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 25px rgba(11, 83, 69, 0.06) !important;
}

/* Left Time Panel Design */
.agenda-time-panel {
    min-width: 130px;
}
.agenda-time-panel .agenda-day {
    line-height: 1;
}
.agenda-time-panel .agenda-month {
    letter-spacing: 1px;
    font-size: 0.85rem;
}

/* Content Title & Grid Body */
.agenda-title {
    font-size: 1.25rem;
    line-height: 1.4;
    letter-spacing: -0.2px;
}

/* Right Side Button Panel Alignment */
.agenda-action {
    min-width: 200px;
}
.btn-dark-green {
    background-color: #0b5345;
    color: #ffffff;
    border: none;
    transition: all 0.2s ease;
}
.btn-dark-green:hover {
    background-color: #cca43b;
    color: #ffffff;
}

/* Responsive Handling Border Side */
@media (min-width: 768px) {
    .border-start-md {
        border-left: 1px dashed rgba(11, 83, 69, 0.12) !important;
    }
}

/* Badges styling */
.bg-gold-light { background-color: rgba(204, 164, 59, 0.12); }
.bg-green-light { background-color: rgba(11, 83, 69, 0.08); }

/* Pagination Controls */
.custom-agenda-pagination .page-link {
    color: #0b5345;
    border-color: #dee2e6;
    padding: 8px 14px;
    font-weight: 600;
}
.custom-agenda-pagination .page-item.active .page-link {
    background-color: #0b5345;
    border-color: #0b5345;
    color: #ffffff;
}
.custom-agenda-pagination .page-link:hover {
    background-color: rgba(11, 83, 69, 0.05);
}
</style>
@endsection
