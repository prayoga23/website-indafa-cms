@extends('frontend.layouts.app')

@section('title', 'Kurikulum Program Studi Hukum Keluarga Islam')

@section('content')
<section class="kurikulum-hero d-flex align-items-center">
    <div class="container text-center text-white mt-5">
        <h1 class="display-5 fw-bold text-uppercase">Kurikulum Prodi</h1>
        <div class="kurikulum-divider mx-auto"></div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container py-2">

        <h2 class="fw-bold text-dark-green mb-4 text-image-style">Kurikulum Program Studi Hukum Keluarga Islam</h2>

        {{-- ═══════════════════════════════════════════════
             PENGANTAR KURIKULUM (Dinamis - CurriculumInfo)
             ════════════════════════════════════════════════ --}}
        <div class="kurikulum-desc text-secondary lh-lg mb-4 text-justify">
            @if(isset($curriculumInfo) && $curriculumInfo->description)
                {!! nl2br(e($curriculumInfo->description)) !!}
            @else
                <p>Mulai Tahun Akademik ini, Program Studi memberlakukan Kurikulum Mengacu Kerangka Kualifikasi Nasional Indonesia (KKNI) dan Standar Nasional Pendidikan Tinggi (SN-DIKTI).</p>
            @endif
        </div>

        <h4 class="fw-bold text-dark mb-3 mt-4 fs-5">1. Sebaran Mata Kuliah Per-Semester</h4>

        {{-- ═══════════════════════════════════════════════
             LOOPING TABEL SEMESTER (Dinamis - Course)
             ════════════════════════════════════════════════ --}}
            @forelse($semesters as $semesterNum => $courses)

                <h5 class="fw-bold text-dark-green mb-3 fs-6 italic-semester">
                    Semester {{ $semesterNum }}
                </h5>

                <div class="table-responsive border rounded-3 shadow-sm mb-5">
                    <table class="table table-bordered custom-img-table mb-0 align-middle">
                        <thead>
                            <tr>
                                <th colspan="2" class="bg-light-gray border-bottom-0"></th>
                                <th colspan="4" class="text-start bg-light-gray text-dark fw-bold border-bottom-0 py-2 fs-6">Kurikulum KKNI</th>
                            </tr>
                            <tr class="text-dark fw-bold table-sub-header">
                                <th style="width: 5%;" class="text-center">No</th>
                                <th style="width: 15%;">Kode</th>
                                <th style="width: 45%;">Nama Mata Kuliah</th>
                                <th style="width: 15%;">Jumlah SKS</th>
                                <th style="width: 20%;">Jenis Mata Kuliah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $course)
                            <tr>
                                <td class="text-center text-muted">{{ $loop->iteration }}</td>
                                <td class="text-secondary fw-semibold">{{ $course->code }}</td>
                                <td class="text-dark fw-semibold">{{ $course->name }}</td>
                                <td>{{ $course->sks }}</td>
                                <td>
                                    {{-- Mengatur warna badge atau style berdasarkan jenis matkul --}}
                                    <span class="badge-jenis">{{ $course->type ?? 'Wajib' }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        {{-- Opsional: Baris Total SKS per-semester --}}
                        <tfoot>
                            <tr class="table-light fw-bold">
                                <td colspan="3" class="text-end">Total Beban SKS Semester {{ $semesterNum }}:</td>
                                <td colspan="2">{{ $courses->sum('sks') }} SKS</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                @empty
                <div class="text-center py-5 border rounded-3 bg-light">
                <p class="text-muted mb-0">Data sebaran mata kuliah belum diunggah.</p>
            </div>

            @endforelse

    </div>
</section>

<!-- ==========================================================================
     STYLE CSS REVISI (MENIRU POLA LAYOUT GAMBAR REFERENSI)
     ========================================================================== -->
<style>
/* Utilities & Colors */
.text-dark-green { color: #0b5345 !important; }
.bg-light-gray { background-color: #ffffff !important; }
.text-justify { text-align: justify; }

/* Hero Mini */
.kurikulum-hero {
    background: linear-gradient(rgba(11, 83, 69, 0.95), rgba(0, 0, 0, 0.85)),
                url('https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?q=80&w=1200&auto=format&fit=crop') no-repeat center center;
    background-size: cover;
    height: 22vh;
    min-height: 180px;
}
.kurikulum-divider {
    width: 50px;
    height: 3px;
    background-color: #cca43b;
    margin-top: 10px;
}

/* Penyesuaian Tipografi Mirip Gambar */
.text-image-style {
    font-size: 1.85rem;
    letter-spacing: -0.5px;
    border-bottom: 2px solid rgba(11, 83, 69, 0.1);
    padding-bottom: 12px;
}
.kurikulum-desc p {
    font-size: 0.98rem;
    margin-bottom: 1.5rem;
    color: #4a5568 !important;
}
.italic-semester {
    font-style: normal;
    position: relative;
    padding-left: 12px;
}
.italic-semester::before {
    content: '';
    position: absolute;
    left: 0;
    top: 4px;
    bottom: 4px;
    width: 4px;
    background-color: #cca43b;
    border-radius: 2px;
}

/* Spesifikasi Tabel Sesuai Gambar {4E1AD5B4-A88A-4C28-9679-BBED1BE99866}.png */
.custom-img-table {
    border-color: #dee2e6 !important;
}
.custom-img-table thead th {
    font-size: 0.9rem;
    color: #333333;
    border-color: #dee2e6 !important;
}
.table-sub-header th {
    padding: 12px 15px !important;
    background-color: #ffffff !important;
    border-top: 1px solid #dee2e6 !important;
}
.custom-img-table tbody td {
    padding: 12px 15px;
    font-size: 0.92rem;
    color: #495057;
    border-color: #dee2e6 !important;
}
.custom-img-table tbody tr:hover {
    background-color: #f8faf9;
}

/* Badge Jenis Mata Kuliah Ringan */
.badge-jenis {
    background-color: rgba(11, 83, 69, 0.06);
    color: #0b5345;
    padding: 4px 12px;
    border-radius: 4px;
    font-weight: 600;
    font-size: 0.82rem;
}
</style>
@endsection
