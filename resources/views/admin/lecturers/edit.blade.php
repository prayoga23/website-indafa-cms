@extends('layouts_admin.admin')

@section('title', 'Edit Data Dosen')
@section('page-title', 'Edit Dosen')

@section('content')

<div class="admin-form-card">

    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4><i class="fas fa-edit text-warning"></i> Edit Dosen: {{ $lecturer->name }}</h4>
                <p>Perbarui profil, gelar, jabatan, pendidikan, atau foto dosen.</p>
            </div>
            <a href="{{ route('admin.lecturers.index') }}" class="btn-secondary-custom btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar
            </a>
        </div>
    </div>

    <form action="{{ route('admin.lecturers.update', $lecturer->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @include('admin.lecturers.form')

        <div class="p-3 p-md-4 bg-slate-50 border-t border-slate-200 d-flex align-items-center justify-content-between flex-wrap gap-3">
            <span class="text-xs text-slate-500">
                <i class="fas fa-info-circle text-emerald-600"></i> Perubahan data dosen akan langsung disinkronkan ke direktori dosen prodi.
            </span>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('admin.lecturers.index') }}" class="btn-secondary-custom">
                    <i class="fas fa-times"></i> Batal
                </a>
                <button type="submit" class="btn-brand-primary">
                    <i class="fas fa-save"></i> Perbarui Data Dosen
                </button>
            </div>
        </div>

    </form>

</div>

@endsection
