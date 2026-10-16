@extends('layouts_admin.admin')

@section('title', 'Manajemen Jadwal Akademik')
@section('page-title', 'Jadwal Kuliah & Ujian')

@section('content')

<div class="admin-form-card">

    <div class="admin-form-header">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div>
                <h4><i class="fas fa-calendar-alt text-warning"></i> Manajemen Jadwal Akademik Terpadu</h4>
                <p>Kelola penjadwalan Kuliah harian, Ujian Tengah/Akhir Semester, serta Seminar & Sidang Tugas Akhir.</p>
            </div>
            <span class="badge bg-white text-emerald-800 text-xs px-3 py-2 rounded-full font-bold shadow-sm">
                <i class="fas fa-check-circle text-emerald-600"></i> Jadwal Akademik
            </span>
        </div>
    </div>

    <div class="p-3 p-md-4">

    {{-- Notifikasi Sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show py-2 small" role="alert">
            <i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="padding: 0.5rem 0.75rem;"></button>
        </div>
    @endif

    {{-- Notifikasi Error Validasi Global --}}
    @if ($errors->any())
        <div class="alert alert-danger py-2 small">
            <strong class="d-block mb-1"><i class="bi bi-exclamation-triangle-fill me-1"></i> Gagal menyimpan data:</strong>
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-xl-4 mb-4">
            <div class="accordion shadow-sm" id="formScheduleAccordion">

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button bg-light fw-bold text-dark small shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                            <i class="bi bi-journal-check me-2 text-success fs-5"></i> + Entri Jadwal Kuliah
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#formScheduleAccordion">
                        <div class="accordion-body small">
                            <form action="{{ route('admin.schedule.course.store') }}" method="POST">
                                @csrf
                                <div class="mb-2">
                                    <label class="form-label fw-semibold">Hari</label>
                                    <select name="day" class="form-select form-select-sm" required>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-semibold">Jam Pelaksanaan</label>
                                    <input type="text" name="time_range" class="form-control form-control-sm" placeholder="Contoh: 07:30 - 10:00 WIB" required>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-semibold">Mata Kuliah</label>
                                    <input type="text" name="subject_name" class="form-control form-control-sm" placeholder="Nama Matakuliah" required>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-semibold">Dosen Pengampu</label>
                                    <input type="text" name="lecturer_name" class="form-control form-control-sm" placeholder="Nama Dosen beserta Gelar" required>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-2">
                                        <label class="form-label fw-semibold">Ruangan</label>
                                        <input type="text" name="room" class="form-control form-control-sm" placeholder="Contoh: Ruang 2A" required>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label class="form-label fw-semibold">Tingkat Sem.</label>
                                        <input type="text" name="semester_level" class="form-control form-control-sm" placeholder="Contoh: Semester III" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-success w-100 mt-2">Simpan Jadwal Kuliah</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed bg-light fw-bold text-dark small shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                            <i class="bi bi-file-earmark-spreadsheet me-2 text-warning fs-5"></i> + Entri Jadwal Ujian (UTS/UAS)
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#formScheduleAccordion">
                        <div class="accordion-body small">
                            <form action="{{ route('admin.schedule.exam.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-7 mb-2">
                                        <label class="form-label fw-semibold">Tanggal Ujian</label>
                                        <input type="date" name="exam_date" id="exam_date" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="col-5 mb-2">
                                        <label class="form-label fw-semibold">Nama Hari</label>
                                        <input type="text" name="exam_day" id="exam_day" class="form-control form-control-sm" placeholder="Otomatis..." readonly style="background-color: #e9ecef;" required>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-semibold">Waktu / Jam Ujian</label>
                                    <input type="text" name="time_range" class="form-control form-control-sm" placeholder="Contoh: 08:00 - 09:30" required>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-semibold">Mata Kuliah Diuji</label>
                                    <input type="text" name="subject_name" class="form-control form-control-sm" placeholder="Nama Matakuliah" required>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-semibold">Ruang Ujian</label>
                                    <input type="text" name="room" class="form-control form-control-sm" placeholder="Contoh: Ruang 104" required>
                                </div>
                                <button type="submit" class="btn btn-sm btn-warning w-100 mt-2 text-white">Simpan Jadwal Ujian</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed bg-light fw-bold text-dark small shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                            <i class="bi bi-mortarboard-fill me-2 text-primary fs-5"></i> + Entri Jadwal Sidang / Sempro
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#formScheduleAccordion">
                        <div class="accordion-body small">
                            <form action="{{ route('admin.schedule.defense.store') }}" method="POST">
                                @csrf
                                <div class="mb-2">
                                    <label class="form-label fw-semibold">Kategori Acara</label>
                                    <select name="type" class="form-select form-select-sm" required>
                                        <option value="seminar proposal">Seminar Proposal (Sempro)</option>
                                        <option value="sidang munaqasyah">Sidang Munaqasyah</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-6 mb-2">
                                        <label class="form-label fw-semibold">Tanggal</label>
                                        <input type="date" name="event_date" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label class="form-label fw-semibold">Jam Pelaksanaan</label>
                                        <input type="text" name="time" class="form-control form-control-sm" placeholder="Contoh: 09:00 WIB" required>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-semibold">Judul Skripsi / Tugas Akhir</label>
                                    <textarea name="thesis_title" class="form-control form-control-sm" rows="2" placeholder="Tulis judul lengkap tugas akhir..." required></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-7 mb-2">
                                        <label class="form-label fw-semibold">Nama Mahasiswa</label>
                                        <input type="text" name="student_name" class="form-control form-control-sm" placeholder="Nama Lengkap" required>
                                    </div>
                                    <div class="col-5 mb-2">
                                        <label class="form-label fw-semibold">NIM</label>
                                        <input type="text" name="student_nim" class="form-control form-control-sm" placeholder="NIM" required>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label fw-semibold">Tempat / Ruang Sidang</label>
                                    <input type="text" name="room" class="form-control form-control-sm" placeholder="Contoh: Aula Madya Lt. 2" required>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary w-100 mt-2">Simpan Jadwal Sidang</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-xl-8 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-dark text-white fw-bold small">
                    <i class="bi bi-eye-fill me-1"></i> Preview & Manajer Data Jadwal Terpasang
                </div>
                <div class="card-body p-3" style="max-height: 680px; overflow-y: auto;">

                    <h6 class="fw-bold text-success border-bottom pb-1 mb-2 small"><i class="bi bi-journal-check me-1"></i> Data Jadwal Kuliah Aktif</h6>
                    <table class="table table-sm table-striped align-middle mb-4 border small">
                        <thead class="table-light">
                            <tr>
                                <th>Hari / Waktu</th>
                                <th>Mata Kuliah & Pengampu</th>
                                <th>Ruang / Sem</th>
                                <th class="text-center" style="width: 60px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($courses as $c)
                            <tr>
                                <td><span class="badge bg-success">{{ $c->day }}</span><br><small class="text-muted">{{ $c->time_range }}</small></td>
                                <td><strong>{{ $c->subject_name }}</strong><br><small class="text-secondary">{{ $c->lecturer_name }}</small></td>
                                <td><small>{{ $c->room }} / <span class="text-dark fw-semibold">{{ $c->semester_level }}</span></small></td>
                                <td class="text-center">
                                    <form action="{{ route('admin.schedule.course.destroy', $c->id) }}" method="POST" onsubmit="return confirm('Hapus jadwal kuliah ini?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-link btn-sm text-danger p-0 m-0"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center text-muted py-2">Belum ada data jadwal kuliah harian.</td></tr>
                            @endforelse
                        </tbody>
                    </table>

                    <h6 class="fw-bold text-warning border-bottom pb-1 mb-2 small"><i class="bi bi-file-earmark-spreadsheet me-1"></i> Data Jadwal Ujian (UTS/UAS) Aktif</h6>
                    <table class="table table-sm table-striped align-middle mb-4 border small">
                        <thead class="table-light">
                            <tr>
                                <th>Tanggal / Hari</th>
                                <th>Waktu / Jam</th>
                                <th>Mata Kuliah Tested</th>
                                <th>Ruangan</th>
                                <th class="text-center" style="width: 60px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($exams as $e)
                            <tr>
                                <td><strong>{{ date('d M Y', strtotime($e->exam_date)) }}</strong><br><small class="text-muted">{{ $e->exam_day }}</small></td>
                                <td><span class="badge bg-light text-dark border">{{ $e->time_range }}</span></td>
                                <td class="fw-semibold text-dark">{{ $e->subject_name }}</td>
                                <td><span class="text-secondary"><i class="bi bi-geo-alt small"></i> {{ $e->room }}</span></td>
                                <td class="text-center">
                                    <form action="{{ route('admin.schedule.exam.destroy', $e->id) }}" method="POST" onsubmit="return confirm('Hapus jadwal ujian ini?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-link btn-sm text-danger p-0 m-0"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="5" class="text-center text-muted py-2">Belum ada data jadwal pelaksanaan ujian.</td></tr>
                            @endforelse
                        </tbody>
                    </table>

                    <h6 class="fw-bold text-primary border-bottom pb-1 mb-2 small"><i class="bi bi-mortarboard-fill me-1"></i> Data Jadwal Seminar & Munaqasyah</h6>
                    <table class="table table-sm table-striped align-middle border small">
                        <thead class="table-light">
                            <tr>
                                <th>Kategori / Waktu</th>
                                <th>Nama / NIM</th>
                                <th>Judul Skripsi & Lokasi</th>
                                <th class="text-center" style="width: 60px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($defenses as $d)
                            <tr>
                                <td>
                                    <span class="badge {{ $d->type == 'seminar proposal' ? 'bg-warning text-dark' : 'bg-primary' }} text-uppercase" style="font-size: 9px; padding: 3px 6px;">{{ $d->type }}</span>
                                    <br><small class="text-muted d-block mt-1">{{ date('d M Y', strtotime($d->event_date)) }} - {{ $d->time }}</small>
                                </td>
                                <td><strong>{{ $d->student_name }}</strong><br><small class="text-secondary">{{ $d->student_nim }}</small></td>
                                <td>
                                    <span class="d-block text-truncate fw-semibold text-dark" style="max-width: 260px;" title="{{ $d->thesis_title }}">{{ $d->thesis_title }}</span>
                                    <small class="text-muted"><i class="bi bi-building"></i> Tempat: {{ $d->room }}</small>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('admin.schedule.defense.destroy', $d->id) }}" method="POST" onsubmit="return confirm('Hapus jadwal sidang ini?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-link btn-sm text-danger p-0 m-0"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="text-center text-muted py-2">Belum ada data jadwal ujian sidang tugas akhir.</td></tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    </div>
</div>

{{-- SCRIPT OTOMATISASI NAMA HARI BERDASARKAN KALENDER INPUT --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputDate = document.getElementById('exam_date');
        const inputDay = document.getElementById('exam_day');

        if(inputDate) {
            inputDate.addEventListener('change', function() {
                const dateValue = new Date(this.value);
                // Array nama hari dalam bahasa Indonesia
                const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                const dayName = days[dateValue.getDay()];

                if(!isNaN(dateValue.getTime())) {
                    inputDay.value = dayName;
                } else {
                    inputDay.value = '';
                }
            });
        }
    });
</script>
@endsection
