@extends('layouts_admin.admin')

@section('title', 'Kelola Visi Misi & Tujuan')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Manajemen Profil: Visi, Misi & Tujuan</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Visi Misi</li>
    </ol>

    {{-- CARD FULL WIDTH: EDIT VISI UTAMA --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white fw-bold">
            <i class="fas fa-eye me-1"></i> Visi Utama Program Studi
        </div>
        <div class="card-body">
            @if(session('success_vision'))
                <div class="alert alert-success py-2">{{ session('success_vision') }}</div>
            @endif
            <form action="{{ route('admin.vision.update') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-bold text-muted">Teks Visi</label>
                    <textarea name="vision_text" class="form-control form-control-lg" rows="3" required placeholder="Tulis visi prodi disini...">{{ old('vision_text', $vision->vision_text ?? '') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-1"></i> Perbarui Visi</button>
            </form>
        </div>
    </div>

    {{-- CARD FORM TAMBAH POIN BARU (MISI / TUJUAN) --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white fw-bold">
            <i class="fas fa-plus-circle me-1"></i> Tambah Poin Baru (Misi / Tujuan)
        </div>
        <div class="card-body">
            @if(session('success_item'))
                <div class="alert alert-success py-2">{{ session('success_item') }}</div>
            @endif
            <form action="{{ route('admin.vision.item.store') }}" method="POST">
                @csrf
                <div class="row align-items-end">
                    <div class="col-md-3 mb-3">
                        <label class="form-label fw-bold">Kategori Data</label>
                        <select name="type" class="form-select" required>
                            <option value="mission">MISI</option>
                            <option value="objective">TUJUAN</option>
                        </select>
                    </div>
                    <div class="col-md-7 mb-3">
                        <label class="form-label fw-bold">Isi Kandungan Poin</label>
                        <input type="text" name="content" class="form-control" placeholder="Contoh: Menyelenggarakan riset berkala..." required>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label class="form-label fw-bold">Urutan</label>
                        <input type="number" name="order_position" class="form-control" value="1" min="1" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success px-4"><i class="fas fa-plus me-1"></i> Masukkan ke Daftar</button>
            </form>
        </div>
    </div>

    {{-- DUA KOLOM: DAFTAR MISI VS DAFTAR TUJUAN --}}
    <div class="row">
        <!-- TABEL LIST DATA MISI -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white fw-bold">
                    <i class="bi bi-rocket-takeoff me-1"></i> Daftar Poin MISI Saat Ini
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center" width="15%">No Urut</th>
                                <th width="75%">Isi Konten Misi</th>
                                <th class="text-center" width="10%">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($missions as $mission)
                            <tr>
                                <td class="text-center fw-bold text-secondary">{{ $mission->order_position }}</td>
                                <td class="text-muted small">{{ $mission->content }}</td>
                                <td class="text-center">
                                    <form action="{{ route('admin.vision.item.destroy', $mission->id) }}" method="POST" onsubmit="return confirm('Hapus poin misi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm text-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-3">Belum ada rincian misi.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- TABEL LIST DATA TUJUAN -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white fw-bold">
                    <i class="bi bi-trophy me-1"></i> Daftar Poin TUJUAN Saat Ini
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center" width="15%">No Urut</th>
                                <th width="75%">Isi Konten Tujuan</th>
                                <th class="text-center" width="10%">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($objectives as $obj)
                            <tr>
                                <td class="text-center fw-bold text-secondary">{{ $obj->order_position }}</td>
                                <td class="text-muted small">{{ $obj->content }}</td>
                                <td class="text-center">
                                    <form action="{{ route('admin.vision.item.destroy', $obj->id) }}" method="POST" onsubmit="return confirm('Hapus poin tujuan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm text-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-3">Belum ada rincian tujuan.</td>
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
