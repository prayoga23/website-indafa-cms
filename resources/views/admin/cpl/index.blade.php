@extends('layouts_admin.admin')

@section('title', 'Kelola Capaian Pembelajaran Lulusan (CPL)')
@section('page-title', 'CPL Program Studi')

@section('content')

<div class="admin-form-card">

    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4><i class="fas fa-award text-warning"></i> Manajemen Capaian Pembelajaran Lulusan (CPL)</h4>
                <p>Rumuskan 4 ranah kompetensi lulusan: Sikap (CPL-S), Pengetahuan (CPL-P), Keterampilan Umum (CPL-KU), dan Khusus (CPL-KK).</p>
            </div>
            <span class="badge bg-white text-emerald-800 text-xs px-3 py-2 rounded-full font-bold shadow-sm">
                <i class="fas fa-check-circle text-emerald-600"></i> Standar KKNI
            </span>
        </div>
    </div>

    <div class="p-3 p-md-4">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show text-white text-xs mb-4" role="alert">
                <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
            </div>
        @endif

        {{-- FORM INPUT RUMUSAN POIN CPL BARU --}}
        <div class="form-section-card mb-4">
            <div class="form-section-header">
                <div class="form-section-icon">
                    <i class="fas fa-plus-circle"></i>
                </div>
                <div>
                    <h5 class="form-section-title">Tambah Butir Rumusan CPL Baru</h5>
                    <p class="form-section-desc">Pilih ranah kompetensi, masukkan kode sub-number, dan deskripsikan capaian.</p>
                </div>
            </div>

            <form action="{{ route('admin.cpl.store') }}" method="POST">
                @csrf
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label-custom">
                            <span>Ranah Kualifikasi (Kategori)</span>
                            <span class="badge-req">* Wajib</span>
                        </label>
                        <select name="category" class="form-select-custom" required>
                            <option value="sikap">Ranah Sikap & Tata Nilai (CPL-S)</option>
                            <option value="pengetahuan">Ranah Penguasaan Pengetahuan (CPL-P)</option>
                            <option value="umum">Ranah Keterampilan Umum (CPL-KU)</option>
                            <option value="khusus">Ranah Keterampilan Khusus (CPL-KK)</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label-custom">
                            <span>Kode Sub-Number</span>
                            <span class="badge-req">* Wajib</span>
                        </label>
                        <input type="text"
                               name="code_label"
                               class="form-control-custom"
                               placeholder="Contoh: S1 / P3 / KU1 / KK2"
                               required>
                        <div class="form-hint">
                            <i class="fas fa-tag"></i>
                            <span>Kode acuan standar SN-DIKTI / KKNI.</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label-custom">
                            <span>Urutan Tampilan</span>
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

                <div class="mb-3">
                    <label class="form-label-custom">
                        <span>Deskripsi / Uraian Kompetensi Lulusan</span>
                        <span class="badge-req">* Wajib Diisi</span>
                    </label>
                    <textarea name="description"
                              class="form-control-custom"
                              rows="3"
                              placeholder="Tuliskan deskripsi rumusan capaian pembelajaran lulusan di sini..."
                              required></textarea>
                </div>

                <button type="submit" class="btn-brand-primary">
                    <i class="fas fa-save"></i> Simpan Butir CPL
                </button>
            </form>
        </div>

        {{-- SEKSI DATA GRID: 4 RANAH KOMPETENSI --}}
        <div class="row g-4">

            <div class="col-xl-6">
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
                    <div class="p-3 bg-emerald-50 border-b border-emerald-100 d-flex justify-content-between align-items-center">
                        <span class="font-bold text-xs text-emerald-900 d-flex align-items-center gap-2">
                            <i class="fas fa-gavel text-emerald-600"></i> CPL-S: Ranah Sikap & Tata Nilai
                        </span>
                        <span class="badge bg-emerald-600 text-white text-xxs font-bold">Sikap</span>
                    </div>
                    <div class="table-responsive">
                        @include('admin.cpl.partials.table_render', ['dataCollection' => $sikapData])
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
                    <div class="p-3 bg-amber-50 border-b border-amber-100 d-flex justify-content-between align-items-center">
                        <span class="font-bold text-xs text-amber-900 d-flex align-items-center gap-2">
                            <i class="fas fa-book text-amber-600"></i> CPL-P: Ranah Penguasaan Pengetahuan
                        </span>
                        <span class="badge bg-amber-600 text-white text-xxs font-bold">Pengetahuan</span>
                    </div>
                    <div class="table-responsive">
                        @include('admin.cpl.partials.table_render', ['dataCollection' => $pengetahuanData])
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
                    <div class="p-3 bg-cyan-50 border-b border-cyan-100 d-flex justify-content-between align-items-center">
                        <span class="font-bold text-xs text-cyan-900 d-flex align-items-center gap-2">
                            <i class="fas fa-cubes text-cyan-600"></i> CPL-KU: Ranah Keterampilan Umum
                        </span>
                        <span class="badge bg-cyan-600 text-white text-xxs font-bold">Umum</span>
                    </div>
                    <div class="table-responsive">
                        @include('admin.cpl.partials.table_render', ['dataCollection' => $umumData])
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
                    <div class="p-3 bg-blue-50 border-b border-blue-100 d-flex justify-content-between align-items-center">
                        <span class="font-bold text-xs text-blue-900 d-flex align-items-center gap-2">
                            <i class="fas fa-balance-scale text-blue-600"></i> CPL-KK: Ranah Keterampilan Khusus
                        </span>
                        <span class="badge bg-blue-600 text-white text-xxs font-bold">Khusus</span>
                    </div>
                    <div class="table-responsive">
                        @include('admin.cpl.partials.table_render', ['dataCollection' => $khususData])
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection
