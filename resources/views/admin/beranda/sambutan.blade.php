@extends('layouts_admin.admin')

@section('title', 'Kelola Sambutan Pimpinan')
@section('page-title', 'Sambutan Pimpinan')

@section('content')

<div class="admin-form-card">

    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4><i class="fas fa-comment-dots text-warning"></i> Kelola Sambutan Pimpinan / Kaprodi</h4>
                <p>Perbarui profil pimpinan, kutipan motivasi, dan teks sambutan pengantar pada halaman beranda.</p>
            </div>
            <span class="badge bg-white text-emerald-800 text-xs px-3 py-2 rounded-full font-bold shadow-sm">
                <i class="fas fa-check-circle text-emerald-600"></i> Konten Beranda
            </span>
        </div>
    </div>

    <div class="p-3 p-md-4">

        {{-- Notifikasi Sukses --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show text-white text-xs mb-4" role="alert">
                <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.sambutan.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- SECTION 1: PROFIL PIMPINAN --}}
            <div class="form-section-card">
                <div class="form-section-header">
                    <div class="form-section-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div>
                        <h5 class="form-section-title">Profil Pimpinan / Ketua Prodi</h5>
                        <p class="form-section-desc">Identitas pejabat yang memberikan sambutan.</p>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label-custom">
                            <span>Nama Lengkap Beserta Gelar</span>
                            <span class="badge-req">* Wajib Diisi</span>
                        </label>
                        <input type="text"
                               class="form-control-custom @error('kaprodi_name') border-rose-500 @enderror"
                               id="kaprodi_name"
                               name="kaprodi_name"
                               value="{{ old('kaprodi_name', $welcome->kaprodi_name ?? '') }}"
                               placeholder="Contoh: Dr. H. M. Ridwan, M.Ag"
                               required>
                        @error('kaprodi_name')
                            <div class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label-custom">
                            <span>Jabatan / Gelar Struktural</span>
                            <span class="badge-req">* Wajib Diisi</span>
                        </label>
                        <input type="text"
                               class="form-control-custom @error('kaprodi_title') border-rose-500 @enderror"
                               id="kaprodi_title"
                               name="kaprodi_title"
                               value="{{ old('kaprodi_title', $welcome->kaprodi_title ?? 'Ketua Program Studi') }}"
                               placeholder="Contoh: Ketua Program Studi / Dekan"
                               required>
                        @error('kaprodi_title')
                            <div class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row align-items-center g-3">
                    <div class="col-lg-8">
                        <label class="form-label-custom">
                            <span>Pas Foto Formal Pimpinan</span>
                            <span class="badge-opt">Opsional</span>
                        </label>
                        <div class="file-dropzone-wrapper">
                            <input type="file"
                                   name="kaprodi_image"
                                   accept="image/*"
                                   data-preview="sambutan-photo-preview">
                            <div class="file-dropzone-icon">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </div>
                            <div class="text-sm font-semibold text-slate-700">
                                Pilih foto formal pimpinan
                            </div>
                            <div class="text-xs text-slate-500 mt-1">
                                Format: <strong>JPG, PNG, WEBP</strong> &bull; Maks. 2MB
                            </div>
                        </div>

                        <div id="sambutan-photo-preview" class="live-preview-box" style="display: none;"></div>
                    </div>

                    <div class="col-lg-4">
                        @if($welcome && $welcome->kaprodi_image)
                            <div class="p-3 bg-white rounded-xl border border-slate-200 text-center">
                                <span class="text-xxs font-bold uppercase tracking-wider text-slate-500 d-block mb-2">Foto Saat Ini</span>
                                <img src="{{ asset('storage/' . $welcome->kaprodi_image) }}"
                                     alt="Foto Pimpinan"
                                     class="rounded-xl shadow-sm border border-slate-200"
                                     style="max-height: 110px; width: 90px; object-fit: cover; margin: 0 auto; display: block;">
                                <span class="text-xxs text-slate-400 d-block mt-2">Pilih file baru bila ingin memperbarui</span>
                            </div>
                        @else
                            <div class="p-3 bg-white rounded-xl border border-dashed border-slate-200 text-center text-slate-400">
                                <i class="fas fa-user-circle fa-2x mb-2 d-block opacity-40"></i>
                                <span class="text-xs">Belum ada foto terunggah</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- SECTION 2: KUTIPAN & TEKS SAMBUTAN --}}
            <div class="form-section-card">
                <div class="form-section-header">
                    <div class="form-section-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                    <div>
                        <h5 class="form-section-title">Kutipan Utama & Narasi Sambutan</h5>
                        <p class="form-section-desc">Pesan inspiratif yang menjadi sorotan utama di halaman depan.</p>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label-custom">
                        <span>Kutipan Utama (Highlighted Quote)</span>
                        <span class="badge-req">* Wajib Diisi</span>
                    </label>
                    <textarea class="form-control-custom @error('quote') border-rose-500 @enderror"
                              id="quote"
                              name="quote"
                              rows="3"
                              placeholder="Kutipan ringkas inspiratif dari pimpinan..."
                              required>{{ old('quote', $welcome->quote ?? '') }}</textarea>
                    <div class="form-hint">
                        <i class="fas fa-quote-right"></i>
                        <span>Tampil dengan tipografi besar dan kutipan beraksen emas di beranda.</span>
                    </div>
                    @error('quote')
                        <div class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label-custom">
                        <span>Isi Sambutan (Paragraf 1)</span>
                        <span class="badge-req">* Wajib Diisi</span>
                    </label>
                    <textarea class="form-control-custom @error('welcome_text_1') border-rose-500 @enderror"
                              id="welcome_text_1"
                              name="welcome_text_1"
                              rows="4"
                              placeholder="Tuliskan paragraf pembuka sambutan..."
                              required>{{ old('welcome_text_1', $welcome->welcome_text_1 ?? '') }}</textarea>
                    @error('welcome_text_1')
                        <div class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="form-label-custom">
                        <span>Isi Sambutan (Paragraf 2)</span>
                        <span class="badge-opt">Opsional</span>
                    </label>
                    <textarea class="form-control-custom @error('welcome_text_2') border-rose-500 @enderror"
                              id="welcome_text_2"
                              name="welcome_text_2"
                              rows="4"
                              placeholder="Tuliskan kelanjutan atau penutup sambutan...">{{ old('welcome_text_2', $welcome->welcome_text_2 ?? '') }}</textarea>
                </div>
            </div>

            {{-- SECTION 3: TAUTAN AKSI --}}
            <div class="form-section-card mb-4">
                <div class="form-section-header">
                    <div class="form-section-icon">
                        <i class="fas fa-link"></i>
                    </div>
                    <div>
                        <h5 class="form-section-title">Tautan Tombol Navigasi</h5>
                        <p class="form-section-desc">URL tombol pendukung di bawah teks sambutan.</p>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label-custom">
                            <span>Link Profil Lengkap</span>
                            <span class="badge-opt">Opsional</span>
                        </label>
                        <input type="text"
                               class="form-control-custom"
                               id="profile_link"
                               name="profile_link"
                               value="{{ old('profile_link', $welcome->profile_link ?? '#') }}"
                               placeholder="Contoh: /profil/visi-misi atau /tentang">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label-custom">
                            <span>Link Hubungi Kami</span>
                            <span class="badge-opt">Opsional</span>
                        </label>
                        <input type="text"
                               class="form-control-custom"
                               id="contact_link"
                               name="contact_link"
                               value="{{ old('contact_link', $welcome->contact_link ?? '#') }}"
                               placeholder="Contoh: /kontak atau https://wa.me/...">
                    </div>
                </div>
            </div>

            <div class="p-3 bg-slate-50 border border-slate-200 rounded-xl d-flex align-items-center justify-content-between flex-wrap gap-2">
                <span class="text-xs text-slate-500">
                    <i class="fas fa-info-circle text-emerald-600"></i> Perubahan sambutan pimpinan akan langsung tayang pada blok sambutan beranda.
                </span>
                <button type="submit" class="btn-brand-primary">
                    <i class="fas fa-save"></i> Simpan Sambutan Pimpinan
                </button>
            </div>

        </form>

    </div>

</div>

@endsection
