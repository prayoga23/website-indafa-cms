@extends('layouts_admin.admin')

@section('title','Tambah Dosen')
@section('page-title','Tambah Dosen')

@section('content')

<div class="card card-primary">

    <form action="{{ route('admin.lecturers.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        @include('admin.lecturers.form')

        <div class="card-footer">
            <button class="btn btn-success">
                <i class="fas fa-save"></i> Simpan
            </button>

            <a href="{{ route('admin.lecturers.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>
        </div>

    </form>

</div>

@endsection
