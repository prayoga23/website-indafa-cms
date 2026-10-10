@extends('frontend.layouts.app')

@section('title', 'Unduh Dokumen - Prodi Hukum Keluarga Islam')

@section('content')
<!-- Hero Section Dokumen -->
<section class="download-hero d-flex align-items-center">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Pusat Unduhan</h5>
        <h1 class="display-4 fw-bold text-uppercase">Dokumen Akademik</h1>
        <div class="download-divider mx-auto"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-2">

        {{-- ═══════════════════════════════════════════════
             FITUR PENCARIAN & FILTER KATEGORI
             ════════════════════════════════════════════════ --}}
        <div class="row mb-4 g-3 align-items-center justify-content-between">
            <div class="col-md-5">
                <form action="{{ route('frontend.dokumen.index') }}" method="GET">
                    <div class="search-box-custom position-relative">
                        <input type="text"
                               name="search"
                               value="{{ $search }}"
                               class="form-control rounded-pill ps-4 pe-5 py-2.5 small bg-white shadow-sm border-light-subtle"
                               placeholder="Cari nama dokumen atau pedoman...">
                        <button type="submit" class="btn border-0 position-absolute top-50 end-0 translate-middle-Y me-3 bg-transparent p-0">
                            <i class="bi bi-search text-secondary"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-4 text-md-end">
                <span class="text-secondary small me-2"><i class="bi bi-info-circle me-1 text-gold"></i> Format berkas: PDF / DOCX / XLSX</span>
            </div>
        </div>

        {{-- ═══════════════════════════════════════════════
             TABEL DOKUMEN DINAMIS
             ════════════════════════════════════════════════ --}}
        <div class="bg-white rounded-4 shadow-sm overflow-hidden border border-light-subtle">
            <div class="table-responsive">
                <table class="table custom-premium-table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center py-3.5 px-3" style="width: 80px;">No.</th>
                            <th scope="col" class="py-3.5">Nama Dokumen</th>
                            <th scope="col" class="text-center py-3.5" style="width: 150px;">Tahun</th>
                            <th scope="col" class="text-center py-3.5" style="width: 150px;">Unduhan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($documents) && $documents->count() > 0)
                            @foreach($documents as $index => $doc)
                                @php
                                    // Set default icon & warna style avatar
                                    $extension = strtolower($doc->file_extension);
                                    $iconClass = 'bi-file-earmark-text';
                                    $bgClass = 'bg-gold-light text-gold-style';

                                    if ($extension === 'pdf') {
                                        $iconClass = 'bi-file-earmark-pdf';
                                        $bgClass = 'bg-danger-subtle text-danger';
                                    } elseif (in_array($extension, ['docx', 'doc'])) {
                                        $iconClass = 'bi-file-earmark-word';
                                        $bgClass = 'bg-primary-subtle text-primary';
                                    } elseif (in_array($extension, ['xlsx', 'xls'])) {
                                        $iconClass = 'bi-file-earmark-excel';
                                        $bgClass = 'bg-success-subtle text-success';
                                    } elseif (in_array($extension, ['pptx', 'ppt'])) {
                                        $iconClass = 'bi-file-earmark-slides';
                                        $bgClass = 'bg-warning-subtle text-warning';
                                    }

                                    // Konfigurasi Link Berkas Unduhan
                                    $fileUrl = (Str::startsWith($doc->file_path, ['http://', 'https://']))
                                                ? $doc->file_path
                                                : asset('storage/' . $doc->file_path);
                                @endphp
                                <tr>
                                    {{-- Kalkulasi Nomor Urut Berkas yang Tepat Meskipun Pindah Halaman --}}
                                    <td class="text-center fw-medium text-secondary">
                                        {{ $documents->firstItem() + $index }}
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="doc-icon-avatar {{ $bgClass }} rounded-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                <i class="bi {{ $iconClass }} fs-5"></i>
                                            </div>
                                            <span class="fw-semibold text-dark-green text-document-title">{{ $doc->name }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center text-secondary font-monospace fw-medium">{{ $doc->year }}</td>
                                    <td class="text-center">
                                        <a href="{{ $fileUrl }}" download class="btn btn-dark-green btn-sm rounded-pill px-4 py-1.5 fw-semibold tracking-wide">
                                            <i class="bi bi-cloud-arrow-down-fill me-1 small"></i> Unduh
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="bi bi-folder-x fs-2 d-block mb-2 text-secondary"></i>
                                    Dokumen tidak ditemukan atau berkas pustaka masih kosong.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ═══════════════════════════════════════════════
             PAGINATION PREMIUM (ALIGN RIGHT)
             ════════════════════════════════════════════════ --}}
        @if(isset($documents) && $documents->hasPages())
            <nav class="mt-4">
                <ul class="pagination justify-content-end custom-table-pagination gap-1">
                    {{-- Tombol First Page --}}
                    @if ($documents->onFirstPage())
                        <li class="page-item disabled"><span class="page-link rounded-2"><i class="bi bi-chevron-double-left"></i></span></li>
                    @else
                        <li class="page-item"><a class="page-link rounded-2" href="{{ $documents->url(1) }}"><i class="bi bi-chevron-double-left"></i></a></li>
                    @endif

                    {{-- Urutan Angka Halaman --}}
                    @foreach ($documents->getUrlRange(max(1, $documents->currentPage() - 2), min($documents->lastPage(), $documents->currentPage() + 2)) as $page => $url)
                        <li class="page-item {{ $page == $documents->currentPage() ? 'active' : '' }}">
                            <a class="page-link rounded-2" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    {{-- Tombol Next Page --}}
                    @if ($documents->hasMorePages())
                        <li class="page-item"><a class="page-link rounded-2" href="{{ $documents->nextPageUrl() }}"><i class="bi bi-chevron-right"></i></a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link rounded-2"><i class="bi bi-chevron-right"></i></span></li>
                    @endif

                    {{-- Tombol Last Page --}}
                    @if ($documents->hasMorePages())
                        <li class="page-item"><a class="page-link rounded-2" href="{{ $documents->url($documents->lastPage()) }}"><i class="bi bi-chevron-double-right"></i></a></li>
                    @else
                        <li class="page-item disabled"><span class="page-link rounded-2"><i class="bi bi-chevron-double-right"></i></span></li>
                    @endif
                </ul>
            </nav>
        @endif

    </div>
