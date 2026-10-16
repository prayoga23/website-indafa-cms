<div class="p-3 p-md-4">

    {{-- SECTION 1: AFILIASI & PENEMPATAN ALBUM --}}
    <div class="form-section-card">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-sitemap"></i>
            </div>
            <div>
                <h5 class="form-section-title">Klasifikasi & Penempatan Album</h5>
                <p class="form-section-desc">Pilih lingkup kegiatan galeri: Umum Kampus atau khusus Fakultas / Program Studi.</p>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label-custom">
                    <span>Fakultas Terkait</span>
                    <span class="badge-opt">Opsional</span>
                </label>
                <select name="faculty_id" class="form-select-custom">
                    <option value="">-- Kampus Umum / Pusat --</option>
                    @foreach($faculties as $faculty)
                        <option value="{{ $faculty->id }}"
                            @selected(old('faculty_id', $gallery->faculty_id ?? '') == $faculty->id)>
                            {{ $faculty->name }}
                        </option>
                    @endforeach
                </select>
                <div class="form-hint">
                    <i class="fas fa-info-circle"></i>
                    <span>Tentukan fakultas pemilik dokumentasi kegiatan ini.</span>
                </div>
            </div>

            <div class="col-md-6">
                <label class="form-label-custom">
                    <span>Program Studi Terkait</span>
                    <span class="badge-opt">Opsional</span>
                </label>
                <select name="study_program_id" class="form-select-custom">
                    <option value="">-- Semua Prodi / Umum --</option>
                    @foreach($studyPrograms as $prodi)
                        <option value="{{ $prodi->id }}"
                            @selected(old('study_program_id', $gallery->study_program_id ?? '') == $prodi->id)>
                            {{ $prodi->name }}
                        </option>
                    @endforeach
                </select>
                <div class="form-hint">
                    <i class="fas fa-info-circle"></i>
                    <span>Tentukan prodi spesifik jika dokumentasi kegiatan prodi.</span>
                </div>
            </div>
        </div>
    </div>

    {{-- SECTION 2: IDENTITAS ALBUM --}}
    <div class="form-section-card">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-images"></i>
            </div>
            <div>
                <h5 class="form-section-title">Judul & Deskripsi Album</h5>
                <p class="form-section-desc">Beri nama album dokumentasi kegiatan kampus.</p>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label-custom">
                <span>Nama / Judul Album Kegiatan</span>
                <span class="badge-req">* Wajib Diisi</span>
            </label>
            <input type="text"
                   name="title"
                   class="form-control-custom @error('title') border-rose-500 @enderror"
                   value="{{ old('title', $gallery->title ?? '') }}"
                   placeholder="Contoh: Dokumentasi Wisuda Sarjana Angkatan XV Tahun 2026"
                   required>
            <div class="form-hint">
                <i class="fas fa-pen"></i>
                <span>Tuliskan nama acara atau momentum kegiatan secara jelas.</span>
            </div>
            @error('title')
                <div class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="form-label-custom">
                <span>Deskripsi Kegiatan</span>
                <span class="badge-opt">Opsional</span>
            </label>
            <textarea name="description"
                      rows="4"
                      class="form-control-custom"
                      placeholder="Uraikan waktu, tempat, dan gambaran umum kegiatan dokumentasi ini...">{{ old('description', $gallery->description ?? '') }}</textarea>
            <div class="form-hint">
                <i class="fas fa-align-left"></i>
                <span>Penjelasan singkat yang akan menyertai album foto di galeri.</span>
            </div>
        </div>
    </div>

    {{-- SECTION 3: COVER ALBUM --}}
    <div class="form-section-card">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-camera"></i>
            </div>
            <div>
                <h5 class="form-section-title">Cover Sampul Album</h5>
                <p class="form-section-desc">Foto utama beresolusi baik sebagai thumbnail cover album.</p>
            </div>
        </div>

        <div class="row align-items-center g-3">
            <div class="col-lg-8">
                <div class="file-dropzone-wrapper">
                    <input type="file"
                           name="cover_image"
                           accept="image/*"
                           data-preview="gallery-cover-preview">
                    <div class="file-dropzone-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <div class="text-sm font-semibold text-slate-700">
                        Klik untuk memilih foto cover album
                    </div>
                    <div class="text-xs text-slate-500 mt-1">
                        Format: <strong>JPG, PNG, WEBP</strong> &bull; Maks. <strong>2 MB</strong>
                    </div>
                </div>

                {{-- Live Preview Box for Selected Image --}}
                <div id="gallery-cover-preview" class="live-preview-box" style="display: none;"></div>
            </div>

            <div class="col-lg-4">
                @if(isset($gallery) && $gallery->cover_image)
                    <div class="p-3 bg-white rounded-xl border border-slate-200 text-center">
                        <span class="text-xxs font-bold uppercase tracking-wider text-slate-500 d-block mb-2">Cover Saat Ini</span>
                        <img src="{{ asset('storage/'.$gallery->cover_image) }}"
                             alt="Cover Album"
                             class="rounded-lg shadow-sm border border-slate-200 w-100"
                             style="max-height: 120px; object-fit: cover;">
                        <span class="text-xxs text-slate-400 d-block mt-2">Pilih file baru bila ingin mengganti</span>
                    </div>
                @else
                    <div class="p-3 bg-white rounded-xl border border-dashed border-slate-200 text-center text-slate-400">
                        <i class="far fa-image fa-2x mb-2 d-block opacity-40"></i>
                        <span class="text-xs">Belum ada cover terunggah</span>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- SECTION 4: STATUS PUBLIKASI --}}
    <div class="form-section-card mb-0">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-toggle-on"></i>
            </div>
            <div>
                <h5 class="form-section-title">Status Ketersediaan Album</h5>
                <p class="form-section-desc">Tentukan apakah album langsung dapat diakses publik di website.</p>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label-custom">
                    <span>Status Publikasi</span>
                    <span class="badge-req">* Wajib Diisi</span>
                </label>
                <select name="status" class="form-select-custom">
                    <option value="publish" {{ old('status', $gallery->status ?? 'publish') == 'publish' ? 'selected' : '' }}>
                        🟢 Publish (Tampil di Galeri Website)
                    </option>
                    <option value="draft" {{ old('status', $gallery->status ?? '') == 'draft' ? 'selected' : '' }}>
                        🟡 Draft (Hanya disimpan di admin)
                    </option>
                </select>
                <div class="form-hint">
                    <i class="fas fa-shield-alt"></i>
                    <span>Pilih publish bila foto-foto album siap dinikmati umum.</span>
                </div>
            </div>
        </div>
    </div>

</div>
