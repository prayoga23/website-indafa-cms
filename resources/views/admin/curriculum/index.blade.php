@extends('layouts_admin.admin')

@section('title', 'Kelola Kurikulum Prodi')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Manajemen Akademik: Kurikulum</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active">Kurikulum</li>
    </ol>

    <div class="row">
        {{-- BLOK KIRI: MANAJEMEN TEKS PENGANTAR --}}
        <div class="col-lg-5 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-bold">
                    <i class="fas fa-edit me-1"></i> Pengantar Halaman Kurikulum
                </div>
                <div class="card-body">
                    @if(session('success_info'))
                        <div class="alert alert-success py-2">{{ session('success_info') }}</div>
                    @endif
                    <form action="{{ route('admin.curriculum.info.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold small text-muted">Teks Narasi Pengantar</label>
                            <textarea name="description" class="form-control" rows="12" required placeholder="Tulis landasan kurikulum KKNI/SN-DIKTI prodi di sini...">{{ old('description', $info->description ?? '') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100"><i class="fas fa-save me-1"></i> Perbarui Deskripsi</button>
                    </form>
                </div>
            </div>
        </div>

        {{-- BLOK KANAN: INPUT & LISTING DATA MATA KULIAH --}}
        <div class="col-lg-7 mb-4">
            {{-- FORM TAMBAH MATKUL --}}
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-success text-white fw-bold">
                    <i class="fas fa-plus-circle me-1"></i> Tambah Mata Kuliah Baru
                </div>
                <div class="card-body">
                    @if(session('success_course'))
                        <div class="alert alert-success py-2">{{ session('success_course') }}</div>
                    @endif
                    <form action="{{ route('admin.curriculum.course.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold small">Semester</label>
                                <select name="semester" class="form-select" required>
                                    @for($i = 1; $i <= 8; $i++)
                                        <option value="{{ $i }}">Semester {{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold small">Kode Matkul</label>
                                <input type="text" name="code" class="form-control" placeholder="USK401001" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label fw-bold small">Jenis</label>
                                <input type="text" name="type" class="form-control" value="Wajib" placeholder="Wajib/Pilihan" required>
                            </div>
                        </div>
                        <div class="row align-items-end">
                            <div class="col-md-9 mb-3">
                                <label class="form-label fw-bold small">Nama Mata Kuliah</label>
                                <input type="text" name="name" class="form-control" placeholder="Contoh: Akhlak Tasawuf" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label fw-bold small">Bobot SKS</label>
                                <input type="number" name="sks" class="form-control" value="2" min="1" max="6" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success px-4"><i class="fas fa-plus me-1"></i> Daftarkan Mata Kuliah</button>
                    </form>
                </div>
            </div>

            {{-- LIST DAFTAR PER SEMESTER --}}
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white fw-bold">
                    <i class="fas fa-list me-1"></i> Struktur Sebaran Mata Kuliah
                </div>
                <div class="card-body p-3" style="max-height: 480px; overflow-y: auto;">
                    @forelse($coursesGrouped as $semester => $courses)
                        <div class="mb-4 border rounded p-2 bg-light">
                            <h6 class="fw-bold text-success border-bottom pb-2 mb-2">Semester {{ $semester }}</h6>
                            <table class="table table-sm table-hover bg-white mb-0 align-middle">
                                <thead>
                                    <tr class="table-secondary small">
                                        <th>Kode</th>
                                        <th>Nama Mata Kuliah</th>
                                        <th class="text-center">SKS</th>
                                        <th>Sifat</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($courses as $course)
                                    <tr class="small">
                                        <td class="fw-semibold text-secondary">{{ $course->code }}</td>
                                        <td class="fw-bold text-dark">{{ $course->name }}</td>
                                        <td class="text-center">{{ $course->sks }}</td>
                                        <td><span class="badge bg-secondary">{{ $course->type }}</span></td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.curriculum.course.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Hapus mata kuliah ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm text-danger p-0"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @empty
                        <p class="text-center text-muted my-3 small">Belum ada data sebaran mata kuliah.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
