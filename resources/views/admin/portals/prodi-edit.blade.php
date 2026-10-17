@extends('layouts_admin.admin')

@section('title', 'Edit Website Prodi - ' . $data['name'])
@section('page-title', 'Edit Website: ' . $data['name'])

@section('content')

{{-- ═══════════════════════════════════════════════
     PRODI SWITCHER TABS
     ════════════════════════════════════════════════ --}}
<div class="row mb-3">
    <div class="col-12">
        <div class="card border-0 shadow-sm p-2 bg-white" style="border-radius: 0.75rem;">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
                <div class="d-flex align-items-center">
                    <span class="badge text-white me-2 px-2.5 py-1.5 text-xxs font-weight-bold" style="background: {{ $config['color'] }};">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">school</i>Pilih Prodi yang Ingin Diedit
                    </span>
                    <span class="text-xs text-secondary font-weight-bold d-none d-md-inline">Pembaruan Mandiri:</span>
                </div>
                <div class="d-flex flex-wrap gap-1">
                    @foreach($allConfigs as $code => $cfg)
                        <a href="{{ route('admin.portal-prodi.edit', $code) }}"
                           class="btn btn-sm mb-0 py-1.5 px-2.5 text-xs font-weight-bold {{ $prodi === $code ? 'text-white' : 'btn-outline-dark shadow-none' }}"
                           style="{{ $prodi === $code ? 'background: ' . $cfg['color'] . '; border-color: ' . $cfg['color'] . ';' : 'border-color: ' . $cfg['color'] . '; color: ' . $cfg['color'] . ';' }}">
                            <span class="badge bg-white text-dark text-xxs me-1 font-weight-bold" style="opacity: 0.9;">{{ strtoupper($code) }}</span>
                            <span>{{ $cfg['name'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<div class="admin-form-card">

    {{-- HEADER FORM --}}
    <div class="admin-form-header" style="background: linear-gradient(135deg, {{ $config['color'] }} 0%, #0f172a 100%);">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4>
                    <i class="material-symbols-rounded fs-5 text-warning align-middle me-1">edit_document</i>
                    Edit Isi Website: {{ $data['name'] }}
                </h4>
                <p>Ubah banner hero, sambutan kaprodi, visi misi, sejarah, kontak layanan, dan konten prodi tanpa coding.</p>
            </div>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('admin.portal-prodi.index') }}" class="btn btn-sm btn-outline-light mb-0">
                    <i class="material-symbols-rounded text-xs me-1 align-middle">arrow_back</i> Semua Prodi
                </a>
                <a href="{{ $config['public_url'] }}" target="_blank" class="btn btn-sm btn-white text-dark mb-0 font-weight-bold shadow-xs d-inline-flex align-items-center">
                    <i class="material-symbols-rounded text-xs me-1">open_in_new</i>
                    <span>Buka Website Publik</span>
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

        <form action="{{ route('admin.portal-prodi.update', $prodi) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- ═══════════════════════════════════════════════
                 SECTION 1: IDENTITAS & LEGALITAS PRODI
                 ════════════════════════════════════════════════ --}}
            <div class="form-section-card">
                <div class="form-section-header">
                    <div class="form-section-icon" style="background: {{ $config['color'] }}; color: #fff;">
                        <i class="material-symbols-rounded text-sm">badge</i>
                    </div>
                    <div>
                        <h5 class="form-section-title">Identitas &amp; Legalitas Program Studi</h5>
                        <p class="form-section-desc">Nama resmi prodi, jenjang gelar akademik, dan status akreditasi BAN-PT/LAM.</p>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label-custom">
                            <span>Nama Program Studi</span>
                            <span class="badge-req">* Wajib Diisi</span>
                        </label>
                        <input type="text" name="name" class="form-control-custom" value="{{ old('name', $data['name']) }}" required placeholder="Contoh: Hukum Keluarga Islam">
                    </div>

                    <div class="col-md-2">
                        <label class="form-label-custom">
                            <span>Jenjang</span>
                            <span class="badge-opt">Opsional</span>
                        </label>
                        <select name="degree" class="form-select-custom">
                            @foreach(['S1', 'S2', 'S3', 'D3', 'D4'] as $deg)
                                <option value="{{ $deg }}" {{ old('degree', $data['degree']) == $deg ? 'selected' : '' }}>Jenjang {{ $deg }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label-custom">
                            <span>Gelar Lulusan</span>
                            <span class="badge-opt">Opsional</span>
                        </label>
                        <input type="text" name="graduate_degree" class="form-control-custom" value="{{ old('graduate_degree', $data['graduate_degree']) }}" placeholder="Contoh: S.H.">
                    </div>

                    <div class="col-md-2">
                        <label class="form-label-custom">
                            <span>Akreditasi</span>
                            <span class="badge-opt">Opsional</span>
                        </label>
                        <input type="text" name="accreditation" class="form-control-custom" value="{{ old('accreditation', $data['accreditation']) }}" placeholder="Unggul / Baik Sekali">
                    </div>
                </div>
            </div>

            {{-- ═══════════════════════════════════════════════
                 SECTION 2: BANNER HERO & SLOGAN SUB-WEBSITE
                 ════════════════════════════════════════════════ --}}
            <div class="form-section-card">
                <div class="form-section-header">
                    <div class="form-section-icon" style="background: {{ $config['color'] }}; color: #fff;">
                        <i class="material-symbols-rounded text-sm">panorama</i>
                    </div>
                    <div>
                        <h5 class="form-section-title">Banner Hero &amp; Slogan Tampilan Beranda</h5>
                        <p class="form-section-desc">Gambar latar utama dan pesan slogan yang tampil paling atas saat mahasiswa membuka website prodi.</p>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label-custom">
                            <span>Slogan / Tagline Program Studi</span>
                            <span class="badge-opt">Opsional</span>
                        </label>
                        <input type="text" name="tagline" class="form-control-custom" value="{{ old('tagline', $data['tagline']) }}" placeholder="Tuliskan slogan utama prodi yang menginspirasi mahasiswa...">
                    </div>

                    <div class="col-md-8">
                        <label class="form-label-custom">
                            <span>Unggah Foto Banner Hero (Landscape)</span>
                            <span class="badge-opt">Opsional (Format: JPG, PNG, WEBP max 4MB)</span>
                        </label>
                        <input type="file" name="hero_image" class="form-control-custom" accept="image/*" onchange="previewImage(this, 'preview-hero')">
                        <div class="form-hint">
                            <i class="material-symbols-rounded text-xs">info</i>
                            <span>Rekomendasi ukuran banner beranda: 1920x800px atau rasio 16:9 agar tampak tajam di layar desktop & HP.</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label-custom">Pratinjau Banner Hero Saat Ini</label>
                        <div class="border rounded-3 p-2 bg-slate-100 text-center position-relative overflow-hidden" style="min-height: 120px; max-height: 150px; display: flex; align-items: center; justify-content: center;">
                            @php
                                $heroPreview = !empty($data['hero_image'])
                                    ? (\Illuminate\Support\Str::startsWith($data['hero_image'], ['http://', 'https://']) ? $data['hero_image'] : asset('storage/' . $data['hero_image']))
                                    : asset('storage/banners/otoYXSrIydgSL8DpfylH0mSQJD7CGa5MsaMOuPpK.png');
                            @endphp
                            <img id="preview-hero" src="{{ $heroPreview }}" alt="Banner Hero" class="w-100 h-100 object-fit-cover rounded-2" onerror="this.src='{{ asset('storage/banners/otoYXSrIydgSL8DpfylH0mSQJD7CGa5MsaMOuPpK.png') }}'">
                        </div>
                    </div>
                </div>
            </div>

            {{-- ═══════════════════════════════════════════════
                 SECTION 3: PIMPINAN PRODI (KAPRODI & SEKPRODI)
                 ════════════════════════════════════════════════ --}}
            <div class="form-section-card">
                <div class="form-section-header">
                    <div class="form-section-icon" style="background: {{ $config['color'] }}; color: #fff;">
                        <i class="material-symbols-rounded text-sm">groups</i>
                    </div>
                    <div>
                        <h5 class="form-section-title">Pimpinan Program Studi (Kaprodi &amp; Sekprodi)</h5>
                        <p class="form-section-desc">Profil ketua program studi, kutipan sambutan di beranda, serta sekretaris prodi.</p>
                    </div>
                </div>

                {{-- Baris Kaprodi --}}
                <div class="row g-3 mb-4 p-3 rounded-3 bg-slate-50 border">
                    <div class="col-12">
                        <span class="badge text-white px-2 py-1 text-xxs font-weight-bold" style="background: {{ $config['color'] }};">
                            Ketua Program Studi (Kaprodi)
                        </span>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label-custom">
                            <span>Nama Lengkap &amp; Gelar Kaprodi</span>
                            <span class="badge-req">* Wajib Diisi</span>
                        </label>
                        <input type="text" name="head_name" class="form-control-custom" value="{{ old('head_name', $data['head_name']) }}" required placeholder="Contoh: Ustadz Ahmad Rofiqi, M.H.I.">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label-custom">
                            <span>Jabatan / Label</span>
                            <span class="badge-opt">Opsional</span>
                        </label>
                        <input type="text" name="head_title" class="form-control-custom" value="{{ old('head_title', $data['head_title']) }}" placeholder="Ketua Program Studi">
                    </div>

                    <div class="col-md-8">
                        <label class="form-label-custom">
                            <span>Kutipan Sambutan Kaprodi di Beranda</span>
                            <span class="badge-opt">Opsional</span>
                        </label>
                        <textarea name="head_quote" rows="3" class="form-control-custom" placeholder="Tuliskan kutipan komitmen atau sambutan hangat Kaprodi...">{{ old('head_quote', $data['head_quote']) }}</textarea>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label-custom">
                            <span>Foto Resmi Kaprodi</span>
                            <span class="badge-opt">Maks 3MB</span>
                        </label>
                        <input type="file" name="head_photo" class="form-control-custom mb-2" accept="image/*" onchange="previewImage(this, 'preview-head')">
                        <div class="border rounded-3 p-1 bg-white text-center" style="height: 120px; width: 100px; margin: 0 auto; overflow: hidden;">
                            @php
                                $headPhotoSrc = !empty($data['head_photo'])
                                    ? (\Illuminate\Support\Str::startsWith($data['head_photo'], ['http://', 'https://']) ? $data['head_photo'] : asset('storage/' . $data['head_photo']))
                                    : asset('storage/lecturers/4aGdYumJLv1zF9gkf8FmB8eIrFFvVW5m276855wf.png');
                            @endphp
                            <img id="preview-head" src="{{ $headPhotoSrc }}" alt="Foto Kaprodi" class="w-100 h-100 object-fit-cover rounded-2" onerror="this.src='{{ asset('assets/img/user.png') }}'">
                        </div>
                    </div>
                </div>

                {{-- Baris Sekprodi --}}
                <div class="row g-3 p-3 rounded-3 bg-slate-50 border">
                    <div class="col-12">
                        <span class="badge bg-secondary text-white px-2 py-1 text-xxs font-weight-bold">
                            Sekretaris Program Studi (Sekprodi)
                        </span>
                    </div>

                    <div class="col-md-7">
                        <label class="form-label-custom">
                            <span>Nama Lengkap &amp; Gelar Sekprodi</span>
                            <span class="badge-opt">Opsional</span>
                        </label>
                        <input type="text" name="secretary_name" class="form-control-custom" value="{{ old('secretary_name', $data['secretary_name']) }}" placeholder="Contoh: Ustadz Rahmat Hidayat, M.A.">
                    </div>

                    <div class="col-md-5">
                        <label class="form-label-custom">
                            <span>Foto Sekprodi</span>
                            <span class="badge-opt">Maks 3MB</span>
                        </label>
                        <div class="d-flex align-items-center gap-3">
                            <input type="file" name="secretary_photo" class="form-control-custom" accept="image/*" onchange="previewImage(this, 'preview-sec')">
                            <div class="border rounded-3 p-1 bg-white text-center flex-shrink-0" style="height: 60px; width: 50px; overflow: hidden;">
                                @php
                                    $secPhotoSrc = !empty($data['secretary_photo'])
                                        ? (\Illuminate\Support\Str::startsWith($data['secretary_photo'], ['http://', 'https://']) ? $data['secretary_photo'] : asset('storage/' . $data['secretary_photo']))
                                        : asset('assets/img/user.png');
                                @endphp
                                <img id="preview-sec" src="{{ $secPhotoSrc }}" alt="Foto Sekprodi" class="w-100 h-100 object-fit-cover rounded-2" onerror="this.src='{{ asset('assets/img/user.png') }}'">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ═══════════════════════════════════════════════
                 SECTION 4: PROFIL & SEJARAH PRODI
                 ════════════════════════════════════════════════ --}}
            <div class="form-section-card">
                <div class="form-section-header">
                    <div class="form-section-icon" style="background: {{ $config['color'] }}; color: #fff;">
                        <i class="material-symbols-rounded text-sm">history_edu</i>
                    </div>
                    <div>
                        <h5 class="form-section-title">Profil &amp; Sejarah Program Studi</h5>
                        <p class="form-section-desc">Narasi perjalanan, latar belakang pendirian prodi, dan dokumentasi foto.</p>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-8">
                        <label class="form-label-custom">
                            <span>Narasi Sejarah &amp; Perjalanan Prodi</span>
                            <span class="badge-opt">Tampil di Beranda &amp; Menu Sejarah</span>
                        </label>
                        <textarea name="description" rows="6" class="form-control-custom" placeholder="Tuliskan sejarah, latar belakang, dan keunggulan program studi...">{{ old('description', $data['description']) }}</textarea>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label-custom">
                            <span>Foto Dokumentasi / Gedung Sejarah</span>
                            <span class="badge-opt">Opsional</span>
                        </label>
                        <input type="file" name="history_image" class="form-control-custom mb-2" accept="image/*" onchange="previewImage(this, 'preview-history')">
                        <div class="border rounded-3 p-1 bg-slate-100 text-center" style="height: 140px; overflow: hidden;">
                            @php
                                $histImgSrc = !empty($data['history_image'])
                                    ? (\Illuminate\Support\Str::startsWith($data['history_image'], ['http://', 'https://']) ? $data['history_image'] : asset('storage/' . $data['history_image']))
                                    : 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=600&auto=format&fit=crop';
                            @endphp
                            <img id="preview-history" src="{{ $histImgSrc }}" alt="Foto Sejarah" class="w-100 h-100 object-fit-cover rounded-2" onerror="this.src='https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=600&auto=format&fit=crop'">
                        </div>
                    </div>
                </div>
            </div>

            {{-- ═══════════════════════════════════════════════
                 SECTION 5: VISI & MISI PROGRAM STUDI
                 ════════════════════════════════════════════════ --}}
            <div class="form-section-card">
                <div class="form-section-header">
                    <div class="form-section-icon" style="background: {{ $config['color'] }}; color: #fff;">
                        <i class="material-symbols-rounded text-sm">flag</i>
                    </div>
                    <div>
                        <h5 class="form-section-title">Visi &amp; Misi Program Studi</h5>
                        <p class="form-section-desc">Cita-cita strategis dan butir-butir misi tridharma perguruan tinggi.</p>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label-custom">
                            <span>Visi Program Studi</span>
                            <span class="badge-opt">Tampil di Halaman Visi &amp; Misi</span>
                        </label>
                        <textarea name="vision" rows="3" class="form-control-custom" placeholder="Menjadi program studi unggulan yang...">{{ old('vision', $data['vision']) }}</textarea>
                    </div>

                    <div class="col-12">
                        <label class="form-label-custom">
                            <span>Misi Program Studi</span>
                            <span class="badge-opt">Pisahkan setiap butir misi dengan baris baru (Enter)</span>
                        </label>
                        <textarea name="mission" rows="6" class="form-control-custom" placeholder="1. Menyelenggarakan pendidikan berkualitas...&#10;2. Mengembangkan riset inovatif...&#10;3. Melaksanakan pengabdian masyarakat...">{{ old('mission', is_array($data['mission']) ? implode("\n", $data['mission']) : $data['mission']) }}</textarea>
                        <div class="form-hint">
                            <i class="material-symbols-rounded text-xs">info</i>
                            <span>Sistem akan otomatis merapikan setiap baris menjadi daftar nomor bernomor rapi pada tampilan website publik.</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ═══════════════════════════════════════════════
                 SECTION 6: KONTAK & RUANG KANTOR PRODI
                 ════════════════════════════════════════════════ --}}
            <div class="form-section-card">
                <div class="form-section-header">
                    <div class="form-section-icon" style="background: {{ $config['color'] }}; color: #fff;">
                        <i class="material-symbols-rounded text-sm">contact_phone</i>
                    </div>
                    <div>
                        <h5 class="form-section-title">Kontak &amp; Ruang Layanan Mahasiswa</h5>
                        <p class="form-section-desc">Informasi kontak prodi yang memudahkan mahasiswa dan masyarakat menghubungi sekretariat.</p>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label-custom">
                            <span>No. WhatsApp Layanan Prodi</span>
                            <span class="badge-opt">Opsional</span>
                        </label>
                        <input type="text" name="whatsapp" class="form-control-custom" value="{{ old('whatsapp', $data['whatsapp']) }}" placeholder="+62 812-xxxx-xxxx">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label-custom">
                            <span>Email Resmi Prodi</span>
                            <span class="badge-opt">Opsional</span>
                        </label>
                        <input type="email" name="email" class="form-control-custom" value="{{ old('email', $data['email']) }}" placeholder="prodi@iaidafa.ac.id">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label-custom">
                            <span>Ruang Kantor / Sekretariat</span>
                            <span class="badge-opt">Opsional</span>
                        </label>
                        <input type="text" name="office_address" class="form-control-custom" value="{{ old('office_address', $data['office_address']) }}" placeholder="Gedung Kampus Lt. 2">
                    </div>
                </div>
            </div>

            {{-- ═══════════════════════════════════════════════
                 SECTION 7: KONTEN TAMBAHAN BEBAS (WYSIWYG)
                 ════════════════════════════════════════════════ --}}
            <div class="form-section-card">
                <div class="form-section-header">
                    <div class="form-section-icon" style="background: {{ $config['color'] }}; color: #fff;">
                        <i class="material-symbols-rounded text-sm">article</i>
                    </div>
                    <div>
                        <h5 class="form-section-title">Konten Informasi Tambahan (Editor WYSIWYG)</h5>
                        <p class="form-section-desc">Dosen / Kaprodi dapat memasukkan informasi profil lab, praktikum, prospek kerja lulusan, atau brosur info prodi tanpa perlu coding.</p>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-12">
                        <textarea id="editor-prodi" name="content" class="form-control">{!! old('content', $data['content']) !!}</textarea>
                    </div>
                </div>
            </div>

            {{-- ═══════════════════════════════════════════════
                 SUBMIT ACTION BAR
                 ════════════════════════════════════════════════ --}}
            <div class="p-3 bg-slate-50 border rounded-3 d-flex align-items-center justify-content-between flex-wrap gap-3 mt-4">
                <span class="text-xs text-secondary">
                    <i class="material-symbols-rounded text-xs text-success align-middle me-1">check_circle</i>
                    Perubahan akan langsung tersimpan dan tayang di website sub-domain prodi ini.
                </span>
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ $config['public_url'] }}" target="_blank" class="btn btn-outline-dark btn-sm mb-0">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">visibility</i>Pratinjau Web
                    </a>
                    <button type="submit" class="btn text-white btn-sm mb-0 px-4 py-2 font-weight-bold" style="background: linear-gradient(135deg, {{ $config['color'] }} 0%, #0f172a 100%);">
                        <i class="material-symbols-rounded text-xs me-1 align-middle">save</i>Simpan &amp; Publikasikan
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
    var editorEl = document.querySelector('#editor-prodi');
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

function previewImage(input, targetId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var target = document.getElementById(targetId);
            if (target) {
                target.src = e.target.result;
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
