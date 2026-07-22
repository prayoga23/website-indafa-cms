@extends('frontend.layouts.app')

@section('title', $title . ' - Bidang Pengawasan LPM')

@section('content')
<!-- Hero Section -->
<section class="page-hero" style="background: linear-gradient(rgba(11, 83, 69, 0.92), rgba(0, 0, 0, 0.88)), url('{{ asset('storage/banners/Q8Fe55EmaxIEh2wLTOBa08cqk2Vsy8ljDEdB0a5i.png') }}') no-repeat center center; background-size: cover; padding-top: 150px; padding-bottom: 70px;">
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
                    <div class="card-header bg-dark-green text-white fw-bold py-3 rounded-top-4">
                        <i class="bi bi-shield-check me-2"></i> Bidang Pengawasan
                    </div>
                    <div class="list-group list-group-flush rounded-bottom-4">
                        @foreach($validPages as $key => $label)
                            <a href="{{ route('frontend.lpm.pengawasan', $key) }}"
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

                    @if($page === 'pedoman')
                        <h3 class="fw-bold text-dark-green mb-3">Pedoman Institut</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary" style="line-height:1.8;">
                            Pedoman Institut merupakan himpunan regulasi formal, petunjuk teknis, dan standar operasional yang mengatur pelaksanaan Tridharma Perguruan Tinggi dan tata kelola di INDAFA Bondowoso.
                        </p>
                        
                        <div class="row g-3 my-4">
                            <div class="col-md-6">
                                <div class="p-3 border rounded-3 bg-light d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-bold text-dark mb-1">Pedoman Akademik Institut</h6>
                                        <p class="small text-muted mb-0">PDF - 2.4 MB</p>
                                    </div>
                                    <a href="#" class="btn btn-sm btn-success rounded-pill px-3"><i class="bi bi-download me-1"></i>Unduh</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded-3 bg-light d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-bold text-dark mb-1">Pedoman Tata Kelola & Organisasi</h6>
                                        <p class="small text-muted mb-0">PDF - 1.8 MB</p>
                                    </div>
                                    <a href="#" class="btn btn-sm btn-success rounded-pill px-3"><i class="bi bi-download me-1"></i>Unduh</a>
                                </div>
                            </div>
                        </div>

                    @elseif($page === 'kalender')
                        <h3 class="fw-bold text-dark-green mb-3">Kalender Akademik</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary mb-4">
                            Jadwal acuan pelaksanaan kegiatan pembelajaran, ujian, monev perkuliahan, dan wisuda dalam satu tahun akademik:
                        </p>

                        <div class="table-responsive mb-4">
                            <table class="table table-bordered align-middle">
                                <thead class="table-success">
                                    <tr>
                                        <th>Kegiatan Akademik</th>
                                        <th>Semester Gasal</th>
                                        <th>Semester Genap</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Registrasi & KRS Online</td>
                                        <td>August 2026</td>
                                        <td>February 2027</td>
                                    </tr>
                                    <tr>
                                        <td>Awal Perkuliah / PBM</td>
                                        <td>September 2026</td>
                                        <td>March 2027</td>
                                    </tr>
                                    <tr>
                                        <td>Monev Tengah Semester & UTS</td>
                                        <td>October 2026</td>
                                        <td>April 2027</td>
                                    </tr>
                                    <tr>
                                        <td>Ujian Akhir Semester (UAS)</td>
                                        <td>December 2026</td>
                                        <td>June 2027</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    @elseif($page === 'kontrak-kinerja')
                        <h3 class="fw-bold text-dark-green mb-3">Kontrak Kinerja</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary" style="line-height:1.8;">
                            Kontrak Kinerja merupakan dokumen komitmen pencapaian Indikator Kinerja Utama (IKU) antara Rektor, Dekan, Ketua Program Studi, dan Kepala Unit Kerja di lingkungan INDAFA.
                        </p>
                        <div class="alert alert-success border-0 rounded-4 p-4 mt-3">
                            <h6 class="fw-bold mb-2"><i class="bi bi-info-circle me-2"></i>Sasaran Kontrak Kinerja</h6>
                            <ul class="mb-0 small lh-lg">
                                <li>Peningkatan kualitas kelulusan dan serapan alumni di dunia kerja/pesantren.</li>
                                <li>Peningkatan publikasi karya ilmiah dosen di jurnal terakreditasi SINTA / Scopus.</li>
                                <li>Peningkatan efisiensi tata kelola administrasi & kepuasan mahasiswa.</li>
                            </ul>
                        </div>

                    @elseif($page === 'monev-kinerja')
                        <h3 class="fw-bold text-dark-green mb-3">Monev Kinerja</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary" style="line-height:1.8;">
                            Monitoring dan Evaluasi (Monev) Kinerja dilaksanakan secara berseri setiap pertengahan dan akhir semester untuk memastikan seluruh unit kerja mencapai target kontrak kinerja.
                        </p>

                        <div class="row g-3 mt-3">
                            <div class="col-md-4">
                                <div class="card p-3 text-center border-0 bg-light rounded-4">
                                    <h2 class="fw-bold text-success mb-1">94%</h2>
                                    <p class="small text-muted mb-0">Ketercapaian PBM Dosen</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card p-3 text-center border-0 bg-light rounded-4">
                                    <h2 class="fw-bold text-warning mb-1">88%</h2>
                                    <p class="small text-muted mb-0">Penyelesaian Skripsi Tepat Waktu</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card p-3 text-center border-0 bg-light rounded-4">
                                    <h2 class="fw-bold text-success mb-1">92%</h2>
                                    <p class="small text-muted mb-0">Indeks Kepuasan Mahasiswa</p>
                                </div>
                            </div>
                        </div>

                    @elseif($page === 'audit-kinerja')
                        <h3 class="fw-bold text-dark-green mb-3">Laporan Audit Kinerja</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary" style="line-height:1.8;">
                            Ringkasan dan laporan hasil audit kinerja berkala unit kerja di lingkungan INDAFA yang dilaporkan secara independen kepada Senat dan Rektorat.
                        </p>

                        <div class="list-group rounded-4 mt-4">
                            <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">Laporan Audit Kinerja Tahun Akademik 2025/2026</h6>
                                    <p class="small text-muted mb-0">Diperbarui: Januari 2026</p>
                                </div>
                                <a href="#" class="btn btn-sm btn-outline-success rounded-pill px-3"><i class="bi bi-file-earmark-pdf me-1"></i>Unduh Laporan</a>
                            </div>
                            <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">Laporan Audit Kinerja Tahun Akademik 2024/2025</h6>
                                    <p class="small text-muted mb-0">Diperbarui: Juli 2025</p>
                                </div>
                                <a href="#" class="btn btn-sm btn-outline-success rounded-pill px-3"><i class="bi bi-file-earmark-pdf me-1"></i>Unduh Laporan</a>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>

    </div>
</section>
@endsection
