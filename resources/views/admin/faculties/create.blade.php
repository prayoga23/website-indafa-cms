@extends('layouts_admin.admin')

@section('title', 'Tambah Fakultas')
@section('page-title', 'Tambah Fakultas')

@section('content')

<div class="card">

    <form action="{{ route('admin.faculties.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        @include('admin.faculties.form')

        <div class="card-footer">

            <button class="btn btn-success">
                Simpan
            </button>

            <a href="{{ route('admin.faculties.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </div>

    </form>

</div>

@endsection
