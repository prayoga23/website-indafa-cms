@extends('frontend.layouts.app')

@section('title', $title . ' - Bidang Penjaminan LPM')

@section('content')
<!-- Hero Section -->
<section class="page-hero" style="background: linear-gradient(rgba(11, 83, 69, 0.92), rgba(0, 0, 0, 0.88)), url('{{ asset('storage/banners/otoYXSrIydgSL8DpfylH0mSQJD7CGa5MsaMOuPpK.png') }}') no-repeat center center; background-size: cover; padding-top: 150px; padding-bottom: 70px;">
    <div class="container text-center text-white">

        <h5 class="text-gold text-uppercase fw-bold" style="font-size:1.1rem; color: #ffc107 !important;">Lembaga Penjaminan Mutu</h5>
        <div class="page-hero-divider mx-auto" style="width: 80px; height: 4px; background-color: #ffc107; border-radius: 2px;"></div>
        <h1 class="display-4 fw-bold text-uppercase mb-3">{{ $title }}</h1>
    </div>
</section>

<section class="py-5 bg-premium-light">
    <div class="container py-3">

        <div class="row g-4">
            <!-- Sidebar Navigation -->
            <div class="col-lg-3">
                <div class="card border-0 shadow-sm rounded-4 sticky-top" style="top: 100px; z-index: 10;">
                    <div class="card-header bg-dark-green text-white fw-bold py-3 rounded-top-4" style="background-color: #0b5345 !important; color: #ffffff !important;">
                        <i class="bi bi-award me-2"></i> Bidang Penjaminan
                    </div>
                    <div class="list-group list-group-flush rounded-bottom-4">
                        @foreach($validPages as $key => $label)
                            <a href="{{ route('frontend.lpm.penjaminan', $key) }}"
                               class="list-group-item list-group-item-action py-3 d-flex align-items-center justify-content-between {{ $page === $key ? 'active bg-success text-white border-success fw-bold' : 'text-dark' }}">
                                <span><i class="bi bi-chevron-right me-2 small"></i>{{ $label }}</span>
                                @if($page === $key)<i class="bi bi-check-circle-fill"></i>@endif
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="col-lg-9">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">

                    @if($page === 'kebijakan-mutu')
                        <h3 class="fw-bold text-dark-green mb-3">Kebijakan Mutu</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary" style="line-height:1.8; text-align:justify;">
                            Kebijakan Mutu INDAFA merupakan garansi tertulis institusi dalam menyelenggarakan pendidikan tinggi Islam secara konsisten, disiplin, dan senantiasa berorientasi pada perbaikan mutu secara berkelanjutan.
                        </p>
                        <div class="p-4 bg-light rounded-4 border-start border-4 border-success mt-4">
                            <h6 class="fw-bold text-dark-green mb-2">Prinsip Utama Kebijakan Mutu:</h6>
                            <ul class="text-secondary mb-0 lh-lg">
                                <li>Kepatuhan pada Standar Nasional Pendidikan Tinggi (SN-Dikti).</li>
                                <li>Integrasi keilmuan Islam dan pesantren dalam setiap aspek kurikulum.</li>
                                <li>Transparansi dan obyektifitas dalam evaluasi kinerja.</li>
                                <li>Perbaikan mutu berkelanjutan melalui siklus PPEPP.</li>
                            </ul>
                        </div>

                    @elseif($page === 'spmi')
                        <h3 class="fw-bold text-dark-green mb-3">Sistem Penjaminan Mutu Internal (SPMI)</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary" style="line-height:1.8;">
                            Sistem Penjaminan Mutu Internal (SPMI) INDAFA berlandaskan pada 5 pilar utama siklus PPEPP:
                        </p>

                        <div class="row g-3 my-4">
                            <div class="col-md-4">
                                <div class="p-3 bg-white border border-success rounded-3 text-center">
                                    <h5 class="fw-bold text-success mb-1">P - Penetapan</h5>
                                    <p class="small text-muted mb-0">Penetapan Standar Mutu</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 bg-white border border-success rounded-3 text-center">
                                    <h5 class="fw-bold text-success mb-1">P - Pelaksanaan</h5>
                                    <p class="small text-muted mb-0">Pelaksanaan Standar Mutu</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="p-3 bg-white border border-success rounded-3 text-center">
                                    <h5 class="fw-bold text-success mb-1">E - Evaluasi</h5>
                                    <p class="small text-muted mb-0">Evaluasi Pelaksanaan Standar</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-white border border-warning rounded-3 text-center">
                                    <h5 class="fw-bold text-warning text-dark mb-1">P - Pengendalian</h5>
                                    <p class="small text-muted mb-0">Pengendalian Standar Mutu</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-white border border-warning rounded-3 text-center">
                                    <h5 class="fw-bold text-warning text-dark mb-1">P - Peningkatan</h5>
                                    <p class="small text-muted mb-0">Peningkatan Standar Mutu</p>
                                </div>
                            </div>
                        </div>

                    @elseif($page === 'ami')
                        <h3 class="fw-bold text-dark-green mb-3">Audit Mutu Internal (AMI)</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary" style="line-height:1.8;">
                            Audit Mutu Internal (AMI) diselenggarakan setiap akhir tahun akademik oleh tim auditor independen yang tersertifikasi internal/eksternal untuk mengevaluasi kesesuaian pelaksanaan dengan standar SPMI.
                        </p>
                        <div class="alert alert-light border rounded-4 p-4 mt-3">
                            <h6 class="fw-bold text-dark mb-2"><i class="bi bi-diagram-3 me-2 text-success"></i>Tahapan AMI INDAFA:</h6>
                            <ol class="mb-0 small text-secondary lh-lg">
                                <li>Sosialisasi & Pemutakhiran Instrumen Audit</li>
                                <li>Desk Evaluation (Audit Kecukupan Dokumen)</li>
                                <li>Audit Lapangan (Visitasi & Wawancara Unit Kerja)</li>
                                <li>Rapat Tinjauan Manajemen (RTM) & Rekomendasi Tindak Lanjut</li>
                            </ol>
                        </div>

                    @elseif($page === 'peraturan-akreditasi')
                        <h3 class="fw-bold text-dark-green mb-3">Peraturan Akreditasi</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary" style="line-height:1.8;">
                            Himpunan Peraturan Mendikbudristek, Peraturan BAN-PT, dan Peraturan LAMDIK / LAMEMBA yang menjadi rujukan dalam penilaian akreditasi program studi dan perguruan tinggi.
                        </p>
                        <div class="list-group rounded-4 mt-3">
                            <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">Permendikbudristek No. 53 Tahun 2023</h6>
                                    <p class="small text-muted mb-0">Penjaminan Mutu Pendidikan Tinggi</p>
                                </div>
                                <a href="#" class="btn btn-sm btn-outline-success rounded-pill px-3"><i class="bi bi-download me-1"></i>Unduh</a>
                            </div>
                            <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">Peraturan BAN-PT No. 3 Tahun 2024</h6>
                                    <p class="small text-muted mb-0">Instrumen Akreditasi Program Studi</p>
                                </div>
                                <a href="#" class="btn btn-sm btn-outline-success rounded-pill px-3"><i class="bi bi-download me-1"></i>Unduh</a>
                            </div>
                        </div>

                    @elseif($page === 'data-akreditasi')
                        <h3 class="fw-bold text-dark-green mb-3">Data Akreditasi INDAFA</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary mb-4">
                            Status akreditasi terkini untuk Institusi dan seluruh Program Studi di bawah binaan LPM INDAFA Bondowoso:
                        </p>
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-success">
                                    <tr>
                                        <th>Program Studi / Institusi</th>
                                        <th>Peringkat Akreditasi</th>
                                        <th>No. SK BAN-PT</th>
                                        <th>Masa Berlaku</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>IAI Darul Falah Bondowoso</strong></td>
                                        <td><span class="badge bg-success">Baik Sekali</span></td>
                                        <td>SK BAN-PT No. 1024/SK/BAN-PT/2024</td>
                                        <td>2024 - 2029</td>
                                    </tr>
                                    <tr>
                                        <td>Hukum Keluarga Islam (S1)</td>
                                        <td><span class="badge bg-success">Baik Sekali</span></td>
                                        <td>SK BAN-PT No. 842/SK/BAN-PT/2023</td>
                                        <td>2023 - 2028</td>
                                    </tr>
                                    <tr>
                                        <td>Hukum Ekonomi Syariah (S1)</td>
                                        <td><span class="badge bg-success">Baik</span></td>
                                        <td>SK BAN-PT No. 611/SK/BAN-PT/2023</td>
                                        <td>2023 - 2028</td>
                                    </tr>
                                    <tr>
                                        <td>Ekonomi Syariah (S1)</td>
                                        <td><span class="badge bg-success">Baik</span></td>
                                        <td>SK BAN-PT No. 490/SK/BAN-PT/2024</td>
                                        <td>2024 - 2029</td>
                                    </tr>
                                    <tr>
                                        <td>Pendidikan Agama Islam (S1)</td>
                                        <td><span class="badge bg-success">Baik Sekali</span></td>
                                        <td>SK LAMDIK No. 312/SK/LAMDIK/2024</td>
                                        <td>2024 - 2029</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    @elseif($page === 'laporan-kepuasan')
                        <h3 class="fw-bold text-dark-green mb-3">Laporan Kepuasan Stakeholder</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary" style="line-height:1.8;">
                            Lembaga Penjaminan Mutu (LPM) secara berkala melaksanakan pengukuran survei kepuasan terhadap seluruh pemangku kepentingan (*stakeholder*) meliputi Mahasiswa, Dosen, Tenaga Kependidikan, serta Mitra Kerja / Pengguna Lulusan.
                        </p>

                        <div class="row g-3 my-4">
                            <div class="col-md-6">
                                <div class="p-3 border rounded-4 bg-light">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="fw-bold text-dark small">Kepuasan Mahasiswa (PBM & Layanan)</span>
                                        <span class="badge bg-success">91% Sangat Puas</span>
                                    </div>
                                    <div class="progress" style="height:12px;">
                                        <div class="progress-bar bg-success" style="width: 91%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded-4 bg-light">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="fw-bold text-dark small">Kepuasan Dosen & Tenaga Kependidikan</span>
                                        <span class="badge bg-success">92% Sangat Puas</span>
                                    </div>
                                    <div class="progress" style="height:12px;">
                                        <div class="progress-bar bg-success" style="width: 92%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded-4 bg-light">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="fw-bold text-dark small">Kepuasan Layanan Sarpras & Digital</span>
                                        <span class="badge bg-warning text-dark">88% Puas</span>
                                    </div>
                                    <div class="progress" style="height:12px;">
                                        <div class="progress-bar bg-warning" style="width: 88%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded-4 bg-light">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="fw-bold text-dark small">Kepuasan Pengguna Lulusan / Mitra</span>
                                        <span class="badge bg-success">90% Sangat Puas</span>
                                    </div>
                                    <div class="progress" style="height:12px;">
                                        <div class="progress-bar bg-success" style="width: 90%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h6 class="fw-bold text-dark mb-3"><i class="bi bi-file-earmark-pdf me-2 text-danger"></i>Dokumen Laporan Kepuasan:</h6>
                        <div class="list-group rounded-4">
                            <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">Laporan Hasil Survei Kepuasan Stakeholder TA 2024/2025</h6>
                                    <p class="small text-muted mb-0">Laporan Rekapitulasi Survei Kepuasan Institusi</p>
                                </div>
                                <a href="#" class="btn btn-sm btn-outline-success rounded-pill px-3"><i class="bi bi-download me-1"></i>Unduh PDF</a>
                            </div>
                        </div>

                    @elseif($page === 'monev-gjm-gkm')
                        <h3 class="fw-bold text-dark-green mb-3">Monev GJM & GKM</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary" style="line-height:1.8;">
                            Monitoring dan Evaluasi (Monev) diselenggarakan secara terstruktur oleh <strong>Gugus Jaminan Mutu (GJM)</strong> di tingkat Fakultas dan <strong>Gugus Kendali Mutu (GKM)</strong> di tingkat Program Studi untuk menjamin ketercapaian standar mutu akademik & non-akademik.
                        </p>

                        {{-- GJM FAKULTAS --}}
                        <div class="card border-0 bg-light rounded-4 p-4 mb-4 mt-4">
                            <h5 class="fw-bold text-dark-green mb-3"><i class="bi bi-building me-2"></i>1. Laporan Monev GJM (Fakultas)</h5>
                            <div class="list-group rounded-3">
                                <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-bold text-dark mb-1">Laporan Monev GJM Fakultas Syariah</h6>
                                        <p class="small text-muted mb-0">Evaluasi Tata Kelola & Layanan Fakultas</p>
                                    </div>
                                    <a href="#" class="btn btn-sm btn-outline-success rounded-pill px-3"><i class="bi bi-download me-1"></i>Unduh PDF</a>
                                </div>
                                <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-bold text-dark mb-1">Laporan Monev GJM Fakultas Ekonomi Bisnis Islam & Tarbiyah (FEBIT)</h6>
                                        <p class="small text-muted mb-0">Evaluasi Tata Kelola & Layanan Fakultas</p>
                                    </div>
                                    <a href="#" class="btn btn-sm btn-outline-success rounded-pill px-3"><i class="bi bi-download me-1"></i>Unduh PDF</a>
                                </div>
                            </div>
                        </div>

                        {{-- GKM PRODI --}}
                        <div class="card border-0 bg-light rounded-4 p-4">
                            <h5 class="fw-bold text-dark-green mb-3"><i class="bi bi-mortarboard me-2"></i>2. Laporan Monev GKM (Program Studi)</h5>
                            <div class="list-group rounded-3">
                                <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-bold text-dark mb-1">Laporan Monev GKM Prodi Hukum Keluarga Islam (HKI)</h6>
                                        <p class="small text-muted mb-0">Evaluasi PBM & Pembimbingan Akademik/Skripsi</p>
                                    </div>
                                    <a href="#" class="btn btn-sm btn-outline-success rounded-pill px-3"><i class="bi bi-download me-1"></i>Unduh PDF</a>
                                </div>
                                <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-bold text-dark mb-1">Laporan Monev GKM Prodi Hukum Ekonomi Syariah (HES)</h6>
                                        <p class="small text-muted mb-0">Evaluasi PBM & Pembimbingan Akademik/Skripsi</p>
                                    </div>
                                    <a href="#" class="btn btn-sm btn-outline-success rounded-pill px-3"><i class="bi bi-download me-1"></i>Unduh PDF</a>
                                </div>
                                <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-bold text-dark mb-1">Laporan Monev GKM Prodi Manajemen Bisnis Syariah (MBS)</h6>
                                        <p class="small text-muted mb-0">Evaluasi PBM & Pembimbingan Akademik/Skripsi</p>
                                    </div>
                                    <a href="#" class="btn btn-sm btn-outline-success rounded-pill px-3"><i class="bi bi-download me-1"></i>Unduh PDF</a>
                                </div>
                            </div>
                        </div>

                    @elseif($page === 'kalender-mutu')
                        <h3 class="fw-bold text-dark-green mb-3">Kalender Mutu LPM</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary mb-4">
                            Agendakan dan pantau seluruh rangkaian kegiatan penjaminan mutu sepanjang tahun berjalan:
                        </p>
                        <div class="table-responsive">
                            <table class="table table-striped align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Bulan</th>
                                        <th>Agenda Penjaminan Mutu</th>
                                        <th>Pelaksana</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Maret 2026</td>
                                        <td>Monev Tengah Semester & Evaluasi PBM</td>
                                        <td>GKM Prodi</td>
                                    </tr>
                                    <tr>
                                        <td>Juni 2026</td>
                                        <td>Survei Kepuasan Pemangku Kepentingan</td>
                                        <td>GJM Fakultas</td>
                                    </tr>
                                    <tr>
                                        <td>Agustus 2026</td>
                                        <td>Audit Mutu Internal (AMI) Akademik</td>
                                        <td>LPM & Tim Auditor</td>
                                    </tr>
                                    <tr>
                                        <td>September 2026</td>
                                        <td>Rapat Tinjauan Manajemen (RTM)</td>
                                        <td>Rektorat & Senat</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif

                </div>
            </div>
        </div>

    </div>
</section>
@endsection
