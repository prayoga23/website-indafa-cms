<div class="p-3 p-md-4">

    {{-- SECTION 1: AFILIASI & IDENTITAS PRODI --}}
    <div class="form-section-card">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div>
                <h5 class="form-section-title">Afiliasi Fakultas & Nama Prodi</h5>
                <p class="form-section-desc">Pilih fakultas naungan dan masukkan nama lengkap program studi.</p>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label-custom">
                    <span>Fakultas Naungan</span>
                    <span class="badge-req">* Wajib Dipilih</span>
                </label>
                <select name="faculty_id" class="form-select-custom @error('faculty_id') border-rose-500 @enderror" required>
                    <option value="">-- Pilih Fakultas Naungan --</option>
                    @foreach($faculties as $faculty)
                        <option value="{{ $faculty->id }}"
                            {{ old('faculty_id', $studyProgram->faculty_id ?? '') == $faculty->id ? 'selected' : '' }}>
                            {{ $faculty->name }}
                        </option>
                    @endforeach
                </select>
                <div class="form-hint">
                    <i class="fas fa-university"></i>
                    <span>Tentukan fakultas tempat program studi ini bernaung.</span>
                </div>
                @error('faculty_id')
                    <div class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6">
                <label class="form-label-custom">
                    <span>Nama Program Studi</span>
                    <span class="badge-req">* Wajib Diisi</span>
                </label>
                <input type="text"
                       name="name"
                       class="form-control-custom @error('name') border-rose-500 @enderror"
                       value="{{ old('name', $studyProgram->name ?? '') }}"
                       placeholder="Contoh: Hukum Ekonomi Syariah"
                       required>
                <div class="form-hint">
                    <i class="fas fa-book"></i>
                    <span>Nama resmi program studi tanpa singkatan jenjang.</span>
                </div>
                @error('name')
                    <div class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    {{-- SECTION 2: JENJANG, AKREDITASI & KAPRODI --}}
    <div class="form-section-card">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-award"></i>
            </div>
            <div>
                <h5 class="form-section-title">Legalitas & Kepemimpinan</h5>
                <p class="form-section-desc">Tentukan jenjang pendidikan, status akreditasi BAN-PT/LAM, dan ketua prodi.</p>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-4">
                <label class="form-label-custom">
                    <span>Jenjang Pendidikan</span>
                    <span class="badge-opt">Opsional</span>
                </label>
                <select name="degree" class="form-select-custom">
                    <option value="">-- Pilih Jenjang --</option>
                    @foreach(['D3', 'D4', 'S1', 'S2', 'S3'] as $deg)
                        <option value="{{ $deg }}"
                            {{ old('degree', $studyProgram->degree ?? 'S1') == $deg ? 'selected' : '' }}>
                            Jenjang {{ $deg }}
                        </option>
                    @endforeach
                </select>
                <div class="form-hint">
                    <i class="fas fa-level-up-alt"></i>
                    <span>Tingkatan gelar akademik.</span>
                </div>
            </div>

            <div class="col-md-4">
                <label class="form-label-custom">
                    <span>Status Akreditasi</span>
                    <span class="badge-opt">Opsional</span>
                </label>
                <input type="text"
                       name="accreditation"
                       class="form-control-custom"
                       value="{{ old('accreditation', $studyProgram->accreditation ?? '') }}"
                       placeholder="Contoh: Baik Sekali / B">
                <div class="form-hint">
                    <i class="fas fa-certificate"></i>
                    <span>Peringkat akreditasi BAN-PT/LAM.</span>
                </div>
            </div>

            <div class="col-md-4">
                <label class="form-label-custom">
                    <span>Ketua Program Studi (Kaprodi)</span>
                    <span class="badge-opt">Opsional</span>
                </label>
                <input type="text"
                       name="head_of_program"
                       class="form-control-custom"
                       value="{{ old('head_of_program', $studyProgram->head_of_program ?? '') }}"
                       placeholder="Contoh: Dr. H. M. Yusuf, M.Ag">
                <div class="form-hint">
                    <i class="fas fa-user-tie"></i>
                    <span>Nama lengkap pimpinan prodi.</span>
                </div>
            </div>
        </div>
    </div>

    {{-- SECTION 3: LOGO PROGRAM STUDI --}}
    <div class="form-section-card">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-image"></i>
            </div>
            <div>
                <h5 class="form-section-title">Logo / Lambang Program Studi</h5>
                <p class="form-section-desc">Unggah logo khas program studi (jika ada) untuk identitas visual di website.</p>
            </div>
        </div>

        <div class="row align-items-center g-3">
            <div class="col-lg-8">
                <div class="file-dropzone-wrapper">
                    <input type="file"
                           name="logo"
                           accept="image/*"
                           data-preview="prodi-logo-preview">
                    <div class="file-dropzone-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <div class="text-sm font-semibold text-slate-700">
                        Klik untuk memilih gambar logo prodi
                    </div>
                    <div class="text-xs text-slate-500 mt-1">
                        Format disarankan: <strong>PNG (Transparan)</strong> atau JPG &bull; Maksimal <strong>2 MB</strong>
                    </div>
                </div>

                {{-- Live Preview Box for Selected Image --}}
                <div id="prodi-logo-preview" class="live-preview-box" style="display: none;"></div>
            </div>

            <div class="col-lg-4">
                @if(isset($studyProgram) && $studyProgram->logo)
                    <div class="p-3 bg-white rounded-xl border border-slate-200 text-center">
                        <span class="text-xxs font-bold uppercase tracking-wider text-slate-500 d-block mb-2">Logo Saat Ini</span>
                        <div class="p-3 bg-slate-50 rounded-lg d-inline-block border border-slate-100">
                            <img src="{{ asset('storage/'.$studyProgram->logo) }}"
                                 alt="Logo Prodi"
                                 class="img-fluid"
                                 style="max-height: 90px; width: auto; object-fit: contain;">
                        </div>
                        <span class="text-xxs text-slate-400 d-block mt-2">Pilih file baru bila ingin memperbarui</span>
                    </div>
                @else
                    <div class="p-3 bg-white rounded-xl border border-dashed border-slate-200 text-center text-slate-400">
                        <i class="fas fa-certificate fa-2x mb-2 d-block opacity-40"></i>
                        <span class="text-xs">Belum ada logo terunggah</span>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- SECTION 4: VISI, MISI & DESKRIPSI --}}
    <div class="form-section-card mb-0">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-compass"></i>
            </div>
            <div>
                <h5 class="form-section-title">Visi, Misi & Deskripsi Keilmuan</h5>
                <p class="form-section-desc">Paparkan visi keilmuan, butir misi prodi, serta gambaran profil lulusan.</p>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label-custom">
                <span>Visi Program Studi</span>
                <span class="badge-opt">Opsional</span>
            </label>
            <textarea name="vision"
                      rows="3"
                      class="form-control-custom"
                      placeholder="Rumusan visi program studi...">{{ old('vision', $studyProgram->vision ?? '') }}</textarea>
            <div class="form-hint">
                <i class="fas fa-eye"></i>
                <span>Visi keilmuan prodi jangka panjang.</span>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label-custom">
                <span>Misi Program Studi</span>
                <span class="badge-opt">Opsional</span>
            </label>
            <textarea name="mission"
                      rows="4"
                      class="form-control-custom"
                      placeholder="Butir-butir misi program studi...">{{ old('mission', $studyProgram->mission ?? '') }}</textarea>
            <div class="form-hint">
                <i class="fas fa-list-ol"></i>
                <span>Langkah-langkah strategis untuk mencapai visi prodi.</span>
            </div>
        </div>

        <div>
            <label class="form-label-custom">
                <span>Deskripsi Profil & Keunggulan Prodi</span>
                <span class="badge-opt">Opsional</span>
            </label>
            <textarea name="description"
                      rows="5"
                      class="form-control-custom"
                      placeholder="Uraikan profil prodi, prospek kerja lulusan, dan keunggulan kurikulum...">{{ old('description', $studyProgram->description ?? '') }}</textarea>
            <div class="form-hint">
                <i class="fas fa-align-left"></i>
                <span>Teks pengantar ini akan ditampilkan pada halaman detail prodi di website.</span>
            </div>
        </div>
    </div>

</div>
