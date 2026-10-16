@extends('layouts_admin.admin')

@section('title', 'Kelola Visi Misi & Tujuan')
@section('page-title', 'Visi, Misi & Tujuan')

@section('content')

<div class="admin-form-card">

    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4><i class="fas fa-compass text-warning"></i> Manajemen Visi, Misi & Tujuan Kampus</h4>
                <p>Rumuskan arah strategis, cita-cita keilmuan, dan tujuan institusional IAI Darul Falah.</p>
            </div>
            <span class="badge bg-white text-emerald-800 text-xs px-3 py-2 rounded-full font-bold shadow-sm">
                <i class="fas fa-check-circle text-emerald-600"></i> Profil Utama
            </span>
        </div>
    </div>

    <div class="p-3 p-md-4">

        {{-- SECTION 1: EDIT VISI UTAMA --}}
        <div class="form-section-card">
            <div class="form-section-header">
                <div class="form-section-icon">
                    <i class="fas fa-eye"></i>
                </div>
                <div>
                    <h5 class="form-section-title">Visi Utama Institut / Program Studi</h5>
                    <p class="form-section-desc">Rumusan cita-cita jangka panjang yang menjadi kompas seluruh aktivitas akademik.</p>
                </div>
            </div>

            @if(session('success_vision'))
                <div class="alert alert-success alert-dismissible fade show text-white text-xs mb-3" role="alert">
                    <i class="fas fa-check-circle me-1"></i> {{ session('success_vision') }}
                </div>
            @endif

            <form action="{{ route('admin.vision.update') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label-custom">
                        <span>Teks Visi Utama</span>
                        <span class="badge-req">* Wajib Diisi</span>
                    </label>
                    <textarea name="vision_text"
                              class="form-control-custom"
                              rows="3"
                              required
                              placeholder="Tuliskan rumusan visi di sini...">{{ old('vision_text', $vision->vision_text ?? '') }}</textarea>
                    <div class="form-hint">
                        <i class="fas fa-info-circle"></i>
                        <span>Rumusan visi yang akan ditampilkan di laman visi misi website.</span>
                    </div>
                </div>
                <button type="submit" class="btn-brand-primary">
                    <i class="fas fa-save"></i> Perbarui Teks Visi
                </button>
            </form>
        </div>

        {{-- SECTION 2: FORM TAMBAH POIN BARU (MISI / TUJUAN) --}}
        <div class="form-section-card">
            <div class="form-section-header">
                <div class="form-section-icon">
                    <i class="fas fa-plus-circle"></i>
                </div>
                <div>
                    <h5 class="form-section-title">Tambah Butir Poin Baru (Misi / Tujuan)</h5>
                    <p class="form-section-desc">Tambahkan langkah strategis misi atau capaian tujuan institusional.</p>
                </div>
            </div>

            @if(session('success_item'))
                <div class="alert alert-success alert-dismissible fade show text-white text-xs mb-3" role="alert">
                    <i class="fas fa-check-circle me-1"></i> {{ session('success_item') }}
                </div>
            @endif

            <form action="{{ route('admin.vision.item.store') }}" method="POST">
                @csrf
                <div class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label class="form-label-custom">
                            <span>Kategori Poin</span>
                            <span class="badge-req">* Wajib</span>
                        </label>
                        <select name="type" class="form-select-custom" required>
                            <option value="mission">MISI</option>
                            <option value="objective">TUJUAN</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label-custom">
                            <span>Isi Kandungan Butir Poin</span>
                            <span class="badge-req">* Wajib Diisi</span>
                        </label>
                        <input type="text"
                               name="content"
                               class="form-control-custom"
                               placeholder="Contoh: Menyelenggarakan riset berkala terindeks nasional..."
                               required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label-custom">
                            <span>Nomor Urut</span>
                            <span class="badge-req">* Wajib</span>
                        </label>
                        <div class="d-flex gap-2">
                            <input type="number"
                                   name="order_position"
                                   class="form-control-custom"
                                   value="1"
                                   min="1"
                                   style="max-width: 90px;"
                                   required>
                            <button type="submit" class="btn-brand-primary flex-grow-1 justify-content-center">
                                <i class="fas fa-plus"></i> Tambah
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        {{-- SECTION 3: DAFTAR MISI & DAFTAR TUJUAN --}}
        <div class="row g-4">
            {{-- TABEL LIST DATA MISI --}}
            <div class="col-lg-6">
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
                    <div class="p-3 bg-slate-50 border-b border-slate-200 d-flex align-items-center justify-content-between">
                        <span class="font-bold text-sm text-slate-800 d-flex align-items-center gap-2">
                            <i class="fas fa-rocket text-emerald-600"></i> Daftar Butir MISI
                        </span>
                        <span class="badge bg-emerald-100 text-emerald-800 text-xxs font-bold">{{ count($missions) }} Butir</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0 align-middle">
                            <thead class="bg-slate-50 text-xxs text-slate-500 uppercase">
                                <tr>
                                    <th class="text-center" width="15%">No</th>
                                    <th width="70%">Isi Kandungan Misi</th>
                                    <th class="text-center" width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($missions as $mission)
                                <tr>
                                    <td class="text-center font-bold text-slate-700">{{ $mission->order_position }}</td>
                                    <td class="text-sm text-slate-600">{{ $mission->content }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.vision.item.destroy', $mission->id) }}" method="POST" onsubmit="return confirm('Hapus poin misi ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-rose-600 p-1 mb-0" title="Hapus">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center text-slate-400 py-4 text-xs">Belum ada rincian misi tersimpan.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- TABEL LIST DATA TUJUAN --}}
            <div class="col-lg-6">
                <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-sm">
                    <div class="p-3 bg-slate-50 border-b border-slate-200 d-flex align-items-center justify-content-between">
                        <span class="font-bold text-sm text-slate-800 d-flex align-items-center gap-2">
                            <i class="fas fa-bullseye text-blue-600"></i> Daftar Butir TUJUAN
                        </span>
                        <span class="badge bg-blue-100 text-blue-800 text-xxs font-bold">{{ count($objectives) }} Butir</span>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0 align-middle">
                            <thead class="bg-slate-50 text-xxs text-slate-500 uppercase">
                                <tr>
                                    <th class="text-center" width="15%">No</th>
                                    <th width="70%">Isi Kandungan Tujuan</th>
                                    <th class="text-center" width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($objectives as $obj)
                                <tr>
                                    <td class="text-center font-bold text-slate-700">{{ $obj->order_position }}</td>
                                    <td class="text-sm text-slate-600">{{ $obj->content }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.vision.item.destroy', $obj->id) }}" method="POST" onsubmit="return confirm('Hapus poin tujuan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-rose-600 p-1 mb-0" title="Hapus">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center text-slate-400 py-4 text-xs">Belum ada rincian tujuan tersimpan.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
