@extends('layouts_admin.admin')

@section('title','Tambah Pengumuman')
@section('page-title','Tambah Pengumuman')

@section('content')

<div class="card card-primary">

    <form
        action="{{ route('admin.announcements.store') }}"
        method="POST">

        @csrf

        <div class="card-body">

            @include('admin.announcements._form')

        </div>

        <div class="card-footer">

            <button
                type="submit"
                class="btn btn-primary">

                Simpan

            </button>

            <a href="{{ route('admin.announcements.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection
