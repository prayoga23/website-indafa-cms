@extends('layouts_admin.admin')

@section('title', 'Tambah Program Studi')
@section('page-title', 'Tambah Program Studi')

@section('content')

<div class="card card-primary">

    <div class="card-header">
        <h3 class="card-title">Form Tambah Program Studi</h3>
    </div>

    <form action="{{ route('admin.study-programs.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        @include('admin.study-programs.form')

        <div class="card-footer">

            <button type="submit"
                    class="btn btn-success">

                <i class="fas fa-save"></i>
                Simpan

            </button>

            <a href="{{ route('admin.study-programs.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection
