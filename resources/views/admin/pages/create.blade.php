@extends('layouts_admin.admin')

@section('title','Tambah Halaman')
@section('page-title','Tambah Halaman')

@section('content')

<div class="card card-primary">

    <form action="{{ route('admin.pages.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="card-body">

            @include('admin.pages._form')

        </div>

        <div class="card-footer">

            <button class="btn btn-primary">
                Simpan
            </button>

        </div>

    </form>

</div>

@endsection
