@csrf

<div class="row g-4">

    {{-- LEFT COLUMN: KONTEN BANNER --}}
    <div class="col-lg-8">

        {{-- KLASIFIKASI BANNER --}}
        <div class="form-section-card">
            <div class="form-section-header">
                <div class="form-section-icon">
                    <i class="fas fa-sitemap"></i>
                </div>
                <div>
                    <h5 class="form-section-title">Klasifikasi & Penempatan</h5>
                    <p class="form-section-desc">Tentukan penempatan banner pada beranda utama atau spesifik unit akademik.</p>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label-custom">
                        <span>Fakultas Terkait</span>
                        <span class="badge-opt">Opsional</span>
                    </label>
                    <select name="faculty_id" class="form-select-custom">
                        <option value="">-- Umum / Beranda Utama --</option>
                        @foreach($faculties as $f)
                            <option value="{{ $f->id }}"
                                {{ old('faculty_id', $banner->faculty_id ?? '') == $f->id ? 'selected' : '' }}>
                                {{ $f->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="form-hint">
                        <i class="fas fa-info-circle"></i>
                        <span>Pilih jika banner khusus fakultas.</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label-custom">
                        <span>Program Studi Terkait</span>
                        <span class="badge-opt">Opsional</span>
                    </label>
                    <select name="program_studi_id" class="form-select-custom">
                        <option value="">-- Umum / Semua Prodi --</option>
                        @foreach($studyPrograms as $s)
                            <option value="{{ $s->id }}"
                                {{ old('program_studi_id', $banner->program_studi_id ?? '') == $s->id ? 'selected' : '' }}>
                                {{ $s->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="form-hint">
                        <i class="fas fa-info-circle"></i>
                        <span>Pilih jika banner khusus prodi.</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- INFORMASI UTAMA BANNER --}}
        <div class="form-section-card">
            <div class="form-section-header">
                <div class="form-section-icon">
                    <i class="fas fa-heading"></i>
                </div>
                <div>
                    <h5 class="form-section-title">Teks & Konten Banner</h5>
                    <p class="form-section-desc">Masukkan teks headline yang akan tampil menonjol pada slide banner.</p>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label-custom">
                    <span>Judul Banner (Headline)</span>
                    <span class="badge-req">* Wajib Diisi</span>
                </label>
                <input type="text"
                       name="title"
                       class="form-control-custom @error('title') border-rose-500 @enderror"
                       value="{{ old('title', $banner->title ?? '') }}"
                       placeholder="Contoh: Penerimaan Mahasiswa Baru Gelombang 2"
                       required>
                <div class="form-hint">
                    <i class="fas fa-pen"></i>
                    <span>Teks utama berukuran besar pada slide.</span>
                </div>
                @error('title')
                    <div class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label-custom">
                    <span>Sub Judul (Subtitle)</span>
                    <span class="badge-opt">Opsional</span>
                </label>
                <input type="text"
                       name="subtitle"
                       class="form-control-custom"
                       value="{{ old('subtitle', $banner->subtitle ?? '') }}"
                       placeholder="Contoh: Dapatkan Beasiswa Prestasi & Bebas Biaya Pendaftaran">
                <div class="form-hint">
                    <i class="fas fa-font"></i>
                    <span>Teks pendukung yang tampil tepat di bawah judul utama.</span>
                </div>
            </div>

            <div>
                <label class="form-label-custom">
                    <span>Deskripsi Singkat</span>
                    <span class="badge-opt">Opsional</span>
                </label>
                <textarea name="description"
                          rows="4"
                          class="form-control-custom"
                          placeholder="Penjelasan ringkas mengenai informasi banner ini...">{{ old('description', $banner->description ?? '') }}</textarea>
                <div class="form-hint">
                    <i class="fas fa-align-left"></i>
                    <span>Maksimal 2-3 baris teks agar slide tetap bersih dan rapi.</span>
                </div>
            </div>
        </div>

        {{-- TOMBOL CTA (CALL TO ACTION) --}}
        <div class="form-section-card">
            <div class="form-section-header">
                <div class="form-section-icon">
                    <i class="fas fa-mouse-pointer"></i>
                </div>
                <div>
                    <h5 class="form-section-title">Tombol Aksi (Call To Action)</h5>
                    <p class="form-section-desc">Tautan tombol interaktif yang mengarahkan pengunjung saat mengklik banner.</p>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label-custom">
                        <span>Label Teks Tombol</span>
                        <span class="badge-opt">Opsional</span>
                    </label>
                    <input type="text"
                           name="button_text"
                           class="form-control-custom"
                           value="{{ old('button_text', $banner->button_text ?? '') }}"
                           placeholder="Contoh: Daftar Sekarang / Pelajari Lebih Lanjut">
                    <div class="form-hint">
                        <i class="fas fa-tag"></i>
                        <span>Kosongkan bila slide tidak membutuhkan tombol.</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label-custom">
                        <span>URL / Link Tujuan</span>
                        <span class="badge-opt">Opsional</span>
                    </label>
                    <input type="text"
                           name="button_link"
                           class="form-control-custom"
                           value="{{ old('button_link', $banner->button_link ?? '') }}"
                           placeholder="https://pmb.indafa.ac.id atau /berita">
                    <div class="form-hint">
                        <i class="fas fa-link"></i>
                        <span>Bisa berupa link internal atau website eksternal.</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- RIGHT COLUMN: GAMBAR & PENGATURAN --}}
    <div class="col-lg-4">

        {{-- UPLOAD GAMBAR BANNER --}}
        <div class="form-section-card">
            <div class="form-section-header">
                <div class="form-section-icon">
                    <i class="fas fa-image"></i>
                </div>
                <div>
                    <h5 class="form-section-title">Gambar Slide Banner</h5>
                    <p class="form-section-desc">Visual beresolusi tinggi untuk background slide.</p>
                </div>
            </div>

            <div class="file-dropzone-wrapper">
                <input type="file"
                       name="image"
                       accept="image/*"
                       data-preview="banner-preview-box">
                <div class="file-dropzone-icon">
                    <i class="fas fa-cloud-upload-alt"></i>
                </div>
                <div class="text-sm font-semibold text-slate-700">
                    Pilih gambar banner
                </div>
                <div class="text-xs text-slate-500 mt-1">
                    Format: <strong>JPG, PNG, WEBP</strong><br>
                    Rasio disarankan: <strong>1920 &times; 600 px</strong>
                </div>
            </div>

            {{-- Live Preview Box for Selected Image --}}
            <div id="banner-preview-box" class="live-preview-box" style="display: none;"></div>

            @if(isset($banner) && $banner->image)
                <div class="mt-3 p-3 bg-white rounded-xl border border-slate-200 text-center">
                    <span class="text-xxs font-bold uppercase tracking-wider text-slate-500 d-block mb-2">Banner Saat Ini</span>
                    <img src="{{ asset('storage/'.$banner->image) }}"
                         alt="Banner Saat Ini"
                         class="rounded-lg shadow-sm border border-slate-200 w-100"
                         style="max-height: 120px; object-fit: cover;">
                    <span class="text-xxs text-slate-400 d-block mt-2">Pilih gambar baru bila ingin mengganti</span>
                </div>
            @endif
        </div>

        {{-- PENGATURAN TAYANG --}}
        <div class="form-section-card">
            <div class="form-section-header">
                <div class="form-section-icon">
                    <i class="fas fa-sliders-h"></i>
                </div>
                <div>
                    <h5 class="form-section-title">Pengaturan Penayangan</h5>
                    <p class="form-section-desc">Visibilitas, urutan dan masa aktif banner.</p>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label-custom">
                    <span>Status Publikasi</span>
                    <span class="badge-req">* Wajib</span>
                </label>
                <select name="status" class="form-select-custom">
                    <option value="publish" {{ old('status', $banner->status ?? 'publish') == 'publish' ? 'selected' : '' }}>
                        🟢 Publish (Siap Ditampilkan)
                    </option>
                    <option value="draft" {{ old('status', $banner->status ?? '') == 'draft' ? 'selected' : '' }}>
                        🟡 Draft (Disembunyikan)
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label-custom">
                    <span>Aktivasi Slide</span>
                    <span class="badge-req">* Wajib</span>
                </label>
                <select name="is_active" class="form-select-custom">
                    <option value="1" {{ old('is_active', $banner->is_active ?? 1) == 1 ? 'selected' : '' }}>
                        Aktif Berputar di Carousel
                    </option>
                    <option value="0" {{ old('is_active', $banner->is_active ?? 1) == 0 ? 'selected' : '' }}>
                        Nonaktifkan Sementara
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label-custom">
                    <span>Urutan Tampil (Sort Order)</span>
                    <span class="badge-opt">Opsional</span>
                </label>
                <input type="number"
                       name="sort_order"
                       class="form-control-custom"
                       value="{{ old('sort_order', $banner->sort_order ?? 0) }}"
                       min="0"
                       placeholder="0">
                <div class="form-hint">
                    <i class="fas fa-sort-numeric-down"></i>
                    <span>Angka lebih kecil tampil lebih dulu (0, 1, 2, ...).</span>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label-custom">
                    <span>Mulai Tayang</span>
                    <span class="badge-opt">Opsional</span>
                </label>
                <input type="date"
                       name="start_date"
                       class="form-control-custom"
                       value="{{ old('start_date', isset($banner->start_date) ? (is_string($banner->start_date) ? \Carbon\Carbon::parse($banner->start_date)->format('Y-m-d') : $banner->start_date->format('Y-m-d')) : '') }}">
            </div>

            <div class="mb-3">
                <label class="form-label-custom">
                    <span>Selesai Tayang</span>
                    <span class="badge-opt">Opsional</span>
                </label>
                <input type="date"
                       name="end_date"
                       class="form-control-custom"
                       value="{{ old('end_date', isset($banner->end_date) ? (is_string($banner->end_date) ? \Carbon\Carbon::parse($banner->end_date)->format('Y-m-d') : $banner->end_date->format('Y-m-d')) : '') }}">
                <div class="form-hint">
                    <i class="far fa-calendar-times"></i>
                    <span>Kosongkan jika banner tayang seterusnya.</span>
                </div>
            </div>
        </div>

        {{-- ACTION BUTTONS CARD --}}
        <div class="p-3 bg-white rounded-2xl border border-slate-200 shadow-sm d-flex flex-column gap-2">
            <button type="submit" class="btn-brand-primary justify-content-center py-2.5">
                <i class="fas fa-save"></i> Simpan Banner
            </button>
            <a href="{{ route('admin.banners.index') }}" class="btn-secondary-custom justify-content-center py-2">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar
            </a>
        </div>

    </div>

</div>
