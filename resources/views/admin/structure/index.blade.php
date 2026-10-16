@extends('layouts_admin.admin')

@section('title', 'Kelola Struktur Organisasi')
@section('page-title', 'Struktur Organisasi')

@section('content')

<div class="admin-form-card">

    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4><i class="fas fa-sitemap text-warning"></i> Manajemen Struktur Organisasi & Pengelola</h4>
                <p>Kelola susunan pimpinan inti, dosen utama, dan staf pengelola program studi / institut.</p>
            </div>
            <span class="badge bg-white text-emerald-800 text-xs px-3 py-2 rounded-full font-bold shadow-sm">
                <i class="fas fa-check-circle text-emerald-600"></i> Struktur Organisasi
            </span>
        </div>
    </div>

    <div class="p-3 p-md-4">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show text-white text-xs mb-4" role="alert">
                <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
            </div>
        @endif

        {{-- SECTION 1: FORM TAMBAH PERSONEL BARU --}}
        <div class="form-section-card mb-4">
            <div class="form-section-header">
                <div class="form-section-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <div>
                    <h5 class="form-section-title">Daftarkan Personel / Pimpinan Baru</h5>
                    <p class="form-section-desc">Tambahkan data pengelola inti atau dosen/staf ke bagan struktur organisasi.</p>
                </div>
            </div>

            <form action="{{ route('admin.structure.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3 mb-3">
                    <div class="col-md-3">
                        <label class="form-label-custom">
                            <span>Kategori Jabatan</span>
                            <span class="badge-req">* Wajib</span>
                        </label>
                        <select name="category" class="form-select-custom" required>
                            <option value="management">Pengelola Inti (Dengan Foto)</option>
                            <option value="staff">Dosen Utama & Staf (Tanpa Foto/Mini)</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label-custom">
                            <span>Nama Lengkap & Gelar</span>
                            <span class="badge-req">* Wajib Diisi</span>
                        </label>
                        <input type="text"
                               name="name"
                               class="form-control-custom"
                               placeholder="Contoh: Dr. H. Ahmad Fauzi, M.H.I."
                               required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label-custom">
                            <span>Nama Jabatan / Role</span>
                            <span class="badge-req">* Wajib Diisi</span>
                        </label>
                        <input type="text"
                               name="role"
                               class="form-control-custom"
                               placeholder="Contoh: Ketua Program Studi"
                               required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label-custom">
                            <span>NIP / NIY / NIDN</span>
                            <span class="badge-opt">Opsional</span>
                        </label>
                        <input type="text"
                               name="nip"
                               class="form-control-custom"
                               placeholder="Contoh: 19831124 ...">
                    </div>
                </div>

                <div class="row g-3 align-items-center mb-3">
                    <div class="col-md-8">
                        <label class="form-label-custom">
                            <span>Foto Personel</span>
                            <span class="badge-opt">Khusus Pengelola Inti</span>
                        </label>
                        <div class="file-dropzone-wrapper py-2">
                            <input type="file"
                                   name="photo"
                                   accept="image/*"
                                   data-preview="person-photo-preview">
                            <div class="d-flex align-items-center justify-content-center gap-2">
                                <i class="fas fa-cloud-upload-alt text-emerald-600 fs-5"></i>
                                <span class="text-xs font-semibold text-slate-700">Pilih foto profil (Maks. 2MB)</span>
                            </div>
                        </div>
                        <div id="person-photo-preview" class="live-preview-box" style="display: none;"></div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label-custom">
                            <span>Nomor Urutan Posisi</span>
                            <span class="badge-req">* Wajib</span>
                        </label>
                        <input type="number"
                               name="order_position"
                               class="form-control-custom"
                               value="1"
                               min="1"
                               required>
                    </div>
                </div>

                <button type="submit" class="btn-brand-primary">
                    <i class="fas fa-save"></i> Daftarkan Personel
                </button>
            </form>
        </div>

        {{-- SECTION 2: DUA TABEL (PENGELOLA INTI & STAF) --}}
        <div class="row g-4">
            {{-- TABEL PENGELOLA INTI --}}
            <div class="col-lg-7">
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
                    <div class="p-3 bg-slate-50 border-b border-slate-200 d-flex align-items-center justify-content-between">
                        <span class="font-bold text-sm text-slate-800 d-flex align-items-center gap-2">
                            <i class="fas fa-id-card text-emerald-600"></i> Kelompok Pengelola Inti
                        </span>
                        <span class="badge bg-emerald-100 text-emerald-800 text-xxs font-bold">{{ count($managements) }} Anggota</span>
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-0 align-middle">
                            <thead class="bg-slate-50 text-xxs text-slate-500 uppercase">
                                <tr>
                                    <th class="text-center" width="10%">Urut</th>
                                    <th width="15%">Foto</th>
                                    <th width="40%">Nama / NIP</th>
                                    <th width="25%">Jabatan</th>
                                    <th class="text-center" width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($managements as $manage)
                                <tr>
                                    <td class="text-center font-bold text-slate-700">{{ $manage->order_position }}</td>
                                    <td>
                                        @if($manage->photo)
                                            <img src="{{ asset('storage/' . $manage->photo) }}" class="rounded-circle border" style="width: 42px; height: 42px; object-fit: cover;">
                                        @else
                                            <div class="bg-slate-100 rounded-circle d-inline-flex align-items-center justify-content-center text-slate-400" style="width: 42px; height: 42px;">
                                                <i class="fas fa-user text-xs"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="font-bold text-slate-800 text-xs">{{ $manage->name }}</div>
                                        <span class="text-xxs text-slate-400">{{ $manage->nip ?? 'NIP. -' }}</span>
                                    </td>
                                    <td><span class="badge bg-emerald-50 text-emerald-700 border border-emerald-200 font-semibold text-xxs">{{ $manage->role }}</span></td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.structure.destroy', $manage->id) }}" method="POST" onsubmit="return confirm('Hapus pengurus ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-rose-600 p-1 mb-0" title="Hapus">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-slate-400 py-4 text-xs">Belum ada data pengelola inti.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- TABEL DOSEN UTAMA & STAF --}}
            <div class="col-lg-5">
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
                    <div class="p-3 bg-slate-50 border-b border-slate-200 d-flex align-items-center justify-content-between">
                        <span class="font-bold text-sm text-slate-800 d-flex align-items-center gap-2">
                            <i class="fas fa-users text-blue-600"></i> Dosen & Staf Akademik
                        </span>
                        <span class="badge bg-blue-100 text-blue-800 text-xxs font-bold">{{ count($staffs) }} Personel</span>
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-0 align-middle">
                            <thead class="bg-slate-50 text-xxs text-slate-500 uppercase">
                                <tr>
                                    <th class="text-center" width="15%">Urut</th>
                                    <th width="50%">Nama Dosen / Staf</th>
                                    <th width="25%">Peran</th>
                                    <th class="text-center" width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($staffs as $staff)
                                <tr>
                                    <td class="text-center font-bold text-slate-700">{{ $staff->order_position }}</td>
                                    <td><div class="font-semibold text-slate-800 text-xs">{{ $staff->name }}</div></td>
                                    <td><span class="badge bg-slate-100 text-slate-700 text-xxs">{{ $staff->role }}</span></td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.structure.destroy', $staff->id) }}" method="POST" onsubmit="return confirm('Hapus personel ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-rose-600 p-1 mb-0" title="Hapus">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-slate-400 py-4 text-xs">Belum ada data dosen atau staf.</td>
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
