@extends('frontend.layouts.app')

@section('title', 'LPM - Lembaga Penjaminan Mutu | INDAFA Bondowoso')

@section('content')
<!-- Hero Section -->
<section class="page-hero" style="background: linear-gradient(rgba(11, 83, 69, 0.92), rgba(0, 0, 0, 0.88)), url('{{ asset('storage/banners/Q8Fe55EmaxIEh2wLTOBa08cqk2Vsy8ljDEdB0a5i.png') }}') no-repeat center center; background-size: cover; padding-top: 150px; padding-bottom: 70px;">
    <div class="container text-center text-white">

        <h5 class="text-gold text-uppercase fw-bold" style="font-size:1.1rem; color: #ffc107 !important;">Lembaga Penjaminan Mutu</h5>
        <div class="page-hero-divider mx-auto" style="width: 80px; height: 4px; background-color: #ffc107; border-radius: 2px;"></div>
        <h1 class="display-4 fw-bold text-uppercase mb-3">LPM INDAFA</h1>
        <p class="lead mx-auto text-light mb-4" style="max-width: 750px;">
            Mewujudkan Budaya Mutu Berkelanjutan melalui Pengawasan, Penjaminan, dan Audit Internal Berstandar Nasional.
        </p>
        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('frontend.lpm.penjaminan', 'spmi') }}" class="btn btn-warning text-dark fw-bold px-4 py-2 rounded-pill">Sistem SPMI</a>
            <a href="{{ route('frontend.lpm.pengawasan', 'pedoman') }}" class="btn btn-outline-light fw-bold px-4 py-2 rounded-pill">Pedoman Institut</a>
        </div>
    </div>
</section>

