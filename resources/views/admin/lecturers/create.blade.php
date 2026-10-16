@extends('layouts_admin.admin')

@section('title', 'Tambah Dosen')
@section('page-title', 'Tambah Dosen')

@section('content')
<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card card-primary">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Form Tambah Dosen</h5>
                <a href="{{ route('admin.lecturers.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
            </div>

            <form action="{{ route('admin.lecturers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @include('admin.lecturers.form')
                </div>
                <div class="card-footer bg-light d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.lecturers.index') }}" class="btn btn-secondary mr-2">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i> Simpan Dosen
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
