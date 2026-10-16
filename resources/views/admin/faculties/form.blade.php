<div class="p-3 p-md-4">

    {{-- SECTION 1: IDENTITAS FAKULTAS --}}
    <div class="form-section-card">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-university"></i>
            </div>
            <div>
                <h5 class="form-section-title">Identitas Fakultas</h5>
                <p class="form-section-desc">Masukkan nama resmi fakultas dan nama pimpinan fakultas.</p>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-7">
                <label class="form-label-custom">
                    <span>Nama Fakultas</span>
                    <span class="badge-req">* Wajib Diisi</span>
                </label>
                <input type="text"
                       name="name"
                       class="form-control-custom @error('name') border-rose-500 @enderror"
                       value="{{ old('name', $faculty->name ?? '') }}"
                       placeholder="Contoh: Fakultas Tarbiyah"
                       required>
                <div class="form-hint">
                    <i class="fas fa-pen"></i>
                    <span>Tuliskan nama fakultas sesuai SK pendirian atau struktur resmi kampus.</span>
                </div>
                @error('name')
                    <div class="text-xs text-rose-600 mt-1 font-semibold">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-5">
                <label class="form-label-custom">
                    <span>Nama Dekan Fakultas</span>
                    <span class="badge-opt">Opsional</span>
                </label>
                <input type="text"
                       name="dean"
                       class="form-control-custom"
                       value="{{ old('dean', $faculty->dean ?? '') }}"
                       placeholder="Contoh: Dr. H. Ahmad Fauzi, M.Pd.I">
                <div class="form-hint">
                    <i class="fas fa-user-tie"></i>
                    <span>Nama lengkap pimpinan dekanat beserta gelar akademik.</span>
                </div>
            </div>
        </div>
    </div>

    {{-- SECTION 2: LOGO RESMI FAKULTAS --}}
    <div class="form-section-card">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <div>
                <h5 class="form-section-title">Logo Resmi Fakultas</h5>
                <p class="form-section-desc">Unggah lambang atau logo resmi fakultas untuk ditampilkan pada header prodi dan profil.</p>
            </div>
        </div>

        <div class="row align-items-center g-3">
            <div class="col-lg-8">
                <div class="file-dropzone-wrapper">
                    <input type="file"
                           name="logo"
                           accept="image/*"
                           data-preview="faculty-logo-preview">
                    <div class="file-dropzone-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <div class="text-sm font-semibold text-slate-700">
                        Klik untuk memilih gambar logo fakultas
                    </div>
                    <div class="text-xs text-slate-500 mt-1">
                        Format disarankan: <strong>PNG (Transparan)</strong> atau JPG &bull; Maks. <strong>2 MB</strong>
                    </div>
                </div>

                {{-- Live Preview Box for Selected Image --}}
                <div id="faculty-logo-preview" class="live-preview-box" style="display: none;"></div>

                <div class="mt-2.5 p-2.5 bg-emerald-50 border border-emerald-200 rounded-lg text-xs text-emerald-800 d-flex align-items-center gap-2">
                    <i class="fas fa-info-circle text-emerald-600 fs-6"></i>
                    <span><strong>Petunjuk:</strong> Khusus gambar Logo/Lambang resmi fakultas. Hindari mengunggah foto pemandangan atau foto gedung di kolom ini.</span>
                </div>
            </div>

            <div class="col-lg-4">
                @if(isset($faculty) && $faculty->logo)
                    <div class="p-3 bg-white rounded-xl border border-slate-200 text-center">
                        <span class="text-xxs font-bold uppercase tracking-wider text-slate-500 d-block mb-2">Logo Saat Ini</span>
                        <div class="p-3 bg-slate-50 rounded-lg d-inline-block border border-slate-100">
                            <img src="{{ asset('storage/'.$faculty->logo) }}"
                                 alt="Logo Fakultas"
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

    {{-- SECTION 3: DESKRIPSI & PROFIL FAKULTAS --}}
    <div class="form-section-card mb-0">
        <div class="form-section-header">
            <div class="form-section-icon">
                <i class="fas fa-align-left"></i>
            </div>
            <div>
                <h5 class="form-section-title">Deskripsi & Profil Fakultas</h5>
                <p class="form-section-desc">Informasi pengantar mengenai sejarah, visi keilmuan, dan keunggulan fakultas.</p>
            </div>
        </div>

        <div>
            <label class="form-label-custom">
                <span>Deskripsi Profil Fakultas</span>
                <span class="badge-opt">Opsional</span>
            </label>
            <textarea name="description"
                      rows="6"
                      class="form-control-custom"
                      placeholder="Tuliskan deskripsi profil fakultas, visi keilmuan, atau pengantar untuk calon mahasiswa...">{{ old('description', $faculty->description ?? '') }}</textarea>
            <div class="form-hint mt-2">
                <i class="fas fa-info-circle"></i>
                <span>Deskripsi ini akan ditampilkan pada halaman profil fakultas di website utama.</span>
            </div>
        </div>
    </div>

</div>
