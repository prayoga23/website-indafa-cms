<div class="p-3 p-md-4">

    {{-- SECTION 1: KLASIFIKASI & AFILIASI --}}
    <div class="form-section-card">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-sitemap"></i>
            </div>
            <div>
                <h5 class="form-section-title">Klasifikasi & Penempatan Halaman</h5>
                <p class="form-section-desc">Tentukan apakah halaman bersifat umum kampus atau milik fakultas/prodi spesifik.</p>
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
                            @selected(old('faculty_id', $page->faculty_id ?? '') == $faculty->id)>
                            {{ $faculty->name }}
                        </option>
                    @endforeach
                </select>
                <div class="form-hint">
                    <i class="fas fa-info-circle"></i>
                    <span>Pilih jika halaman terkait fakultas.</span>
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
                            @selected(old('study_program_id', $page->study_program_id ?? '') == $prodi->id)>
                            {{ $prodi->name }}
                        </option>
                    @endforeach
                </select>
                <div class="form-hint">
                    <i class="fas fa-info-circle"></i>
                    <span>Pilih jika halaman khusus prodi.</span>
                </div>
            </div>
        </div>
    </div>

    {{-- SECTION 2: JUDUL & RINGKASAN --}}
    <div class="form-section-card">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <div>
                <h5 class="form-section-title">Judul & Ringkasan Halaman</h5>
                <p class="form-section-desc">Masukkan judul halaman dan deskripsi meta singkat.</p>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label-custom">
                <span>Judul Halaman</span>
                <span class="badge-req">* Wajib Diisi</span>
            </label>
            <input type="text"
                   name="title"
                   class="form-control-custom @error('title') border-rose-500 @enderror"
                   value="{{ old('title', $page->title ?? '') }}"
                   placeholder="Contoh: Profil Lembaga Penjaminan Mutu (LPM)"
                   required>
            <div class="form-hint">
                <i class="fas fa-pen"></i>
                <span>Judul halaman yang akan tampil di heading navigasi website.</span>
            </div>
            @error('title')
                <div class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="form-label-custom">
                <span>Ringkasan Singkat (Excerpt)</span>
                <span class="badge-opt">Opsional</span>
            </label>
            <textarea name="excerpt"
                      class="form-control-custom"
                      rows="3"
                      placeholder="Ringkasan atau keterangan singkat mengenai isi halaman ini...">{{ old('excerpt', $page->excerpt ?? '') }}</textarea>
            <div class="form-hint">
                <i class="fas fa-align-left"></i>
                <span>Ringkasan singkat untuk kebutuhan pratinjau dan meta deskripsi.</span>
            </div>
        </div>
    </div>

    {{-- SECTION 3: FEATURED IMAGE / HEADER --}}
    <div class="form-section-card">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-image"></i>
            </div>
            <div>
                <h5 class="form-section-title">Featured Image / Banner Halaman</h5>
                <p class="form-section-desc">Gambar ilustrasi atau header pelengkap halaman.</p>
            </div>
        </div>

        <div class="row align-items-center g-3">
            <div class="col-lg-8">
                <div class="file-dropzone-wrapper">
                    <input type="file"
                           name="featured_image"
                           accept="image/*"
                           data-preview="page-image-preview">
                    <div class="file-dropzone-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <div class="text-sm font-semibold text-slate-700">
                        Klik untuk memilih gambar header halaman
                    </div>
                    <div class="text-xs text-slate-500 mt-1">
                        Format: <strong>JPG, PNG, WEBP</strong> &bull; Maksimal <strong>2 MB</strong>
                    </div>
                </div>

                {{-- Live Preview Box for Selected Image --}}
                <div id="page-image-preview" class="live-preview-box" style="display: none;"></div>
            </div>

            <div class="col-lg-4">
                @if(!empty($page->featured_image))
                    <div class="p-3 bg-white rounded-xl border border-slate-200 text-center">
                        <span class="text-xxs font-bold uppercase tracking-wider text-slate-500 d-block mb-2">Gambar Saat Ini</span>
                        <img src="{{ asset('storage/'.$page->featured_image) }}"
                             alt="Featured Image"
                             class="rounded-lg shadow-sm border border-slate-200 w-100"
                             style="max-height: 120px; object-fit: cover;">
                        <span class="text-xxs text-slate-400 d-block mt-2">Pilih file baru bila ingin mengganti</span>
                    </div>
                @else
                    <div class="p-3 bg-white rounded-xl border border-dashed border-slate-200 text-center text-slate-400">
                        <i class="far fa-image fa-2x mb-2 d-block opacity-40"></i>
                        <span class="text-xs">Belum ada gambar</span>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- SECTION 4: STATUS & KONTEN LENGKAP --}}
    <div class="form-section-card mb-0">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-edit"></i>
            </div>
            <div>
                <h5 class="form-section-title">Status & Isi Lengkap Halaman</h5>
                <p class="form-section-desc">Tuliskan konten komprehensif menggunakan editor visual.</p>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label-custom">
                <span>Status Halaman</span>
                <span class="badge-req">* Wajib Diisi</span>
            </label>
            <select name="status" class="form-select-custom">
                <option value="publish" @selected(old('status', $page->status ?? 'publish') == 'publish')>
                    🟢 Publish (Dapat diakses oleh publik)
                </option>
                <option value="draft" @selected(old('status', $page->status ?? '') == 'draft')>
                    🟡 Draft (Hanya dapat dilihat oleh admin)
                </option>
            </select>
        </div>

        <div>
            <label class="form-label-custom">
                <span>Konten / Isi Halaman</span>
                <span class="badge-opt">Opsional</span>
            </label>
            <textarea name="content"
                      id="editor"
                      class="form-control-custom"
                      rows="14"
                      placeholder="Tuliskan isi halaman secara lengkap di sini...">{{ old('content', $page->content ?? '') }}</textarea>
            <div class="form-hint mt-2">
                <i class="fas fa-keyboard"></i>
                <span>Format heading, paragraf, tabel, atau sematkan foto menggunakan toolbar editor.</span>
            </div>
        </div>
    </div>

</div>

@push('js')
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
    if (document.querySelector('#editor')) {
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    }
</script>
@endpush