<!-- Overview & Sambutan -->
<section class="py-5 bg-premium-light">
    <div class="container py-3">

        <div class="row align-items-center g-5 mb-5">
            <div class="col-lg-7">
                <span class="page-section-eyebrow">Pengantar</span>
                <h2 class="page-section-title mb-3">Menjamin Mutu Akademik & Tata Kelola</h2>
                <div class="page-section-divider mb-4"></div>
                <p class="text-secondary" style="line-height:1.8; text-align:justify;">
                    Lembaga Penjaminan Mutu (LPM) INDAFA Bondowoso merupakan unit sistemik yang bertugas merencanakan, melaksanakan, mengevaluasi, mengendalikan, dan meningkatkan (PPEPP) Sistem Penjaminan Mutu Internal (SPMI) di seluruh lingkungan kampus.
                </p>
                <p class="text-secondary" style="line-height:1.8; text-align:justify;">
                    Dengan mengedepankan prinsip transparansi, akuntabilitas, dan objektivitas, LPM memastikan seluruh siklus akademik berjalan sesuai Standar Nasional Pendidikan Tinggi (SN-Dikti) serta standar khusus keislaman khas INDAFA.
                </p>

                <div class="row g-4 mt-3">
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3 p-3 bg-white rounded-3 shadow-sm border-start border-4 border-success">
                            <div class="icon-circle icon-circle-primary me-2">
                                <i class="bi bi-shield-check fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Bidang Pengawasan</h6>
                                <p class="small text-muted mb-0">Monev kinerja, audit internal, dan kontrol kepatuhan pedoman.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3 p-3 bg-white rounded-3 shadow-sm border-start border-4 border-warning">
                            <div class="icon-circle icon-circle-gold me-2">
                                <i class="bi bi-award fs-4"></i>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Bidang Penjaminan</h6>
                                <p class="small text-muted mb-0">Pengelolaan kebijakan mutu, AMI, akreditasi, dan kepuasan institusi.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="info-card text-center p-4 shadow-sm border-top border-4 border-success">
                    <img src="{{ asset('storage/lecturers/3EjN4NWfMRn1AN2wWVV53chufmz3j88IDpHMBeSb.png') }}" alt="Ketua LPM" class="rounded-circle mb-3 img-thumbnail shadow-sm" style="width: 140px; height: 140px; object-fit: cover;">
                    <h5 class="fw-bold text-dark-green mb-1">Dr. H. Ahmad Syafii, M.Pd.I</h5>
                    <p class="text-muted small mb-3">Ketua LPM INDAFA</p>
                    <p class="small text-secondary fst-italic">"Mutu bukanlah sebuah kebetulan, melainkan hasil dari komitmen tinggi, usaha sungguh-sungguh, dan eksekusi yang cerdas secara konsisten."</p>
                </div>
            </div>
        </div>

        <!-- Quick Access Menu Grid -->
        <div class="text-center mb-4">
            <span class="page-section-eyebrow">Layanan utama</span>
            <h2 class="page-section-title mb-1">Fokus & Layanan Utama LPM</h2>
            <div class="page-section-divider mx-auto mt-2"></div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-6 col-lg-4">
                <div class="info-card h-100 text-center p-4">
                    <div class="icon-circle icon-circle-primary mx-auto mb-3">
                        <i class="bi bi-journal-check fs-3"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Sistem SPMI</h5>
                    <p class="small text-secondary mb-3">Dokumen kebijakan mutu, standar mutu internal, dan manual penjaminan mutu seluruh prodi.</p>
                    <a href="{{ route('frontend.lpm.penjaminan', 'spmi') }}" class="btn btn-sm btn-outline-success rounded-pill px-3">Lihat rincian</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="info-card h-100 text-center p-4">
                    <div class="icon-circle icon-circle-gold mx-auto mb-3">
                        <i class="bi bi-search fs-3"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Audit Mutu Internal (AMI)</h5>
                    <p class="small text-secondary mb-3">Pelaksanaan audit berkala untuk mengevaluasi ketercapaian standar akademik & non-akademik.</p>
                    <a href="{{ route('frontend.lpm.penjaminan', 'ami') }}" class="btn btn-sm btn-outline-warning text-dark rounded-pill px-3">Lihat rincian</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="info-card h-100 text-center p-4">
                    <div class="icon-circle icon-circle-primary mx-auto mb-3">
                        <i class="bi bi-file-earmark-bar-graph fs-3"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Monev & Laporan Audit</h5>
                    <p class="small text-secondary mb-3">Laporan evaluasi kinerja berkala dan audit kinerja unit kerja di lingkungan institusi.</p>
                    <a href="{{ route('frontend.lpm.pengawasan', 'monev-kinerja') }}" class="btn btn-sm btn-outline-success rounded-pill px-3">Lihat rincian</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="info-card h-100 text-center p-4">
                    <div class="icon-circle icon-circle-gold mx-auto mb-3">
                        <i class="bi bi-star fs-3"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Data Akreditasi</h5>
                    <p class="small text-secondary mb-3">Informasi status akreditasi institusi dan prodi serta pendampingan penyusunan LED/LKPS.</p>
                    <a href="{{ route('frontend.lpm.penjaminan', 'data-akreditasi') }}" class="btn btn-sm btn-outline-warning text-dark rounded-pill px-3">Lihat rincian</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="info-card h-100 text-center p-4">
                    <div class="icon-circle icon-circle-primary mx-auto mb-3">
                        <i class="bi bi-emoji-smile fs-3"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Survei Kepuasan (GJM/GKM)</h5>
                    <p class="small text-secondary mb-3">Laporan hasil survei kepuasan mahasiswa, dosen, dan mitra kerja hasil evaluasi GJM & GKM.</p>
                    <a href="{{ route('frontend.lpm.penjaminan', 'laporan-kepuasan') }}" class="btn btn-sm btn-outline-success rounded-pill px-3">Lihat rincian</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="info-card h-100 text-center p-4">
                    <div class="icon-circle icon-circle-gold mx-auto mb-3">
                        <i class="bi bi-calendar3 fs-3"></i>
                    </div>
                    <h5 class="fw-bold text-dark-green">Kalender Mutu</h5>
                    <p class="small text-secondary mb-3">Jadwal kegiatan siklus SPMI, Audit Mutu Internal, Monev PBM, dan pendampingan akreditasi.</p>
                    <a href="{{ route('frontend.lpm.penjaminan', 'kalender-mutu') }}" class="btn btn-sm btn-outline-warning text-dark rounded-pill px-3">Lihat rincian</a>
                </div>
            </div>
        </div>

        <!-- Latest News & Announcements -->
        <div class="row g-4 mt-4">
            <div class="col-lg-6">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-bold text-dark-green mb-0"><i class="bi bi-megaphone me-2 text-warning"></i>Pengumuman LPM</h4>
                    <a href="{{ route('frontend.lpm.pengumuman') }}" class="small fw-semibold text-success text-decoration-none">Lihat semua <i class="bi bi-arrow-right"></i></a>
                </div>
                @forelse($announcements as $item)
                    <div class="card border-0 shadow-sm mb-3 rounded-3 hover-lift">
                        <div class="card-body p-3">
                            <span class="badge bg-success-subtle text-success mb-2">{{ $item->created_at ? $item->created_at->format('d M Y') : 'Terbaru' }}</span>
                            <h6 class="fw-bold text-dark mb-1">
                                <a href="{{ route('announcements.show', $item->slug ?? '#') }}" class="text-dark text-decoration-none">{{ $item->title }}</a>
                            </h6>
                            <p class="small text-muted mb-0">{!! Str::limit(strip_tags($item->content), 90) !!}</p>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-light border text-center text-muted">Belum ada pengumuman khusus LPM.</div>
                @endforelse
            </div>

            <div class="col-lg-6">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-bold text-dark-green mb-0"><i class="bi bi-newspaper me-2 text-success"></i>Berita LPM</h4>
                    <a href="{{ route('frontend.lpm.berita') }}" class="small fw-semibold text-success text-decoration-none">Lihat semua <i class="bi bi-arrow-right"></i></a>
                </div>
                @forelse($news as $item)
                    <div class="card border-0 shadow-sm mb-3 rounded-3 hover-lift">
                        <div class="card-body p-3">
                            <span class="badge bg-warning-subtle text-dark mb-2">{{ $item->created_at ? $item->created_at->format('d M Y') : 'Terbaru' }}</span>
                            <h6 class="fw-bold text-dark mb-1">
                                <a href="{{ route('news.show', $item->slug ?? '#') }}" class="text-dark text-decoration-none">{{ $item->title }}</a>
                            </h6>
                            <p class="small text-muted mb-0">{!! Str::limit(strip_tags($item->content), 90) !!}</p>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-light border text-center text-muted">Belum ada berita kegiatan LPM.</div>
                @endforelse
            </div>
        </div>

    </div>
</section>
@endsection
