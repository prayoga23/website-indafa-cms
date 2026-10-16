@extends('layouts_admin.admin')

@section('title', 'Data Dosen')
@section('page-title', 'Data Dosen')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Daftar Dosen Pengajar</h5>
        <a href="{{ route('admin.lecturers.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus mr-1"></i> Tambah Dosen
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="thead-light">
                    <tr>
                        <th width="70" class="text-center">Foto</th>
                        <th>Nama Dosen</th>
                        <th>Fakultas</th>
                        <th>Program Studi</th>
                        <th>NIDN</th>
                        <th>Jabatan</th>
                        <th width="150" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lecturers as $lecturer)
                    <tr>
                        <td class="text-center">
                            @if($lecturer->photo)
                                <img src="{{ asset('storage/' . $lecturer->photo) }}" width="48" height="48" class="rounded-circle" style="object-fit: cover;" alt="{{ $lecturer->name }}">
                            @else
                                <div class="rounded-circle bg-secondary text-white d-inline-flex align-items-center justify-content-center" style="width: 48px; height: 48px; font-size: 1.1rem;">
                                    <i class="fas fa-user"></i>
                                </div>
                            @endif
                        </td>
                        <td class="font-weight-bold">
                            <a href="{{ route('admin.lecturers.show', $lecturer->id) }}" class="text-dark">
                                {{ $lecturer->name }}
                            </a>
                        </td>
                        <td>{{ $lecturer->faculty->name ?? '-' }}</td>
                        <td>{{ $lecturer->studyProgram->name ?? '-' }}</td>
                        <td><code>{{ $lecturer->nidn ?? '-' }}</code></td>
                        <td><span class="badge bg-light text-dark border">{{ $lecturer->position ?? '-' }}</span></td>
                        <td class="text-center">
                            <a href="{{ route('admin.lecturers.show', $lecturer->id) }}" class="btn btn-info btn-sm text-white" title="Lihat Profil">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.lecturers.edit', $lecturer->id) }}" class="btn btn-warning btn-sm text-white" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.lecturers.destroy', $lecturer->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Hapus data dosen ini?')" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">
                            <i class="fas fa-user-tie fa-2x mb-2 d-block"></i>
                            Belum ada data dosen pengajar.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($lecturers->hasPages())
            <div class="mt-3 d-flex justify-content-end">
                {{ $lecturers->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
