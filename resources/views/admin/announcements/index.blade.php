@extends('layouts_admin.admin')

@section('title', 'Pengumuman')
@section('page-title', 'Pengumuman')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
        <h6 class="font-weight-bolder text-dark mb-0">Daftar Pengumuman</h6>
        <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary btn-sm mb-0">
            <i class="fas fa-plus me-1"></i> Tambah Pengumuman
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
            <table class="table table-bordered table-striped align-items-center mb-0">
                <thead>
                    <tr>
                        <th width="50" class="text-center">No</th>
                        <th>Judul</th>
                        <th>Tanggal Publish</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Views</th>
                        <th width="160" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($announcements as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>
                                <span class="fw-bold text-dark">{{ $item->title }}</span>
                            </td>
                            <td>{{ $item->publish_date ?? '-' }}</td>
                            <td class="text-center">
                                @if($item->status == 'publish')
                                    <span class="badge bg-success">Publish</span>
                                @else
                                    <span class="badge bg-secondary">Draft</span>
                                @endif
                            </td>
                            <td class="text-center">{{ $item->views }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.announcements.show', $item) }}" class="btn btn-info btn-sm px-2 py-1" title="Lihat">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.announcements.edit', $item) }}" class="btn btn-warning btn-sm px-2 py-1 text-white" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.announcements.destroy', $item) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm px-2 py-1" onclick="return confirm('Yakin ingin menghapus pengumuman ini?')" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                Belum ada data pengumuman.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $announcements->links() }}
        </div>
    </div>
</div>
@endsection

