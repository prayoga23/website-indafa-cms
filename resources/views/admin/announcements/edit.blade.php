@extends('layouts_admin.admin')

@section('title', 'Edit Pengumuman')
@section('page-title', 'Edit Pengumuman')

@section('content')

<div class="admin-form-card">

    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4><i class="fas fa-edit text-warning"></i> Edit Pengumuman: {{ Str::limit($announcement->title, 40) }}</h4>
                <p>Perbarui isi dan pengaturan tanggal publikasi pengumuman.</p>
            </div>
            <a href="{{ route('admin.announcements.index') }}" class="btn-secondary-custom btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar
            </a>
        </div>
    </div>

    <form action="{{ route('admin.announcements.update', $announcement) }}"
          method="POST">

        @csrf
        @method('PUT')

        @include('admin.announcements._form')

        <div class="p-3 p-md-4 bg-slate-50 border-t border-slate-200 d-flex align-items-center justify-content-between flex-wrap gap-3">
            <span class="text-xs text-slate-500">
                <i class="fas fa-info-circle text-emerald-600"></i> Perubahan data pengumuman akan langsung disinkronkan ke website.
            </span>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('admin.announcements.index') }}" class="btn-secondary-custom">
                    <i class="fas fa-times"></i> Batal
                </a>
                <button type="submit" class="btn-brand-primary">
                    <i class="fas fa-save"></i> Perbarui Pengumuman
                </button>
            </div>
        </div>

    </form>

</div>

@endsection
