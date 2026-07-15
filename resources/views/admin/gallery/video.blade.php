@extends('layouts_admin.admin')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Manajemen Galeri Video</h1>
    <p class="text-muted">Kelola tautan video YouTube untuk dipasang di galeri liputan, edukasi, maupun sorotan utama profil prodi.</p>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show py-2 small" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="padding: 0.5rem 0.75rem;"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger py-1 small">
            <ul class="mb-0 ps-3">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-xl-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white fw-bold small py-2">
                    <i class="bi bi-plus-circle-fill me-2"></i> Tambah Koleksi Video
                </div>
                <div class="card-body small p-3">
                    <form action="{{ route('admin.gallery.video.store') }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Judul Video / Liputan</label>
                            <input type="text" name="title" class="form-control form-control-sm" placeholder="Contoh: Kuliah Umum Perkawinan Kontemporer" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Tautan / URL YouTube</label>
                            <input type="text" name="youtube_url" class="form-control form-control-sm" placeholder="Contoh: https://www.youtube.com/watch?v=..." required>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-2">
                                <label class="form-label fw-semibold">Kategori</label>
                                <select name="category" class="form-select form-select-sm" required>
                                    <option value="Edukasi">Edukasi</option>
                                    <option value="Aktivitas">Aktivitas</option>
                                    <option value="Seminar">Seminar</option>
                                </select>
                            </div>
                            <div class="col-6 mb-2">
                                <label class="form-label fw-semibold">Durasi Pemutaran</label>
                                <input type="text" name="duration" class="form-control form-control-sm" placeholder="Contoh: 15 Menit">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="form-label fw-semibold">Ringkasan Deskripsi (Opsional)</label>
                            <textarea name="description" class="form-control form-control-sm" rows="3" placeholder="Tulis deskripsi singkat video (wajib diisi jika ini merupakan Video Sorotan Utama)"></textarea>
                        </div>
                        <div class="mb-3 form-check form-switch pt-1">
                            <input class="form-check-input" type="checkbox" name="is_featured" id="flexSwitchCheckDefault">
                            <label class="form-check-label fw-bold text-primary" for="flexSwitchCheckDefault">Jadikan Video Sorotan Utama</label>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success w-100">Simpan Video</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-8 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light text-dark fw-bold small py-2 border-bottom">
                    <i class="bi bi-collection-play-fill me-1"></i> Daftar Pemutar Video Terdaftar
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped align-middle border small">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 110px;">Thumbnail</th>
                                    <th>Judul & Status</th>
                                    <th>Kategori</th>
                                    <th>Durasi</th>
                                    <th class="text-center" style="width: 60px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($videos as $v)
                                <tr>
                                    <td>
                                        <img src="https://img.youtube.com/vi/{{ $v->youtube_id }}/mqdefault.jpg" class="rounded border w-100" style="height: 55px; object-fit: cover;">
                                    </td>
                                    <td>
                                        <strong class="text-dark d-block">{{ $v->title }}</strong>
                                        @if($v->is_featured)
                                            <span class="badge bg-warning text-dark style-badge fw-bold" style="font-size: 10px;"><i class="bi bi-star-fill"></i> SOROTAN UTAMA</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border px-2">{{ $v->category }}</span>
                                    </td>
                                    <td><small class="text-muted"><i class="bi bi-clock"></i> {{ $v->duration }}</small></td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.gallery.video.destroy', $v->id) }}" method="POST" onsubmit="return confirm('Hapus video dari daftar galeri?')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-link btn-sm text-danger p-0 m-0"><i class="bi bi-trash fs-5"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-3">Belum ada video dokumentasi yang ditambahkan ke galeri.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        {{ $videos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
