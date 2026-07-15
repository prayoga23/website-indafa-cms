@extends('frontend.layouts.app')

@section('title', 'Kalender Akademik - Prodi Hukum Keluarga Islam')

@section('content')
<section class="kalender-hero d-flex align-items-center">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Agenda Pendidikan</h5>
        <h1 class="display-4 fw-bold text-uppercase">Kalender Akademik</h1>
        <div class="kalender-divider mx-auto"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-4">

        {{-- ═══════════════════════════════════════════════
             SEKTOR AGENDA PER SEMESTER (Dinamis)
             ════════════════════════════════════════════════ --}}
        <div class="row g-4 mb-5">
            @if(isset($calendarGroups) && $calendarGroups->count() > 0)
                @foreach($calendarGroups as $semesterType => $agendas)
                    @php
                        // Menentukan gaya ikon dan keterangan sub-judul berdasarkan teks tipe semester di DB
                        $isGanjil = Str::contains(Str::lower($semesterType), 'ganjil');
                        $iconBg = $isGanjil ? 'bg-dark-green' : 'bg-gold';
                        $subTitle = $isGanjil ? 'Periode ' : 'Periode ';
                    @endphp

                    <div class="col-lg-12">
                        <div class="calendar-wrapper bg-white p-4 rounded-4 shadow-sm h-100">
                            <div class="calendar-header d-flex align-items-center gap-2 border-bottom pb-3 mb-4">
                                <div class="calendar-icon-indicator text-white {{ $iconBg }}">
                                    <i class="bi bi-calendar2-week-fill"></i>
                                </div>
                                <div>
                                    <h4 class="fw-bold text-dark-green mb-0">{{ ucfirst($semesterType) }}</h4>
                                    <span class="text-gold small fw-bold text-uppercase tracking-wider">{{ $subTitle }}</span>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-hover align-middle agenda-table">
                                    <thead>
                                        <tr>
                                            <th>Kegiatan Akademik</th>
                                            <th style="width: 40%">Tanggal Pelaksanaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($agendas as $agenda)
                                        <tr>
                                            <td>
                                                <span class="fw-semibold text-dark">{{ $agenda->activity_name }}</span>
                                            </td>
                                            <td>
                                                {{-- Menambahkan class warna teks kustom (misal: font-green, font-gold) secara dinamis dari database jika tersedia --}}
                                                <span class="date-badge {{ $agenda->color_class ?? '' }}">
                                                    {{ $agenda->date_range }}
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="text-center py-5 bg-white rounded-4 shadow-sm">
                        <p class="text-muted mb-0">Jadwal agenda kalender akademik belum tersedia.</p>
                    </div>
                </div>
            @endif
        </div>

        {{-- ═══════════════════════════════════════════════
             CARD DOWNLOAD DOKUMEN RESMI (Dinamis)
             ════════════════════════════════════════════════ --}}
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="download-calendar-card d-flex flex-column flex-md-row align-items-center justify-content-between p-4 shadow-sm bg-white rounded-4">
                    <div class="d-flex align-items-center gap-3 mb-3 mb-md-0 text-center text-md-start flex-column flex-md-row">
                        <div class="pdf-icon-box">
                            <i class="bi bi-file-earmark-pdf-fill fs-1 text-danger"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-dark-green mb-1">Unduh Dokumen Resmi Kalender Akademik</h5>
                            <p class="text-muted small mb-0">Tahun Akademik 2026/2027 (Format PDF asli Surat Keputusan Rektor)</p>
                        </div>
                    </div>

                    @if(isset($academicSetting) && $academicSetting->pdf_file_path)
                        <a href="{{ asset('storage/' . $academicSetting->pdf_file_path) }}"
                           target="_blank"
                           class="btn btn-gold-premium px-4 py-2 rounded-pill fw-semibold text-uppercase tracking-wider text-nowrap">
                            <i class="bi bi-download me-2"></i> Unduh PDF
                        </a>
                    @else
                        <button class="btn btn-secondary px-4 py-2 rounded-pill fw-semibold text-uppercase tracking-wider text-nowrap" disabled>
                            <i class="bi bi-file-earmark-lock-fill me-2"></i> Belum Tersedia
                        </button>
                    @endif
                </div>
            </div>
        </div>

    </div>
</section>

<!-- ==========================================================================
     STYLE CSS (INTEGRATED PREMIUM LOOK UNTUK KALENDER AKADEMIK)
     ========================================================================== -->
<style>
/* Utilities */
.text-dark-green { color: #0b5345 !important; }
.text-gold { color: #cca43b !important; }
.bg-dark-green { background-color: #0b5345 !important; }
.bg-gold { background-color: #cca43b !important; }
.bg-premium-light { background-color: #f4f7f6; }

/* Hero Section Style */
.kalender-hero {
    background: linear-gradient(rgba(11, 83, 69, 0.9), rgba(0, 0, 0, 0.8)),
                url('https://images.unsplash.com/photo-1506784365847-bbad939e9335?q=80&w=1200&auto=format&fit=crop') no-repeat center center;
    background-size: cover;
    height: 35vh;
    min-height: 280px;
}
.kalender-divider {
    width: 60px;
    height: 4px;
    background-color: #cca43b;
    margin-top: 15px;
    border-radius: 2px;
}

/* Download Calendar Card Layout */
.download-calendar-card {
    border: 1px solid rgba(11, 83, 69, 0.08);
}
.pdf-icon-box {
    background-color: rgba(220, 53, 69, 0.05);
    padding: 10px 15px;
    border-radius: 12px;
}
.btn-gold-premium {
    background-color: #cca43b;
    color: #ffffff;
    border: 1px solid #cca43b;
    font-size: 0.85rem;
    transition: all 0.3s ease;
}
.btn-gold-premium:hover {
    background-color: #0b5345;
    border-color: #0b5345;
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(11, 83, 69, 0.15);
}

/* Calendar Section Mechanics */
.calendar-wrapper {
    border: 1px solid rgba(11, 83, 69, 0.05);
}
.calendar-icon-indicator {
    width: 45px;
    height: 45px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
}

/* Agenda Table Customizations */
.agenda-table thead th {
    background-color: #f8faf9;
    color: #0b5345;
    font-weight: 700;
    padding: 12px 15px;
    border-bottom: 2px solid rgba(11, 83, 69, 0.08);
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
.agenda-table td {
    padding: 16px 15px;
    border-bottom: 1px solid #f0f0f0;
    font-size: 0.95rem;
}
.agenda-table tbody tr:last-child td {
    border-bottom: none;
}

/* Date Custom Badges */
.date-badge {
    display: block;
    background-color: #f4f7f6;
    color: #4a4a4a;
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 0.85rem;
    font-weight: 600;
    text-align: center;
    border-left: 3px solid #6c757d;
}
.date-badge.font-green {
    background-color: rgba(11, 83, 69, 0.05);
    color: #0b5345;
    border-left-color: #0b5345;
}
.date-badge.font-gold {
    background-color: rgba(204, 164, 59, 0.08);
    color: #b38f32;
    border-left-color: #cca43b;
}
</style>
@endsection
