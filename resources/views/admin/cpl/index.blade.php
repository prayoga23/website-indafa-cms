@extends('layouts_admin.admin')

@section('title', 'Kelola Capaian Pembelajaran Lulusan')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Manajemen Akademik: Capaian Pembelajaran Lulusan (CPL)</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">CPL</li>
    </ol>

    {{-- CARD FORM INPUT RUMUSAN POIN CPL BARU --}}
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white fw-bold">
            <i class="fas fa-plus-circle me-1"></i> Tambah Butir Rumusan CPL Baru
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success py-2">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admin.cpl.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold small">Ranah Kualifikasi (Kategori)</label>
                        <select name="category" class="form-select" required>
                            <option value="sikap">Ranah Sikap & Tata Nilai (CPL-S)</option>
                            <option value="pengetahuan">Ranah Penguasaan Pengetahuan (CPL-P)</option>
                            <option value="umum">Ranah Keterampilan Umum (CPL-KU)</option>
                            <option value="khusus">Ranah Keterampilan Khusus (CPL-KK)</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold small">Kode Sub-Number</label>
                        <input type="text" name="code_label" class="form-control" placeholder="Contoh: S1 / P3 / KU1 / KK2" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold small">Urutan Tampilan</label>
                        <input type="number" name="order_position" class="form-control" value="1" min="1" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold small">Deskripsi/Uraian Kompetensi Lulusan</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Tuliskan deskripsi rumusan capaian pembelajaran lulusan disini..." required></textarea>
                </div>
                <button type="submit" class="btn btn-primary px-4"><i class="fas fa-save me-1"></i> Simpan Butir CPL</button>
            </form>
        </div>
    </div>

    {{-- SEKSI DATA GRID: MENAMPILKAN TABEL 4 RANAH KOMPETENSI --}}
    <div class="row">

        <div class="col-xl-6 mb-4">
            <div class="card shadow-sm border-start border-3 border-success">
                <div class="card-header bg-dark text-white fw-bold small d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-gavel me-1 text-success"></i> CPL-S: Ranah Sikap & Tata Nilai</span>
                    <span class="badge bg-success">Sikap</span>
                </div>
                <div class="card-body p-0">
                    @include('admin.cpl.partials.table_render', ['dataCollection' => $sikapData])
                </div>
            </div>
        </div>

        <div class="col-xl-6 mb-4">
            <div class="card shadow-sm border-start border-3 border-warning">
                <div class="card-header bg-dark text-white fw-bold small d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-book me-1 text-warning"></i> CPL-P: Ranah Penguasaan Pengetahuan</span>
                    <span class="badge bg-warning text-dark">Pengetahuan</span>
                </div>
                <div class="card-body p-0">
                    @include('admin.cpl.partials.table_render', ['dataCollection' => $pengetahuanData])
                </div>
            </div>
        </div>

        <div class="col-xl-6 mb-4">
            <div class="card shadow-sm border-start border-3 border-info">
                <div class="card-header bg-dark text-white fw-bold small d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-cubes me-1 text-info"></i> CPL-KU: Ranah Keterampilan Umum</span>
                    <span class="badge bg-info text-dark">Umum</span>
                </div>
                <div class="card-body p-0">
                    @include('admin.cpl.partials.table_render', ['dataCollection' => $umumData])
                </div>
            </div>
        </div>

        <div class="col-xl-6 mb-4">
            <div class="card shadow-sm border-start border-3 border-primary">
                <div class="card-header bg-dark text-white fw-bold small d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-balance-scale me-1 text-primary"></i> CPL-KK: Ranah Keterampilan Khusus</span>
                    <span class="badge bg-primary">Khusus</span>
                </div>
                <div class="card-body p-0">
                    @include('admin.cpl.partials.table_render', ['dataCollection' => $khususData])
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
