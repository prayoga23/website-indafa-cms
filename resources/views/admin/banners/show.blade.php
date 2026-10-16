@extends('layouts_admin.admin')

@section('title', 'Detail Banner')
@section('page-title', 'Detail Banner')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6 class="font-weight-bolder text-dark mb-0">Detail Banner: {{ $banner->title }}</h6>
        <div>
            <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-warning btn-sm mb-0 text-white me-1">
                <i class="fas fa-edit me-1"></i> Edit
            </a>
            <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary btn-sm mb-0">
                Kembali
            </a>
        </div>
    </div>

    <div class="card-body">
        @if($banner->image)
            <div class="text-center mb-4">
                <img src="{{ asset('storage/'.$banner->image) }}" class="img-fluid rounded shadow-sm" style="max-height: 280px; object-fit: cover;" alt="{{ $banner->title }}">
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-items-center mb-0">
                <tbody>
                    <tr>
                        <th width="200">Judul Banner</th>
                        <td><strong>{{ $banner->title }}</strong></td>
                    </tr>
                    <tr>
                        <th>Sub Judul</th>
                        <td>{{ $banner->subtitle ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{!! nl2br(e($banner->description ?? '-')) !!}</td>
                    </tr>
                    <tr>
                        <th>Teks Tombol (CTA)</th>
                        <td>{{ $banner->button_text ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Link Tujuan</th>
                        <td>
                            @if($banner->button_link)
                                <a href="{{ $banner->button_link }}" target="_blank" class="text-primary">{{ $banner->button_link }}</a>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($banner->status == 'publish')
                                <span class="badge bg-success">Publish</span>
                            @else
                                <span class="badge bg-secondary">Draft</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Status Aktif</th>
                        <td>
                            @if($banner->is_active)
                                <span class="badge bg-primary">Aktif</span>
                            @else
                                <span class="badge bg-danger">Nonaktif</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Urutan</th>
                        <td>{{ $banner->sort_order ?? 0 }}</td>
                    </tr>
                    <tr>
                        <th>Periode Tayang</th>
                        <td>
                            {{ $banner->start_date?->format('d M Y') ?? 'Sekarang' }} s/d {{ $banner->end_date?->format('d M Y') ?? 'Selamanya' }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

