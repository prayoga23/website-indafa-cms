@extends('layouts_admin.admin')

@section('title', 'Edit Pengguna & Hak Akses')
@section('page-title', 'Edit Hak Akses Pengguna')

@section('content')
<div class="container-fluid py-2">

    {{-- Alert Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger text-white alert-dismissible fade show shadow-sm mb-4" role="alert" style="background: linear-gradient(135deg, #dc2626 0%, #ef4444 100%); border: none; border-radius: 0.75rem;">
            <div class="d-flex align-items-center mb-1">
                <i class="material-symbols-rounded text-lg me-2">error</i>
                <span class="text-sm font-weight-bold">Terdapat beberapa kesalahan input:</span>
            </div>
            <ul class="mb-0 text-xs ps-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close text-white text-sm opacity-10" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Main Form Card --}}
    <div class="card border-0 shadow-sm" style="border-radius: 1rem; overflow: hidden;">
        <div class="card-header p-4 text-white" style="background: linear-gradient(135deg, #0b5345 0%, #07352c 100%);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="text-white font-weight-bolder mb-1 d-flex align-items-center gap-2">
                        <i class="material-symbols-rounded">manage_accounts</i>
                        <span>Edit Data & Hak Akses: {{ $user->name }}</span>
                    </h5>
                    <p class="text-xs text-white opacity-8 mb-0">Ubah peranan, afiliasi unit, atau reset kata sandi akun pengguna.</p>
                </div>
                <a href="{{ route('admin.users.index') }}" class="btn btn-outline-light btn-sm mb-0 shadow-none" style="border-radius: 0.5rem;">
                    <i class="material-symbols-rounded text-sm me-1">arrow_back</i>
                    <span>Kembali</span>
                </a>
            </div>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    {{-- Bagian 1: Data Akun & Login --}}
                    <div class="col-12 col-lg-6">
                        <div class="p-3 border rounded-3 bg-light-subtle h-100">
                            <h6 class="font-weight-bold text-dark text-sm mb-3 d-flex align-items-center gap-2">
                                <i class="material-symbols-rounded text-primary">badge</i>
                                <span>Informasi Login & Identitas</span>
                            </h6>

                            <div class="mb-3">
                                <label class="form-label text-xs font-weight-bold text-dark text-uppercase">Nama Lengkap & Gelar <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                                       class="form-control border px-3 py-2 bg-white @error('name') is-invalid @enderror"
                                       style="border-radius: 0.5rem;">
                                @error('name')
                                    <div class="text-danger text-xxs mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-xs font-weight-bold text-dark text-uppercase">Alamat Email (Username Login) <span class="text-danger">*</span></label>
                                <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                                       class="form-control border px-3 py-2 bg-white @error('email') is-invalid @enderror"
                                       style="border-radius: 0.5rem;">
                                @error('email')
                                    <div class="text-danger text-xxs mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label text-xs font-weight-bold text-dark text-uppercase">Nomor WhatsApp / HP</label>
                                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                                       class="form-control border px-3 py-2 bg-white"
                                       style="border-radius: 0.5rem;">
                            </div>

                            <div class="p-3 bg-white border rounded-3 mb-3">
                                <span class="text-xs font-weight-bold text-dark d-block mb-1">Ganti Kata Sandi (Opsional)</span>
                                <span class="text-xxs text-secondary d-block mb-2">Kosongkan jika Anda tidak ingin mengubah password akun ini.</span>

                                <div class="row g-2">
                                    <div class="col-12 col-md-6 mb-2">
                                        <input type="password" name="password" minlength="6"
                                               class="form-control border px-3 py-2 bg-white @error('password') is-invalid @enderror"
                                               style="border-radius: 0.5rem;"
                                               placeholder="Password baru (opsional)">
                                        @error('password')
                                            <div class="text-danger text-xxs mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6 mb-2">
                                        <input type="password" name="password_confirmation" minlength="6"
                                               class="form-control border px-3 py-2 bg-white"
                                               style="border-radius: 0.5rem;"
                                               placeholder="Ulangi password baru">
                                    </div>
                                </div>
                            </div>

                            @if($user->id !== auth()->id())
                                <div class="form-check form-switch mt-2">
                                    <input class="form-check-input" type="checkbox" name="is_active" id="isActiveSwitch" value="1" {{ old('is_active', $user->is_active ? '1' : '0') == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label text-xs font-weight-bold text-dark" for="isActiveSwitch">Status Akun Aktif</label>
                                </div>
                            @else
                                <div class="text-xxs text-muted mt-2">
                                    <i class="fa fa-info-circle me-1"></i>Anda sedang login dengan akun ini (status selalu aktif).
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- Bagian 2: Penugasan Peran & Wewenang Kampus --}}
                    <div class="col-12 col-lg-6">
                        <div class="p-3 border rounded-3 bg-light-subtle h-100">
                            <h6 class="font-weight-bold text-dark text-sm mb-3 d-flex align-items-center gap-2">
                                <i class="material-symbols-rounded text-primary">security</i>
                                <span>Peran & Wewenang (RBAC Scope)</span>
                            </h6>

                            <div class="mb-3">
                                <label class="form-label text-xs font-weight-bold text-dark text-uppercase">Role / Peran Pengguna <span class="text-danger">*</span></label>
                                <select name="role" id="roleSelector" required class="form-select border px-3 py-2 bg-white @error('role') is-invalid @enderror" style="border-radius: 0.5rem; height: 44px;">
                                    @foreach($roles as $rKey => $rLabel)
                                        <option value="{{ $rKey }}" {{ old('role', $user->role) == $rKey ? 'selected' : '' }}>
                                            {{ $rLabel }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <div class="text-danger text-xxs mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Scope Fakultas --}}
                            <div class="mb-3" id="facultyGroup">
                                <label class="form-label text-xs font-weight-bold text-dark text-uppercase">Afiliasi Fakultas</label>
                                <select name="faculty_code" id="facultySelect" class="form-select border px-3 py-2 bg-white" style="border-radius: 0.5rem; height: 44px;">
                                    <option value="">-- Tidak Terikat Fakultas Tertentu --</option>
                                    @foreach($faculties as $fKey => $fLabel)
                                        <option value="{{ $fKey }}" {{ old('faculty_code', $user->faculty_code) == $fKey ? 'selected' : '' }}>
                                            {{ $fLabel }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-xxs text-secondary">Pengguna akan mendapatkan wewenang untuk mengelola portal fakultas ini.</span>
                            </div>

                            {{-- Scope Prodi --}}
                            <div class="mb-3" id="prodiGroup">
                                <label class="form-label text-xs font-weight-bold text-dark text-uppercase">Program Studi (Prodi) Penugasan</label>
                                <select name="prodi_code" id="prodiSelect" class="form-select border px-3 py-2 bg-white" style="border-radius: 0.5rem; height: 44px;">
                                    <option value="">-- Tidak Terikat Prodi Tertentu --</option>
                                    @foreach($prodis as $pKey => $pLabel)
                                        <option value="{{ $pKey }}" {{ old('prodi_code', $user->prodi_code) == $pKey ? 'selected' : '' }}>
                                            {{ $pLabel }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-xxs text-secondary">Pengguna dapat mengelola halaman website Program Studi ini secara penuh.</span>
                            </div>

                            {{-- Scope Lembaga --}}
                            <div class="mb-3" id="unitGroup">
                                <label class="form-label text-xs font-weight-bold text-dark text-uppercase">Unit / Lembaga Kampus</label>
                                <select name="unit_code" id="unitSelect" class="form-select border px-3 py-2 bg-white" style="border-radius: 0.5rem; height: 44px;">
                                    <option value="">-- Tidak Terikat Lembaga Tertentu --</option>
                                    @foreach($units as $uKey => $uLabel)
                                        <option value="{{ $uKey }}" {{ old('unit_code', $user->unit_code) == $uKey ? 'selected' : '' }}>
                                            {{ $uLabel }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-xxs text-secondary">Pengguna akan mengelola portal LPM atau LP2M.</span>
                            </div>

                            {{-- Dynamic Info Box --}}
                            <div id="roleInfoBox" class="alert mt-3 p-3 text-xs mb-0" style="background: #e0f2fe; border: 1px solid #bae6fd; color: #0369a1; border-radius: 0.625rem;">
                                <div class="d-flex align-items-start gap-2">
                                    <i class="material-symbols-rounded text-base mt-1">info</i>
                                    <span id="roleInfoText">Hak akses disesuaikan dengan peran dan unit yang dipilih.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="mt-4 pt-3 border-top d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary mb-0">Batal</a>
                    <button type="submit" class="btn text-white mb-0 font-weight-bold" style="background: linear-gradient(135deg, #0b5345 0%, #07352c 100%);">
                        <i class="material-symbols-rounded text-sm me-1">save</i>
                        <span>Simpan Perubahan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

{{-- Vanilla JS untuk interaktivitas pilihan role --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const roleSelector = document.getElementById('roleSelector');
        const facultyGroup = document.getElementById('facultyGroup');
        const prodiGroup = document.getElementById('prodiGroup');
        const unitGroup = document.getElementById('unitGroup');
        const roleInfoText = document.getElementById('roleInfoText');

        function updateRoleFields() {
            const role = roleSelector.value;

            facultyGroup.style.display = 'none';
            prodiGroup.style.display = 'none';
            unitGroup.style.display = 'none';

            if (role === 'Super Admin') {
                roleInfoText.innerHTML = '<strong>Super Admin (Rektorat):</strong> Memiliki akses penuh ke seluruh Portal Fakultas, Website Semua Prodi, Berita, Dokumen, Master Data, dan Pengaturan Sistem.';
            } else if (role === 'Admin Fakultas') {
                facultyGroup.style.display = 'block';
                roleInfoText.innerHTML = '<strong>Admin Fakultas:</strong> Hanya dapat mengelola Dashboard Fakultas terkait, Portal Fakultas, dan seluruh Program Studi yang berada di bawah naungan fakultas tersebut.';
            } else if (role === 'Dosen Prodi') {
                facultyGroup.style.display = 'block';
                prodiGroup.style.display = 'block';
                roleInfoText.innerHTML = '<strong>Dosen / Staf Prodi:</strong> Mengelola halaman Program Studi spesifik (misal <em>Prodi MBS</em>). Jika afiliasi fakultas dipilih (misal <em>FEBIT</em>), pengguna juga dapat mengakses portal fakultas terkait.';
            } else if (role === 'Admin Lembaga') {
                unitGroup.style.display = 'block';
                roleInfoText.innerHTML = '<strong>Admin Lembaga:</strong> Khusus mengelola portal LPM atau LP2M beserta pengumuman dan dokumen terkait lembaga tersebut.';
            } else {
                roleInfoText.innerHTML = 'Silakan pilih peran pengguna di atas untuk mengatur hak akses dan pembatasan menu.';
            }
        }

        roleSelector.addEventListener('change', updateRoleFields);
        updateRoleFields(); // Initial run on page load
    });
</script>
@endsection
