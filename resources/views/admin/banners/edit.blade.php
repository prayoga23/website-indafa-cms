@extends('layouts_admin.admin')

@section('title', 'Edit Banner')
@section('page-title', 'Edit Banner')

@section('content')

<div class="admin-form-card">

    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4><i class="fas fa-edit text-warning"></i> Edit Banner: {{ Str::limit($banner->title, 40) }}</h4>
                <p>Perbarui materi visual, teks, tautan, atau jadwal penayangan slide banner ini.</p>
            </div>
            <a href="{{ route('admin.banners.index') }}" class="btn-secondary-custom btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar
            </a>
        </div>
    </div>

    <div class="p-3 p-md-4">
        <form action="{{ route('admin.banners.update', $banner->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @method('PUT')

            @include('admin.banners._form')

        </form>
    </div>

</div>

@endsection
