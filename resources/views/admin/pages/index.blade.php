@extends('layouts_admin.admin')

@section('title', 'Halaman CMS')
@section('page-title', 'Halaman CMS')

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

{{-- CARD UTAMA DAFTAR HALAMAN --}}
<div class="card border-0 shadow-sm border-radius-xl mb-4 overflow-hidden" style="border: 1px solid #e2e8f0 !important; background: #ffffff;">

    {{-- CARD HEADER --}}
    <div class="card-header bg-white p-3 p-md-4 border-bottom d-flex flex-wrap align-items-center justify-content-between gap-3">
        <div class="d-flex align-items-center gap-3">
            <div class="d-inline-flex align-items-center justify-content-center border-radius-lg shadow-sm"
                 style="width: 44px; height: 44px; background: #e6f4ea; color: #0b5345;">
                <i class="material-symbols-rounded" style="font-size: 24px;">description</i>
            </div>
            <div>
                <h5 class="mb-0 font-weight-bolder text-dark">Daftar Halaman CMS</h5>
                <p class="text-xs text-secondary mb-0">Kelola konten halaman statis, profil, unit lembaga, dan warta informasi</p>
            </div>
        </div>

        <div>
            <a href="{{ route('admin.pages.create') }}" class="btn btn-brand-primary mb-0 d-inline-flex align-items-center shadow-sm">
                <i class="material-symbols-rounded text-sm me-1.5">add_circle</i>
                <span>Tambah Halaman Baru</span>
            </a>
        </div>
    </div>

    {{-- CARD BODY / RESPONSIVE TABLE --}}
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table align-middle mb-0 table-hover" style="min-width: 720px;">
                <thead class="bg-light">
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 py-3 px-3" style="width: 5%;">No</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 py-3 px-3" style="width: 42%;">Judul &amp; Tautan URL</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 py-3 px-3" style="width: 25%;">Scope (Cakupan)</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 py-3 px-3" style="width: 13%;">Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 py-3 px-3" style="width: 15%;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($pages as $page)
                    <tr class="border-bottom">
                        {{-- NO --}}
                        <td class="text-center font-weight-bold text-secondary text-xs px-3 py-3">
                            {{ method_exists($pages, 'firstItem') && $pages->firstItem() ? $pages->firstItem() + $loop->index : $loop->iteration }}
                        </td>

                        {{-- JUDUL & SLUG --}}
                        <td class="px-3 py-3">
                            <div class="d-flex align-items-start">
                                <div class="rounded-circle d-flex align-items-center justify-content-center me-2.5 flex-shrink-0"
                                     style="width: 32px; height: 32px; background-color: #f1f5f9; color: #475569; margin-top: 2px;">
                                    <i class="material-symbols-rounded text-sm">article</i>
                                </div>
                                <div class="d-flex flex-column">
                                    <a href="{{ route('admin.pages.edit', $page) }}"
                                       class="text-sm font-weight-bolder text-dark text-decoration-none mb-1 hover-brand"
                                       title="Edit halaman ini">
                                        {{ $page->title }}
                                    </a>
                                    <div class="d-inline-flex align-items-center gap-1 flex-wrap">
                                        <span class="text-xxs font-monospace px-1.5 py-0.5 rounded border"
                                              style="background-color: #f8fafc; color: #475569; border-color: #e2e8f0 !important;">
                                            /halaman/{{ $page->slug }}
                                        </span>
                                        <a href="{{ route('page.show', $page->slug) }}"
                                           target="_blank"
                                           class="text-secondary hover-brand d-inline-flex align-items-center text-xxs ms-1"
                                           title="Buka pratinjau halaman di website">
                                            <i class="material-symbols-rounded" style="font-size: 13px;">open_in_new</i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>

                        {{-- SCOPE (JELAS, KONTRAS, DAN MUDAH DIBACA) --}}
                        <td class="px-3 py-3">
                            @if($page->faculty)
                                <span class="d-inline-flex align-items-center text-xs font-weight-bold px-2.5 py-1 rounded-pill"
                                      style="background-color: #ecfdf5; color: #064e3b !important; border: 1px solid #a7f3d0;">
                                    <i class="material-symbols-rounded text-xs me-1">account_balance</i>
                                    <span>Fakultas: {{ $page->faculty->name }}</span>
                                </span>
                            @elseif($page->studyProgram)
                                <span class="d-inline-flex align-items-center text-xs font-weight-bold px-2.5 py-1 rounded-pill"
                                      style="background-color: #eff6ff; color: #1e3a8a !important; border: 1px solid #bfdbfe;">
                                    <i class="material-symbols-rounded text-xs me-1">school</i>
                                    <span>Prodi: {{ $page->studyProgram->name }}</span>
                                </span>
                            @else
                                <span class="d-inline-flex align-items-center text-xs font-weight-bold px-2.5 py-1 rounded-pill"
                                      style="background-color: #f1f5f9; color: #1e293b !important; border: 1px solid #cbd5e1;">
                                    <i class="material-symbols-rounded text-xs me-1">corporate_fare</i>
                                    <span>Kampus Umum</span>
                                </span>
                            @endif
                        </td>

                        {{-- STATUS (JELAS & TEGAS) --}}
                        <td class="text-center px-3 py-3">
                            @if($page->status == 'publish')
                                <span class="d-inline-flex align-items-center text-xs font-weight-bold px-2.5 py-1 rounded-pill"
                                      style="background-color: #d1fae5; color: #065f46 !important; border: 1px solid #6ee7b7;">
                                    <span style="width: 6px; height: 6px; border-radius: 50%; background-color: #10b981; display: inline-block; margin-right: 5px; box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.25);"></span>
                                    <span>Publish</span>
                                </span>
                            @else
                                <span class="d-inline-flex align-items-center text-xs font-weight-bold px-2.5 py-1 rounded-pill"
                                      style="background-color: #f1f5f9; color: #334155 !important; border: 1px solid #cbd5e1;">
                                    <span style="width: 6px; height: 6px; border-radius: 50%; background-color: #94a3b8; display: inline-block; margin-right: 5px;"></span>
                                    <span>Draft</span>
                                </span>
                            @endif
                        </td>

                        {{-- AKSI --}}
                        <td class="text-center px-3 py-3">
                            <div class="d-inline-flex align-items-center justify-content-center gap-1">
                                {{-- LIHAT --}}
                                <a href="{{ route('page.show', $page->slug) }}"
                                   target="_blank"
                                   class="btn btn-sm btn-icon-only mb-0 d-inline-flex align-items-center justify-content-center shadow-none"
                                   style="width: 32px; height: 32px; border-radius: 0.5rem; background-color: #f1f5f9; color: #475569; border: 1px solid #e2e8f0;"
                                   title="Buka Halaman di Tab Baru">
                                    <i class="material-symbols-rounded text-sm">visibility</i>
                                </a>

                                {{-- EDIT --}}
                                <a href="{{ route('admin.pages.edit', $page) }}"
                                   class="btn btn-sm btn-icon-only mb-0 d-inline-flex align-items-center justify-content-center shadow-none"
                                   style="width: 32px; height: 32px; border-radius: 0.5rem; background-color: #e6f4ea; color: #0b5345; border: 1px solid #bbf7d0;"
                                   title="Edit Halaman">
                                    <i class="material-symbols-rounded text-sm">edit</i>
                                </a>

                                {{-- HAPUS --}}
                                <form action="{{ route('admin.pages.destroy', $page) }}"
                                      method="POST"
                                      class="d-inline m-0"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus halaman \'{{ $page->title }}\'? Tindakan ini tidak dapat dibatalkan.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-sm btn-icon-only mb-0 d-inline-flex align-items-center justify-content-center shadow-none"
                                            style="width: 32px; height: 32px; border-radius: 0.5rem; background-color: #fee2e2; color: #dc2626; border: 1px solid #fecaca;"
                                            title="Hapus Halaman">
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
                                    <i class="material-symbols-rounded fs-3">description</i>
                                </div>
                                <h6 class="text-dark font-weight-bold mb-1">Belum Ada Halaman CMS</h6>
                                <p class="text-xs text-secondary mb-3">Klik tombol di bawah untuk membuat halaman informasi atau profil kampus pertama Anda.</p>
                                <a href="{{ route('admin.pages.create') }}" class="btn btn-brand-primary btn-sm mb-0">
                                    <i class="material-symbols-rounded text-sm me-1">add_circle</i>
                                    <span>Tambah Halaman Sekarang</span>
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
    @if(method_exists($pages, 'hasPages') && $pages->hasPages())
        <div class="card-footer px-3 py-3 border-top bg-white d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div class="text-xs text-secondary font-weight-normal">
                Menampilkan <span class="font-weight-bold text-dark">{{ $pages->firstItem() }}</span> s/d <span class="font-weight-bold text-dark">{{ $pages->lastItem() }}</span> dari <span class="font-weight-bold text-dark">{{ $pages->total() }}</span> total data
            </div>
            <div class="pagination-container">
                {{ $pages->links() }}
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
