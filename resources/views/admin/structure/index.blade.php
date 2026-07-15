@extends('layouts_admin.admin')

@section('title', 'Kelola Struktur Organisasi')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Manajemen Profil: Struktur Organisasi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Struktur Organisasi</li>
    </ol>

    {{-- CARD INPUT FORM PERSONEL BARU --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white fw-bold">
            <i class="fas fa-user-plus me-1"></i> Tambah Personel Baru
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success py-2">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admin.structure.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-bold">Kategori Jabatan</label>
                        <select name="category" class="form-select" required>
                            <option value="management">Pengelola Inti (Dengan Foto)</option>
                            <option value="staff">Dosen Utama & Staf (Tanpa Foto/Mini)</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-bold">Nama Lengkap & Gelar</label>
                        <input type="text" name="name" class="form-control" placeholder="Contoh: Dr. H. Ahmad Fauzi, M.H.I." required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-bold">Nama Jabatan / Role</label>
                        <input type="text" name="role" class="form-control" placeholder="Contoh: Ketua Program Studi / Guru Besar" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-bold">NIP / NIY (Opsional)</label>
                        <input type="text" name="nip" class="form-control" placeholder="Contoh: 19831124 ...">
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-md-9 mb-3">
                        <label class="form-label fw-bold">Foto Profil <small class="text-muted">(Khusus Pengelola Inti, maks 2MB)</small></label>
                        <input type="file" name="photo" class="form-control">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-bold">Urutan Posisi</label>
                        <input type="number" name="order_position" class="form-control" value="1" min="1" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-1"></i> Daftarkan Anggota</button>
            </form>
        </div>
    </div>

    {{-- DATA VIEW: DUA SEKSI --}}
    <div class="row">
        {{-- TABEL PENGELOLA INTI --}}
        <div class="col-lg-7 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white fw-bold">
                    <i class="fas fa-id-card me-1"></i> Kelompok Pengelola Inti
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center" width="10%">Urutan</th>
                                <th width="15%">Foto</th>
                                <th width="40%">Nama / NIP</th>
                                <th width="25%">Jabatan</th>
                                <th class="text-center" width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($managements as $manage)
                            <tr>
                                <td class="text-center fw-bold">{{ $manage->order_position }}</td>
                                <td>
                                    @if($manage->photo)
                                        <img src="{{ asset('storage/' . $manage->photo) }}" class="rounded-circle" style="width: 45px; height: 45px; object-fit: cover;">
                                    @else
                                        <span class="badge bg-secondary">No Pic</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-bold text-dark small">{{ $manage->name }}</div>
                                    <small class="text-muted">{{ $manage->nip ?? 'NIP. -' }}</small>
                                </td>
                                <td><span class="badge bg-success">{{ $manage->role }}</span></td>
                                <td class="text-center">
                                    <form action="{{ route('admin.structure.destroy', $manage->id) }}" method="POST" onsubmit="return confirm('Hapus pengurus ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm text-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">Belum ada data pengelola inti.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- TABEL DOSEN UTAMA & STAF --}}
        <div class="col-lg-5 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white fw-bold">
                    <i class="fas fa-users me-1"></i> Kelompok Dosen & Staf (Mini Card)
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center" width="15%">Urutan</th>
                                <th width="50%">Nama Dosen / Staf</th>
                                <th width="25%">Keterangan</th>
                                <th class="text-center" width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($staffs as $staff)
                            <tr>
                                <td class="text-center fw-bold">{{ $staff->order_position }}</td>
                                <td><div class="fw-bold text-secondary small">{{ $staff->name }}</div></td>
                                <td><small class="text-gold fw-semibold">{{ $staff->role }}</small></td>
                                <td class="text-center">
                                    <form action="{{ route('admin.structure.destroy', $staff->id) }}" method="POST" onsubmit="return confirm('Hapus personel ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm text-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-3">Belum ada data dosen atau staf.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
