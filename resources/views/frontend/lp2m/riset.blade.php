@extends('frontend.layouts.app')

@section('title', $title . ' - Riset LP2M')

@section('content')
<!-- Hero Section -->
<section class="page-hero" style="background: linear-gradient(rgba(11, 83, 69, 0.92), rgba(0, 0, 0, 0.88)), url('{{ asset('storage/banners/Q8Fe55EmaxIEh2wLTOBa08cqk2Vsy8ljDEdB0a5i.png') }}') no-repeat center center; background-size: cover; padding-top: 150px; padding-bottom: 70px;">
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
                        <i class="bi bi-journal-check me-2"></i> Menu Riset
                    </div>
                    <div class="list-group list-group-flush rounded-bottom-4">
                        @foreach($validPages as $key => $label)
                            <a href="{{ route('frontend.lp2m.riset', $key) }}"
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

                    @if($page === 'jurnal')
                        <h3 class="fw-bold text-dark-green mb-3">Rumah Jurnal & Publikasi Ilmiah</h3>
                        <div class="page-section-divider mb-4"></div>

                        <div class="mb-5" id="profil">
                            <h5 class="fw-bold text-dark mb-3"><i class="bi bi-book-half text-success me-2"></i>Profil Jurnal INDAFA</h5>
                            <p class="text-secondary" style="line-height:1.8;">
                                LP2M mengelola jajaran jurnal ilmiah berkala terakreditasi di bidang pendidikan, hukum Islam, ekonomi syariah, dan studi gender:
                            </p>
                        </div>

                        <!-- Daftar Jurnal -->
                        <div class="row g-4 mb-5" id="rekap">
                            <div class="col-md-6" id="jrce">
                                <div class="card h-100 border p-4 rounded-4 shadow-sm">
                                    <span class="badge bg-success w-auto ms-0 mb-2">SINTA 4</span>
                                    <h5 class="fw-bold text-dark-green">JRCE (Journal of Research in Islamic Education)</h5>
                                    <p class="small text-muted mb-3">e-ISSN: 2809-XXXX | p-ISSN: 2809-YYYY</p>
                                    <p class="small text-secondary mb-4">Fokus pada kajian inovasi metodologi pembelajaran Agama Islam, kurikulum pesantren, dan ilmu kependidikan.</p>
                                    <a href="#" target="_blank" class="btn btn-sm btn-outline-success rounded-pill w-100">Kunjungi E-Journal JRCE <i class="bi bi-box-arrow-up-right ms-1"></i></a>
                                </div>
                            </div>

                            <div class="col-md-6" id="egalita">
                                <div class="card h-100 border p-4 rounded-4 shadow-sm">
                                    <span class="badge bg-warning text-dark w-auto ms-0 mb-2">SINTA 5</span>
                                    <h5 class="fw-bold text-dark-green">EGALITA (Jurnal Studi Gender & Anak)</h5>
                                    <p class="small text-muted mb-3">e-ISSN: 2715-XXXX | p-ISSN: 2715-YYYY</p>
                                    <p class="small text-secondary mb-4">Fokus pada penelitian isu gender dalam perspektif hukum Islam, perlindungan anak, dan pemberdayaan keluarga.</p>
                                    <a href="#" target="_blank" class="btn btn-sm btn-outline-warning text-dark rounded-pill w-100">Kunjungi E-Journal EGALITA <i class="bi bi-box-arrow-up-right ms-1"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 bg-light rounded-4 text-center" id="ejournal">
                            <h5 class="fw-bold text-dark-green mb-2">Portal E-Journal Open Access</h5>
                            <p class="small text-secondary mb-3">Akses seluruh artikel ilmiah dan jurnal berkala INDAFA secara gratis melalui platform Open Journal Systems (OJS).</p>
                            <a href="#" target="_blank" class="btn btn-success rounded-pill px-4 fw-bold"><i class="bi bi-globe me-2"></i>Buka Portal OJS INDAFA</a>
                        </div>

                    @elseif($page === 'penelitian')
                        <h3 class="fw-bold text-dark-green mb-3">Penelitian (Litapdimas)</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary mb-4" style="line-height:1.8;">
                            Litapdimas (Penelitian, Publikasi Ilmiah, dan Pengabdian kepada Masyarakat) merupakan skema hibah riset Kementerian Agama RI dan hibah internal institusi yang dibuka setiap tahun akademik.
                        </p>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="p-4 bg-light rounded-4 border-start border-4 border-success h-100">
                                    <h6 class="fw-bold text-dark-green mb-2">Cluster Penelitian Pembinaan / Pemula</h6>
                                    <p class="small text-muted mb-0">Riset dasar untuk dosen pemula guna mengasah metodologi riset dan penguraian isu lokal.</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-4 bg-light rounded-4 border-start border-4 border-warning h-100">
                                    <h6 class="fw-bold text-dark-green mb-2">Cluster Penelitian Terapan & Interdisipliner</h6>
                                    <p class="small text-muted mb-0">Riset terapan terintegrasi keilmuan Islam dan sains untuk memecahkan masalah riil di masyarakat.</p>
                                </div>
                            </div>
                        </div>

                    @elseif($page === 'pengabdian')
                        <h3 class="fw-bold text-dark-green mb-3">Pengabdian Litapdimas</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary mb-4">
                            Layanan dan platform pengelolaan pengabdian masyarakat dosen dan mahasiswa:
                        </p>

                        <div class="row g-4">
                            <div class="col-md-4" id="simapel">
                                <div class="card p-3 text-center border-0 bg-light rounded-4">
                                    <div class="icon-circle icon-circle-primary mx-auto mb-2"><i class="bi bi-laptop"></i></div>
                                    <h6 class="fw-bold text-dark mb-1">Simapel</h6>
                                    <p class="small text-muted mb-0">Sistem Informasi Pengabdian & Pelatihan Masyarakat</p>
                                </div>
                            </div>
                            <div class="col-md-4" id="sipemas">
                                <div class="card p-3 text-center border-0 bg-light rounded-4">
                                    <div class="icon-circle icon-circle-gold mx-auto mb-2"><i class="bi bi-people"></i></div>
                                    <h6 class="fw-bold text-dark mb-1">Sipemas</h6>
                                    <p class="small text-muted mb-0">Sistem Informasi Pengabdian Masyarakat Terintegrasi</p>
                                </div>
                            </div>
                            <div class="col-md-4" id="kerjasama">
                                <div class="card p-3 text-center border-0 bg-light rounded-4">
                                    <div class="icon-circle icon-circle-primary mx-auto mb-2"><i class="bi bi-handshake"></i></div>
                                    <h6 class="fw-bold text-dark mb-1">Kerjasama Instansi</h6>
                                    <p class="small text-muted mb-0">Kemitraan pengabdian dengan Pemkab, Pesantren & Ormas</p>
                                </div>
                            </div>
                        </div>

                    @elseif($page === 'hki')
                        <h3 class="fw-bold text-dark-green mb-3">Hak Kekayaan Intelektual (HKI)</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary mb-4">
                            Sentra HKI LP2M melayani pendampingan dan pendaftaran Hak Cipta (buku, modul, karya cipta) dan Paten ke DJKI Kemenkumham RI.
                        </p>

                        <div class="row g-4" id="hakcipta">
                            <div class="col-md-6">
                                <div class="p-4 bg-light rounded-4 border">
                                    <h5 class="fw-bold text-dark-green mb-2"><i class="bi bi-file-earmark-check text-success me-2"></i>Layanan Pengajuan Hak Cipta</h5>
                                    <p class="small text-secondary mb-3">Proses cepat pengajuan Hak Cipta karya tulis, buku ajar, komposisi, dan perangkat lunak.</p>
                                    <a href="#" class="btn btn-sm btn-success rounded-pill">Form Pengajuan HKI</a>
                                </div>
                            </div>
                            <div class="col-md-6" id="rekaphki">
                                <div class="p-4 bg-light rounded-4 border">
                                    <h5 class="fw-bold text-dark-green mb-2"><i class="bi bi-journal-album text-warning me-2"></i>Rekap HKI Terdaftar</h5>
                                    <p class="small text-secondary mb-3">Lebih dari 85+ karya cipta dosen INDAFA telah resmi terdaftar di DJKI.</p>
                                    <a href="#" class="btn btn-sm btn-outline-warning text-dark rounded-pill">Lihat Daftar HKI</a>
                                </div>
                            </div>
                        </div>

                    @elseif($page === 'rekap-penelitian')
                        <h3 class="fw-bold text-dark-green mb-3">Rekapitulasi Penelitian</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary mb-4">Data statistik dan judul riset yang telah didanai & dilaksanakan oleh dosen INDAFA:</p>

                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-success">
                                    <tr>
                                        <th>Tahun</th>
                                        <th>Jumlah Judul Riset</th>
                                        <th>Sumber Dana</th>
                                        <th>Status Publikasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2025</td>
                                        <td>24 Judul</td>
                                        <td>Litapdimas & Internal</td>
                                        <td>Jurnal SINTA 2 - SINTA 5</td>
                                    </tr>
                                    <tr>
                                        <td>2024</td>
                                        <td>20 Judul</td>
                                        <td>Internal INDAFA</td>
                                        <td>Jurnal Nasional Terakreditasi</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    @elseif($page === 'rekap-pengabdian')
                        <h3 class="fw-bold text-dark-green mb-3">Rekapitulasi Pengabdian Masyarakat</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary mb-4">Data pelaksanaan program pengabdian masyarakat (PKM) dan KKN Tematik:</p>

                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <thead class="table-success">
                                    <tr>
                                        <th>Tahun</th>
                                        <th>Program PKM</th>
                                        <th>Lokasi Desa Binaan</th>
                                        <th>Jumlah Peserta KKN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2025</td>
                                        <td>KKN Tematik Moderasi Beragama</td>
                                        <td>12 Desa di Kab. Bondowoso</td>
                                        <td>350 Mahasiswa</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    @elseif($page === 'sdgs')
                        <h3 class="fw-bold text-dark-green mb-3">Relevansi Riset & PKM dengan SDGs</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary" style="line-height:1.8;">
                            Setiap kegiatan penelitian dan pengabdian masyarakat di LP2M dipetakan untuk mendukung target Sustainable Development Goals (SDGs), antara lain:
                        </p>
                        <div class="row g-3 mt-3">
                            <div class="col-md-6">
                                <div class="p-3 border rounded-3 bg-light d-flex align-items-center gap-3">
                                    <div class="badge bg-danger p-3 rounded-circle fs-5">4</div>
                                    <div>
                                        <h6 class="fw-bold text-dark mb-1">SDG 4: Pendidikan Berkualitas</h6>
                                        <small class="text-muted">Inovasi pembelajaran keagamaan & peningkatan mutu madrasah.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 border rounded-3 bg-light d-flex align-items-center gap-3">
                                    <div class="badge bg-warning text-dark p-3 rounded-circle fs-5">5</div>
                                    <div>
                                        <h6 class="fw-bold text-dark mb-1">SDG 5: Kesetaraan Gender</h6>
                                        <small class="text-muted">Pemberdayaan perempuan pesantren melalui Pusat Studi PSGA.</small>
                                    </div>
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