</section>

<!-- ==========================================================================
     STYLE CSS (INTEGRATED PREMIUM LOOK ADAPTASI DARI SCREENSHOT)
     ========================================================================== -->
<style>
/* Utilities & Colors */
.text-dark-green { color: #0b5345 !important; }
.text-gold { color: #cca43b !important; }
.text-gold-style { color: #b38f32 !important; }
.bg-premium-light { background-color: #f4f7f6; }

/* Hero Section Style */
.download-hero {
    background: linear-gradient(rgba(11, 83, 69, 0.95), rgba(0, 0, 0, 0.85)),
                url('https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?q=80&w=1200&auto=format&fit=crop') no-repeat center center;
    background-size: cover;
    height: 35vh;
    min-height: 280px;
}
.download-divider {
    width: 60px;
    height: 4px;
    background-color: #cca43b;
    margin-top: 15px;
    border-radius: 2px;
}

/* Premium Table Mechanics (Meningkatkan Kualitas Gambar Contoh) */
.custom-premium-table thead th {
    background-color: #0b5345;
    color: #ffffff;
    font-weight: 600;
    font-size: 0.92rem;
    letter-spacing: 0.3px;
    border: none;
}
.custom-premium-table tbody tr {
    transition: background-color 0.2s ease;
}
.custom-premium-table tbody td {
    padding-top: 16px;
    padding-bottom: 16px;
    border-bottom: 1px solid #edf2f0;
}
.text-document-title {
    font-size: 0.95rem;
    letter-spacing: -0.1px;
}

/* Document Avatar Icon Visualized Booster */
.doc-icon-avatar {
    width: 38px;
    height: 38px;
    flex-shrink: 0;
}
.bg-gold-light { background-color: rgba(204, 164, 59, 0.12); }
.bg-green-light { background-color: rgba(11, 83, 69, 0.08); }

/* Download Action Button Element (Persis tombol Unduh di Gambar) */
.btn-dark-green {
    background-color: #0b5345;
    color: #ffffff;
    border: none;
    font-size: 0.82rem;
    transition: all 0.2s ease;
    box-shadow: 0 2px 4px rgba(11, 83, 69, 0.1);
}
.btn-dark-green:hover {
    background-color: #cca43b;
    color: #ffffff;
    transform: translateY(-1px);
}

/* Form Controls Input Element */
.search-box-custom input:focus {
    border-color: #0b5345;
    box-shadow: 0 0 0 3px rgba(11, 83, 69, 0.08);
}

/* Pagination Controls Layout Matching System (Kanan, Kotak & Warna Hijau) */
.custom-table-pagination .page-link {
    color: #0b5345;
    background-color: #ffffff;
    border: 1px solid #dee2e6;
    padding: 6px 12px;
    font-weight: 600;
    font-size: 0.85rem;
    transition: all 0.2s ease;
}
.custom-table-pagination .page-item.active .page-link {
    background-color: #0b5345;
    border-color: #0b5345;
    color: #ffffff;
}
.custom-table-pagination .page-link:hover {
    background-color: rgba(11, 83, 69, 0.08);
    color: #0b5345;
}
.fs-7 {
    font-size: 0.75rem;
}
</style>
@endsection
