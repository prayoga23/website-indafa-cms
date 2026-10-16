@extends('layouts_admin.admin')

@section('title', 'Kelola Sejarah Kampus & Milestone')
@section('page-title', 'Sejarah & Milestone')

@section('content')

<div class="admin-form-card">

    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4><i class="fas fa-history text-warning"></i> Manajemen Sejarah & Garis Waktu (Milestone)</h4>
                <p>Dokumentasikan latar belakang pendirian dan lintasan peristiwa bersejarah program studi / institut.</p>
            </div>
            <span class="badge bg-white text-emerald-800 text-xs px-3 py-2 rounded-full font-bold shadow-sm">
                <i class="fas fa-check-circle text-emerald-600"></i> Profil Sejarah
            </span>
        </div>
    </div>

    <div class="p-3 p-md-4">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show text-white text-xs mb-4" role="alert">
                <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
            </div>
        @endif

        @if(session('success_timeline'))
            <div class="alert alert-success alert-dismissible fade show text-white text-xs mb-4" role="alert">
                <i class="fas fa-check-circle me-1"></i> {{ session('success_timeline') }}
            </div>
        @endif

        <div class="row g-4">

            {{-- KOLOM KIRI: FORM LATAR BELAKANG --}}
            <div class="col-lg-6">
                <div class="form-section-card h-100">
                    <div class="form-section-header">
                        <div class="form-section-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div>
                            <h5 class="form-section-title">Latar Belakang Pendirian</h5>
                            <p class="form-section-desc">Uraikan sejarah awal pembentukan, tokoh pendiri, dan dinamika awal.</p>
                        </div>
                    </div>

                    <form action="{{ route('admin.history.info.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Judul Narasi Sejarah</span>
                                <span class="badge-req">* Wajib Diisi</span>
                            </label>
                            <input type="text"
                                   name="title"
                                   class="form-control-custom"
                                   value="{{ old('title', $info->title ?? 'Latar Belakang Pendirian') }}"
                                   placeholder="Contoh: Sejarah Berdirinya IAI Darul Falah"
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Paragraf 1 (Awal Mula)</span>
                                <span class="badge-req">* Wajib Diisi</span>
                            </label>
                            <textarea name="text_1"
                                      class="form-control-custom"
                                      rows="4"
                                      placeholder="Tuliskan paragraf pembuka sejarah pendirian..."
                                      required>{{ old('text_1', $info->text_1 ?? '') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Paragraf 2 (Kelanjutan Sejarah)</span>
                                <span class="badge-opt">Opsional</span>
                            </label>
                            <textarea name="text_2"
                                      class="form-control-custom"
                                      rows="4"
                                      placeholder="Tuliskan kelanjutan perkembangan lembaga...">{{ old('text_2', $info->text_2 ?? '') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label-custom">
                                <span>Foto Dokumentasi Sejarah</span>
                                <span class="badge-opt">Opsional</span>
                            </label>
                            <div class="file-dropzone-wrapper">
                                <input type="file"
                                       name="image"
                                       accept="image/*"
                                       data-preview="history-image-preview">
                                <div class="file-dropzone-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <div class="text-sm font-semibold text-slate-700">
                                    Pilih foto dokumentasi sejarah
                                </div>
                                <div class="text-xs text-slate-500 mt-1">
                                    Format: <strong>JPG, PNG, WEBP</strong> &bull; Maks. 2MB
                                </div>
                            </div>

                            <div id="history-image-preview" class="live-preview-box" style="display: none;"></div>

                            @if($info && $info->image)
                                <div class="mt-3 p-2 bg-white rounded-xl border border-slate-200 text-center">
                                    <span class="text-xxs font-bold uppercase tracking-wider text-slate-500 d-block mb-1">Foto Saat Ini</span>
                                    <img src="{{ asset('storage/' . $info->image) }}"
                                         class="rounded-lg shadow-sm"
                                         style="max-height: 120px; object-fit: cover;">
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn-brand-primary w-100 justify-content-center py-2.5">
                            <i class="fas fa-save"></i> Perbarui Latar Belakang
                        </button>
                    </form>
                </div>
            </div>

            {{-- KOLOM KANAN: MILESTONE TIMELINE --}}
            <div class="col-lg-6">

                {{-- FORM TAMBAH MILESTONE --}}
                <div class="form-section-card mb-4">
                    <div class="form-section-header">
                        <div class="form-section-icon">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div>
                            <h5 class="form-section-title">Tambah Milestone / Peristiwa Penting</h5>
                            <p class="form-section-desc">Tambahkan tonggak sejarah penting berdasarkan urutan tahun.</p>
                        </div>
                    </div>

                    <form action="{{ route('admin.history.timeline.store') }}" method="POST">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="form-label-custom">
                                    <span>Tahun Peristiwa</span>
                                    <span class="badge-req">* Wajib</span>
                                </label>
                                <input type="number"
                                       name="year"
                                       class="form-control-custom"
                                       placeholder="2026"
                                       required>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label-custom">
                                    <span>Judul Peristiwa</span>
                                    <span class="badge-req">* Wajib</span>
                                </label>
                                <input type="text"
                                       name="title"
                                       class="form-control-custom"
                                       placeholder="Contoh: Penerbitan SK Pendirian"
                                       required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Deskripsi Singkat Peristiwa</span>
                                <span class="badge-req">* Wajib Diisi</span>
                            </label>
                            <textarea name="description"
                                      class="form-control-custom"
                                      rows="2"
                                      placeholder="Uraikan intisari peristiwa bersejarah ini..."
                                      required></textarea>
                        </div>

                        <button type="submit" class="btn-brand-primary w-100 justify-content-center py-2">
                            <i class="fas fa-plus-circle"></i> Tambah ke Garis Waktu
                        </button>
                    </form>
                </div>

                {{-- LIST MILESTONE --}}
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
                    <div class="p-3 bg-slate-50 border-b border-slate-200 d-flex align-items-center justify-content-between">
                        <span class="font-bold text-sm text-slate-800 d-flex align-items-center gap-2">
                            <i class="fas fa-clock text-emerald-600"></i> Garis Waktu Sejarah Saat Ini
                        </span>
                        <span class="badge bg-emerald-100 text-emerald-800 text-xxs font-bold">{{ count($timelines) }} Tonggak</span>
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-0 align-middle">
                            <thead class="bg-slate-50 text-xxs text-slate-500 uppercase">
                                <tr>
                                    <th class="ps-3 text-center" width="18%">Tahun</th>
                                    <th width="35%">Judul</th>
                                    <th width="35%">Uraian</th>
                                    <th class="text-center" width="12%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($timelines as $time)
                                <tr>
                                    <td class="ps-3 text-center font-bold text-emerald-700 fs-6">{{ $time->year }}</td>
                                    <td class="font-semibold text-slate-800 text-xs">{{ $time->title }}</td>
                                    <td class="text-xs text-slate-500">{{ Str::limit($time->description, 50) }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.history.timeline.destroy', $time->id) }}" method="POST" onsubmit="return confirm('Hapus milestone ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-rose-600 p-1 mb-0" title="Hapus Milestone">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-slate-400 py-4 text-xs">Belum ada garis waktu tersimpan.</td>
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

@endsection
