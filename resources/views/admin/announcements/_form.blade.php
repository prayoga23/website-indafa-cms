<div class="p-3 p-md-4">

    {{-- SECTION 1: INFORMASI UTAMA PENGUMUMAN --}}
    <div class="form-section-card">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-bullhorn"></i>
            </div>
            <div>
                <h5 class="form-section-title">Informasi Utama Pengumuman</h5>
                <p class="form-section-desc">Masukkan judul dan ringkasan singkat yang mudah dipahami civitas akademika.</p>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label-custom">
                <span>Judul Pengumuman</span>
                <span class="badge-req">* Wajib Diisi</span>
            </label>
            <input type="text"
                   name="title"
                   class="form-control-custom @error('title') border-rose-500 @enderror"
                   value="{{ old('title', $announcement->title ?? '') }}"
                   placeholder="Contoh: Jadwal Pembayaran UKT / SPP Semester Ganjil TA 2026/2027"
                   required>
            <div class="form-hint">
                <i class="fas fa-pen"></i>
                <span>Tulis judul pengumuman yang jelas dan tepat sasaran.</span>
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
                      placeholder="Ringkasan poin penting pengumuman untuk ditampilkan pada daftar pengumuman...">{{ old('excerpt', $announcement->excerpt ?? '') }}</textarea>
            <div class="form-hint">
                <i class="fas fa-info-circle"></i>
                <span>Maksimal 2-3 kalimat untuk pratinjau cepat bagi pembaca.</span>
            </div>
        </div>
    </div>

    {{-- SECTION 2: JADWAL & STATUS --}}
    <div class="form-section-card">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div>
                <h5 class="form-section-title">Jadwal & Ketersediaan</h5>
                <p class="form-section-desc">Atur waktu penayangan dan status publikasi pengumuman.</p>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label-custom">
                    <span>Tanggal Berlaku / Publish</span>
                    <span class="badge-opt">Opsional</span>
                </label>
                <input type="date"
                       name="publish_date"
                       class="form-control-custom"
                       value="{{ old('publish_date', isset($announcement->publish_date) ? (is_string($announcement->publish_date) ? \Carbon\Carbon::parse($announcement->publish_date)->format('Y-m-d') : $announcement->publish_date->format('Y-m-d')) : date('Y-m-d')) }}">
                <div class="form-hint">
                    <i class="far fa-clock"></i>
                    <span>Tanggal acuan berlakunya pengumuman ini.</span>
                </div>
            </div>

            <div class="col-md-6">
                <label class="form-label-custom">
                    <span>Status Pengumuman</span>
                    <span class="badge-req">* Wajib Diisi</span>
                </label>
                <select name="status" class="form-select-custom">
                    <option value="publish" {{ old('status', $announcement->status ?? 'publish') == 'publish' ? 'selected' : '' }}>
                        🟢 Publish (Tayang di website)
                    </option>
                    <option value="draft" {{ old('status', $announcement->status ?? '') == 'draft' ? 'selected' : '' }}>
                        🟡 Draft (Hanya arsip admin)
                    </option>
                </select>
                <div class="form-hint">
                    <i class="fas fa-shield-alt"></i>
                    <span>Pilih "Publish" agar pengumuman dapat dibaca oleh mahasiswa & dosen.</span>
                </div>
            </div>
        </div>
    </div>

    {{-- SECTION 3: ISI LENGKAP PENGUMUMAN --}}
    <div class="form-section-card mb-0">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <div>
                <h5 class="form-section-title">Isi Lengkap Pengumuman</h5>
                <p class="form-section-desc">Uraikan rincian pengumuman, syarat, ketentuan, serta tautan lampiran bila ada.</p>
            </div>
        </div>

        <div>
            <label class="form-label-custom">
                <span>Rincian Pengumuman</span>
                <span class="badge-req">* Wajib Diisi</span>
            </label>
            <textarea name="content"
                      id="editor"
                      class="form-control-custom"
                      rows="12"
                      placeholder="Tuliskan isi pengumuman secara rinci...">{{ old('content', $announcement->content ?? '') }}</textarea>
            <div class="form-hint mt-2">
                <i class="fas fa-keyboard"></i>
                <span>Gunakan toolbar untuk merapikan teks, membuat daftar list, atau menyisipkan tautan download PDF.</span>
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
