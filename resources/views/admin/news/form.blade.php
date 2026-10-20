<div class="p-3 p-md-4">

    {{-- SECTION 1: KLASIFIKASI & TARGET --}}
    <div class="form-section-card">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-sitemap"></i>
            </div>
            <div>
                <h5 class="form-section-title">Klasifikasi & Penempatan Berita</h5>
                <p class="form-section-desc">Tentukan apakah berita ditujukan untuk tingkat Institut atau spesifik Fakultas / Prodi.</p>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label-custom">
                    <span>Fakultas Terkait</span>
                    <span class="badge-opt">Opsional</span>
                </label>
                <select name="faculty_id" class="form-select-custom">
                    <option value="">-- Umum / Seluruh Kampus --</option>
                    @foreach($faculties as $f)
                        <option value="{{ $f->id }}"
                            {{ old('faculty_id', $news->faculty_id ?? '') == $f->id ? 'selected' : '' }}>
                            {{ $f->name }}
                        </option>
                    @endforeach
                </select>
                <div class="form-hint">
                    <i class="fas fa-info-circle"></i>
                    <span>Pilih jika berita ini milik fakultas tertentu.</span>
                </div>
            </div>

            <div class="col-md-6">
                <label class="form-label-custom">
                    <span>Program Studi Terkait</span>
                    <span class="badge-opt">Opsional</span>
                </label>
                <select name="study_program_id" class="form-select-custom">
                    <option value="">-- Umum / Semua Prodi --</option>
                    @foreach($studyPrograms as $s)
                        <option value="{{ $s->id }}"
                            {{ old('study_program_id', $news->study_program_id ?? '') == $s->id ? 'selected' : '' }}>
                            {{ $s->name }}
                        </option>
                    @endforeach
                </select>
                <div class="form-hint">
                    <i class="fas fa-info-circle"></i>
                    <span>Pilih jika berita berkaitan khusus dengan prodi.</span>
                </div>
            </div>
        </div>
    </div>

    {{-- SECTION 2: INFORMASI UTAMA & KONTEN --}}
    <div class="form-section-card">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <div>
                <h5 class="form-section-title">Konten Utama Berita</h5>
                <p class="form-section-desc">Masukkan judul dan artikel lengkap berita secara jelas dan terstruktur.</p>
            </div>
        </div>

        <div class="mb-4">
            <label class="form-label-custom">
                <span>Judul Berita</span>
                <span class="badge-req">* Wajib Diisi</span>
            </label>
            <input type="text"
                   name="title"
                   class="form-control-custom @error('title') border-rose-500 @enderror"
                   value="{{ old('title', $news->title ?? '') }}"
                   placeholder="Contoh: Rektor IAI Darul Falah Buka Kuliah Perdana Semester Genap"
                   required>
            <div class="form-hint">
                <i class="fas fa-pen"></i>
                <span>Gunakan judul yang informatif, lugas, dan menarik perhatian pembaca.</span>
            </div>
            @error('title')
                <div class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="form-label-custom">
                <span>Isi Konten Berita</span>
                <span class="badge-req">* Wajib Diisi</span>
            </label>
            <textarea name="content"
                      id="editor"
                      class="form-control-custom"
                      rows="12"
                      placeholder="Tuliskan isi berita di sini...">{{ old('content', $news->content ?? '') }}</textarea>
            <div class="form-hint mt-2">
                <i class="fas fa-keyboard"></i>
                <span>Anda dapat memformat teks tebal, miring, list, serta menyematkan foto lewat toolbar editor.</span>
            </div>
        </div>
    </div>

    {{-- SECTION 3: THUMBNAIL & MEDIA --}}
    <div class="form-section-card">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-image"></i>
            </div>
            <div>
                <h5 class="form-section-title">Thumbnail / Gambar Utama</h5>
                <p class="form-section-desc">Gambar yang akan tampil sebagai sampul berita di beranda dan media sosial.</p>
            </div>
        </div>

        <div class="row align-items-center g-3">
            <div class="col-lg-8">
                <div class="file-dropzone-wrapper">
                    <input type="file"
                           name="thumbnail"
                           id="news-thumbnail-input"
                           accept="image/jpeg,image/png,image/webp,image/jpg"
                           data-preview="thumbnail-preview-box">
                    <div class="file-dropzone-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <div class="text-sm font-semibold text-slate-700">
                        Klik untuk memilih gambar atau seret file ke area ini
                    </div>
                    <div class="text-xs text-slate-500 mt-1">
                        Format didukung: <strong>JPG, JPEG, PNG, WEBP</strong> &bull; Maksimal <strong>10 MB</strong> (Rasio 16:9 disarankan)
                    </div>
                </div>

                {{-- Live Preview Box for Selected Image --}}
                <div id="thumbnail-preview-box" class="live-preview-box" style="display: none;"></div>
            </div>

            <div class="col-lg-4" id="thumbnail-side-preview">
                @if(isset($news) && $news->thumbnail)
                    <div class="p-3 bg-white rounded-xl border border-slate-200 text-center">
                        <span class="text-xxs font-bold uppercase tracking-wider text-slate-500 d-block mb-2">Gambar Saat Ini</span>
                        <img src="{{ asset('storage/'.$news->thumbnail) }}"
                             alt="Thumbnail Saat Ini"
                             class="rounded-lg shadow-sm border border-slate-200 w-100"
                             style="max-height: 140px; object-fit: cover;"
                             onerror="this.onerror=null;this.src='{{ asset('assets/img/blog-1.jpg') }}';">
                        <span class="text-xxs text-slate-400 d-block mt-2">Pilih gambar baru jika ingin mengganti</span>
                    </div>
                @else
                    <div class="p-3 bg-white rounded-xl border border-dashed border-slate-200 text-center text-slate-400">
                        <i class="far fa-image fa-2x mb-2 d-block opacity-40"></i>
                        <span class="text-xs">Belum ada thumbnail</span>
                    </div>
                @endif
            </div>
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', function () {
            const input = document.getElementById('news-thumbnail-input');
            const previewContainer = document.getElementById('thumbnail-side-preview');
            if (input && previewContainer) {
                input.addEventListener('change', function () {
                    const file = this.files[0];
                    if (file && file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            previewContainer.innerHTML = `
                                <div class="p-3 bg-white rounded-xl border border-emerald-300 text-center shadow-sm">
                                    <span class="badge bg-emerald-100 text-emerald-800 text-xxs font-bold mb-2">Pratinjau Gambar Dipilih</span>
                                    <img src="${e.target.result}" alt="Preview" class="rounded-lg shadow-sm border border-slate-200 w-100" style="max-height: 140px; object-fit: cover;">
                                    <span class="text-xxs text-emerald-700 font-bold d-block mt-2">${file.name} (${(file.size/1024).toFixed(1)} KB)</span>
                                </div>
                            `;
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
        </script>
    </div>

    {{-- SECTION 4: STATUS PUBLIKASI --}}
    <div class="form-section-card mb-0">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-toggle-on"></i>
            </div>
            <div>
                <h5 class="form-section-title">Status Publikasi</h5>
                <p class="form-section-desc">Pilih status ketersediaan berita bagi pengunjung website umum.</p>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label-custom">
                    <span>Status Berita</span>
                    <span class="badge-req">* Wajib Diisi</span>
                </label>
                <select name="status" class="form-select-custom">
                    <option value="publish" {{ old('status', $news->status ?? 'publish') == 'publish' ? 'selected' : '' }}>
                        🟢 Publish (Langsung tampil di website publik)
                    </option>
                    <option value="draft" {{ old('status', $news->status ?? '') == 'draft' ? 'selected' : '' }}>
                        🟡 Draft (Hanya tersimpan di panel admin)
                    </option>
                </select>
                <div class="form-hint">
                    <i class="fas fa-shield-alt"></i>
                    <span>Pilih "Draft" jika Anda masih ingin mengedit isi berita sebelum dibaca publik.</span>
                </div>
            </div>
        </div>
    </div>

</div>
