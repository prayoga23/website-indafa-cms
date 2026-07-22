@extends('frontend.layouts.app')

@section('title', $title . ' - LPM INDAFA')

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
                        <i class="bi bi-list-nested me-2"></i> Navigation Menu
                    </div>
                    <div class="list-group list-group-flush rounded-bottom-4">
                        @foreach($validPages as $key => $label)
                            <a href="{{ route('frontend.lpm.profil', $key) }}"
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

                    @if($page === 'sejarah')
                        <h3 class="fw-bold text-dark-green mb-3">Sejarah LPM INDAFA</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary" style="line-height:1.8; text-align:justify;">
                            Lembaga Penjaminan Mutu (LPM) Institut Agama Islam Darul Falah Bondowoso didirikan bersamaan dengan penguatan tata kelola kelembagaan institusi. Didorong oleh komitmen untuk menghadirkan pendidikan tinggi Islam yang bermutu tinggi dan akuntabel, LPM dibentuk sebagai badan independen di tingkat institut yang melayani kontrol mutu secara menyeluruh.
                        </p>
                        <p class="text-secondary" style="line-height:1.8; text-align:justify;">
                            Sejak awal berdiri, LPM konsisten mendampingi program studi dalam penyusunan borang akreditasi, melatih para auditor mutu internal, serta membangun budaya sistem penjaminan mutu yang terintegrasi dengan nilai-nilai pesantren dan standar nasional perguruan tinggi.
                        </p>

                    @elseif($page === 'visi-misi')
                        <h3 class="fw-bold text-dark-green mb-3">Visi & Misi LPM INDAFA</h3>
                        <div class="page-section-divider mb-4"></div>

                        <div class="card bg-light border-start border-4 border-success p-4 mb-4">
                            <h5 class="fw-bold text-dark-green mb-2"><i class="bi bi-eye-fill me-2 text-success"></i>Visi LPM</h5>
                            <p class="text-secondary mb-0" style="line-height:1.8;">
                                "Menjadi lembaga penjaminan mutu yang profesional, terpercaya, dan Islami dalam mewujudkan budaya mutu pendidikan tinggi yang unggul dan berdaya saing di tingkat nasional pada tahun 2030."
                            </p>
                        </div>

                        <h5 class="fw-bold text-dark-green mb-3"><i class="bi bi-bullseye me-2 text-warning"></i>Misi LPM</h5>
                        <ul class="text-secondary lh-lg mb-4">
                            <li>Mengembangkan dan mengimplementasikan dokumen SPMI secara berkelanjutan.</li>
                            <li>Melakukan Audit Mutu Internal (AMI) secara berkala dan obyektif di seluruh unit kerja.</li>
                            <li>Memberikan pendampingan intensif bagi program studi dalam proses akreditasi BAN-PT / LAM.</li>
                            <li>Membangun budaya mutu (quality culture) di kalangan dosen, mahasiswa, dan tenaga kependidikan.</li>
                            <li>Mengukur dan mengevaluasi kepuasan pemangku kepentingan secara transparan.</li>
                        </ul>

                    @elseif($page === 'struktur-organisasi')
                        <h3 class="fw-bold text-dark-green mb-3">Struktur Organisasi LPM</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary mb-4">
                            Struktur tata kelola LPM dirancang secara efisien untuk mendukung fungsi pengawasan dan penjaminan mutu di tingkat institut, fakultas, hingga program studi:
                        </p>

                        <div class="text-center p-4 bg-light rounded-4 mb-4">
                            <img src="{{ asset('assets/img/carousel-3.jpg') }}" alt="Struktur Organisasi LPM" class="img-fluid rounded shadow-sm max-h-400" style="max-height:400px; object-fit:cover;">
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="p-3 bg-white border rounded-3">
                                    <h6 class="fw-bold text-dark-green mb-1">Ketua LPM</h6>
                                    <p class="small text-muted mb-0">Penanggung jawab utama seluruh kegiatan penjaminan mutu di lingkungan institusi.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-white border rounded-3">
                                    <h6 class="fw-bold text-dark-green mb-1">Sekretaris LPM</h6>
                                    <p class="small text-muted mb-0">Mengelola administrasi, dokumentasi, dan koordinator kegiatan operasional.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-white border rounded-3">
                                    <h6 class="fw-bold text-dark-green mb-1">Kepala Pusat Pengawasan Mutu</h6>
                                    <p class="small text-muted mb-0">Mengordinasikan audit kinerja, monev akademik, dan kepatuhan pedoman.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-white border rounded-3">
                                    <h6 class="fw-bold text-dark-green mb-1">Kepala Pusat Penjaminan Mutu & Akreditasi</h6>
                                    <p class="small text-muted mb-0">Mengelola AMI, perumusan standar mutu, dan fasilitasi akreditasi prodi.</p>
                                </div>
                            </div>
                        </div>

                    @elseif($page === 'sdm')
                        <h3 class="fw-bold text-dark-green mb-3">Sumber Daya Manusia (SDM) LPM</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary mb-4">
                            LPM diperkuat oleh auditor internal tersertifikasi serta tenaga ahli di bidang penjaminan mutu perguruan tinggi:
                        </p>

                        <div class="row g-4">
                            <div class="col-md-6 col-lg-4">
                                <div class="card h-100 border text-center p-3 rounded-4">
                                    <img src="{{ asset('storage/lecturers/3EjN4NWfMRn1AN2wWVV53chufmz3j88IDpHMBeSb.png') }}" class="rounded-circle mx-auto mb-3 img-thumbnail shadow-sm" style="width:100px; height:100px; object-fit:cover;" alt="Ketua LPM">
                                    <h6 class="fw-bold text-dark mb-1">Dr. H. Ahmad Syafii, M.Pd.I</h6>
                                    <p class="small text-success fw-semibold mb-2">Ketua LPM</p>
                                    <p class="small text-muted mb-0">Auditor Utama & Pakar Manajemen Pendidikan Islam</p>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="card h-100 border text-center p-3 rounded-4">
                                    <img src="{{ asset('assets/img/user.png') }}" class="rounded-circle mx-auto mb-3" style="width:100px; height:100px; object-fit:cover;" alt="Sekretaris">
                                    <h6 class="fw-bold text-dark mb-1">Ustadzah Nuriyah, M.A.</h6>
                                    <p class="small text-success fw-semibold mb-2">Sekretaris LPM</p>
                                    <p class="small text-muted mb-0">Auditor Mutu Internal & Spesialis Evaluasi Pendidikan</p>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="card h-100 border text-center p-3 rounded-4">
                                    <img src="{{ asset('assets/img/user.png') }}" class="rounded-circle mx-auto mb-3" style="width:100px; height:100px; object-fit:cover;" alt="Kabid Pengawasan">
                                    <h6 class="fw-bold text-dark mb-1">M. Farhan, M.H.</h6>
                                    <p class="small text-success fw-semibold mb-2">Kabid Pengawasan</p>
                                    <p class="small text-muted mb-0">Auditor Kinerja & Evaluasi Tata Kelola</p>
                                </div>
                            </div>
                        </div>

                    @elseif($page === 'tupoksi')
                        <h3 class="fw-bold text-dark-green mb-3">Tugas Pokok & Fungsi (Tupoksi)</h3>
                        <div class="page-section-divider mb-4"></div>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="p-4 bg-light rounded-4 h-100">
                                    <h5 class="fw-bold text-dark-green mb-3"><i class="bi bi-briefcase-fill me-2 text-success"></i>Tugas Pokok</h5>
                                    <ul class="text-secondary lh-lg mb-0">
                                        <li>Merumuskan kebijakan dan standar penjaminan mutu institusi.</li>
                                        <li>Melaksanakan audit mutu internal bidang akademik dan non-akademik.</li>
                                        <li>Memonitoring pencapaian indikator kinerja utama (IKU) dan indikator kinerja tambahan (IKT).</li>
                                        <li>Memfasilitasi akreditasi institusi dan seluruh program studi.</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="p-4 bg-light rounded-4 h-100">
                                    <h5 class="fw-bold text-dark-green mb-3"><i class="bi bi-gear-fill me-2 text-warning"></i>Fungsi Utama</h5>
                                    <ul class="text-secondary lh-lg mb-0">
                                        <li>Fungsi perancangan dan penetapan standar mutu internal.</li>
                                        <li>Fungsi pengendalian dan evaluasi pelaksanaan standar mutu.</li>
                                        <li>Fungsi rekomendasi perbaikan dan peningkatan mutu berkelanjutan.</li>
                                        <li>Fungsi pelaporan berkala hasil audit mutu kepada Rektor.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    @elseif($page === 'rkat')
                        <h3 class="fw-bold text-dark-green mb-3">RKAT LPM</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary mb-4">
                            Rencana Kerja dan Anggaran Tahunan (RKAT) LPM berfokus pada penguatan siklus PPEPP, pelatihan auditor internal, serta fasilitas akreditasi:
                        </p>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle">
                                <thead class="table-success">
                                    <tr>
                                        <th>No</th>
                                        <th>Program Kerja Utama</th>
                                        <th>Target Output</th>
                                        <th>Jadwal Pelaksanaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Workshop Penyusunan & Review Standar SPMI</td>
                                        <td>Dokumen SPMI Terbaru</td>
                                        <td>Triwulan I</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Pelatihan Auditor Mutu Internal (AMI)</td>
                                        <td>15 Auditor Tersertifikasi</td>
                                        <td>Triwulan II</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Pelaksanaan Audit Mutu Internal Akademik</td>
                                        <td>Laporan Audit Mutu Akademik</td>
                                        <td>Triwulan III</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Survei Kepuasan Pemangku Kepentingan (GJM/GKM)</td>
                                        <td>Laporan Indeks Kepuasan</td>
                                        <td>Triwulan IV</td>
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
