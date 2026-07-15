@extends('layouts_admin.admin')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard Ringkasan Sistem')

@section('content')

{{-- ═══════════════════════════════════════════════
     BARIS 1: KOTAK WIDGET STATISTIK (SMALL BOXES)
     ════════════════════════════════════════════════ --}}
<div class="row">

    <div class="col-lg-3 col-6">
        <div class="small-box bg-info shadow-sm">
            <div class="inner">
                <h3>{{ $countFaculty }}</h3>
                <p>Total Fakultas</p>
            </div>
            <div class="icon">
                <i class="fas fa-university"></i>
            </div>
            <a href="{{ route('admin.faculties.index') }}" class="small-box-footer">
                Lihat Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-success shadow-sm">
            <div class="inner">
                <h3>{{ $countStudyProgram }}</h3>
                <p>Program Studi</p>
            </div>
            <div class="icon">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <a href="{{ route('admin.study-programs.index') }}" class="small-box-footer">
                Lihat Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning shadow-sm">
            <div class="inner text-white">
                <h3>{{ $countLecturer }}</h3>
                <p>Dosen & Staf</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="{{ route('admin.lecturers.index') }}" class="small-box-footer style="color: rgba(255,255,255,0.8) !important"">
                Lihat Detail <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger shadow-sm">
            <div class="inner">
                <h3>{{ $countMessage }}</h3>
                <p>Pesan & Aspirasi</p>
            </div>
            <div class="icon">
                <i class="fas fa-envelope"></i>
            </div>
            <div class="small-box-footer">
                Total Kotak Masuk
            </div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════════════════
     BARIS 2: STATISTIK MINI INFORMASI & TABEL KOTAK MASUK
     ════════════════════════════════════════════════ --}}
<div class="row mt-4">

    <div class="col-lg-8">
        <div class="card card-outline card-danger shadow-sm">
            <div class="card-header border-transparent">
                <h3 class="card-title fw-bold text-secondary">
                    <i class="fas fa-inbox text-danger me-2"></i> Aspirasi & Pesan Terbaru
                </h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table m-0 table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3">Pengirim</th>
                                <th>NIM/Email</th>
                                <th>Kategori / Subjek</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($latestMessages as $msg)
                            <tr>
                                <td class="ps-3 fw-semibold text-dark">{{ $msg->name }}</td>
                                <td><span class="text-secondary small">{{ $msg->identity }}</span></td>
                                <td>
                                    <span class="badge bg-light text-dark border px-2.5 py-1.5 rounded">
                                        {{ $msg->subject }}
                                    </span>
                                </td>
                                <td>
                                    <span class="text-muted small">
                                        {{ $msg->created_at->diffForHumans() }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted small">
                                    <i class="fas fa-comment-slash d-block fs-3 mb-2 text-silver"></i>
                                    Belum ada aspirasi atau pesan masuk dari halaman depan.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card card-outline card-secondary shadow-sm">
            <div class="card-header">
                <h3 class="card-title fw-bold text-secondary">
                    <i class="fas fa-folder-open text-primary me-2"></i> Ringkasan Publikasi
                </h3>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <div>
                            <i class="fas fa-newspaper text-info me-2"></i> Artikel Berita
                        </div>
                        <span class="badge bg-info rounded-pill px-3">{{ $countNews }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <div>
                            <i class="fas fa-bullhorn text-warning me-2"></i> Pengumuman Akademik
                        </div>
                        <span class="badge bg-warning text-white rounded-pill px-3">{{ $countAnnouncement }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center py-3">
                        <div>
                            <i class="fas fa-calendar-alt text-success me-2"></i> Agenda Kegiatan
                        </div>
                        <span class="badge bg-success rounded-pill px-3">{{ $countAgenda }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>

@endsection
