@extends('layouts_admin.admin')

@section('title','Detail Banner')
@section('page-title','Detail Banner')

@section('content')

<div class="card">

    <div class="card-header">

        <a href="{{ route('admin.banners.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>

    </div>

    <div class="card-body">

        <div class="text-center mb-4">

            <img src="{{ asset('storage/'.$banner->image) }}"
                 class="img-fluid rounded">

        </div>

        <table class="table table-bordered">

            <tr>
                <th width="250">Judul</th>
                <td>{{ $banner->title }}</td>
            </tr>

            <tr>
                <th>Sub Judul</th>
                <td>{{ $banner->subtitle }}</td>
            </tr>

            <tr>
                <th>Deskripsi</th>
                <td>{!! nl2br(e($banner->description)) !!}</td>
            </tr>

            <tr>
                <th>CTA</th>
                <td>{{ $banner->button_text }}</td>
            </tr>

            <tr>
                <th>Link</th>
                <td>{{ $banner->button_link }}</td>
            </tr>

            <tr>
                <th>Status</th>
                <td>{{ ucfirst($banner->status) }}</td>
            </tr>

            <tr>
                <th>Aktif</th>
                <td>{{ $banner->is_active ? 'Ya' : 'Tidak' }}</td>
            </tr>

            <tr>
                <th>Urutan</th>
                <td>{{ $banner->sort_order }}</td>
            </tr>

            <tr>
                <th>Mulai Tayang</th>
                <td>{{ $banner->start_date?->format('d M Y') }}</td>
            </tr>

            <tr>
                <th>Selesai Tayang</th>
                <td>{{ $banner->end_date?->format('d M Y') }}</td>
            </tr>

        </table>

    </div>

</div>

@endsection
