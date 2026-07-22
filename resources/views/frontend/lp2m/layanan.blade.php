@extends('frontend.layouts.app')

@section('title', $title . ' - Layanan LP2M')

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
                        <i class="bi bi-file-earmark-text me-2"></i> Layanan & Dokumen
                    </div>
                    <div class="list-group list-group-flush rounded-bottom-4">
                        @foreach($validPages as $key => $label)
                            <a href="{{ route('frontend.lp2m.layanan', $key) }}"
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

                    @if($page === 'sop')
                        <h3 class="fw-bold text-dark-green mb-3">SOP (Standard Operating Procedure)</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary mb-4">Daftar Prosedur Operasional Standar layanan riset dan pengabdian LP2M:</p>

                        <div class="list-group rounded-4">
                            <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">SOP Pengajuan Hibah Riset Litapdimas</h6>
                                    <p class="small text-muted mb-0">SOP-LP2M-01/2025</p>
                                </div>
                                <a href="#" class="btn btn-sm btn-outline-success rounded-pill px-3"><i class="bi bi-download me-1"></i>Unduh SOP</a>
                            </div>
                            <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">SOP Penerbitan Surat Izin Penelitian Fieldwork</h6>
                                    <p class="small text-muted mb-0">SOP-LP2M-02/2025</p>
                                </div>
                                <a href="#" class="btn btn-sm btn-outline-success rounded-pill px-3"><i class="bi bi-download me-1"></i>Unduh SOP</a>
                            </div>
                        </div>

                    @elseif($page === 'motto-maklumat')
                        <h3 class="fw-bold text-dark-green mb-3">Motto & Maklumat Pelayanan LP2M</h3>
                        <div class="page-section-divider mb-4"></div>

                        <div class="card bg-success text-white p-4 rounded-4 mb-4 text-center">
                            <span class="text-gold text-uppercase fw-semibold tracking-wider small">Motto Pelayanan</span>
                            <h3 class="fw-bold text-warning my-2">"IKHLAS: Inovatif, Komprehensif, Handal, Layak, Akuntabel, Solutif"</h3>
                        </div>

                        <div class="card bg-light border-0 p-4 rounded-4">
                            <h5 class="fw-bold text-dark-green mb-3"><i class="bi bi-file-earmark-lock me-2 text-warning"></i>Maklumat Pelayanan</h5>
                            <p class="text-secondary" style="line-height:1.8;">
                                "Dengan ini kami seluruh pengurus LP2M INDAFA menyatakan sanggup menyelenggarakan pelayanan administrasi riset, pengabdian, dan HKI sesuai standar pelayanan yang telah ditetapkan serta siap menerima sanksi apabila terjadi penyimpangan."
                            </p>
                        </div>

                    @elseif($page === 'panduan-pedoman')
                        <h3 class="fw-bold text-dark-green mb-3">Panduan & Pedoman Riset</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary mb-4">Buku panduan teknis penulisan proposal, laporan riset, dan laporan KKN:</p>

                        <div class="list-group rounded-4">
                            <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">Buku Panduan Penulisan Proposal & Laporan Riset 2026</h6>
                                    <p class="small text-muted mb-0">PDF - Panduan Utama Dosen & Mahasiswa</p>
                                </div>
                                <a href="#" class="btn btn-sm btn-success rounded-pill px-3"><i class="bi bi-download me-1"></i>Unduh</a>
                            </div>
                            <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">Buku Pedoman Pelaksanaan KKN Tematik Pesantren</h6>
                                    <p class="small text-muted mb-0">PDF - Pedoman DPL & Mahasiswa</p>
                                </div>
                                <a href="#" class="btn btn-sm btn-success rounded-pill px-3"><i class="bi bi-download me-1"></i>Unduh</a>
                            </div>
                        </div>

                    @elseif($page === 'surat-online')
                        <h3 class="fw-bold text-dark-green mb-3">Layanan Pembuatan Surat Online</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary mb-4">Formulir digital untuk mengajukan permohonan surat izin penelitian, pengantar fieldwork, dan rekomendasi HKI:</p>

                        <form class="p-4 bg-light rounded-4 border">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small text-dark">Nama Pemohon</label>
                                    <input type="text" class="form-control rounded-3" placeholder="Nama Dosen / Mahasiswa" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold small text-dark">NIDN / NIM</label>
                                    <input type="text" class="form-control rounded-3" placeholder="Nomor Induk" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold small text-dark">Jenis Surat Yang Dimohon</label>
                                    <select class="form-select rounded-3" required>
                                        <option value="">-- Pilih Jenis Surat --</option>
                                        <option>Surat Izin Penelitian Lapangan (Fieldwork)</option>
                                        <option>Surat Rekomendasi Pengajuan HKI / Hak Cipta</option>
                                        <option>Surat Keterangan Bebas Plagiasi / Turnitin LP2M</option>
                                        <option>Surat Tugas Pengabdian Masyarakat</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold small text-dark">Judul Riset / Keperluan Surat</label>
                                    <textarea rows="3" class="form-control rounded-3" placeholder="Tuliskan judul riset atau lokasi pengabdian..." required></textarea>
                                </div>
                                <div class="col-12 mt-3">
                                    <button type="button" class="btn btn-success rounded-pill px-4 fw-bold">Ajukan Surat Online</button>
                                </div>
                            </div>
                        </form>

                    @elseif($page === 'notulensi-rapat')
                        <h3 class="fw-bold text-dark-green mb-3">Hasil Notulensi Rapat/Meeting LP2M</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary mb-4">Arsip dan rangkuman notulensi rapat koordinasi LP2M:</p>

                        <div class="list-group rounded-4">
                            <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">Notulensi Rapat Koordinasi Persiapan KKN Tematik 2026</h6>
                                    <p class="small text-muted mb-0">Tanggal: 15 Januari 2026</p>
                                </div>
                                <a href="#" class="btn btn-sm btn-outline-success rounded-pill px-3">Lihat Notulensi</a>
                            </div>
                        </div>

                    @elseif($page === 'dokumen-kerjasama')
                        <h3 class="fw-bold text-dark-green mb-3">Dokumen Kerjasama Kumpulan SK</h3>
                        <div class="page-section-divider mb-4"></div>
                        <p class="text-secondary mb-4">Himpunan Surat Keputusan (SK) penetapan tim riset, pengabdian, dan dokumen kerjasama instansi:</p>

                        <div class="list-group rounded-4">
                            <div class="list-group-item p-3 d-flex align-items-center justify-content-between">
                                <div>
                                    <h6 class="fw-bold text-dark mb-1">SK Rektor Tentang Penetapan Penerima Hibah Riset 2026</h6>
                                    <p class="small text-muted mb-0">SK No. 048/SK-REK/INDAFA/I/2026</p>
                                </div>
                                <a href="#" class="btn btn-sm btn-outline-success rounded-pill px-3"><i class="bi bi-download me-1"></i>Unduh SK</a>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>

    </div>
</section>
@endsection
