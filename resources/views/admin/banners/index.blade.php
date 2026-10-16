@extends('layouts_admin.admin')

@section('title', 'Banner Homepage')
@section('page-title', 'Banner Homepage')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
        <h6 class="font-weight-bolder text-dark mb-0">Daftar Banner Homepage</h6>
        <a href="{{ route('admin.banners.create') }}" class="btn btn-primary btn-sm mb-0">
            <i class="fas fa-plus me-1"></i> Tambah Banner
        </a>
    </div>

    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible text-white fade show mb-3" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-items-center mb-0">
                <thead>
                    <tr>
                        <th width="50" class="text-center">No</th>
                        <th width="140" class="text-center">Banner</th>
                        <th>Judul & Subtitle</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aktif</th>
                        <th class="text-center">Urutan</th>
                        <th>Periode</th>
                        <th width="160" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($banners as $banner)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">
                                @if($banner->image)
                                    <img src="{{ asset('storage/'.$banner->image) }}" class="img-fluid rounded shadow-xs" style="max-height: 50px; object-fit: cover;" alt="{{ $banner->title }}">
                                @else
                                    <span class="text-muted small">No Image</span>
                                @endif
                            </td>
                            <td>
                                <strong class="text-dark">{{ $banner->title }}</strong>
                                @if($banner->subtitle)
                                    <br><small class="text-muted">{{ $banner->subtitle }}</small>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($banner->status == 'publish')
                                    <span class="badge bg-success">Publish</span>
                                @else
                                    <span class="badge bg-secondary">Draft</span>
                                @endif

                                @if($banner->faculty)
                                    <br><span class="badge bg-info mt-1">Fakultas: {{ $banner->faculty->name }}</span>
                                @endif

                                @if($banner->studyProgram)
                                    <br><span class="badge bg-warning mt-1">Prodi: {{ $banner->studyProgram->name }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($banner->is_active)
                                    <span class="badge bg-primary">Aktif</span>
                                @else
                                    <span class="badge bg-danger">Nonaktif</span>
                                @endif
                            </td>
                            <td class="text-center">{{ $banner->sort_order ?? 0 }}</td>
                            <td>
                                @if($banner->start_date || $banner->end_date)
                                    <small>{{ $banner->start_date?->format('d M Y') ?? '-' }} s/d {{ $banner->end_date?->format('d M Y') ?? '-' }}</small>
                                @else
                                    <small class="text-muted">Selamanya</small>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.banners.show', $banner->id) }}" class="btn btn-info btn-sm px-2 py-1" title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-warning btn-sm px-2 py-1 text-white" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm px-2 py-1" onclick="return confirm('Yakin ingin menghapus banner ini?')" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">
                                Belum ada banner yang ditambahkan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $banners->links() }}
        </div>
    </div>
</div>
@endsection

