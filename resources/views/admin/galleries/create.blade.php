@extends('layouts_admin.admin')

@section('title', 'Tambah Album Galeri Baru')
@section('page-title', 'Tambah Album')

@section('content')

<div class="admin-form-card">

    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4><i class="fas fa-images text-warning"></i> Tambah Album Galeri Baru</h4>
                <p>Buat album baru untuk mengelompokkan dokumentasi foto kegiatan kampus.</p>
            </div>
            <a href="{{ route('admin.galleries.index') }}" class="btn-secondary-custom btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar
            </a>
        </div>
    </div>

    <form action="{{ route('admin.galleries.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        @include('admin.galleries._form')

        <div class="p-3 p-md-4 bg-slate-50 border-t border-slate-200 d-flex align-items-center justify-content-between flex-wrap gap-3">
            <span class="text-xs text-slate-500">
                <i class="fas fa-info-circle text-emerald-600"></i> Pastikan field bertanda <span class="badge-req">* Wajib Diisi</span> telah diisi dengan benar.
            </span>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('admin.galleries.index') }}" class="btn-secondary-custom">
                    <i class="fas fa-times"></i> Batal
                </a>
                <button type="submit" class="btn-brand-primary">
                    <i class="fas fa-save"></i> Simpan Album
                </button>
            </div>
        </div>

    </form>

</div>

@endsection
