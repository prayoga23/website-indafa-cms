@extends('layouts_admin.admin')

@section('title','Tambah Album')
@section('page-title','Tambah Album')

@section('content')

<div class="card card-primary">

    <form
        action="{{ route('admin.galleries.store') }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf

        <div class="card-body">

            @include('admin.galleries._form')

        </div>

        <div class="card-footer">

            <button
                class="btn btn-primary">

                Simpan

            </button>

        </div>

    </form>

</div>

@endsection
