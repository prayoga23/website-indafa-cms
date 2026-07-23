@extends('frontend.layouts.app')

@section('title', $title . ' - LP2M INDAFA')

@section('content')
<!-- Hero Section -->
<section class="page-hero" style="background: linear-gradient(rgba(11, 83, 69, 0.92), rgba(0, 0, 0, 0.88)), url('{{ asset('storage/banners/otoYXSrIydgSL8DpfylH0mSQJD7CGa5MsaMOuPpK.png') }}') no-repeat center center; background-size: cover; padding-top: 150px; padding-bottom: 70px;">
    <div class="container text-center text-white">

        <h5 class="text-gold text-uppercase fw-bold" style="font-size:1.1rem; color: #ffc107 !important;">Lembaga Penelitian & Pengabdian Masyarakat</h5>
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
                        <i class="bi bi-list-nested me-2"></i> Menu Profil LP2M
                    </div>
                    <div class="list-group list-group-flush rounded-bottom-4">
                        @foreach($validPages as $key => $label)
                            <a href="{{ route('frontend.lp2m.profil', $key) }}"
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
                        <h3 class="fw-bold text-dark-green mb-3">Sejarah LP2M INDAFA</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary" style="line-height:1.8; text-align:justify;">
                            Lembaga Penelitian dan Pengabdian kepada Masyarakat (LP2M) INDAFA Bondowoso dibentuk untuk merespons kebutuhan pengembangan riset ilmiah keislaman serta wujud bakti perguruan tinggi terhadap pemberdayaan masyarakat pedesaan dan pesantren.
                        </p>
                        <p class="text-secondary" style="line-height:1.8; text-align:justify;">
                            Sebagai motor penggerak keilmuan, LP2M terus berinovasi mengelola hibah riset Litapdimas, mendampingi publikasi jurnal ilmiah terakreditasi, melayani pendaftaran HKI, dan menerjunkan ribuan mahasiswa KKN dalam program pengabdian berbasis pesantren.
                        </p>

                    @elseif($page === 'visi-misi')
                        <h3 class="fw-bold text-dark-green mb-3">Visi, Misi, dan Tujuan LP2M</h3>
                        <div class="page-section-divider mb-4"></div>

                        <div class="card bg-light border-start border-4 border-success p-4 mb-4">
                            <h5 class="fw-bold text-dark-green mb-2"><i class="bi bi-eye-fill me-2 text-success"></i>Visi LP2M</h5>
                            <p class="text-secondary mb-0" style="line-height:1.8;">
                                "Menjadi pusat keunggulan penelitian dan pengabdian masyarakat berbasis keilmuan Islam interdisipliner yang inovatif, solutif, dan bereputasi nasional pada tahun 2030."
                            </p>
                        </div>

                        <h5 class="fw-bold text-dark-green mb-3"><i class="bi bi-bullseye me-2 text-warning"></i>Misi LP2M</h5>
                        <ul class="text-secondary lh-lg mb-4">
                            <li>Mengembangkan riset berkualitas di bidang studi Islam, hukum syariah, ekonomi Islam, dan pendidikan.</li>
                            <li>Menyelenggarakan program pengabdian berbasis pemberdayaan masyarakat pesantren dan masyarakat lokal.</li>
                            <li>Memfasilitasi peningkatan publikasi ilmiah pada jurnal nasional terakreditasi dan jurnal internasional.</li>
                            <li>Mendorong perolehan Hak Kekayaan Intelektual (HKI) bagi riset dosen dan mahasiswa.</li>
                        </ul>

                        <h5 class="fw-bold text-dark-green mb-3"><i class="bi bi-flag-fill me-2 text-success"></i>Tujuan Strategis</h5>
                        <ul class="text-secondary lh-lg mb-0">
                            <li>Meningkatkan kuantitas & kualitas publikasi ilmiah dosen INDAFA.</li>
                            <li>Terwujudnya desa binaan dan kemitraan pengabdian yang produktif.</li>
                            <li>Membangun iklim akademik berdaya saing tinggi.</li>
                        </ul>

                    @elseif($page === 'tupoksi')
                        <h3 class="fw-bold text-dark-green mb-3">Tugas Pokok & Fungsi (Tupoksi) LP2M</h3>
                        <div class="page-section-divider mb-4"></div>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="p-4 bg-light rounded-4 h-100">
                                    <h5 class="fw-bold text-dark-green mb-3"><i class="bi bi-journal-code me-2 text-success"></i>Tugas Pokok Riset</h5>
                                    <ul class="text-secondary lh-lg mb-0">
                                        <li>Mengelola alokasi dan seleksi hibah penelitian internal & eksternal (Litapdimas).</li>
                                        <li>Memonitoring mutu dan etika penelitian dosen.</li>
                                        <li>Memfasilitasi pengajuan Hak Cipta dan Paten (HKI).</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-4 bg-light rounded-4 h-100">
                                    <h5 class="fw-bold text-dark-green mb-3"><i class="bi bi-people-fill me-2 text-warning"></i>Tugas Pokok Pengabdian</h5>
                                    <ul class="text-secondary lh-lg mb-0">
                                        <li>Mengatur skema KKN tematik dan pendampingan masyarakat.</li>
                                        <li>Menginisiasi kerjasama riset & pengabdian dengan instansi luar.</li>
                                        <li>Menyusun laporan kinerja pengabdian berkala.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    @elseif($page === 'dokumen-resmi')
                        <h3 class="fw-bold text-dark-green mb-3">Dokumen Resmi LP2M</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary mb-4">Unduh dokumen resmi, statuta riset, dan SK penetapan LP2M INDAFA:</p>

                        <div class="list-group rounded-4">
                            <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">Rencana Induk Penelitian (RIP) LP2M INDAFA</h6>
                                    <p class="small text-muted mb-0">PDF - Dokumen Perencanaan Riset 2024-2029</p>
                                </div>
                                <a href="#" class="btn btn-sm btn-outline-success rounded-pill px-3"><i class="bi bi-download me-1"></i>Unduh</a>
                            </div>
                            <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">Rencana Induk Pengabdian Masyarakat (PKM)</h6>
                                    <p class="small text-muted mb-0">PDF - Dokumen Perencanaan PKM 2024-2029</p>
                                </div>
                                <a href="#" class="btn btn-sm btn-outline-success rounded-pill px-3"><i class="bi bi-download me-1"></i>Unduh</a>
                            </div>
                        </div>

                    @elseif($page === 'struktur-organisasi')
                        <h3 class="fw-bold text-dark-green mb-3">Struktur Organisasi LP2M</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary mb-4">
                            Struktur LP2M dirancang untuk menopang divisi penelitian, pengabdian masyarakat, pusat publikasi, dan pusat studi:
                        </p>

                        <div class="text-center p-4 bg-light rounded-4 mb-4">
                            <img src="{{ asset('assets/img/carousel-1.jpg') }}" alt="Struktur Organisasi LP2M" class="img-fluid rounded shadow-sm max-h-400" style="max-height:400px; object-fit:cover;">
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="p-3 border rounded-3 bg-white">
                                    <h6 class="fw-bold text-dark-green mb-1">Ketua LP2M</h6>
                                    <p class="small text-muted mb-0">Dr. Muhammad Ridwan, M.H.I</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded-3 bg-white">
                                    <h6 class="fw-bold text-dark-green mb-1">Kepala Pusat Penelitian</h6>
                                    <p class="small text-muted mb-0">Ustadz Fathul Amin, M.Pd.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded-3 bg-white">
                                    <h6 class="fw-bold text-dark-green mb-1">Kepala Pusat Pengabdian Masyarakat</h6>
                                    <p class="small text-muted mb-0">Ustadzah Siti Maryam, M.A.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded-3 bg-white">
                                    <h6 class="fw-bold text-dark-green mb-1">Kepala Pusat Publikasi & Jurnal</h6>
                                    <p class="small text-muted mb-0">Ahmad Farisi, M.E.</p>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>

    </div>
</section>
@endsection
