<div class="p-3 p-md-4">

    {{-- SECTION 1: HOMEBASE AKADEMIK --}}
    <div class="form-section-card">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-university"></i>
            </div>
            <div>
                <h5 class="form-section-title">Homebase Akademik Dosen</h5>
                <p class="form-section-desc">Tentukan fakultas dan program studi tempat dosen bertugas sebagai pengajar tetap/luar biasa.</p>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label-custom">
                    <span>Fakultas Homebase</span>
                    <span class="badge-req">* Wajib Dipilih</span>
                </label>
                <select name="faculty_id" class="form-select-custom @error('faculty_id') border-rose-500 @enderror" required>
                    <option value="">-- Pilih Fakultas --</option>
                    @foreach($faculties as $f)
                        <option value="{{ $f->id }}"
                            {{ old('faculty_id', $lecturer->faculty_id ?? '') == $f->id ? 'selected' : '' }}>
                            {{ $f->name }}
                        </option>
                    @endforeach
                </select>
                <div class="form-hint">
                    <i class="fas fa-info-circle"></i>
                    <span>Fakultas naungan dosen.</span>
                </div>
                @error('faculty_id')
                    <div class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label-custom">
                    <span>Program Studi Homebase</span>
                    <span class="badge-req">* Wajib Dipilih</span>
                </label>
                <select name="study_program_id" class="form-select-custom @error('study_program_id') border-rose-500 @enderror" required>
                    <option value="">-- Pilih Program Studi --</option>
                    @foreach($studyPrograms as $s)
                        <option value="{{ $s->id }}"
                            {{ old('study_program_id', $lecturer->study_program_id ?? '') == $s->id ? 'selected' : '' }}>
                            {{ $s->name }}
                        </option>
                    @endforeach
                </select>
                <div class="form-hint">
                    <i class="fas fa-info-circle"></i>
                    <span>Prodi tempat penugasan utama dosen.</span>
                </div>
                @error('study_program_id')
                    <div class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    {{-- SECTION 2: BIODATA & JABATAN DOSEN --}}
    <div class="form-section-card">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-id-card"></i>
            </div>
            <div>
                <h5 class="form-section-title">Biodata & Jabatan Akademik</h5>
                <p class="form-section-desc">Masukkan nama lengkap beserta gelar, NIDN, jabatan fungsional/struktural, dan pendidikan.</p>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label-custom">
                <span>Nama Lengkap Dosen</span>
                <span class="badge-req">* Wajib Diisi</span>
            </label>
            <input type="text"
                   name="name"
                   class="form-control-custom @error('name') border-rose-500 @enderror"
                   value="{{ old('name', $lecturer->name ?? '') }}"
                   placeholder="Contoh: Dr. H. Ahmad Fauzi, M.Pd.I"
                   required>
            <div class="form-hint">
                <i class="fas fa-user-graduate"></i>
                <span>Tuliskan nama lengkap beserta gelar akademik depan dan belakang.</span>
            </div>
            @error('name')
                <div class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</div>
            @enderror
        </div>

        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label-custom">
                    <span>NIDN / NUPTK</span>
                    <span class="badge-opt">Opsional</span>
                </label>
                <input type="text"
                       name="nidn"
                       class="form-control-custom"
                       value="{{ old('nidn', $lecturer->nidn ?? '') }}"
                       placeholder="Contoh: 2104038801">
                <div class="form-hint">
                    <i class="fas fa-fingerprint"></i>
                    <span>Nomor Induk Dosen Nasional.</span>
                </div>
            </div>

            <div class="col-md-4">
                <label class="form-label-custom">
                    <span>Jabatan Akademik / Tugas</span>
                    <span class="badge-opt">Opsional</span>
                </label>
                <input type="text"
                       name="position"
                       class="form-control-custom"
                       value="{{ old('position', $lecturer->position ?? '') }}"
                       placeholder="Contoh: Lektor / Kaprodi HES">
                <div class="form-hint">
                    <i class="fas fa-briefcase"></i>
                    <span>Jabatan fungsional atau struktural.</span>
                </div>
            </div>

            <div class="col-md-4">
                <label class="form-label-custom">
                    <span>Pendidikan Terakhir</span>
                    <span class="badge-opt">Opsional</span>
                </label>
                <input type="text"
                       name="education"
                       class="form-control-custom"
                       value="{{ old('education', $lecturer->education ?? '') }}"
                       placeholder="Contoh: S3 Pendidikan Islam">
                <div class="form-hint">
                    <i class="fas fa-certificate"></i>
                    <span>Jenjang & jurusan pendidikan terakhir.</span>
                </div>
            </div>
        </div>
    </div>

    {{-- SECTION 3: PAS FOTO RESMI DOSEN --}}
    <div class="form-section-card">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-camera"></i>
            </div>
            <div>
                <h5 class="form-section-title">Pas Foto Resmi Dosen</h5>
                <p class="form-section-desc">Unggah foto formal dosen untuk profil akademik di website.</p>
            </div>
        </div>

        <div class="row align-items-center g-3">
            <div class="col-lg-8">
                <div class="file-dropzone-wrapper">
                    <input type="file"
                           name="photo"
                           accept="image/*"
                           data-preview="lecturer-photo-preview">
                    <div class="file-dropzone-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <div class="text-sm font-semibold text-slate-700">
                        Klik untuk memilih pas foto dosen
                    </div>
                    <div class="text-xs text-slate-500 mt-1">
                        Format: <strong>JPG, PNG, WEBP</strong> &bull; Maks. <strong>2 MB</strong> (Rasio 3:4 atau 1:1 disarankan)
                    </div>
                </div>

                {{-- Live Preview Box for Selected Image --}}
                <div id="lecturer-photo-preview" class="live-preview-box" style="display: none;"></div>
            </div>

            <div class="col-lg-4">
                @if(isset($lecturer) && $lecturer->photo)
                    <div class="p-3 bg-white rounded-xl border border-slate-200 text-center">
                        <span class="text-xxs font-bold uppercase tracking-wider text-slate-500 d-block mb-2">Foto Saat Ini</span>
                        <img src="{{ asset('storage/'.$lecturer->photo) }}"
                             alt="Foto Dosen"
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

    {{-- SECTION 4: BIOGRAFI RINGKAS --}}
    <div class="form-section-card mb-0">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-address-book"></i>
            </div>
            <div>
                <h5 class="form-section-title">Biografi & Rekam Jejak Singkat</h5>
                <p class="form-section-desc">Uraikan riwayat keilmuan, bidang riset, karya buku, atau pengalaman mengajar.</p>
            </div>
        </div>

        <div>
            <label class="form-label-custom">
                <span>Profil & Biografi Singkat</span>
                <span class="badge-opt">Opsional</span>
            </label>
            <textarea name="bio"
                      rows="5"
                      class="form-control-custom"
                      placeholder="Tuliskan biografi singkat, keahlian mengajar, atau riwayat penelitian dosen...">{{ old('bio', $lecturer->bio ?? '') }}</textarea>
            <div class="form-hint mt-2">
                <i class="fas fa-info-circle"></i>
                <span>Teks ini akan ditampilkan pada profil direktori dosen di prodi terkait.</span>
            </div>
        </div>
    </div>

</div>
