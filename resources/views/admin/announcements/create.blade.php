@extends('layouts_admin.admin')

@section('title', 'Tambah Pengumuman Baru')
@section('page-title', 'Tambah Pengumuman')

@section('content')

<div class="admin-form-card">

    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4><i class="fas fa-bullhorn text-warning"></i> Tambah Pengumuman Baru</h4>
                <p>Publikasikan informasi penting, surat edaran, atau agenda akademik ke website.</p>
            </div>
            <a href="{{ route('admin.announcements.index') }}" class="btn-secondary-custom btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar
            </a>
        </div>
    </div>

    <form action="{{ route('admin.announcements.store') }}"
          method="POST">

        @csrf

        @include('admin.announcements._form')

        <div class="p-3 p-md-4 bg-slate-50 border-t border-slate-200 d-flex align-items-center justify-content-between flex-wrap gap-3">
            <span class="text-xs text-slate-500">
                <i class="fas fa-info-circle text-emerald-600"></i> Pastikan field bertanda <span class="badge-req">* Wajib Diisi</span> telah diisi dengan benar.
            </span>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('admin.announcements.index') }}" class="btn-secondary-custom">
                    <i class="fas fa-times"></i> Batal
                </a>
                <button type="submit" class="btn-brand-primary">
                    <i class="fas fa-save"></i> Simpan Pengumuman
                </button>
            </div>
        </div>

    </form>

</div>

@endsection
