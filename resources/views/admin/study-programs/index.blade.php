@extends('layouts_admin.admin')

@section('title', 'Program Studi')
@section('page-title', 'Data Program Studi')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
        <h6 class="font-weight-bolder text-dark mb-0">Daftar Program Studi</h6>
        <a href="{{ route('admin.study-programs.create') }}" class="btn btn-primary btn-sm mb-0">
            <i class="fas fa-plus me-1"></i> Tambah Program Studi
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
                        <th width="80" class="text-center">Logo</th>
                        <th>Program Studi</th>
                        <th>Fakultas</th>
                        <th class="text-center">Jenjang</th>
                        <th class="text-center">Akreditasi</th>
                        <th>Ketua Prodi</th>
                        <th width="150" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($studyPrograms as $studyProgram)
                        <tr>
                            <td class="text-center">
                                @if($studyProgram->logo)
                                    <img src="{{ asset('storage/'.$studyProgram->logo) }}" width="45" class="img-fluid rounded" alt="{{ $studyProgram->name }}">
                                @else
                                    <span class="text-muted small">-</span>
                                @endif
                            </td>
                            <td>
                                <span class="fw-bold text-dark">{{ $studyProgram->name }}</span>
                            </td>
                            <td>{{ $studyProgram->faculty->name ?? '-' }}</td>
                            <td class="text-center">
                                <span class="badge bg-light text-dark border">{{ $studyProgram->degree ?? 'S1' }}</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-info">{{ $studyProgram->accreditation ?? '-' }}</span>
                            </td>
                            <td>{{ $studyProgram->head_of_program ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.study-programs.edit', $studyProgram->id) }}" class="btn btn-warning btn-sm px-2 py-1 text-white" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.study-programs.destroy', $studyProgram->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-danger btn-sm px-2 py-1" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">
                                Belum ada data program studi.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $studyPrograms->links() }}
        </div>
    </div>
</div>
@endsection

