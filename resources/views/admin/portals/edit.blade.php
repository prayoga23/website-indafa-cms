@extends('layouts_admin.admin')

@section('title', 'Edit Konten Portal - ' . $config['name'])
@section('page-title', 'Kelola Konten Portal: ' . $config['name'])

@section('content')

{{-- ═══════════════════════════════════════════════
     PORTAL SWITCHER TABS
     ════════════════════════════════════════════════ --}}
<div class="row mb-3">
    <div class="col-12">
        <div class="card border-0 shadow-sm p-2 bg-white">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                <div class="d-flex align-items-center">
                    <span class="badge text-white me-2 px-2.5 py-1.5 text-xxs font-weight-bold" style="background: {{ $config['color'] }};">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">edit_note</i>Pilih Portal yang Ingin Diedit
                    </span>
                    <span class="text-xs text-secondary font-weight-bold d-none d-md-inline">Pembaruan Tanpa Koding:</span>
                </div>
                <div class="d-flex flex-wrap gap-1">
                    <a href="{{ route('admin.portal.edit', 'syariah') }}" class="btn btn-sm mb-0 py-1.5 px-3 text-xs font-weight-bold {{ $portal === 'syariah' ? 'btn-dark text-white' : 'btn-outline-dark shadow-none' }}" style="{{ $portal === 'syariah' ? 'background: #8B0000; border-color: #8B0000;' : 'border-color: #8B0000; color: #8B0000;' }}">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">balance</i>
                        <span>Fakultas Syari'ah</span>
                    </a>
                    <a href="{{ route('admin.portal.edit', 'febit') }}" class="btn btn-sm mb-0 py-1.5 px-3 text-xs font-weight-bold {{ $portal === 'febit' ? 'btn-dark text-white' : 'btn-outline-dark shadow-none' }}" style="{{ $portal === 'febit' ? 'background: #0f2b48; border-color: #0f2b48;' : 'border-color: #0f2b48; color: #0f2b48;' }}">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">trending_up</i>
                        <span>Fakultas FEBIT</span>
                    </a>
                    <a href="{{ route('admin.portal.edit', 'lpm') }}" class="btn btn-sm mb-0 py-1.5 px-3 text-xs font-weight-bold {{ $portal === 'lpm' ? 'btn-dark text-white' : 'btn-outline-dark shadow-none' }}" style="{{ $portal === 'lpm' ? 'background: #059669; border-color: #059669;' : 'border-color: #059669; color: #059669;' }}">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">verified</i>
                        <span>LPM Mutu</span>
                    </a>
                    <a href="{{ route('admin.portal.edit', 'lp2m') }}" class="btn btn-sm mb-0 py-1.5 px-3 text-xs font-weight-bold {{ $portal === 'lp2m' ? 'btn-dark text-white' : 'btn-outline-dark shadow-none' }}" style="{{ $portal === 'lp2m' ? 'background: #4f46e5; border-color: #4f46e5;' : 'border-color: #4f46e5; color: #4f46e5;' }}">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">biotech</i>
                        <span>LP2M Riset</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="admin-form-card">

    {{-- HEADER FORM --}}
    <div class="admin-form-header" style="background: linear-gradient(135deg, {{ $config['color'] }} 0%, #1e293b 100%);">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4>
                    <i class="material-symbols-rounded fs-5 text-warning align-middle me-1">edit_document</i>
                    Edit Isi Halaman: {{ $config['name'] }}
                </h4>
                <p>Ubah teks sambutan, foto dekan/ketua, visi misi, statistik, dan informasi resmi tanpa menyentuh kode program.</p>
            </div>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ $config['public_url'] }}" target="_blank" class="btn btn-sm btn-white text-dark mb-0 font-weight-bold shadow-xs d-inline-flex align-items-center">
                    <i class="material-symbols-rounded text-xs me-1">open_in_new</i>
                    <span>Lihat Halaman Depan</span>
                </a>
            </div>
        </div>
    </div>

    <div class="p-3 p-md-4">

        {{-- Notifikasi Sukses --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show text-white text-xs mb-4 d-flex align-items-center" role="alert" style="background: #059669; border: none; border-radius: 0.75rem;">
                <i class="material-symbols-rounded text-sm me-2">check_circle</i>
                <span>{{ session('success') }}</span>
                <button type="button" class="btn-close text-white text-xs" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Validasi Error --}}
        @if ($errors->any())
            <div class="alert alert-danger text-white text-xs mb-4" role="alert" style="background: #dc2626; border: none; border-radius: 0.75rem;">
                <h6 class="text-white font-weight-bold mb-1"><i class="material-symbols-rounded text-sm me-1 align-middle">warning</i> Terjadi Kesalahan Pengisian:</h6>
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.portal.update', $portal) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- ═══════════════════════════════════════════════
                 SECTION 1: IDENTITAS & SLOGAN HERO
                 ════════════════════════════════════════════════ --}}
            <div class="form-section-card">
                <div class="form-section-header">
                    <div class="form-section-icon" style="background: {{ $config['color'] }}; color: #fff;">
                        <i class="material-symbols-rounded text-sm">title</i>
                    </div>
                    <div>
                        <h5 class="form-section-title">Identitas & Slogan Utama Portal</h5>
                        <p class="form-section-desc">Nama resmi unit dan kalimat tagline besar pada bagian paling atas portal.</p>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label-custom">
                            <span>Nama Unit / Fakultas</span>
                            <span class="badge-req">* Wajib Diisi</span>
                        </label>
                        <input type="text"
                               name="title"
                               class="form-control-custom @error('title') border-rose-500 @enderror"
                               value="{{ old('title', $data['title']) }}"
                               placeholder="Contoh: {{ $config['name'] }}"
                               required>
                        <div class="form-hint">
                            <i class="fas fa-heading"></i>
                            <span>Tampil sebagai judul utama halaman portal.</span>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label-custom">
                            <span>Tagline Hero / Slogan Utama</span>
                            <span class="badge-opt">Opsional</span>
                        </label>
                        <input type="text"
                               name="tagline"
                               class="form-control-custom"
                               value="{{ old('tagline', $data['tagline']) }}"
                               placeholder="Slogan atau visi singkat penarik minat...">
                        <div class="form-hint">
                            <i class="fas fa-quote-left"></i>
                            <span>Tampil di bawah nama unit pada banner depan.</span>
                        </div>
                    </div>
                </div>

                <div>
                    <label class="form-label-custom">
                        <span>Banner / Gambar Latar Belakang Hero</span>
                        <span class="badge-opt">Opsional (JPG/PNG/WebP, Maks 4MB)</span>
                    </label>
                    @if($data['featured_image'])
                        @php
                            $bannerSrc = \Illuminate\Support\Str::startsWith($data['featured_image'], 'storage/')
                                ? asset($data['featured_image'])
                                : asset('storage/' . $data['featured_image']);
                        @endphp
                        <div class="mb-2 d-flex align-items-center gap-3 p-2 bg-white border rounded">
                            <img src="{{ $bannerSrc }}" alt="Banner Current" style="height: 60px; width: 120px; object-fit: cover; border-radius: 4px;">
                            <div>
                                <span class="text-xs font-weight-bold text-dark d-block">Gambar Banner Aktif</span>
                                <span class="text-xxs text-secondary">Akan diganti jika Anda mengupload file baru di bawah.</span>
                            </div>
                        </div>
                    @endif
                    <input type="file" name="featured_image" class="form-control-custom" accept="image/*">
                </div>
            </div>

            {{-- ═══════════════════════════════════════════════
                 SECTION 2: SAMBUTAN PIMPINAN (DEKAN / KETUA)
                 ════════════════════════════════════════════════ --}}
            <div class="form-section-card">
                <div class="form-section-header">
                    <div class="form-section-icon" style="background: {{ $config['color'] }}; color: #fff;">
                        <i class="material-symbols-rounded text-sm">person</i>
                    </div>
                    <div>
                        <h5 class="form-section-title">Profil & Sambutan {{ $config['leader_role'] }}</h5>
                        <p class="form-section-desc">Identitas pimpinan, foto resmi, dan kata pengantar kepada pengunjung website.</p>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label-custom">
                            <span>Nama Lengkap Beserta Gelar</span>
                            <span class="badge-req">* Wajib Diisi</span>
                        </label>
                        <input type="text"
                               name="leader_name"
                               class="form-control-custom"
                               value="{{ old('leader_name', $data['leader_name']) }}"
                               placeholder="Contoh: Dr. H. Fulan, M.Pd.I"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label-custom">
                            <span>Jabatan Resmi Pimpinan</span>
                            <span class="badge-req">* Wajib Diisi</span>
                        </label>
                        <input type="text"
                               name="leader_title"
                               class="form-control-custom"
                               value="{{ old('leader_title', $data['leader_title']) }}"
                               placeholder="Contoh: {{ $config['default_leader_title'] }}"
                               required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label-custom">
                        <span>Foto Resmi {{ $config['leader_role'] }}</span>
                        <span class="badge-opt">Opsional (Format Kotak / Portret, Maks 3MB)</span>
                    </label>
                    @if($data['leader_image'])
                        @php
                            $leaderSrc = \Illuminate\Support\Str::startsWith($data['leader_image'], 'storage/')
                                ? asset($data['leader_image'])
                                : asset('storage/' . $data['leader_image']);
                        @endphp
                        <div class="mb-2 d-flex align-items-center gap-3 p-2 bg-white border rounded">
                            <img src="{{ $leaderSrc }}" alt="Foto Pimpinan" style="height: 60px; width: 60px; object-fit: cover; border-radius: 50%;">
                            <div>
                                <span class="text-xs font-weight-bold text-dark d-block">Foto Pimpinan Aktif</span>
                                <span class="text-xxs text-secondary">Akan digantikan bila Anda mengupload foto baru di bawah.</span>
                            </div>
                        </div>
                    @endif
                    <input type="file" name="leader_image" class="form-control-custom" accept="image/*">
                </div>

                <div>
                    <label class="form-label-custom">
                        <span>Teks Sambutan / Amanat Pimpinan</span>
                        <span class="badge-opt">Tampil di Bento Card Sambutan</span>
                    </label>
                    <textarea name="leader_message"
                              class="form-control-custom"
                              rows="4"
                              placeholder="Ketik kata sambutan atau pesan pimpinan di sini...">{{ old('leader_message', $data['leader_message']) }}</textarea>
                </div>
            </div>

            {{-- ═══════════════════════════════════════════════
                 SECTION 3: VISI, MISI & PROFIL SEJARAH
                 ════════════════════════════════════════════════ --}}
            <div class="form-section-card">
                <div class="form-section-header">
                    <div class="form-section-icon" style="background: {{ $config['color'] }}; color: #fff;">
                        <i class="material-symbols-rounded text-sm">visibility</i>
                    </div>
                    <div>
                        <h5 class="form-section-title">Visi, Misi & Profil Unit</h5>
                        <p class="form-section-desc">Arah haluan, program kerja, dan deskripsi sejarah pendirian.</p>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label-custom">
                        <span>Rumusan Visi</span>
                        <span class="badge-opt">Teks Visi Resmi</span>
                    </label>
                    <textarea name="vision"
                              class="form-control-custom"
                              rows="2"
                              placeholder="Rumusan visi...">{{ old('vision', $data['vision']) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label-custom">
                        <span>Rumusan Misi</span>
                        <span class="badge-opt">Dapat ditulis dalam bentuk butir 1, 2, 3...</span>
                    </label>
                    <textarea name="mission"
                              class="form-control-custom"
                              rows="4"
                              placeholder="Tulis butir-butir misi di sini...">{{ old('mission', $data['mission']) }}</textarea>
                </div>

                <div>
                    <label class="form-label-custom">
                        <span>Profil Singkat / Sejarah Pendirian</span>
                        <span class="badge-opt">Keterangan Pengantar</span>
                    </label>
                    <textarea name="description"
                              class="form-control-custom"
                              rows="3"
                              placeholder="Uraian singkat latar belakang unit...">{{ old('description', $data['description']) }}</textarea>
                </div>
            </div>

            {{-- ═══════════════════════════════════════════════
                 SECTION 4: INDIKATOR KUNCI & STATISTIK (KPI)
                 ════════════════════════════════════════════════ --}}
            <div class="form-section-card">
                <div class="form-section-header">
                    <div class="form-section-icon" style="background: {{ $config['color'] }}; color: #fff;">
                        <i class="material-symbols-rounded text-sm">bar_chart</i>
                    </div>
                    <div>
                        <h5 class="form-section-title">Indikator Kunci & Statistik Portal (4 Kartu)</h5>
                        <p class="form-section-desc">Angka dan capaian yang tampil pada 4 kartu highlight di bagian atas portal.</p>
                    </div>
                </div>

                <div class="row g-3">
                    {{-- Metrik 1 --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="p-2.5 bg-white border rounded">
                            <label class="text-xxs font-weight-bold text-secondary mb-1">Metrik 1 (Nilai)</label>
                            <input type="text" name="stat_val1" class="form-control-custom mb-1 py-1" value="{{ old('stat_val1', $data['stats']['val1'] ?? '') }}" placeholder="Contoh: 2 Prodi">
                            <label class="text-xxs text-secondary mb-1">Label Metrik 1</label>
                            <input type="text" name="stat_label1" class="form-control-custom py-1" value="{{ old('stat_label1', $data['stats']['label1'] ?? '') }}" placeholder="Program Studi S1">
                        </div>
                    </div>

                    {{-- Metrik 2 --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="p-2.5 bg-white border rounded">
                            <label class="text-xxs font-weight-bold text-secondary mb-1">Metrik 2 (Nilai)</label>
                            <input type="text" name="stat_val2" class="form-control-custom mb-1 py-1" value="{{ old('stat_val2', $data['stats']['val2'] ?? '') }}" placeholder="Contoh: 28+ Dosen">
                            <label class="text-xxs text-secondary mb-1">Label Metrik 2</label>
                            <input type="text" name="stat_label2" class="form-control-custom py-1" value="{{ old('stat_label2', $data['stats']['label2'] ?? '') }}" placeholder="Dosen Pengajar">
                        </div>
                    </div>

                    {{-- Metrik 3 --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="p-2.5 bg-white border rounded">
                            <label class="text-xxs font-weight-bold text-secondary mb-1">Metrik 3 (Nilai)</label>
                            <input type="text" name="stat_val3" class="form-control-custom mb-1 py-1" value="{{ old('stat_val3', $data['stats']['val3'] ?? '') }}" placeholder="Contoh: Baik Sekali">
                            <label class="text-xxs text-secondary mb-1">Label Metrik 3</label>
                            <input type="text" name="stat_label3" class="form-control-custom py-1" value="{{ old('stat_label3', $data['stats']['label3'] ?? '') }}" placeholder="Akreditasi">
                        </div>
                    </div>

                    {{-- Metrik 4 --}}
                    <div class="col-md-3 col-sm-6">
                        <div class="p-2.5 bg-white border rounded">
                            <label class="text-xxs font-weight-bold text-secondary mb-1">Metrik 4 (Nilai)</label>
                            <input type="text" name="stat_val4" class="form-control-custom mb-1 py-1" value="{{ old('stat_val4', $data['stats']['val4'] ?? '') }}" placeholder="Contoh: 96%">
                            <label class="text-xxs text-secondary mb-1">Label Metrik 4</label>
                            <input type="text" name="stat_label4" class="form-control-custom py-1" value="{{ old('stat_label4', $data['stats']['label4'] ?? '') }}" placeholder="Tingkat Serapan">
                        </div>
                    </div>
                </div>
            </div>

            {{-- ═══════════════════════════════════════════════
                 SECTION 5: KONTEN TAMBAHAN / PENGUMUMAN (WYSIWYG)
                 ════════════════════════════════════════════════ --}}
            <div class="form-section-card">
                <div class="form-section-header">
                    <div class="form-section-icon" style="background: {{ $config['color'] }}; color: #fff;">
                        <i class="material-symbols-rounded text-sm">article</i>
                    </div>
                    <div>
                        <h5 class="form-section-title">Konten Tambahan & Pengumuman Khusus (Editor WYSIWYG)</h5>
                        <p class="form-section-desc">Gunakan editor visual di bawah ini untuk menulis teks bebas, menambahkan tautan formulir pendaftaran, panduan, gambar, atau tabel informasi penting.</p>
                    </div>
                </div>

                <div class="mb-2">
                    <textarea name="content" id="editor-portal" class="form-control-custom" rows="8">{{ old('content', $data['content']) }}</textarea>
                </div>
                <div class="form-hint">
                    <i class="fas fa-info-circle text-info"></i>
                    <span>Teks yang Anda tulis di atas akan langsung diformat rapi dan tampil di halaman depan portal.</span>
                </div>
            </div>

            {{-- ═══════════════════════════════════════════════
                 SECTION 6: KONTAK & LAYANAN DIGITAL
                 ════════════════════════════════════════════════ --}}
            <div class="form-section-card">
                <div class="form-section-header">
                    <div class="form-section-icon" style="background: {{ $config['color'] }}; color: #fff;">
                        <i class="material-symbols-rounded text-sm">call</i>
                    </div>
                    <div>
                        <h5 class="form-section-title">Kontak & Layanan Digital Unit</h5>
                        <p class="form-section-desc">Informasi nomor kontak resmi, email, dan lokasi kantor untuk mahasiswa/publik.</p>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label-custom">
                            <span>No. WhatsApp / Telepon</span>
                            <span class="badge-opt">Opsional</span>
                        </label>
                        <input type="text" name="phone" class="form-control-custom" value="{{ old('phone', $data['phone']) }}" placeholder="+62 812-xxxx-xxxx">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label-custom">
                            <span>Email Resmi Unit</span>
                            <span class="badge-opt">Opsional</span>
                        </label>
                        <input type="email" name="email" class="form-control-custom" value="{{ old('email', $data['email']) }}" placeholder="unit@iaidatulfalah.ac.id">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label-custom">
                            <span>Ruang Kantor / Gedung</span>
                            <span class="badge-opt">Opsional</span>
                        </label>
                        <input type="text" name="address" class="form-control-custom" value="{{ old('address', $data['address']) }}" placeholder="Gedung Rektorat Lt. 2">
                    </div>
                </div>
            </div>

            {{-- ═══════════════════════════════════════════════
                 SUBMIT ACTION BAR
                 ════════════════════════════════════════════════ --}}
            <div class="p-3 bg-slate-50 border rounded-3 d-flex align-items-center justify-content-between flex-wrap gap-3 mt-4">
                <span class="text-xs text-secondary">
                    <i class="material-symbols-rounded text-xs text-success align-middle me-1">check_circle</i>
                    Perubahan akan langsung tersimpan di database dan tampil otomatis pada website.
                </span>
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ $config['public_url'] }}" target="_blank" class="btn btn-outline-dark btn-sm mb-0">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">visibility</i>Pratinjau Web
                    </a>
                    <button type="submit" class="btn text-white btn-sm mb-0 px-4 py-2 font-weight-bold" style="background: linear-gradient(135deg, {{ $config['color'] }} 0%, #1e293b 100%);">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">save</i>Simpan & Publikasikan
                    </button>
                </div>
            </div>

        </form>

    </div>

</div>

@endsection

@push('js')
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var editorEl = document.querySelector('#editor-portal');
    if (editorEl) {
        ClassicEditor
            .create(editorEl, {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'underline', 'link', '|',
                    'bulletedList', 'numberedList', 'blockQuote', '|',
                    'insertTable', 'undo', 'redo'
                ]
            })
            .catch(error => {
                console.error(error);
            });
    }
});
</script>
@endpush
