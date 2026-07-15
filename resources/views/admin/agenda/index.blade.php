@extends('layouts_admin.admin')

@section('title', 'Daftar Agenda Kampus')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Manajemen Agenda</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Agenda</li>
    </ol>

    {{-- Notifikasi Sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mb-4 shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
            <div>
                <i class="fas fa-calendar-alt me-1"></i> Daftar Agenda Terjadwal
            </div>
            <a href="{{ route('admin.agenda.create') }}" class="btn btn-light btn-sm text-primary fw-bold">
                <i class="fas fa-plus me-1"></i> Tambah Agenda Baru
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle" width="100%" cellspacing="0">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%" class="text-center">No</th>
                            <th width="35%">Judul Agenda</th>
                            <th width="15%">Tanggal</th>
                            <th width="12%">Waktu</th>
                            <th width="15%">Lokasi</th>
                            <th width="10%">Tag</th>
                            <th width="8%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($agendas as $agenda)
                        <tr>
                            <td class="text-center">{{ $loop->iteration + ($agendas->currentPage() - 1) * $agendas->perPage() }}</td>
                            <td class="fw-bold text-secondary">{{ $agenda->title }}</td>
                            <td>{{ \Carbon\Carbon::parse($agenda->event_date)->isoFormat('D MMMM Y') }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($agenda->start_time)->format('H:i') }}
                                {{ $agenda->end_time ? ' - ' . \Carbon\Carbon::parse($agenda->end_time)->format('H:i') : 'WIB' }}
                            </td>
                            <td>{{ $agenda->location }}</td>
                            <td>
                                @if($agenda->tag == 'Seminar')
                                    <span class="badge bg-success">Seminar</span>
                                @elseif($agenda->tag == 'Workshop')
                                    <span class="badge bg-warning text-dark">Workshop</span>
                                @elseif($agenda->tag == 'Wisuda')
                                    <span class="badge bg-danger">Wisuda</span>
                                @else
                                    <span class="badge bg-secondary">Lainnya</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a href="{{ route('admin.agenda.edit', $agenda->id) }}" class="btn btn-warning text-white" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.agenda.destroy', $agenda->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus agenda ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">Belum ada data agenda yang ditambahkan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination Links --}}
            <div class="d-flex justify-content-end mt-3">
                {{ $agendas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
