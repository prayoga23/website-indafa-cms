@extends('layouts_admin.admin')

@section('title', 'Edit Fakultas')
@section('page-title', 'Edit Fakultas')

@section('content')

<div class="admin-form-card">

    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4><i class="fas fa-edit text-warning"></i> Edit Fakultas: {{ $faculty->name }}</h4>
                <p>Perbarui profil, pimpinan, logo, atau deskripsi fakultas ini.</p>
            </div>
            <a href="{{ route('admin.faculties.index') }}" class="btn-secondary-custom btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar
            </a>
        </div>
    </div>

    <form action="{{ route('admin.faculties.update', $faculty->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @include('admin.faculties.form')

        <div class="p-3 p-md-4 bg-slate-50 border-t border-slate-200 d-flex align-items-center justify-content-between flex-wrap gap-3">
            <span class="text-xs text-slate-500">
                <i class="fas fa-info-circle text-emerald-600"></i> Perubahan data fakultas akan langsung diperbarui pada website publik.
            </span>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('admin.faculties.index') }}" class="btn-secondary-custom">
                    <i class="fas fa-times"></i> Batal
                </a>
                <button type="submit" class="btn-brand-primary">
                    <i class="fas fa-save"></i> Perbarui Data Fakultas
                </button>
            </div>
        </div>

    </form>

</div>

@endsection
