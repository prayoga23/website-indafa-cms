@extends('frontend.layouts.app')

@section('title', $title . ' - ' . $data['name'])

@section('content')
<style>
    :root {
        --fac-color: {{ $data['color'] }};
    }
</style>

<section class="page-hero" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.85)), url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1200&auto=format&fit=crop') no-repeat center center; background-size: cover;">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Akademik</h5>
        <h1 class="display-4 fw-bold text-uppercase">{{ $title }}</h1>
        <div class="page-hero-divider mx-auto" style="background-color: var(--fac-color)"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-3">

        {{-- 1. DOKUMEN --}}
        @if($page === 'dokumen')
            <div class="text-center mb-5">
                <span class="page-section-eyebrow">File & Arsip</span>
                <h2 class="page-section-title text-uppercase" style="color:var(--fac-color)">Unduhan Dokumen</h2>
                <div class="page-section-divider mx-auto mt-2" style="background-color: var(--fac-color)"></div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-dark" style="background: var(--fac-color) !important;">
                                    <tr>
                                        <th scope="col" class="py-3 px-4">Nama Dokumen</th>
                                        <th scope="col" class="py-3">Kategori</th>
                                        <th scope="col" class="py-3 text-center">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="py-3 px-4 fw-semibold text-dark-green"><i class="bi bi-file-earmark-pdf text-danger me-2"></i>Panduan Akademik Fakultas PDF</td>
                                        <td>Buku Panduan</td>
                                        <td class="text-center"><a href="#" class="btn btn-sm text-white" style="background:var(--fac-color); border-radius:50px;"><i class="bi bi-download"></i> Unduh</a></td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4 fw-semibold text-dark-green"><i class="bi bi-file-earmark-pdf text-danger me-2"></i>Formulir Pengajuan Judul Skripsi</td>
                                        <td>Formulir</td>
                                        <td class="text-center"><a href="#" class="btn btn-sm text-white" style="background:var(--fac-color); border-radius:50px;"><i class="bi bi-download"></i> Unduh</a></td>
                                    </tr>
                                    <tr>
                                        <td class="py-3 px-4 fw-semibold text-dark-green"><i class="bi bi-file-earmark-pdf text-danger me-2"></i>Kalender Kegiatan Akademik Tahun Ini</td>
                                        <td>Kalender</td>
                                        <td class="text-center"><a href="#" class="btn btn-sm text-white" style="background:var(--fac-color); border-radius:50px;"><i class="bi bi-download"></i> Unduh</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        {{-- 2. FORM PERSURATAN --}}
        @elseif($page === 'persuratan')
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead>
                                    <tr style="border-bottom: 2px solid #e9ecef; background-color: #ffffff;">
                                        <th scope="col" class="py-3 px-4 fw-bold text-dark" style="width: 80px;">No</th>
                                        <th scope="col" class="py-3 fw-bold text-dark">Nama</th>
                                        <th scope="col" class="py-3 px-4 text-end fw-bold text-dark" style="width: 160px; padding-right: 2.5rem !important;">keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="px-4 py-3 fw-normal text-secondary">1</td>
                                        <td class="py-3 text-dark fw-medium">Form Pengajuan Surat Keterangan Aktif Kuliah</td>
                                        <td class="text-end py-3 px-4" style="padding-right: 2.5rem !important;">
                                            <a href="#" class="fw-bold text-decoration-underline" style="color: #c59b27;">Download</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 fw-normal text-secondary">2</td>
                                        <td class="py-3 text-dark fw-medium">Form Pengajuan Surat Izin Penelitian / Observasi</td>
                                        <td class="text-end py-3 px-4" style="padding-right: 2.5rem !important;">
                                            <a href="#" class="fw-bold text-decoration-underline" style="color: #c59b27;">Download</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 fw-normal text-secondary">3</td>
                                        <td class="py-3 text-dark fw-medium">Form Surat Bebas Tanggungan Perpustakaan & Laboratorium</td>
                                        <td class="text-end py-3 px-4" style="padding-right: 2.5rem !important;">
                                            <a href="#" class="fw-bold text-decoration-underline" style="color: #c59b27;">Download</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 fw-normal text-secondary">4</td>
                                        <td class="py-3 text-dark fw-medium">Form Permohonan Cek Plagiasi / Similarity Turnitin</td>
                                        <td class="text-end py-3 px-4" style="padding-right: 2.5rem !important;">
                                            <a href="#" class="fw-bold text-decoration-underline" style="color: #c59b27;">Download</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        {{-- 3. TURNITIN --}}
        @elseif($page === 'turnitin')
            <div class="text-center mb-5">
                <span class="page-section-eyebrow">Anti Plagiarisme</span>
                <h2 class="page-section-title text-uppercase" style="color:var(--fac-color)">Cek Plagiasi Turnitin</h2>
                <div class="page-section-divider mx-auto mt-2" style="background-color: var(--fac-color)"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="info-card p-5 border-0 shadow-sm bg-white rounded-4" style="border-top:4px solid var(--fac-color) !important;">
                        <h4 class="fw-bold mb-3 text-center text-dark-green">Formulir Cek Similarity Turnitin</h4>
                        <p class="text-center text-muted small mb-4">Unggah draf karya tulis ilmiah atau bab skripsi Anda untuk dicek tingkat kesamaannya sebelum sidang.</p>
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label small text-secondary">NIM Mahasiswa</label>
                                <input type="text" class="form-control" placeholder="Masukkan NIM" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small text-secondary">Nama Lengkap</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small text-secondary">File Karya Ilmiah (.doc / .docx / .pdf)</label>
                                <input type="file" class="form-control" required>
                            </div>
                            <button type="submit" class="btn text-white w-100 py-2 fw-semibold" style="background:var(--fac-color); border-radius:50px;">Unggah File</button>
                        </form>
                    </div>
                </div>
            </div>

        {{-- 5. KALENDER --}}
        @elseif($page === 'kalender')
            <div class="text-center mb-5">
                <span class="page-section-eyebrow">Rencana Kegiatan</span>
                <h2 class="page-section-title text-uppercase" style="color:var(--fac-color)">Kalender Akademik</h2>
                <div class="page-section-divider mx-auto mt-2" style="background-color: var(--fac-color)"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="info-card p-4 border-0 shadow-sm bg-white rounded-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="fw-bold text-dark-green mb-0"><i class="bi bi-calendar3 me-2"></i>Agenda Kegiatan Semester Ganjil 2026/2027</h5>
                            <a href="#" class="btn btn-sm btn-outline-dark" style="border-radius:50px;"><i class="bi bi-download"></i> Download PDF</a>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3 bg-transparent">
                                <div>
                                    <h6 class="fw-bold mb-1">Registrasi & Pembayaran UKT</h6>
                                    <span class="small text-muted">1 Agustus - 15 Agustus 2026</span>
                                </div>
                                <span class="badge bg-gold rounded-pill px-3 py-1.5" style="background-color:#cca43b !important;">Selesai</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center py-3 bg-transparent">
                                <div>
                                    <h6 class="fw-bold mb-1">Masa Perkuliahan Efektif</h6>
                                    <span class="small text-muted">1 September - 15 Desember 2026</span>
                                </div>
                                <span class="badge bg-success rounded-pill px-3 py-1.5">Aktif</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        {{-- 6. JADWAL --}}
        @elseif($page === 'jadwal')
            <div class="text-center mb-5">
                <span class="page-section-eyebrow">Perkuliahan</span>
                <h2 class="page-section-title text-uppercase" style="color:var(--fac-color)">Jadwal Kuliah</h2>
                <div class="page-section-divider mx-auto mt-2" style="background-color: var(--fac-color)"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-dark" style="background: var(--fac-color) !important;">
                                <tr>
                                    <th scope="col" class="py-3 px-4">Judul / Deskripsi Jadwal</th>
                                    <th scope="col" class="py-3">Format</th>
                                    <th scope="col" class="py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-3 px-4 fw-semibold text-dark-green">
                                        <i class="bi bi-file-earmark-pdf text-danger me-2 fs-5"></i>Jadwal Kuliah Semester Ganjil Tahun Ajaran 2026
                                    </td>
                                    <td><span class="badge bg-danger">PDF</span></td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm text-white px-3" style="background:var(--fac-color); border-radius:50px;">
                                            <i class="bi bi-download me-1"></i> Download
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-4 fw-semibold text-dark-green">
                                        <i class="bi bi-file-earmark-pdf text-danger me-2 fs-5"></i>Jadwal Kuliah Semester Genap Tahun Ajaran 2026
                                    </td>
                                    <td><span class="badge bg-danger">PDF</span></td>
                                    <td class="text-center">
                                        <a href="#" class="btn btn-sm text-white px-3" style="background:var(--fac-color); border-radius:50px;">
                                            <i class="bi bi-download me-1"></i> Download
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        {{-- 7. KELULUSAN --}}
        @elseif($page === 'kelulusan')
            <div class="text-center mb-5">
                <span class="page-section-eyebrow">Wisuda & Alumni</span>
                <h2 class="page-section-title text-uppercase" style="color:var(--fac-color)">Alur Kelulusan</h2>
                <div class="page-section-divider mx-auto mt-2" style="background-color: var(--fac-color)"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="d-flex flex-column gap-4">
                        <div class="step-card bg-white p-4 rounded-4 shadow-sm d-flex align-items-start gap-3">
                            <div class="step-number text-white flex-shrink-0" style="background-color: var(--fac-color); width: 45px; height: 45px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1.25rem;">1</div>
                            <div class="step-content">
                                <h5 class="fw-bold mb-1" style="color: var(--fac-color);">1. Penyelesaian Ujian Munaqasyah (Skripsi)</h5>
                                <p class="text-secondary mb-0">Mahasiswa wajib lulus sidang skripsi dengan revisi minimal yang telah disetujui para penguji.</p>
                            </div>
                        </div>
                        <div class="step-card bg-white p-4 rounded-4 shadow-sm d-flex align-items-start gap-3">
                            <div class="step-number text-white flex-shrink-0" style="background-color: var(--fac-color); width: 45px; height: 45px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1.25rem;">2</div>
                            <div class="step-content">
                                <h5 class="fw-bold mb-1" style="color: var(--fac-color);">2. Bebas Tanggungan Perpustakaan & Laboratorium</h5>
                                <p class="text-secondary mb-0">Menyerahkan form bebas pinjaman buku dari perpustakaan pusat dan fakultas.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        {{-- 8. AKREDITASI --}}
        @else
            <div class="text-center mb-5">
                <span class="page-section-eyebrow">Mutu & Reputasi</span>
                <h2 class="page-section-title text-uppercase" style="color:var(--fac-color)">Akreditasi Program Studi</h2>
                <div class="page-section-divider mx-auto mt-2" style="background-color: var(--fac-color)"></div>
            </div>

            <div class="row g-4 justify-content-center">
                @foreach($data['prodies'] as $prodi)
                    <div class="col-md-6 col-lg-4">
                        <div class="card fac-card h-100 p-4 border-0 shadow-sm bg-white rounded-4" style="border-top: 4px solid var(--fac-color) !important;">
                            <div class="card-body text-center">
                                <div class="icon-circle mx-auto mb-3" style="background:rgba(0,0,0,0.05); color:var(--fac-color)">
                                    <i class="bi bi-patch-check-fill fs-3"></i>
                                </div>
                                <h4 class="fw-bold mb-2" style="font-size:1.1rem;">{{ $prodi['name'] }}</h4>
                                <p class="text-muted mb-3 small">Terakreditasi BAN-PT</p>
                                <span class="badge bg-gold px-4 py-2 text-uppercase fw-bold rounded-pill" style="font-size:0.9rem; background-color:#cca43b !important;">Baik Sekali</span>
                                <div class="mt-4">
                                    <a href="#" class="btn btn-fac text-white px-3" style="background:var(--fac-color); border-radius:50px;"><i class="bi bi-download me-1"></i> Download PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
