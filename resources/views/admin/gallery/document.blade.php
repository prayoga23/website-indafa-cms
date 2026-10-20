@extends('layouts_admin.admin')

@section('title', 'Manajemen Dokumen Akademik')
@section('page-title', 'Dokumen Akademik')

@section('content')

<div class="admin-form-card">

    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4><i class="fas fa-link text-warning"></i> Manajemen Dokumen & Tautan Berkas</h4>
                <p>Sematkan link Google Drive / Google Docs untuk regulasi, formulir, atau berkas penting agar hemat penyimpanan storage VPS.</p>
            </div>
            <span class="badge bg-white text-emerald-800 text-xs px-3 py-2 rounded-full font-bold shadow-sm">
                <i class="fab fa-google-drive text-emerald-600 me-1"></i> Cloud Drive & Documents
            </span>
        </div>
    </div>

    <div class="p-3 p-md-4">

        {{-- Notifikasi Sukses --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show text-white text-xs mb-4" role="alert">
                <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
            </div>
        @endif

        {{-- Notifikasi Error --}}
        @if($errors->any())
            <div class="alert alert-danger py-2 small mb-4">
                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row g-4">

            {{-- FORM UPLOAD LINK DOKUMEN --}}
            <div class="col-xl-5">
                <div class="form-section-card h-100">
                    <div class="form-section-header">
                        <div class="form-section-icon">
                            <i class="fab fa-google-drive"></i>
                        </div>
                        <div>
                            <h5 class="form-section-title">Tambah Tautan Dokumen</h5>
                            <p class="form-section-desc">Masukkan tautan file dari Google Drive / Docs.</p>
                        </div>
                    </div>

                    <form action="{{ route('admin.document.store') }}" method="POST">
                        @csrf
                        
                        {{-- NAMA DOKUMEN --}}
                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Nama / Judul Dokumen</span>
                                <span class="badge-req">* Wajib Diisi</span>
                            </label>
                            <input type="text"
                                   name="name"
                                   class="form-control-custom @error('name') border-rose-500 @enderror"
                                   placeholder="Contoh: Formulir Pengajuan Judul Skripsi"
                                   value="{{ old('name') }}"
                                   required>
                            <div class="form-hint">
                                <i class="fas fa-pen"></i>
                                <span>Gunakan nama yang jelas dan mudah dipahami mahasiswa/dosen.</span>
                            </div>
                        </div>

                        {{-- TAHUN TERBIT --}}
                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Tahun Terbit / Berlaku</span>
                                <span class="badge-req">* Wajib</span>
                            </label>
                            <input type="number"
                                   name="year"
                                   class="form-control-custom @error('year') border-rose-500 @enderror"
                                   value="{{ old('year', date('Y')) }}"
                                   min="2010"
                                   max="{{ date('Y') + 1 }}"
                                   required>
                        </div>

                        {{-- FORMAT / TIPE DOKUMEN --}}
                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Tipe / Format Dokumen</span>
                                <span class="badge-opt">Opsional (Auto-deteksi)</span>
                            </label>
                            <select name="file_extension" class="form-select-custom">
                                <option value="gdrive" {{ old('file_extension') == 'gdrive' ? 'selected' : '' }}>Google Docs / Drive Document</option>
                                <option value="pdf" {{ old('file_extension') == 'pdf' ? 'selected' : '' }}>PDF Document (.pdf)</option>
                                <option value="docx" {{ old('file_extension') == 'docx' ? 'selected' : '' }}>Microsoft Word (.docx / .doc)</option>
                                <option value="xlsx" {{ old('file_extension') == 'xlsx' ? 'selected' : '' }}>Microsoft Excel (.xlsx / .xls)</option>
                                <option value="pptx" {{ old('file_extension') == 'pptx' ? 'selected' : '' }}>Microsoft PowerPoint (.pptx)</option>
                                <option value="link" {{ old('file_extension') == 'link' ? 'selected' : '' }}>Tautan Dokumen Lainnya</option>
                            </select>
                            <div class="form-hint">
                                <i class="fas fa-info-circle"></i>
                                <span>Ikon dokumen di website publik akan otomatis disesuaikan.</span>
                            </div>
                        </div>

                        {{-- LINK DOKUMEN (GOOGLE DRIVE / CLOUD URL) --}}
                        <div class="mb-4">
                            <label class="form-label-custom">
                                <span>Link Tautan Dokumen (Google Drive / Cloud)</span>
                                <span class="badge-req">* Wajib Diisi</span>
                            </label>
                            <div class="position-relative">
                                <input type="url"
                                       name="file_path"
                                       class="form-control-custom @error('file_path') border-rose-500 @enderror ps-5"
                                       placeholder="https://docs.google.com/document/d/... atau https://drive.google.com/..."
                                       value="{{ old('file_path') }}"
                                       required>
                                <div class="position-absolute top-50 start-0 translate-middle-y ps-3 text-emerald-600">
                                    <i class="fas fa-link"></i>
                                </div>
                            </div>
                            
                            {{-- PANDUAN PENGGUNAAN --}}
                            <div class="mt-2.5 p-2.5 bg-emerald-50 border border-emerald-200 rounded-lg text-xxs text-emerald-900">
                                <div class="font-bold mb-1 d-flex align-items-center gap-1">
                                    <i class="fas fa-lightbulb text-amber-500"></i> Cara Membagikan Link Google Drive:
                                </div>
                                <ol class="mb-0 ps-3">
                                    <li>Buka dokumen di <strong>Google Drive / Docs</strong>.</li>
                                    <li>Klik tombol <strong>Bagikan (Share)</strong> di pojok kanan atas.</li>
                                    <li>Ubah akses umum menjadi: <strong>"Siapa saja yang memiliki link"</strong> (Viewer).</li>
                                    <li>Klik <strong>Salin Link</strong> lalu tempelkan (paste) di kolom ini.</li>
                                </ol>
                            </div>
                        </div>

                        <button type="submit" class="btn-brand-primary w-100 justify-content-center py-2.5 shadow-sm">
                            <i class="fas fa-save me-1"></i> Simpan Tautan Dokumen
                        </button>
                    </form>
                </div>
            </div>

            {{-- LIST DOKUMEN TERDAFTAR --}}
            <div class="col-xl-7">
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm h-100">
                    <div class="p-3 bg-slate-50 border-b border-slate-200 d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <span class="font-bold text-xs text-slate-800 d-flex align-items-center gap-2">
                            <i class="fas fa-folder-open text-emerald-600"></i> Dokumen & Tautan Terdaftar
                        </span>
                        <span class="badge bg-emerald-100 text-emerald-800 text-xxs font-bold">{{ $documents->total() }} Dokumen</span>
                    </div>

                    <div class="p-3">
                        <div class="table-responsive">
                            <table class="table mb-0 align-middle table-hover">
                                <thead class="bg-slate-50 text-xxs text-slate-500 uppercase">
                                    <tr>
                                        <th class="ps-2">Nama Dokumen</th>
                                        <th class="text-center" style="width: 80px;">Tahun</th>
                                        <th class="text-center" style="width: 110px;">Format</th>
                                        <th class="text-center" style="width: 110px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($documents as $doc)
                                    @php
                                        $ext = strtolower($doc->file_extension ?? 'gdrive');
                                        $badgeBg = 'bg-slate-100 text-slate-700';
                                        if (in_array($ext, ['gdrive', 'docs'])) {
                                            $badgeBg = 'bg-blue-100 text-blue-800 border border-blue-200';
                                        } elseif ($ext === 'pdf') {
                                            $badgeBg = 'bg-rose-100 text-rose-800 border border-rose-200';
                                        } elseif (in_array($ext, ['docx', 'doc'])) {
                                            $badgeBg = 'bg-sky-100 text-sky-800 border border-sky-200';
                                        } elseif (in_array($ext, ['xlsx', 'xls'])) {
                                            $badgeBg = 'bg-emerald-100 text-emerald-800 border border-emerald-200';
                                        }
                                        $targetUrl = Str::startsWith($doc->file_path, ['http://', 'https://']) ? $doc->file_path : asset('storage/' . $doc->file_path);
                                    @endphp
                                    <tr>
                                        <td class="ps-2">
                                            <div class="font-bold text-slate-800 text-xs mb-0.5">{{ $doc->name }}</div>
                                            @if(Str::startsWith($doc->file_path, ['http://', 'https://']))
                                                <span class="badge bg-emerald-50 text-emerald-700 text-xxs border border-emerald-200">
                                                    <i class="fab fa-google-drive me-1"></i> Tautan Cloud
                                                </span>
                                            @else
                                                <span class="badge bg-slate-100 text-slate-500 text-xxs">
                                                    <i class="fas fa-file me-1"></i> Berkas Lokal
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-center font-bold text-slate-700 text-xs">{{ $doc->year }}</td>
                                        <td class="text-center">
                                            <span class="badge {{ $badgeBg }} text-xxs font-bold uppercase px-2 py-1 rounded">
                                                {{ $doc->format_label ?? strtoupper($doc->file_extension ?? 'LINK') }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex align-items-center justify-content-center gap-1">
                                                <a href="{{ $targetUrl }}" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-outline-info p-1 px-2 mb-0" title="Buka Dokumen di Tab Baru">
                                                    <i class="fas fa-external-link-alt"></i>
                                                </a>
                                                <form action="{{ route('admin.document.destroy', $doc->id) }}" method="POST" onsubmit="return confirm('Hapus dokumen ini?')">
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-sm btn-outline-danger p-1 px-2 mb-0" title="Hapus Dokumen"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-slate-400 py-4 text-xs">
                                            <i class="fas fa-folder-open fa-2x d-block mb-2 text-slate-300"></i>
                                            Belum ada dokumen yang ditambahkan.
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        {{-- Pagination --}}
                        @if($documents->hasPages())
                            <div class="mt-3 pt-3 border-t border-slate-200 d-flex justify-content-end">
                                {{ $documents->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection
