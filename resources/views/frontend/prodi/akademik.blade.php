@extends('frontend.layouts.app')

@section('title', $title . ' - ' . $data['name'])

@section('content')
<style>
    :root {
        --pro-color: {{ $data['color'] }};
    }
</style>

<section class="page-hero" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.85)), url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=1200&auto=format&fit=crop') no-repeat center center; background-size: cover;">
    <div class="container text-center text-white mt-5">
        <h5 class="text-gold text-uppercase fw-semibold tracking-wider">Akademik</h5>
        <h1 class="display-4 fw-bold text-uppercase">{{ $title }}</h1>
        <div class="page-hero-divider mx-auto" style="background-color: var(--pro-color)"></div>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-3">

        {{-- 1. DOKUMEN --}}
        @if($page === 'dokumen')
            <div class="text-center mb-5">
                <span class="page-section-eyebrow">File Pendukung</span>
                <h2 class="page-section-title text-uppercase" style="color:var(--pro-color)">Dokumen Pembelajaran</h2>
                <div class="page-section-divider mx-auto mt-2" style="background-color: var(--pro-color)"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-dark" style="background: var(--pro-color) !important;">
                                <tr>
                                    <th scope="col" class="py-3 px-4">Nama File</th>
                                    <th scope="col" class="py-3">Tipe</th>
                                    <th scope="col" class="py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-3 px-4 fw-semibold text-dark-green"><i class="bi bi-file-earmark-pdf text-danger me-2"></i>Panduan Skripsi {{ $data['name'] }}</td>
                                    <td>PDF</td>
                                    <td class="text-center"><a href="#" class="btn btn-sm text-white" style="background:var(--pro-color); border-radius:50px;"><i class="bi bi-download"></i> Unduh</a></td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-4 fw-semibold text-dark-green"><i class="bi bi-file-earmark-pdf text-danger me-2"></i>Kurikulum Lengkap Prodi</td>
                                    <td>PDF</td>
                                    <td class="text-center"><a href="#" class="btn btn-sm text-white" style="background:var(--pro-color); border-radius:50px;"><i class="bi bi-download"></i> Unduh</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        {{-- 2. FORM PERSURATAN --}}
        @elseif($page === 'persuratan')
            <div class="text-center mb-5">
                <span class="page-section-eyebrow">Administrasi</span>
                <h2 class="page-section-title text-uppercase" style="color:var(--pro-color)">Pengajuan Persuratan</h2>
                <div class="page-section-divider mx-auto mt-2" style="background-color: var(--pro-color)"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="info-card p-4 border-0 shadow-sm text-center">
                                <div class="icon-circle mx-auto mb-3" style="background:rgba(0,0,0,0.05); color:var(--pro-color)"><i class="bi bi-file-earmark-text fs-3"></i></div>
                                <h5 class="fw-bold text-dark-green">Surat Keterangan Aktif Kuliah</h5>
                                <p class="small text-muted mb-4">Pengajuan surat keterangan aktif berkuliah untuk keperluan beasiswa, BPJS, dll.</p>
                                <a href="#" class="btn text-white w-100" style="background:var(--pro-color); border-radius:50px;">Ajukan Sekarang</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-card p-4 border-0 shadow-sm text-center">
                                <div class="icon-circle mx-auto mb-3" style="background:rgba(0,0,0,0.05); color:var(--pro-color)"><i class="bi bi-file-earmark-medical fs-3"></i></div>
                                <h5 class="fw-bold text-dark-green">Surat Izin Penelitian</h5>
                                <p class="small text-muted mb-4">Form pengajuan surat izin untuk melakukan penelitian skripsi di instansi/lembaga.</p>
                                <a href="#" class="btn text-white w-100" style="background:var(--pro-color); border-radius:50px;">Ajukan Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        {{-- 3. TURNITIN --}}
        @elseif($page === 'turnitin')
            <div class="text-center mb-5">
                <span class="page-section-eyebrow">Anti Plagiarisme</span>
                <h2 class="page-section-title text-uppercase" style="color:var(--pro-color)">Cek Plagiasi Turnitin</h2>
                <div class="page-section-divider mx-auto mt-2" style="background-color: var(--pro-color)"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="info-card p-5 border-0 shadow-sm" style="border-top:4px solid var(--pro-color) !important;">
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
                            <button type="submit" class="btn text-white w-100 py-2 fw-semibold" style="background:var(--pro-color); border-radius:50px;">Unggah File</button>
                        </form>
                    </div>
                </div>
            </div>

        {{-- 4. KKN --}}
        @elseif($page === 'kkn')
            <div class="text-center mb-5">
                <span class="page-section-eyebrow">Pengabdian</span>
                <h2 class="page-section-title text-uppercase" style="color:var(--pro-color)">Pendaftaran KKN</h2>
                <div class="page-section-divider mx-auto mt-2" style="background-color: var(--pro-color)"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="info-card p-5 border-0 shadow-sm" style="border-top:4px solid var(--pro-color) !important;">
                        <h4 class="fw-bold mb-3 text-center text-dark-green">Formulir Pendaftaran KKN Tematik</h4>
                        <p class="text-center text-muted small mb-4">Pastikan Anda telah menempuh minimal 100 SKS untuk mendaftar Kuliah Kerja Nyata.</p>
                        <form action="#" method="POST">
                            <div class="mb-3">
                                <label class="form-label small text-secondary">NIM Mahasiswa</label>
                                <input type="text" class="form-control" placeholder="NIM Anda" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small text-secondary">Total SKS yang Telah Ditempuh</label>
                                <input type="number" class="form-control" placeholder="Contoh: 104" required>
                            </div>
                            <button type="submit" class="btn text-white w-100 py-2 fw-semibold" style="background:var(--pro-color); border-radius:50px;">Daftar KKN</button>
                        </form>
                    </div>
                </div>
            </div>

        {{-- 5. KALENDER --}}
        @elseif($page === 'kalender')
            <div class="text-center mb-5">
                <span class="page-section-eyebrow">Rencana Kegiatan</span>
                <h2 class="page-section-title text-uppercase" style="color:var(--pro-color)">Kalender Akademik</h2>
                <div class="page-section-divider mx-auto mt-2" style="background-color: var(--pro-color)"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="info-card p-4 border-0 shadow-sm">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="fw-bold text-dark-green mb-0"><i class="bi bi-calendar3 me-2"></i>Agenda Kegiatan Semester Ganjil 2026/2027</h5>
                            <a href="#" class="btn btn-sm btn-outline-dark-green" style="border-radius:50px;"><i class="bi bi-download"></i> Download PDF</a>
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
                <h2 class="page-section-title text-uppercase" style="color:var(--pro-color)">Jadwal Kuliah</h2>
                <div class="page-section-divider mx-auto mt-2" style="background-color: var(--pro-color)"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-dark" style="background: var(--pro-color) !important;">
                                <tr>
                                    <th scope="col" class="py-3 px-4">Hari / Waktu</th>
                                    <th scope="col" class="py-3">Mata Kuliah</th>
                                    <th scope="col" class="py-3">Dosen</th>
                                    <th scope="col" class="py-3">Ruang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-3 px-4 fw-semibold text-dark-green">Senin / 08.00 - 09.40</td>
                                    <td>Filsafat Hukum Islam</td>
                                    <td>Drs. H. Mahrus, M.A.</td>
                                    <td>Ruang A.12</td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-4 fw-semibold text-dark-green">Selasa / 10.00 - 11.40</td>
                                    <td>Metodologi Penelitian Hukum</td>
                                    <td>Dr. H. Abu Bakar, M.H.I.</td>
                                    <td>Ruang B.04</td>
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
                <h2 class="page-section-title text-uppercase" style="color:var(--pro-color)">Alur Kelulusan</h2>
                <div class="page-section-divider mx-auto mt-2" style="background-color: var(--pro-color)"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="d-flex flex-column gap-4">
                        <div class="step-card bg-white p-4 rounded-4 shadow-sm">
                            <div class="step-number" style="background: var(--pro-gradient)">1</div>
                            <div class="step-content">
                                <h5>Penyelesaian Ujian Munaqasyah (Skripsi)</h5>
                                <p>Mahasiswa wajib lulus sidang skripsi dengan revisi minimal yang telah disetujui para penguji.</p>
                            </div>
                        </div>
                        <div class="step-card bg-white p-4 rounded-4 shadow-sm">
                            <div class="step-number" style="background: var(--pro-gradient)">2</div>
                            <div class="step-content">
                                <h5>Bebas Tanggungan Perpustakaan & Laboratorium</h5>
                                <p>Menyerahkan form bebas pinjaman buku dari perpustakaan pusat dan fakultas.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        {{-- 8. AKREDITASI --}}
        @elseif($page === 'akreditasi')
            <div class="text-center mb-5">
                <span class="page-section-eyebrow">Mutu Mutakhir</span>
                <h2 class="page-section-title text-uppercase" style="color:var(--pro-color)">Sertifikat Akreditasi</h2>
                <div class="page-section-divider mx-auto mt-2" style="background-color: var(--pro-color)"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card fac-card p-5 text-center border-0 shadow-sm" style="border-top: 4px solid var(--pro-color) !important;">
                        <div class="icon-circle mx-auto mb-3" style="background:rgba(0,0,0,0.05); color:var(--pro-color)"><i class="bi bi-patch-check-fill fs-3"></i></div>
                        <h4 class="fw-bold mb-2">{{ $data['name'] }}</h4>
                        <p class="text-muted mb-4">Terakreditasi BAN-PT</p>
                        <span class="badge bg-gold px-4 py-2 text-uppercase fw-bold rounded-pill mb-4" style="font-size:1.1rem; background-color:#cca43b !important;">Baik Sekali</span>
                        <div><a href="#" class="btn btn-fac text-white" style="background:var(--pro-color); border-radius:50px;"><i class="bi bi-eye"></i> Lihat SK Sertifikat</a></div>
                    </div>
                </div>
            </div>
        @endif

    </div>
</section>
@endsection
