@extends('layouts_admin.admin')

@section('title', 'Kelola Kurikulum Prodi')
@section('page-title', 'Kurikulum & Sebaran Mata Kuliah')

@section('content')

<div class="admin-form-card">

    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4><i class="fas fa-book-reader text-warning"></i> Manajemen Kurikulum & Sebaran Mata Kuliah</h4>
                <p>Kelola narasi landasan kurikulum SN-DIKTI serta sebaran mata kuliah per semester.</p>
            </div>
            <span class="badge bg-white text-emerald-800 text-xs px-3 py-2 rounded-full font-bold shadow-sm">
                <i class="fas fa-check-circle text-emerald-600"></i> Akademik
            </span>
        </div>
    </div>

    <div class="p-3 p-md-4">

        <div class="row g-4">

            {{-- KOLOM KIRI: NARASI PENGANTAR KURIKULUM --}}
            <div class="col-lg-5">
                <div class="form-section-card h-100">
                    <div class="form-section-header">
                        <div class="form-section-icon">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div>
                            <h5 class="form-section-title">Pengantar Landasan Kurikulum</h5>
                            <p class="form-section-desc">Uraikan filosofi kurikulum berbasis KKNI dan OBE.</p>
                        </div>
                    </div>

                    @if(session('success_info'))
                        <div class="alert alert-success alert-dismissible fade show text-white text-xs mb-3" role="alert">
                            <i class="fas fa-check-circle me-1"></i> {{ session('success_info') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.curriculum.info.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label-custom">
                                <span>Teks Narasi Landasan Kurikulum</span>
                                <span class="badge-req">* Wajib Diisi</span>
                            </label>
                            <textarea name="description"
                                      class="form-control-custom"
                                      rows="12"
                                      required
                                      placeholder="Tuliskan landasan kurikulum KKNI / SN-DIKTI prodi di sini...">{{ old('description', $info->description ?? '') }}</textarea>
                            <div class="form-hint">
                                <i class="fas fa-info-circle"></i>
                                <span>Deskripsi ini tampil pada halaman kurikulum website prodi.</span>
                            </div>
                        </div>
                        <button type="submit" class="btn-brand-primary w-100 justify-content-center py-2.5">
                            <i class="fas fa-save"></i> Perbarui Deskripsi Kurikulum
                        </button>
                    </form>
                </div>
            </div>

            {{-- KOLOM KANAN: INPUT & LISTING DATA MATA KULIAH --}}
            <div class="col-lg-7">

                {{-- FORM TAMBAH MATKUL --}}
                <div class="form-section-card mb-4">
                    <div class="form-section-header">
                        <div class="form-section-icon">
                            <i class="fas fa-plus-circle"></i>
                        </div>
                        <div>
                            <h5 class="form-section-title">Tambah Mata Kuliah Baru</h5>
                            <p class="form-section-desc">Daftarkan mata kuliah baru ke dalam semester yang bersangkutan.</p>
                        </div>
                    </div>

                    @if(session('success_course'))
                        <div class="alert alert-success alert-dismissible fade show text-white text-xs mb-3" role="alert">
                            <i class="fas fa-check-circle me-1"></i> {{ session('success_course') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.curriculum.course.store') }}" method="POST">
                        @csrf
                        <div class="row g-3 mb-3">
                            <div class="col-md-4">
                                <label class="form-label-custom">
                                    <span>Semester</span>
                                    <span class="badge-req">* Wajib</span>
                                </label>
                                <select name="semester" class="form-select-custom" required>
                                    @for($i = 1; $i <= 8; $i++)
                                        <option value="{{ $i }}">Semester {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label-custom">
                                    <span>Kode Matkul</span>
                                    <span class="badge-req">* Wajib</span>
                                </label>
                                <input type="text"
                                       name="code"
                                       class="form-control-custom"
                                       placeholder="USK401001"
                                       required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label-custom">
                                    <span>Sifat Matkul</span>
                                    <span class="badge-req">* Wajib</span>
                                </label>
                                <input type="text"
                                       name="type"
                                       class="form-control-custom"
                                       value="Wajib"
                                       placeholder="Wajib / Pilihan"
                                       required>
                            </div>
                        </div>

                        <div class="row g-3 align-items-end mb-3">
                            <div class="col-md-8">
                                <label class="form-label-custom">
                                    <span>Nama Mata Kuliah</span>
                                    <span class="badge-req">* Wajib Diisi</span>
                                </label>
                                <input type="text"
                                       name="name"
                                       class="form-control-custom"
                                       placeholder="Contoh: Ushul Fiqh / Metodologi Penelitian"
                                       required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label-custom">
                                    <span>Bobot SKS</span>
                                    <span class="badge-req">* Wajib</span>
                                </label>
                                <input type="number"
                                       name="sks"
                                       class="form-control-custom"
                                       value="2"
                                       min="1"
                                       max="6"
                                       required>
                            </div>
                        </div>

                        <button type="submit" class="btn-brand-primary w-100 justify-content-center py-2">
                            <i class="fas fa-plus"></i> Daftarkan Mata Kuliah
                        </button>
                    </form>
                </div>

                {{-- LIST DAFTAR PER SEMESTER --}}
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
                    <div class="p-3 bg-slate-50 border-b border-slate-200">
                        <span class="font-bold text-sm text-slate-800 d-flex align-items-center gap-2">
                            <i class="fas fa-list text-emerald-600"></i> Struktur Sebaran Mata Kuliah
                        </span>
                    </div>

                    <div class="p-3" style="max-height: 480px; overflow-y: auto;">
                        @forelse($coursesGrouped as $semester => $courses)
                            <div class="mb-3 border border-slate-200 rounded-xl overflow-hidden">
                                <div class="px-3 py-2 bg-slate-100 font-bold text-xs text-emerald-800 d-flex justify-content-between align-items-center">
                                    <span>Semester {{ $semester }}</span>
                                    <span class="badge bg-emerald-100 text-emerald-800 text-xxs font-semibold">{{ count($courses) }} Mata Kuliah</span>
                                </div>
                                <div class="table-responsive">
                                    <table class="table mb-0 align-middle">
                                        <thead class="bg-slate-50 text-xxs text-slate-500 uppercase">
                                            <tr>
                                                <th class="ps-3" width="20%">Kode</th>
                                                <th width="45%">Nama Matkul</th>
                                                <th class="text-center" width="15%">SKS</th>
                                                <th width="10%">Sifat</th>
                                                <th class="text-center" width="10%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($courses as $course)
                                            <tr>
                                                <td class="ps-3 font-semibold text-slate-700 text-xs">{{ $course->code }}</td>
                                                <td class="font-bold text-slate-800 text-xs">{{ $course->name }}</td>
                                                <td class="text-center font-bold text-emerald-700 text-xs">{{ $course->sks }}</td>
                                                <td><span class="badge bg-slate-100 text-slate-700 text-xxs">{{ $course->type }}</span></td>
                                                <td class="text-center">
                                                    <form action="{{ route('admin.curriculum.course.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Hapus mata kuliah ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link text-rose-600 p-1 mb-0" title="Hapus">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-slate-400 my-4 text-xs">Belum ada data sebaran mata kuliah.</p>
                        @endforelse
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection
