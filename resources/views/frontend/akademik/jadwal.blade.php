@extends('frontend.layouts.app')

@section('title', 'Jadwal Akademik - Prodi Hukum Keluarga Islam')

@section('content')
<section class="jadwal-hero d-flex align-items-center">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Waktu & Operasional</h5>
        <h1 class="display-4 fw-bold text-uppercase">Jadwal Akademik</h1>
        <div class="jadwal-divider mx-auto"></div>
    </div>
</section>

<!-- Konten Utama Jadwal Akademik -->
<section class="py-5 bg-premium-light">
    <div class="container py-4">

        {{-- ═══════════════════════════════════════════════
             SELEKSI KATEGORI JADWAL (TAB NAVIGATION)
             ════════════════════════════════════════════════ --}}
        <div class="row mb-5">
            <div class="col-12">
                <ul class="nav nav-pills justify-content-center custom-jadwal-pills gap-2" id="jadwalTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active text-uppercase tracking-wider" id="kuliah-tab" data-bs-toggle="tab" data-bs-target="#jadwal-kuliah" type="button" role="tab">
                            <i class="bi bi-journal-check me-2"></i>Jadwal Kuliah
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-uppercase tracking-wider" id="ujian-tab" data-bs-toggle="tab" data-bs-target="#jadwal-ujian" type="button" role="tab">
                            <i class="bi bi-file-earmark-spreadsheet me-2"></i>Jadwal Ujian (UTS/UAS)
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-uppercase tracking-wider" id="sidang-tab" data-bs-toggle="tab" data-bs-target="#jadwal-sidang" type="button" role="tab">
                            <i class="bi bi-mortarboard-fill me-2"></i>Jadwal Seminar & Sidang
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        {{-- ═══════════════════════════════════════════════
             ISI KONTEN UTAMA JADWAL
             ════════════════════════════════════════════════ --}}
        <div class="tab-content" id="jadwalTabContent">

            {{-- ─── PANEL 1: JADWAL KULIAH ─── --}}
            <div class="tab-pane fade show active" id="jadwal-kuliah" role="tabpanel">
                <div class="row g-4">
                    @if(isset($courseSchedules) && $courseSchedules->count() > 0)
                        @foreach($courseSchedules as $dayName => $schedules)
                            <div class="col-12 {{ !$loop->first ? 'mt-5' : '' }}">
                                <div class="day-row-header d-flex align-items-center mb-3">
                                    <span class="day-badge">{{ ucfirst($dayName) }}</span>
                                    <div class="day-line flex-grow-1 ms-3"></div>
                                </div>

                                <div class="row g-3">
                                    @foreach($schedules as $course)
                                        <div class="col-md-6 col-lg-4">
                                            <div class="schedule-card bg-white p-4 rounded-4 shadow-sm h-100 position-relative overflow-hidden">
                                                <div class="schedule-time bg-dark-green text-white px-3 py-1 rounded-pill small fw-bold">
                                                    {{ $course->time_range }}
                                                </div>
                                                <h5 class="fw-bold text-dark-green mt-4 mb-2">{{ $course->subject_name }}</h5>
                                                <p class="text-muted small mb-3">
                                                    <i class="bi bi-person-fill text-gold me-1"></i> {{ $course->lecturer_name }}
                                                </p>
                                                <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                                                    <span class="small fw-semibold text-secondary">
                                                        <i class="bi bi-geo-alt-fill text-gold me-1"></i> {{ $course->room }}
                                                    </span>
                                                    <span class="badge bg-light-green text-dark-green fw-bold">
                                                        {{ $course->semester_level }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center py-5 bg-white rounded-4 shadow-sm">
                            <p class="text-muted mb-0">Jadwal perkuliahan mingguan belum tersedia.</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- ─── PANEL 2: JADWAL UJIAN ─── --}}
            <div class="tab-pane fade" id="jadwal-ujian" role="tabpanel">
                <div class="bg-white p-4 p-md-5 rounded-4 shadow-sm border-premium">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center border-bottom pb-3 mb-4 gap-2">
                        <div>
                            <h4 class="fw-bold text-dark-green mb-1">
                                <i class="bi bi-exclamation-octagon-fill text-gold me-2"></i>Jadwal Ujian Semester
                            </h4>
                            <p class="text-muted small mb-0">Tahun Akademik berjalan. Harap membawa Kartu Ujian Fisik resmi.</p>
                        </div>
                        {{-- Opsi unduhan jika Anda menyediakan dokumen master cetak --}}
                        <a href="#" class="btn btn-outline-dark-green btn-sm rounded-pill px-4 fw-bold">
                            <i class="bi bi-download me-1"></i> Download File Jadwal Lengkap
                        </a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover custom-schedule-table align-middle">
                            <thead>
                                <tr>
                                    <th>Tanggal / Hari</th>
                                    <th>Waktu</th>
                                    <th>Mata Kuliah Tested</th>
                                    <th>Ruang</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($examSchedules) && $examSchedules->count() > 0)
                                    @foreach($examSchedules as $exam)
                                        <tr>
                                            <td class="fw-bold text-dark-green">
                                                {{ \Carbon\Carbon::parse($exam->exam_date)->translatedFormat('d F Y') }}
                                                <br>
                                                <small class="text-muted fw-normal">{{ $exam->exam_day }}</small>
                                            </td>
                                            <td><span class="badge-time">{{ $exam->time_range }}</span></td>
                                            <td class="fw-semibold">{{ $exam->subject_name }}</td>
                                            <td><span class="room-box">{{ $exam->room }}</span></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-4">Jadwal ujian belum rilis atau belum diatur.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- ─── PANEL 3: JADWAL SIDANG & SEMINAR ─── --}}
            <div class="tab-pane fade" id="jadwal-sidang" role="tabpanel">
                <div class="row g-4">
                    @if(isset($defenseSchedules) && $defenseSchedules->count() > 0)
                        @foreach($defenseSchedules as $defense)
                            @php
                                // Penentuan warna tipe agenda sidang
                                $isSempro = Str::contains(Str::lower($defense->type), ['sempro', 'proposal']);
                                $borderClass = $isSempro ? 'border-start-gold' : 'border-start-green';
                                $badgeClass = $isSempro ? 'bg-gold-type text-dark' : 'bg-green-type text-white';
                            @endphp
                            <div class="col-md-6">
                                <div class="sidang-card bg-white p-4 rounded-4 shadow-sm {{ $borderClass }}">
                                    <div class="d-flex justify-content-between mb-3 align-items-center">
                                        <span class="badge {{ $badgeClass }} text-uppercase">{{ $defense->type }}</span>
                                        <span class="text-muted small fw-bold">
                                            <i class="bi bi-calendar-event me-1"></i>
                                            {{ \Carbon\Carbon::parse($defense->event_date)->translatedFormat('d M Y') }}
                                        </span>
                                    </div>
                                    <h5 class="fw-bold text-dark-green mb-1">{{ $defense->thesis_title }}</h5>
                                    <p class="text-secondary small mb-3">
                                        Oleh: <strong>{{ $defense->student_name }}</strong> (NIM. {{ $defense->student_nim }})
                                    </p>
                                    <div class="p-3 bg-premium-light rounded-3 d-flex justify-content-between small">
                                        <div><i class="bi bi-clock me-1 text-dark-green"></i> {{ $defense->time }} WIB</div>
                                        <div><i class="bi bi-building me-1 text-dark-green"></i> {{ $defense->room }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center py-5 bg-white rounded-4 shadow-sm">
                            <p class="text-muted mb-0">Belum ada jadwal seminar proposal atau sidang munaqasyah terdekat.</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ==========================================================================
     STYLE CSS (INTEGRATED PREMIUM LOOK UNTUK JADWAL AKADEMIK)
     ========================================================================== -->
<style>
/* Utilities & Colors */
.text-dark-green { color: #0b5345 !important; }
.text-gold { color: #cca43b !important; }
.bg-dark-green { background-color: #0b5345 !important; }
.bg-premium-light { background-color: #f4f7f6; }
.bg-light-green { background-color: rgba(11, 83, 69, 0.08); }

/* Hero Section Style */
.jadwal-hero {
    background: linear-gradient(rgba(11, 83, 69, 0.9), rgba(0, 0, 0, 0.8)),
                url('https://images.unsplash.com/photo-1506784365847-bbad939e9335?q=80&w=1200&auto=format&fit=crop') no-repeat center center;
    background-size: cover;
    height: 35vh;
    min-height: 280px;
}
.jadwal-divider {
    width: 60px;
    height: 4px;
    background-color: #cca43b;
    margin-top: 15px;
    border-radius: 2px;
}

/* Custom Pills Layout (Tab Seleksi) */
.custom-jadwal-pills .nav-link {
    background-color: #ffffff;
    color: #0b5345;
    font-weight: 700;
    font-size: 0.88rem;
    padding: 14px 28px;
    border-radius: 8px;
    border: 1px solid rgba(11, 83, 69, 0.08);
    box-shadow: 0 4px 10px rgba(0,0,0,0.02);
    transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
}
.custom-jadwal-pills .nav-link.active,
.custom-jadwal-pills .nav-link:hover {
    background-color: #0b5345 !important;
    color: #ffffff !important;
    border-color: #0b5345;
}

/* Panel 1: Weekly Class Schedule Mechanics */
.day-badge {
    background-color: #cca43b;
    color: #ffffff;
    padding: 6px 20px;
    font-weight: 700;
    font-size: 1rem;
    border-radius: 6px;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}
.day-line {
    height: 2px;
    background-color: rgba(11, 83, 69, 0.1);
}
.schedule-card {
    border: 1px solid rgba(11, 83, 69, 0.04);
    transition: all 0.3s ease;
}
.schedule-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 25px rgba(11, 83, 69, 0.06) !important;
}
.schedule-time {
    position: absolute;
    top: 15px;
    right: 15px;
    font-size: 0.78rem;
    letter-spacing: 0.3px;
}

/* Panel 2: Table Ujian Styling */
.border-premium {
    border: 1px solid rgba(11, 83, 69, 0.05);
}
.custom-schedule-table thead {
    background-color: #0b5345;
    color: #ffffff;
}
.custom-schedule-table th {
    padding: 15px;
    font-weight: 600;
    font-size: 0.95rem;
    border: none;
}
.custom-schedule-table td {
    padding: 16px 15px;
    border-bottom: 1px solid #efefef;
    font-size: 0.95rem;
}
.badge-time {
    background-color: rgba(11, 83, 69, 0.06);
    color: #0b5345;
    padding: 4px 10px;
    border-radius: 4px;
    font-weight: 700;
    font-size: 0.85rem;
}
.room-box {
    background-color: rgba(204, 164, 59, 0.1);
    color: #b38f32;
    padding: 4px 10px;
    border-radius: 4px;
    font-weight: 600;
    font-size: 0.85rem;
}

/* Panel 3: Cards Seminar & Sidang */
.border-start-gold { border-left: 5px solid #cca43b; }
.border-start-green { border-left: 5px solid #0b5345; }
.bg-gold-type { background-color: rgba(204, 164, 59, 0.15); color: #b38f32; font-weight: 700; font-size: 0.75rem;}
.bg-green-type { background-color: #0b5345; font-weight: 700; font-size: 0.75rem;}
.sidang-card {
    border: 1px solid rgba(0,0,0,0.03);
    transition: transform 0.3s ease;
}
.sidang-card:hover {
    transform: scale(1.01);
}
</style>
@endsection
