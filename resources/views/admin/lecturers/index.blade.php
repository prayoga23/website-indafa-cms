@extends('layouts_admin.admin')

@section('title', 'Profil Dosen')
@section('page-title', 'Profil Dosen')

@section('content')

{{-- ALERT NOTIFIKASI --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible text-white fade show mb-4 border-0 shadow-sm" role="alert">
        <div class="d-flex align-items-center">
            <i class="material-symbols-rounded me-2 fs-5">check_circle</i>
            <div>
                <strong>Berhasil!</strong> {{ session('success') }}
            </div>
        </div>
        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible text-white fade show mb-4 border-0 shadow-sm" role="alert">
        <div class="d-flex align-items-center">
            <i class="material-symbols-rounded me-2 fs-5">error</i>
            <div>
                <strong>Gagal!</strong> {{ session('error') }}
            </div>
        </div>
        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

{{-- CARD UTAMA DATA DOSEN --}}
<div class="card border-0 shadow-sm border-radius-xl mb-4 overflow-hidden" style="border: 1px solid #e2e8f0 !important; background: #ffffff;">

    {{-- CARD HEADER --}}
    <div class="card-header bg-white p-3 p-md-4 border-bottom d-flex flex-wrap align-items-center justify-content-between gap-3">
        <div class="d-flex align-items-center gap-3">
            <div class="d-inline-flex align-items-center justify-content-center border-radius-lg shadow-sm"
                 style="width: 44px; height: 44px; background: #e6f4ea; color: #0b5345;">
                <i class="material-symbols-rounded" style="font-size: 24px;">groups</i>
            </div>
            <div>
                <h5 class="mb-0 font-weight-bolder text-dark">Daftar Profil Dosen &amp; Pengajar</h5>
                <p class="text-xs text-secondary mb-0">Kelola informasi biodata, jabatan, dan riwayat tenaga pendidik kampus</p>
            </div>
        </div>

        <div>
            <a href="{{ route('admin.lecturers.create') }}" class="btn btn-brand-primary mb-0 d-inline-flex align-items-center shadow-sm">
                <i class="material-symbols-rounded text-sm me-1.5">person_add</i>
                <span>Tambah Dosen Baru</span>
            </a>
        </div>
    </div>

    {{-- CARD BODY / RESPONSIVE TABLE --}}
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table align-middle mb-0 table-hover" style="min-width: 840px;">
                <thead class="bg-light">
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 py-3 px-3" style="width: 5%;">No</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 py-3 px-3" style="width: 33%;">Dosen &amp; Identitas</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 py-3 px-3" style="width: 27%;">Fakultas &amp; Program Studi</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 py-3 px-3" style="width: 20%;">Jabatan &amp; Pendidikan</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 py-3 px-3" style="width: 15%;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($lecturers as $lecturer)
                    <tr class="border-bottom">
                        {{-- NO --}}
                        <td class="text-center font-weight-bold text-secondary text-xs px-3 py-3">
                            {{ method_exists($lecturers, 'firstItem') && $lecturers->firstItem() ? $lecturers->firstItem() + $loop->index : $loop->iteration }}
                        </td>

                        {{-- FOTO & NAMA --}}
                        <td class="px-3 py-3">
                            <div class="d-flex align-items-center">
                                @if($lecturer->photo)
                                    <img src="{{ asset('storage/'.$lecturer->photo) }}"
                                         alt="{{ $lecturer->name }}"
                                         class="rounded-circle shadow-xs me-2.5 flex-shrink-0"
                                         style="width: 44px; height: 44px; object-fit: cover; border: 2px solid #e2e8f0;">
                                @else
                                    <div class="rounded-circle d-flex align-items-center justify-content-center me-2.5 flex-shrink-0 text-white font-weight-bolder"
                                         style="width: 44px; height: 44px; background: linear-gradient(135deg, #0b5345 0%, #134e4a 100%); font-size: 1rem; border: 2px solid #e2e8f0;">
                                        {{ strtoupper(substr($lecturer->name, 0, 1)) }}
                                    </div>
                                @endif
                                <div class="d-flex flex-column">
                                    <span class="text-sm font-weight-bolder text-dark mb-0.5">
                                        {{ $lecturer->name }}
                                    </span>
                                    <div class="d-inline-flex align-items-center gap-1">
                                        @if($lecturer->nidn)
                                            <span class="text-xxs font-monospace px-1.5 py-0.5 rounded border"
                                                  style="background-color: #f8fafc; color: #334155; border-color: #cbd5e1 !important;">
                                                NIDN: {{ $lecturer->nidn }}
                                            </span>
                                        @else
                                            <span class="text-xxs text-secondary">NIDN: -</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </td>

                        {{-- FAKULTAS & PRODI --}}
                        <td class="px-3 py-3">
                            <div class="d-flex flex-column gap-1 align-items-start">
                                @if($lecturer->faculty)
                                    <span class="d-inline-flex align-items-center text-xs font-weight-bold px-2 py-0.5 rounded-pill"
                                          style="background-color: #ecfdf5; color: #064e3b !important; border: 1px solid #a7f3d0;">
                                        <i class="material-symbols-rounded text-xxs me-1">account_balance</i>
                                        <span>{{ $lecturer->faculty->name }}</span>
                                    </span>
                                @endif

                                @if($lecturer->studyProgram)
                                    <span class="d-inline-flex align-items-center text-xs font-weight-bold px-2 py-0.5 rounded-pill"
                                          style="background-color: #eff6ff; color: #1e3a8a !important; border: 1px solid #bfdbfe;">
                                        <i class="material-symbols-rounded text-xxs me-1">school</i>
                                        <span>{{ $lecturer->studyProgram->name }}</span>
                                    </span>
                                @endif

                                @if(!$lecturer->faculty && !$lecturer->studyProgram)
                                    <span class="text-xs text-secondary font-italic">Semua Unit / Umum</span>
                                @endif
                            </div>
                        </td>

                        {{-- JABATAN & PENDIDIKAN --}}
                        <td class="px-3 py-3">
                            <div class="d-flex flex-column">
                                <span class="text-xs font-weight-bold text-dark mb-0.5">
                                    {{ $lecturer->position ?: 'Dosen Pengajar' }}
                                </span>
                                @if($lecturer->education)
                                    <span class="text-xxs text-secondary d-inline-flex align-items-center">
                                        <i class="material-symbols-rounded text-xxs me-1 text-muted">school</i>
                                        <span>{{ $lecturer->education }}</span>
                                    </span>
                                @endif
                            </div>
                        </td>

                        {{-- AKSI --}}
                        <td class="text-center px-3 py-3">
                            <div class="d-inline-flex align-items-center justify-content-center gap-1.5">
                                {{-- EDIT --}}
                                <a href="{{ route('admin.lecturers.edit', $lecturer->id) }}"
                                   class="btn btn-sm btn-icon-only mb-0 d-inline-flex align-items-center justify-content-center shadow-none"
                                   style="width: 32px; height: 32px; border-radius: 0.5rem; background-color: #e6f4ea; color: #0b5345; border: 1px solid #bbf7d0;"
                                   title="Edit Data Dosen">
                                    <i class="material-symbols-rounded text-sm">edit</i>
                                </a>

                                {{-- HAPUS --}}
                                <form action="{{ route('admin.lecturers.destroy', $lecturer->id) }}"
                                      method="POST"
                                      class="d-inline m-0"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus data dosen \'{{ $lecturer->name }}\'? Tindakan ini tidak dapat dibatalkan.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-sm btn-icon-only mb-0 d-inline-flex align-items-center justify-content-center shadow-none"
                                            style="width: 32px; height: 32px; border-radius: 0.5rem; background-color: #fee2e2; color: #dc2626; border: 1px solid #fecaca;"
                                            title="Hapus Data Dosen">
                                        <i class="material-symbols-rounded text-sm">delete</i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <div class="rounded-circle d-flex align-items-center justify-content-center mb-2"
                                     style="width: 48px; height: 48px; background-color: #f1f5f9; color: #94a3b8;">
                                    <i class="material-symbols-rounded fs-3">groups</i>
                                </div>
                                <h6 class="text-dark font-weight-bold mb-1">Belum Ada Data Dosen</h6>
                                <p class="text-xs text-secondary mb-3">Klik tombol di bawah untuk menambahkan profil dosen dan staf pengajar kampus.</p>
                                <a href="{{ route('admin.lecturers.create') }}" class="btn btn-brand-primary btn-sm mb-0">
                                    <i class="material-symbols-rounded text-sm me-1">person_add</i>
                                    <span>Tambah Dosen Sekarang</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- CARD FOOTER (PAGINATION) --}}
    @if(method_exists($lecturers, 'hasPages') && $lecturers->hasPages())
        <div class="card-footer px-3 py-3 border-top bg-white d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div class="text-xs text-secondary font-weight-normal">
                Menampilkan <span class="font-weight-bold text-dark">{{ $lecturers->firstItem() }}</span> s/d <span class="font-weight-bold text-dark">{{ $lecturers->lastItem() }}</span> dari <span class="font-weight-bold text-dark">{{ $lecturers->total() }}</span> total dosen
            </div>
            <div class="pagination-container">
                {{ $lecturers->links() }}
            </div>
        </div>
    @endif

</div>

@endsection

@push('css')
<style>
    .hover-brand:hover {
        color: #0b5345 !important;
    }
    .table-hover tbody tr:hover {
        background-color: #f8fafc !important;
    }
</style>
@endpush
