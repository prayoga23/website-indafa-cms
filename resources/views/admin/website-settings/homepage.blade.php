@extends('layouts_admin.admin')

@section('title', 'Pengaturan Beranda')
@section('page-title', 'Pengaturan Beranda')

@section('content')

<div class="admin-form-card">

    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4><i class="fas fa-home text-warning"></i> Pengaturan Konten Halaman Beranda (Homepage)</h4>
                <p>Konfigurasi ajakan Penerimaan Mahasiswa Baru (CTA PMB) dan navigasi cepat bagian-bagian beranda.</p>
            </div>
            <span class="badge bg-white text-emerald-800 text-xs px-3 py-2 rounded-full font-bold shadow-sm">
                <i class="fas fa-check-circle text-emerald-600"></i> Halaman Depan
            </span>
        </div>
    </div>

    <div class="p-3 p-md-4">

        <div class="row g-4">

            {{-- KOLOM KIRI: FORM PENGATURAN CTA PMB --}}
            <div class="col-lg-8">
                <form action="{{ route('admin.homepage-settings.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-section-card mb-4">
                        <div class="form-section-header">
                            <div class="form-section-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div>
                                <h5 class="form-section-title">Section Call to Action (CTA PMB)</h5>
                                <p class="form-section-desc">Blok ajakan pendaftaran mahasiswa baru yang tampil menonjol pada halaman beranda.</p>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Judul Utama Ajakan PMB</span>
                                <span class="badge-req">* Wajib Diisi</span>
                            </label>
                            <input type="text"
                                   name="cta_pmb_title"
                                   class="form-control-custom"
                                   value="{{ old('cta_pmb_title', $setting->cta_pmb_title ?? 'Bergabunglah Bersama Institut Agama Islam Darul Falah') }}"
                                   placeholder="Contoh: Bergabunglah Bersama IAI Darul Falah"
                                   required>
                            <div class="form-hint">
                                <i class="fas fa-pen"></i>
                                <span>Headline ajakan pendaftaran di bagian bawah slide / beranda.</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Deskripsi & Uraian Ajakan</span>
                                <span class="badge-opt">Opsional</span>
                            </label>
                            <textarea name="cta_pmb_text"
                                      class="form-control-custom"
                                      rows="4"
                                      placeholder="Tuliskan pesan ajakan pendaftaran...">{{ old('cta_pmb_text', $setting->cta_pmb_text ?? 'Wujudkan masa depan terbaik Anda. Daftarkan diri di IAI Darul Falah dan jadilah bagian dari generasi unggul yang berlandaskan ilmu dan iman.') }}</textarea>
                            <div class="form-hint">
                                <i class="fas fa-align-left"></i>
                                <span>Teks persuasif singkat untuk memotivasi calon pendaftar.</span>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label-custom">
                                    <span>Tautan Tombol "Daftar Sekarang"</span>
                                    <span class="badge-opt">Opsional</span>
                                </label>
                                <input type="text"
                                       name="cta_pmb_link_register"
                                       class="form-control-custom"
                                       value="{{ old('cta_pmb_link_register', $setting->cta_pmb_link_register ?? '#') }}"
                                       placeholder="https://pmb.indafa.ac.id atau link Google Form">
                                <div class="form-hint">
                                    <i class="fas fa-external-link-alt"></i>
                                    <span>Tautan form registrasi mahasiswa baru.</span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label-custom">
                                    <span>Tautan Tombol "Informasi PMB"</span>
                                    <span class="badge-opt">Opsional</span>
                                </label>
                                <input type="text"
                                       name="cta_pmb_link_info"
                                       class="form-control-custom"
                                       value="{{ old('cta_pmb_link_info', $setting->cta_pmb_link_info ?? '#') }}"
                                       placeholder="/pengumuman/jadwal-pmb">
                                <div class="form-hint">
                                    <i class="fas fa-info-circle"></i>
                                    <span>Halaman rincian brosur / biaya kuliah.</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 bg-slate-50 border border-slate-200 rounded-xl d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <span class="text-xs text-slate-500">
                            <i class="fas fa-info-circle text-emerald-600"></i> Perubahan teks CTA akan langsung tampil pada beranda website.
                        </span>
                        <button type="submit" class="btn-brand-primary">
                            <i class="fas fa-save"></i> Simpan Perubahan Beranda
                        </button>
                    </div>

                </form>
            </div>

            {{-- KOLOM KANAN: JALAN PINTAS KELOLA BERANDA --}}
            <div class="col-lg-4">
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
                    <div class="p-3 bg-slate-50 border-b border-slate-200">
                        <span class="font-bold text-xs text-slate-800 d-flex align-items-center gap-2">
                            <i class="fas fa-link text-emerald-600"></i> Kelola Bagian Beranda Lainnya
                        </span>
                    </div>

                    <div class="list-group list-group-flush text-xs">
                        <a href="{{ route('admin.banners.index') }}" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between p-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="p-2 rounded-lg bg-emerald-50 text-emerald-700">
                                    <i class="fas fa-images"></i>
                                </div>
                                <div>
                                    <div class="font-bold text-slate-800">Banner Slide / Hero Image</div>
                                    <span class="text-xxs text-slate-400">Carousel visual paling atas</span>
                                </div>
                            </div>
                            <i class="fas fa-chevron-right text-slate-400"></i>
                        </a>

                        <a href="{{ route('admin.sambutan.index') }}" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between p-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="p-2 rounded-lg bg-emerald-50 text-emerald-700">
                                    <i class="fas fa-quote-left"></i>
                                </div>
                                <div>
                                    <div class="font-bold text-slate-800">Sambutan Rektor / Pimpinan</div>
                                    <span class="text-xxs text-slate-400">Foto profil dan pesan sambutan</span>
                                </div>
                            </div>
                            <i class="fas fa-chevron-right text-slate-400"></i>
                        </a>

                        <a href="{{ route('admin.statistic.index') }}" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between p-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="p-2 rounded-lg bg-emerald-50 text-emerald-700">
                                    <i class="fas fa-chart-bar"></i>
                                </div>
                                <div>
                                    <div class="font-bold text-slate-800">Statistik Kampus (Angka Bicara)</div>
                                    <span class="text-xxs text-slate-400">Data mahasiswa, dosen, dan prodi</span>
                                </div>
                            </div>
                            <i class="fas fa-chevron-right text-slate-400"></i>
                        </a>

                        <a href="{{ route('admin.news.index') }}" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between p-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="p-2 rounded-lg bg-emerald-50 text-emerald-700">
                                    <i class="fas fa-newspaper"></i>
                                </div>
                                <div>
                                    <div class="font-bold text-slate-800">Berita & Informasi Terbaru</div>
                                    <span class="text-xxs text-slate-400">Publikasi artikel & liputan</span>
                                </div>
                            </div>
                            <i class="fas fa-chevron-right text-slate-400"></i>
                        </a>

                        <a href="{{ route('admin.agenda.index') }}" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between p-3">
                            <div class="d-flex align-items-center gap-2">
                                <div class="p-2 rounded-lg bg-emerald-50 text-emerald-700">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <div>
                                    <div class="font-bold text-slate-800">Agenda & Event Mendatang</div>
                                    <span class="text-xxs text-slate-400">Jadwal seminar, workshop, dsb</span>
                                </div>
                            </div>
                            <i class="fas fa-chevron-right text-slate-400"></i>
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection
