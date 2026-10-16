@extends('layouts_admin.admin')

@section('title', 'Tambah Program Studi')
@section('page-title', 'Tambah Program Studi')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header pb-0">
        <h6 class="font-weight-bolder text-dark mb-0">Form Tambah Program Studi</h6>
    </div>

    <form action="{{ route('admin.study-programs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.study-programs.form')

        <div class="card-footer pt-0 d-flex gap-2">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save me-1"></i> Simpan
            </button>
            <a href="{{ route('admin.study-programs.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </form>
</div>
@endsection

