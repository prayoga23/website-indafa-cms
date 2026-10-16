@extends('layouts_admin.admin')

@section('title', 'Fakultas')
@section('page-title', 'Data Fakultas')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
        <h6 class="font-weight-bolder text-dark mb-0">Daftar Fakultas</h6>
        <a href="{{ route('admin.faculties.create') }}" class="btn btn-primary btn-sm mb-0">
            <i class="fas fa-plus me-1"></i> Tambah Fakultas
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
                        <th width="90" class="text-center">Logo</th>
                        <th>Nama Fakultas</th>
                        <th>Dekan</th>
                        <th width="160" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($faculties as $faculty)
                        <tr>
                            <td class="text-center">
                                @if($faculty->logo)
                                    <img src="{{ asset('storage/'.$faculty->logo) }}" width="50" class="img-fluid rounded" alt="{{ $faculty->name }}">
                                @else
                                    <span class="text-muted small">-</span>
                                @endif
                            </td>
                            <td>
                                <span class="fw-bold text-dark">{{ $faculty->name }}</span>
                            </td>
                            <td>{{ $faculty->dean ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.faculties.edit', $faculty->id) }}" class="btn btn-warning btn-sm px-2 py-1 text-white" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.faculties.destroy', $faculty->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus fakultas ini?')" class="btn btn-danger btn-sm px-2 py-1" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">
                                Belum ada data fakultas.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $faculties->links() }}
        </div>
    </div>
</div>
@endsection

