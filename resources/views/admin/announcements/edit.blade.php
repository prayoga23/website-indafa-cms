@extends('layouts_admin.admin')

@section('title','Edit Pengumuman')
@section('page-title','Edit Pengumuman')

@section('content')

<div class="card card-warning">

    <form
        action="{{ route('admin.announcements.update',$announcement) }}"
        method="POST">

        @csrf
        @method('PUT')

        <div class="card-body">

            @include('admin.announcements._form')

        </div>

        <div class="card-footer">

            <button
                type="submit"
                class="btn btn-warning">

                Update

            </button>

            <a href="{{ route('admin.announcements.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </form>

</div>

@endsection
