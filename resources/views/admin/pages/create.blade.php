@extends('layouts_admin.admin')

@section('title', 'Tambah Halaman Baru')
@section('page-title', 'Tambah Halaman')

@section('content')

<div class="admin-form-card">

    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4><i class="fas fa-file-alt text-warning"></i> Tambah Halaman Baru</h4>
                <p>Buat halaman informasi statis baru untuk portal kampus atau unit kerja.</p>
            </div>
            <a href="{{ route('admin.pages.index') }}" class="btn-secondary-custom btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar
            </a>
        </div>
    </div>

    <form action="{{ route('admin.pages.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        @include('admin.pages._form')

        <div class="p-3 p-md-4 bg-slate-50 border-t border-slate-200 d-flex align-items-center justify-content-between flex-wrap gap-3">
            <span class="text-xs text-slate-500">
                <i class="fas fa-info-circle text-emerald-600"></i> Pastikan field bertanda <span class="badge-req">* Wajib Diisi</span> telah diisi dengan benar.
            </span>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('admin.pages.index') }}" class="btn-secondary-custom">
                    <i class="fas fa-times"></i> Batal
                </a>
                <button type="submit" class="btn-brand-primary">
                    <i class="fas fa-save"></i> Simpan Halaman
                </button>
            </div>
        </div>

    </form>

</div>

@endsection
