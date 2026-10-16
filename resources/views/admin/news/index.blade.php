@extends('layouts_admin.admin')

@section('title', 'Data Berita')
@section('page-title', 'Data Berita')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Daftar Berita Kampus</h5>
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus mr-1"></i> Tambah Berita
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="thead-light">
                    <tr>
                        <th width="90" class="text-center">Thumbnail</th>
                        <th>Judul Berita</th>
                        <th>Fakultas</th>
                        <th>Program Studi</th>
                        <th width="90" class="text-center">Status</th>
                        <th width="80" class="text-center">Views</th>
                        <th width="160" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($news as $item)
                    <tr>
                        <td class="text-center">
                            @if($item->thumbnail)
                                <img src="{{ asset('storage/' . $item->thumbnail) }}" width="70" height="48" class="rounded border" style="object-fit: cover;" alt="{{ $item->title }}">
                            @else
                                <div class="rounded bg-light text-muted d-inline-flex align-items-center justify-content-center border" style="width: 70px; height: 48px; font-size: 0.8rem;">
                                    <i class="fas fa-newspaper"></i>
                                </div>
                            @endif
                        </td>
                        <td class="font-weight-bold">
                            <a href="{{ route('admin.news.show', $item->id) }}" class="text-dark">
                                {{ $item->title }}
                            </a>
                            <div class="small text-muted">{{ $item->created_at ? $item->created_at->format('d M Y H:i') : '' }}</div>
                        </td>
                        <td>{{ $item->faculty->name ?? 'Umum' }}</td>
                        <td>{{ $item->studyProgram->name ?? 'Umum' }}</td>
                        <td class="text-center">
                            @if($item->status == 'publish')
                                <span class="badge bg-success">Publish</span>
                            @else
                                <span class="badge bg-secondary">Draft</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <span class="badge bg-light text-dark border">
                                <i class="fas fa-eye mr-1"></i> {{ number_format($item->views) }}
                            </span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.news.show', $item->id) }}" class="btn btn-info btn-sm text-white" title="Lihat">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-warning btn-sm text-white" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Hapus berita ini?')" class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">
                            <i class="fas fa-newspaper fa-2x mb-2 d-block"></i>
                            Belum ada berita yang dipublikasikan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($news->hasPages())
            <div class="mt-3 d-flex justify-content-end">
                {{ $news->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
