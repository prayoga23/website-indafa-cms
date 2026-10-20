@extends('layouts_admin.admin')

@section('title', 'Data Berita Kampus')
@section('page-title', 'Data Berita')

@section('content')

<div class="admin-form-card">

    {{-- HEADER KARTU --}}
    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
                <h4><i class="fas fa-newspaper text-warning"></i> Data & Publikasi Berita</h4>
                <p>Kelola seluruh rilis artikel, informasi kegiatan, dan publikasi resmi kampus IAI Darul Falah.</p>
            </div>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('admin.news.create') }}" class="btn-brand-primary shadow-sm">
                    <i class="fas fa-plus-circle me-1"></i> Tambah Berita Baru
                </a>
            </div>
        </div>
    </div>

    <div class="p-3 p-md-4">

        {{-- NOTIFIKASI SUKSES / ERROR --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show text-white text-xs mb-4" role="alert">
                <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show text-white text-xs mb-4" role="alert">
                <i class="fas fa-exclamation-circle me-1"></i> {{ session('error') }}
            </div>
        @endif

        {{-- TABEL RESPONSIVE BERITA --}}
        <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
            
            <div class="p-3 bg-slate-50 border-b border-slate-200 d-flex justify-content-between align-items-center flex-wrap gap-2">
                <span class="font-bold text-xs text-slate-800 d-flex align-items-center gap-2">
                    <i class="fas fa-list text-emerald-600"></i> Daftar Berita Terbit
                </span>
                <span class="badge bg-emerald-100 text-emerald-800 text-xxs font-bold">
                    Total: {{ $news->total() }} Berita
                </span>
            </div>

            <div class="table-responsive">
                <table class="table mb-0 align-middle table-hover">
                    <thead class="bg-slate-50 text-xxs text-slate-500 uppercase border-bottom border-slate-200">
                        <tr>
                            <th class="ps-3 text-center" style="width: 90px;">Thumbnail</th>
                            <th style="min-width: 250px;">Judul Berita</th>
                            <th style="min-width: 140px;">Fakultas</th>
                            <th style="min-width: 140px;">Program Studi</th>
                            <th class="text-center" style="width: 100px;">Status</th>
                            <th class="text-center" style="width: 90px;">Pembaca</th>
                            <th class="text-center pe-3" style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($news as $item)
                        <tr>
                            {{-- THUMBNAIL --}}
                            <td class="ps-3 text-center">
                                @if($item->thumbnail_url)
                                    <div class="position-relative d-inline-block">
                                        <img src="{{ $item->thumbnail_url }}"
                                             alt="{{ $item->title }}"
                                             class="rounded-lg border border-slate-200 shadow-sm"
                                             style="width: 72px; height: 48px; object-fit: cover;"
                                             onerror="this.onerror=null;this.parentElement.innerHTML='<div class=\'thumb-fallback-box mx-auto\' title=\'Gambar tidak dapat dimuat\'><i class=\'fas fa-image text-slate-400\'></i></div>';">
                                    </div>
                                @else
                                    <div class="thumb-fallback-box mx-auto" title="Belum ada gambar thumbnail">
                                        <i class="fas fa-image text-slate-400"></i>
                                    </div>
                                @endif
                            </td>

                            {{-- JUDUL --}}
                            <td>
                                <div class="font-bold text-slate-800 text-xs mb-1" style="line-height: 1.4;">
                                    {{ $item->title }}
                                </div>
                                <div class="d-flex align-items-center gap-2 text-xxs text-slate-500 flex-wrap">
                                    <span><i class="far fa-calendar-alt text-emerald-600 me-1"></i>{{ $item->created_at ? $item->created_at->format('d M Y, H:i') : '-' }}</span>
                                    <span>&bull;</span>
                                    <span><i class="far fa-user text-slate-400 me-1"></i>{{ $item->user->name ?? 'Admin' }}</span>
                                </div>
                            </td>

                            {{-- FAKULTAS --}}
                            <td>
                                @if($item->faculty)
                                    <span class="badge bg-emerald-50 text-emerald-800 border border-emerald-200 text-xxs px-2 py-1 rounded-md">
                                        {{ $item->faculty->name }}
                                    </span>
                                @else
                                    <span class="badge bg-slate-100 text-slate-600 text-xxs px-2 py-1 rounded-md">
                                        Umum (Kampus)
                                    </span>
                                @endif
                            </td>

                            {{-- PRODI --}}
                            <td>
                                @if($item->studyProgram)
                                    <span class="badge bg-sky-50 text-sky-800 border border-sky-200 text-xxs px-2 py-1 rounded-md">
                                        {{ $item->studyProgram->name }}
                                    </span>
                                @else
                                    <span class="text-xxs text-slate-400">Semua Prodi</span>
                                @endif
                            </td>

                            {{-- STATUS --}}
                            <td class="text-center">
                                @if($item->status == 'publish')
                                    <span class="badge bg-emerald-100 text-emerald-800 border border-emerald-300 text-xxs font-bold px-2 py-1 rounded-full">
                                        🟢 Publish
                                    </span>
                                @else
                                    <span class="badge bg-amber-100 text-amber-800 border border-amber-300 text-xxs font-bold px-2 py-1 rounded-full">
                                        🟡 Draft
                                    </span>
                                @endif
                            </td>

                            {{-- VIEWS --}}
                            <td class="text-center">
                                <span class="badge bg-slate-100 text-slate-700 text-xxs px-2 py-1 rounded font-medium">
                                    <i class="fas fa-eye text-slate-400 me-1"></i>{{ number_format($item->views ?? 0) }}
                                </span>
                            </td>

                            {{-- AKSI --}}
                            <td class="text-center pe-3">
                                <div class="d-flex align-items-center justify-content-center gap-1">
                                    <a href="{{ route('admin.news.show', $item->id) }}"
                                       class="btn btn-sm btn-outline-info p-1 px-2 mb-0 text-xxs rounded"
                                       title="Lihat Detail Berita">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <a href="{{ route('admin.news.edit', $item->id) }}"
                                       class="btn btn-sm btn-outline-warning p-1 px-2 mb-0 text-xxs rounded"
                                       title="Edit Berita">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('admin.news.destroy', $item->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-outline-danger p-1 px-2 mb-0 text-xxs rounded"
                                                title="Hapus Berita">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-slate-400 py-5 text-xs">
                                <i class="far fa-newspaper fa-3x d-block mb-3 text-slate-300"></i>
                                Belum ada berita yang diterbitkan. Silakan klik tombol <strong>Tambah Berita Baru</strong> di atas.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- PAGINATION --}}
            @if($news->hasPages())
                <div class="p-3 border-t border-slate-200 bg-slate-50 d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <span class="text-xxs text-slate-500">
                        Menampilkan {{ $news->firstItem() }} - {{ $news->lastItem() }} dari {{ $news->total() }} berita
                    </span>
                    <div>
                        {{ $news->links() }}
                    </div>
                </div>
            @endif

        </div>

    </div>

</div>

<style>
.thumb-fallback-box {
    width: 72px;
    height: 48px;
    background: #f1f5f9;
    border: 1px dashed #cbd5e1;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>

@endsection
