@extends('layouts_admin.admin')

@section('title', 'Manajemen Dokumen Akademik')
@section('page-title', 'Dokumen Akademik')

@section('content')

<div class="admin-form-card">

    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4><i class="fas fa-file-pdf text-warning"></i> Manajemen Berkas & Dokumen Akademik</h4>
                <p>Unggah regulasi, buku pedoman, formulir, atau berkas unduhan penting bagi mahasiswa dan dosen.</p>
            </div>
            <span class="badge bg-white text-emerald-800 text-xs px-3 py-2 rounded-full font-bold shadow-sm">
                <i class="fas fa-check-circle text-emerald-600"></i> Unduhan Berkas
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

            {{-- FORM UPLOAD DOKUMEN --}}
            <div class="col-xl-4">
                <div class="form-section-card h-100">
                    <div class="form-section-header">
                        <div class="form-section-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div>
                            <h5 class="form-section-title">Unggah Dokumen Baru</h5>
                            <p class="form-section-desc">Pilih file PDF, Word, atau Excel.</p>
                        </div>
                    </div>

                    <form action="{{ route('admin.document.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Nama / Judul Dokumen</span>
                                <span class="badge-req">* Wajib Diisi</span>
                            </label>
                            <input type="text"
                                   name="name"
                                   class="form-control-custom"
                                   placeholder="Contoh: Formulir Pengajuan Judul Skripsi"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Tahun Terbit / Berlaku</span>
                                <span class="badge-req">* Wajib</span>
                            </label>
                            <input type="number"
                                   name="year"
                                   class="form-control-custom"
                                   value="{{ date('Y') }}"
                                   min="2020"
                                   max="{{ date('Y') }}"
                                   required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label-custom">
                                <span>Pilih Berkas Dokumen</span>
                                <span class="badge-req">* Wajib</span>
                            </label>
                            <div class="file-dropzone-wrapper py-3">
                                <input type="file"
                                       name="file"
                                       accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx"
                                       required>
                                <div class="file-dropzone-icon">
                                    <i class="fas fa-file-download text-emerald-600"></i>
                                </div>
                                <div class="text-xs font-semibold text-slate-700">
                                    Pilih atau seret berkas dokumen
                                </div>
                                <div class="text-xxs text-slate-500 mt-1">
                                    Format: <strong>PDF, DOCX, XLSX, PPTX</strong> &bull; Maks. 5MB
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn-brand-primary w-100 justify-content-center py-2.5">
                            <i class="fas fa-upload"></i> Simpan & Unggah Berkas
                        </button>
                    </form>
                </div>
            </div>

            {{-- LIST DOKUMEN TERUNGGAH --}}
            <div class="col-xl-8">
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm h-100">
                    <div class="p-3 bg-slate-50 border-b border-slate-200 d-flex justify-content-between align-items-center">
                        <span class="font-bold text-xs text-slate-800 d-flex align-items-center gap-2">
                            <i class="fas fa-folder-open text-emerald-600"></i> Berkas Terunggah di Server
                        </span>
                        <span class="badge bg-emerald-100 text-emerald-800 text-xxs font-bold">{{ count($documents) }} Berkas</span>
                    </div>

                    <div class="p-3">
                        <div class="table-responsive">
                            <table class="table mb-0 align-middle">
                                <thead class="bg-slate-50 text-xxs text-slate-500 uppercase">
                                    <tr>
                                        <th class="ps-2">Nama Dokumen</th>
                                        <th class="text-center" style="width: 80px;">Tahun</th>
                                        <th class="text-center" style="width: 80px;">Format</th>
                                        <th class="text-center" style="width: 100px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($documents as $doc)
                                    <tr>
                                        <td class="ps-2">
                                            <div class="font-bold text-slate-800 text-xs">{{ $doc->name }}</div>
                                            <span class="text-xxs text-slate-400">{{ $doc->file_size ? number_format($doc->file_size / 1024, 1) . ' KB' : 'Berkas Unduhan' }}</span>
                                        </td>
                                        <td class="text-center font-bold text-slate-700 text-xs">{{ $doc->year }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-slate-100 text-slate-700 text-xxs uppercase">{{ $doc->file_extension ?? 'PDF' }}</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex align-items-center justify-content-center gap-1">
                                                <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="btn btn-link text-emerald-600 p-1 mb-0" title="Unduh">
                                                    <i class="fas fa-download"></i>
                                                </a>
                                                <form action="{{ route('admin.document.destroy', $doc->id) }}" method="POST" onsubmit="return confirm('Hapus dokumen ini?')">
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-link text-rose-600 p-1 mb-0" title="Hapus"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-slate-400 py-4 text-xs">Belum ada dokumen yang diunggah.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection
