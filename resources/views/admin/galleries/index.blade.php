@extends('layouts_admin.admin')

@section('title', 'Galeri Album')
@section('page-title', 'Galeri Album')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
        <h6 class="font-weight-bolder text-dark mb-0">Daftar Album Galeri</h6>
        <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary btn-sm mb-0">
            <i class="fas fa-plus me-1"></i> Tambah Album
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
                        <th width="120" class="text-center">Cover</th>
                        <th>Judul Album</th>
                        <th>Fakultas</th>
                        <th>Prodi</th>
                        <th class="text-center">Status</th>
                        <th width="160" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($galleries as $gallery)
                        <tr>
                            <td class="text-center">
                                @if($gallery->cover_image)
                                    <img src="{{ asset('storage/'.$gallery->cover_image) }}" class="img-fluid rounded" style="max-height: 55px; object-fit: cover;" alt="{{ $gallery->title }}">
                                @else
                                    <span class="text-muted small">No Cover</span>
                                @endif
                            </td>
                            <td>
                                <strong class="text-dark">{{ $gallery->title }}</strong>
                            </td>
                            <td>{{ $gallery->faculty?->name ?? '-' }}</td>
                            <td>{{ $gallery->studyProgram?->name ?? '-' }}</td>
                            <td class="text-center">
                                @if($gallery->status == 'publish')
                                    <span class="badge bg-success">Publish</span>
                                @else
                                    <span class="badge bg-secondary">Draft</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.galleries.show', $gallery) }}" class="btn btn-info btn-sm px-2 py-1" title="Lihat Foto">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-warning btn-sm px-2 py-1 text-white" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus album ini?')" class="btn btn-danger btn-sm px-2 py-1" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                Belum ada album galeri.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $galleries->links() }}
        </div>
    </div>
</div>
@endsection

