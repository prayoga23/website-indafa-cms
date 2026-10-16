@extends('layouts_admin.admin')

@section('title', 'Tambah Banner Baru')
@section('page-title', 'Tambah Banner')

@section('content')

<div class="admin-form-card">

    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4><i class="fas fa-plus-circle text-warning"></i> Tambah Banner Carousel Baru</h4>
                <p>Unggah slide visual hero banner untuk beranda utama atau unit fakultas.</p>
            </div>
            <a href="{{ route('admin.banners.index') }}" class="btn-secondary-custom btn-sm">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar
            </a>
        </div>
    </div>

    <div class="p-3 p-md-4">
        <form action="{{ route('admin.banners.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @include('admin.banners._form')

        </form>
    </div>

</div>

@endsection
