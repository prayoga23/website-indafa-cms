@extends('layouts_admin.admin')

@section('title', 'Pengaturan Website')
@section('page-title', 'Pengaturan Website')

@section('content')

<div class="admin-form-card">

    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4><i class="fas fa-sliders-h text-warning"></i> Pengaturan Identitas & Konfigurasi Website</h4>
                <p>Konfigurasikan informasi umum kampus, logo, kontak resmi, media sosial, dan optimasi SEO.</p>
            </div>
            <span class="badge bg-white text-emerald-800 text-xs px-3 py-2 rounded-full font-bold shadow-sm">
                <i class="fas fa-shield-alt text-emerald-600"></i> Sistem CMS IAI Darul Falah
            </span>
        </div>
    </div>

    <form action="{{ route('admin.website-settings.update') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="p-3 p-md-4">
            <div class="row g-4">

                {{-- KOLOM KIRI --}}
                <div class="col-lg-8">

                    {{-- SECTION 1: INFORMASI KAMPUS --}}
                    <div class="form-section-card">
                        <div class="form-section-header">
                            <div class="form-section-icon">
                                <i class="fas fa-university"></i>
                            </div>
                            <div>
                                <h5 class="form-section-title">Informasi & Identitas Kampus</h5>
                                <p class="form-section-desc">Nama resmi lembaga, slogan utama, dan ringkasan profil institut.</p>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Nama Lembaga / Kampus</span>
                                <span class="badge-req">* Wajib Diisi</span>
                            </label>
                            <input type="text"
                                   name="site_name"
                                   class="form-control-custom"
                                   value="{{ old('site_name', $setting->site_name ?? '') }}"
                                   placeholder="Contoh: IAI Darul Falah Cihampelas"
                                   required>
                            <div class="form-hint">
                                <i class="fas fa-info-circle"></i>
                                <span>Tampil sebagai judul utama di header website dan tab browser.</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Tagline / Slogan Kampus</span>
                                <span class="badge-opt">Opsional</span>
                            </label>
                            <input type="text"
                                   name="tagline"
                                   class="form-control-custom"
                                   value="{{ old('tagline', $setting->tagline ?? '') }}"
                                   placeholder="Contoh: Membangun Peradaban dengan Nilai-Nilai Islam">
                            <div class="form-hint">
                                <i class="fas fa-quote-left"></i>
                                <span>Slogan resmi atau moto kampus.</span>
                            </div>
                        </div>

                        <div>
                            <label class="form-label-custom">
                                <span>Deskripsi Singkat Kampus</span>
                                <span class="badge-opt">Opsional</span>
                            </label>
                            <textarea name="description"
                                      rows="3"
                                      class="form-control-custom"
                                      placeholder="Ringkasan profil kampus untuk ditampilkan di bagian footer...">{{ old('description', $setting->description ?? '') }}</textarea>
                        </div>
                    </div>

                    {{-- SECTION 2: KONTAK RESMI --}}
                    <div class="form-section-card">
                        <div class="form-section-header">
                            <div class="form-section-icon">
                                <i class="fas fa-address-book"></i>
                            </div>
                            <div>
                                <h5 class="form-section-title">Kontak & Alamat Kampus</h5>
                                <p class="form-section-desc">Saluran komunikasi resmi yang dapat dihubungi oleh mahasiswa dan publik.</p>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Alamat Lengkap Kampus</span>
                                <span class="badge-req">* Wajib Diisi</span>
                            </label>
                            <textarea name="address"
                                      class="form-control-custom"
                                      rows="3"
                                      placeholder="Contoh: Jl. Raya Cihampelas No. XX, Bandung Barat, Jawa Barat">{{ old('address', $setting->address ?? '') }}</textarea>
                            <div class="form-hint">
                                <i class="fas fa-map-marked-alt"></i>
                                <span>Alamat fisik kampus yang tampil di footer dan laman kontak.</span>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label-custom">
                                    <span>Nomor Telepon Kantor</span>
                                    <span class="badge-opt">Opsional</span>
                                </label>
                                <input type="text"
                                       name="phone"
                                       class="form-control-custom"
                                       value="{{ old('phone', $setting->phone ?? '') }}"
                                       placeholder="(022) 1234567">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label-custom">
                                    <span>Nomor WhatsApp Resmi</span>
                                    <span class="badge-opt">Opsional</span>
                                </label>
                                <input type="text"
                                       name="whatsapp"
                                       class="form-control-custom"
                                       value="{{ old('whatsapp', $setting->whatsapp ?? '') }}"
                                       placeholder="6281234567890">
                                <div class="form-hint">
                                    <i class="fab fa-whatsapp text-emerald-600"></i>
                                    <span>Format diawali 62 tanpa spasi untuk direct chat.</span>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label-custom">
                                    <span>Email Resmi Kampus</span>
                                    <span class="badge-opt">Opsional</span>
                                </label>
                                <input type="email"
                                       name="email"
                                       class="form-control-custom"
                                       value="{{ old('email', $setting->email ?? '') }}"
                                       placeholder="info@indafa.ac.id">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label-custom">
                                    <span>Domain Website</span>
                                    <span class="badge-opt">Opsional</span>
                                </label>
                                <input type="text"
                                       name="website"
                                       class="form-control-custom"
                                       value="{{ old('website', $setting->website ?? '') }}"
                                       placeholder="https://www.indafa.my.id">
                            </div>
                        </div>
                    </div>

                    {{-- SECTION 3: MEDIA SOSIAL RESMI --}}
                    <div class="form-section-card">
                        <div class="form-section-header">
                            <div class="form-section-icon">
                                <i class="fas fa-share-alt"></i>
                            </div>
                            <div>
                                <h5 class="form-section-title">Media Sosial Resmi Kampus</h5>
                                <p class="form-section-desc">Tautan akun media sosial resmi yang akan tampil di topbar dan footer.</p>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label-custom">
                                    <span><i class="fab fa-facebook text-blue-600 me-1"></i> Facebook URL</span>
                                    <span class="badge-opt">Opsional</span>
                                </label>
                                <input type="text" name="facebook"
                                       class="form-control-custom"
                                       placeholder="https://facebook.com/..."
                                       value="{{ old('facebook', $setting->facebook ?? '') }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label-custom">
                                    <span><i class="fab fa-instagram text-pink-600 me-1"></i> Instagram URL</span>
                                    <span class="badge-opt">Opsional</span>
                                </label>
                                <input type="text" name="instagram"
                                       class="form-control-custom"
                                       placeholder="https://instagram.com/..."
                                       value="{{ old('instagram', $setting->instagram ?? '') }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label-custom">
                                    <span><i class="fab fa-youtube text-red-600 me-1"></i> YouTube Channel URL</span>
                                    <span class="badge-opt">Opsional</span>
                                </label>
                                <input type="text" name="youtube"
                                       class="form-control-custom"
                                       placeholder="https://youtube.com/@..."
                                       value="{{ old('youtube', $setting->youtube ?? '') }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label-custom">
                                    <span><i class="fab fa-tiktok text-slate-900 me-1"></i> TikTok URL</span>
                                    <span class="badge-opt">Opsional</span>
                                </label>
                                <input type="text" name="tiktok"
                                       class="form-control-custom"
                                       placeholder="https://tiktok.com/@..."
                                       value="{{ old('tiktok', $setting->tiktok ?? '') }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label-custom">
                                    <span><i class="fab fa-x-twitter text-slate-800 me-1"></i> Twitter / X URL</span>
                                    <span class="badge-opt">Opsional</span>
                                </label>
                                <input type="text" name="twitter"
                                       class="form-control-custom"
                                       placeholder="https://x.com/..."
                                       value="{{ old('twitter', $setting->twitter ?? '') }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label-custom">
                                    <span><i class="fab fa-linkedin text-blue-700 me-1"></i> LinkedIn URL</span>
                                    <span class="badge-opt">Opsional</span>
                                </label>
                                <input type="text" name="linkedin"
                                       class="form-control-custom"
                                       placeholder="https://linkedin.com/company/..."
                                       value="{{ old('linkedin', $setting->linkedin ?? '') }}">
                            </div>
                        </div>
                    </div>

                    {{-- SECTION 4: GOOGLE MAPS & FOOTER --}}
                    <div class="form-section-card">
                        <div class="form-section-header">
                            <div class="form-section-icon">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <div>
                                <h5 class="form-section-title">Peta Google Maps & Hak Cipta Footer</h5>
                                <p class="form-section-desc">Penyematan peta lokasi kampus dan teks hak cipta website.</p>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Kode Iframe Embed Google Maps</span>
                                <span class="badge-opt">Opsional</span>
                            </label>
                            <textarea name="google_maps"
                                      rows="3"
                                      class="form-control-custom"
                                      placeholder='<iframe src="https://www.google.com/maps/embed?..." width="600" height="450" ...></iframe>'>{{ old('google_maps', $setting->google_maps ?? '') }}</textarea>
                            <div class="form-hint">
                                <i class="fas fa-code"></i>
                                <span>Salin kode sematkan (embed map) dari Google Maps.</span>
                            </div>
                        </div>

                        <div>
                            <label class="form-label-custom">
                                <span>Teks Hak Cipta Footer (Copyright)</span>
                                <span class="badge-opt">Opsional</span>
                            </label>
                            <textarea name="footer_text"
                                      rows="2"
                                      class="form-control-custom"
                                      placeholder="&copy; 2026 IAI Darul Falah. All Rights Reserved.">{{ old('footer_text', $setting->footer_text ?? '') }}</textarea>
                        </div>
                    </div>

                    {{-- SECTION 5: METADATA & SEO --}}
                    <div class="form-section-card mb-0">
                        <div class="form-section-header">
                            <div class="form-section-icon">
                                <i class="fas fa-search"></i>
                            </div>
                            <div>
                                <h5 class="form-section-title">Optimasi Mesin Pencari (SEO)</h5>
                                <p class="form-section-desc">Tingkatkan visibilitas portal kampus pada hasil pencarian Google.</p>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Meta Title (Judul SEO)</span>
                                <span class="badge-opt">Opsional</span>
                            </label>
                            <input type="text"
                                   name="meta_title"
                                   class="form-control-custom"
                                   value="{{ old('meta_title', $setting->meta_title ?? '') }}"
                                   placeholder="Contoh: IAI Darul Falah - Institut Agama Islam Terkemuka di Bandung Barat">
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Meta Description</span>
                                <span class="badge-opt">Opsional</span>
                            </label>
                            <textarea name="meta_description"
                                      class="form-control-custom"
                                      rows="2"
                                      placeholder="Deskripsi singkat website kampus yang akan muncul pada snippet pencarian Google...">{{ old('meta_description', $setting->meta_description ?? '') }}</textarea>
                        </div>

                        <div>
                            <label class="form-label-custom">
                                <span>Meta Keywords</span>
                                <span class="badge-opt">Opsional</span>
                            </label>
                            <textarea name="meta_keywords"
                                      class="form-control-custom"
                                      rows="2"
                                      placeholder="kampus islam, iai darul falah, kuliah bandung barat, beasiswa ukt, hukum syariah...">{{ old('meta_keywords', $setting->meta_keywords ?? '') }}</textarea>
                            <div class="form-hint">
                                <i class="fas fa-tags"></i>
                                <span>Pisahkan kata kunci dengan tanda koma (,).</span>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- KOLOM KANAN: BRANDING & LOGO --}}
                <div class="col-lg-4">

                    {{-- BRANDING CARD --}}
                    <div class="form-section-card">
                        <div class="form-section-header">
                            <div class="form-section-icon">
                                <i class="fas fa-paint-brush"></i>
                            </div>
                            <div>
                                <h5 class="form-section-title">Branding & Logo</h5>
                                <p class="form-section-desc">Identitas grafis resmi website.</p>
                            </div>
                        </div>

                        {{-- LOGO UTAMA --}}
                        <div class="mb-4">
                            <label class="form-label-custom">
                                <span>Logo Utama Website</span>
                                <span class="badge-opt">PNG Transparan</span>
                            </label>
                            <div class="file-dropzone-wrapper">
                                <input type="file"
                                       name="logo"
                                       accept="image/*"
                                       data-preview="setting-logo-preview">
                                <div class="file-dropzone-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <div class="text-sm font-semibold text-slate-700">
                                    Pilih logo kampus
                                </div>
                                <div class="text-xs text-slate-500 mt-1">
                                    Format: <strong>PNG Transparan</strong> &bull; Maks. 2MB
                                </div>
                            </div>

                            <div id="setting-logo-preview" class="live-preview-box" style="display: none;"></div>

                            @if(!empty($setting->logo))
                                <div class="mt-3 p-3 bg-white rounded-xl border border-slate-200 text-center">
                                    <span class="text-xxs font-bold uppercase tracking-wider text-slate-500 d-block mb-2">Logo Saat Ini</span>
                                    <div class="p-3 bg-slate-50 rounded-lg d-inline-block border border-slate-100">
                                        <img src="{{ asset('storage/'.$setting->logo) }}"
                                             class="img-fluid"
                                             style="max-height: 80px; width: auto;"
                                             alt="Logo Kampus">
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{-- FAVICON --}}
                        <div>
                            <label class="form-label-custom">
                                <span>Favicon Tab Browser</span>
                                <span class="badge-opt">Icon 32x32</span>
                            </label>
                            <div class="file-dropzone-wrapper">
                                <input type="file"
                                       name="favicon"
                                       accept="image/*"
                                       data-preview="setting-favicon-preview">
                                <div class="file-dropzone-icon">
                                    <i class="fas fa-icons"></i>
                                </div>
                                <div class="text-sm font-semibold text-slate-700">
                                    Pilih icon favicon
                                </div>
                                <div class="text-xs text-slate-500 mt-1">
                                    Format: <strong>PNG / ICO</strong> &bull; Rasio 1:1
                                </div>
                            </div>

                            <div id="setting-favicon-preview" class="live-preview-box" style="display: none;"></div>

                            @if(!empty($setting->favicon))
                                <div class="mt-3 p-3 bg-white rounded-xl border border-slate-200 text-center">
                                    <span class="text-xxs font-bold uppercase tracking-wider text-slate-500 d-block mb-2">Favicon Saat Ini</span>
                                    <div class="p-2 bg-slate-50 rounded-lg d-inline-block border border-slate-100">
                                        <img src="{{ asset('storage/'.$setting->favicon) }}"
                                             style="max-height: 48px; width: auto;"
                                             alt="Favicon">
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>

                    {{-- STICKY ACTION BUTTON CARD --}}
                    <div class="p-3 bg-white rounded-2xl border border-slate-200 shadow-sm sticky-top" style="top: 20px; z-index: 10;">
                        <button type="submit" class="btn-brand-primary w-100 justify-content-center py-2.5">
                            <i class="fas fa-save"></i> Simpan Semua Pengaturan
                        </button>
                        <span class="text-xxs text-slate-500 text-center d-block mt-2">
                            <i class="fas fa-check-circle text-emerald-600"></i> Perubahan pengaturan langsung aktif pada website
                        </span>
                    </div>

                </div>

            </div>
        </div>

    </form>

</div>

@endsection
