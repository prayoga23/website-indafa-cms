@extends('layouts_admin.admin')

@section('title', 'Manajemen Pengguna & Hak Akses')
@section('page-title', 'Manajemen Pengguna & Role')

@section('content')
<div class="container-fluid py-2">

    {{-- Alert Messages --}}
    @if(session('success'))
        <div class="alert alert-success text-white alert-dismissible fade show shadow-sm mb-4" role="alert" style="background: linear-gradient(135deg, #059669 0%, #10b981 100%); border: none; border-radius: 0.75rem;">
            <div class="d-flex align-items-center">
                <i class="material-symbols-rounded text-lg me-2">check_circle</i>
                <span class="text-sm font-weight-bold">{{ session('success') }}</span>
            </div>
            <button type="button" class="btn-close text-white text-sm opacity-10" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger text-white alert-dismissible fade show shadow-sm mb-4" role="alert" style="background: linear-gradient(135deg, #dc2626 0%, #ef4444 100%); border: none; border-radius: 0.75rem;">
            <div class="d-flex align-items-center">
                <i class="material-symbols-rounded text-lg me-2">error</i>
                <span class="text-sm font-weight-bold">{{ session('error') }}</span>
            </div>
            <button type="button" class="btn-close text-white text-sm opacity-10" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Header Banner & Action --}}
    <div class="card mb-4 border-0 shadow-sm" style="border-radius: 1rem; background: linear-gradient(135deg, #0b5345 0%, #07352c 100%);">
        <div class="card-body p-4 text-white">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                <div>
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <span class="badge" style="background: rgba(204, 164, 59, 0.25); color: #dfb743; border: 1px solid rgba(204, 164, 59, 0.4);">Role-Based Access Control</span>
                        <span class="text-xxs opacity-7">Multi-Fakultas & Multi-Prodi</span>
                    </div>
                    <h3 class="text-white font-weight-bolder mb-1">Manajemen Pengguna & Jobdesk Kampus</h3>
                    <p class="text-sm opacity-8 mb-0">Kelola akun dosen, staf fakultas, pengelola prodi, serta batasan akses portal masing-masing secara terpusat.</p>
                </div>
                <div>
                    <a href="{{ route('admin.users.create') }}" class="btn mb-0 shadow-sm font-weight-bold d-inline-flex align-items-center text-dark" style="background: #dfb743; border-radius: 0.625rem; padding: 0.65rem 1.25rem;">
                        <i class="material-symbols-rounded me-2 text-md">person_add</i>
                        <span>Tambah Pengguna Baru</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Filter Card --}}
    <div class="card mb-4 border-0 shadow-sm" style="border-radius: 1rem;">
        <div class="card-body p-3">
            <form action="{{ route('admin.users.index') }}" method="GET" class="row g-2 align-items-center">
                <div class="col-12 col-md-4">
                    <div class="input-group input-group-outline">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari nama atau email pengguna...">
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <select name="role" class="form-select border ps-2" style="border-radius: 0.5rem; height: 42px; font-size: 0.875rem;">
                        <option value="">-- Semua Role / Peran --</option>
                        @foreach($roles as $key => $label)
                            <option value="{{ $key }}" {{ request('role') == $key ? 'selected' : '' }}>{{ $key }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <select name="faculty" class="form-select border ps-2" style="border-radius: 0.5rem; height: 42px; font-size: 0.875rem;">
                        <option value="">-- Semua Fakultas --</option>
                        @foreach($faculties as $fKey => $fLabel)
                            <option value="{{ $fKey }}" {{ request('faculty') == $fKey ? 'selected' : '' }}>{{ $fLabel }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-dark w-100 mb-0 shadow-none d-flex align-items-center justify-content-center" style="height: 42px; border-radius: 0.5rem;">
                        <i class="material-symbols-rounded text-sm me-1">filter_list</i>
                        <span>Filter</span>
                    </button>
                    @if(request()->anyFilled(['search', 'role', 'faculty', 'prodi']))
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary mb-0 shadow-none d-flex align-items-center" style="height: 42px; border-radius: 0.5rem;" title="Reset Filter">
                            <i class="material-symbols-rounded text-sm">refresh</i>
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>

    {{-- Users Table Card --}}
    <div class="card border-0 shadow-sm" style="border-radius: 1rem; overflow: hidden;">
        <div class="card-header bg-white py-3 px-4 border-bottom d-flex align-items-center justify-content-between">
            <h6 class="font-weight-bolder mb-0 text-dark d-flex align-items-center">
                <i class="material-symbols-rounded text-primary me-2">group</i>
                <span>Daftar Pengguna Sistem (Total: {{ $users->total() }})</span>
            </h6>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4">Pengguna</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Role / Peran</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">Jobdesk & Afiliasi</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 pe-4" width="160">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr class="border-bottom">
                            <td class="ps-4 py-3">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm rounded-circle d-flex align-items-center justify-content-center text-white text-xs font-weight-bold me-3 shadow-xs"
                                         style="background: {{ $user->isSuperAdmin() ? 'linear-gradient(135deg, #0b5345, #07352c)' : 'linear-gradient(135deg, #475569, #334155)' }};">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-0 text-sm font-weight-bold text-dark">{{ $user->name }}</h6>
                                        <span class="text-xs text-secondary">{{ $user->email }}</span>
                                        @if($user->phone)
                                            <span class="text-xxs text-muted"><i class="fa fa-phone me-1"></i>{{ $user->phone }}</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="ps-3 py-3">
                                @if($user->isSuperAdmin())
                                    <span class="badge bg-gradient-dark text-xxs py-1 px-2 font-weight-bolder">Super Admin (Rektorat)</span>
                                @elseif($user->role === 'Admin Fakultas')
                                    <span class="badge text-xxs py-1 px-2 font-weight-bolder" style="background: #0284c7; color: white;">Admin Fakultas</span>
                                @elseif($user->role === 'Dosen Prodi')
                                    <span class="badge text-xxs py-1 px-2 font-weight-bolder" style="background: #0d9488; color: white;">Dosen / Staf Prodi</span>
                                @elseif($user->role === 'Admin Lembaga')
                                    <span class="badge text-xxs py-1 px-2 font-weight-bolder" style="background: #d97706; color: white;">Admin Lembaga</span>
                                @else
                                    <span class="badge bg-light text-dark border text-xxs py-1 px-2">{{ $user->role ?? 'User' }}</span>
                                @endif
                            </td>
                            <td class="ps-3 py-3">
                                <div class="d-flex flex-column gap-1">
                                    @if($user->isSuperAdmin())
                                        <span class="text-xs font-weight-bold text-success d-flex align-items-center">
                                            <i class="material-symbols-rounded text-sm me-1">all_inclusive</i>
                                            <span>Akses Seluruh Portal, Prodi & Master Data</span>
                                        </span>
                                    @else
                                        @if($user->faculty_code)
                                            <span class="text-xs font-weight-bold text-dark d-flex align-items-center">
                                                <i class="material-symbols-rounded text-sm me-1 text-primary">account_balance</i>
                                                <span>{{ $faculties[$user->faculty_code] ?? strtoupper($user->faculty_code) }}</span>
                                            </span>
                                        @endif
                                        @if($user->prodi_code)
                                            <span class="text-xs font-weight-bold text-info d-flex align-items-center">
                                                <i class="material-symbols-rounded text-sm me-1">school</i>
                                                <span>{{ $prodis[$user->prodi_code] ?? strtoupper($user->prodi_code) }}</span>
                                            </span>
                                        @endif
                                        @if($user->unit_code)
                                            <span class="text-xs font-weight-bold text-warning d-flex align-items-center">
                                                <i class="material-symbols-rounded text-sm me-1">domain</i>
                                                <span>{{ $units[$user->unit_code] ?? strtoupper($user->unit_code) }}</span>
                                            </span>
                                        @endif
                                    @endif
                                </div>
                            </td>
                            <td class="align-middle text-center text-sm py-3">
                                <form action="{{ route('admin.users.toggle-status', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    @if($user->is_active)
                                        <button type="submit" class="badge bg-success-subtle text-success border-0 px-2 py-1 font-weight-bold cursor-pointer"
                                                style="border-radius: 999px;"
                                                title="Klik untuk nonaktifkan"
                                                {{ $user->id === auth()->id() ? 'disabled' : '' }}>
                                            <i class="fa fa-circle text-xxs me-1"></i>Aktif
                                        </button>
                                    @else
                                        <button type="submit" class="badge bg-danger-subtle text-danger border-0 px-2 py-1 font-weight-bold cursor-pointer"
                                                style="border-radius: 999px;"
                                                title="Klik untuk aktifkan"
                                                {{ $user->id === auth()->id() ? 'disabled' : '' }}>
                                            <i class="fa fa-circle text-xxs me-1"></i>Nonaktif
                                        </button>
                                    @endif
                                </form>
                            </td>
                            <td class="align-middle text-center py-3 pe-4">
                                <div class="d-inline-flex align-items-center gap-1">
                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                       class="btn btn-outline-primary btn-sm mb-0 p-2 shadow-none"
                                       title="Edit Hak Akses">
                                        <i class="material-symbols-rounded text-sm">edit</i>
                                    </a>

                                    @if($user->id !== auth()->id())
                                        <form action="{{ route('admin.users.destroy', $user->id) }}"
                                              method="POST"
                                              class="d-inline m-0"
                                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun {{ $user->name }}? Akses akun ini akan segera dihentikan.');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm mb-0 p-2 shadow-none" title="Hapus Akun">
                                                <i class="material-symbols-rounded text-sm">delete</i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="d-flex flex-column align-items-center justify-content-center text-muted">
                                    <i class="material-symbols-rounded text-4xl mb-2 text-secondary">person_off</i>
                                    <h6 class="text-secondary font-weight-bold mb-1">Tidak Ada Data Pengguna</h6>
                                    <p class="text-xs mb-3">Tidak ditemukan pengguna yang sesuai dengan filter pencarian Anda.</p>
                                    <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-dark mb-0">Tambah Pengguna Baru</a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($users->hasPages())
                <div class="px-4 py-3 border-top d-flex justify-content-end">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>

</div>
@endsection
