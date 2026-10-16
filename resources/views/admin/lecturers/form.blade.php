<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label font-weight-bold">Fakultas</label>
        <select name="faculty_id" class="form-control" required>
            <option value="">-- Pilih Fakultas --</option>
            @foreach($faculties as $f)
                <option value="{{ $f->id }}" @selected(old('faculty_id', $lecturer->faculty_id ?? '') == $f->id)>
                    {{ $f->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label font-weight-bold">Program Studi</label>
        <select name="study_program_id" class="form-control" required>
            <option value="">-- Pilih Program Studi --</option>
            @foreach($studyPrograms as $s)
                <option value="{{ $s->id }}" @selected(old('study_program_id', $lecturer->study_program_id ?? '') == $s->id)>
                    {{ $s->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="mb-3">
    <label class="form-label font-weight-bold">Nama Lengkap & Gelar</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $lecturer->name ?? '') }}" placeholder="Contoh: Dr. John Doe, M.Kom" required>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label font-weight-bold">NIDN</label>
        <input type="text" name="nidn" class="form-control" value="{{ old('nidn', $lecturer->nidn ?? '') }}" placeholder="Nomor Induk Dosen Nasional">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label font-weight-bold">Jabatan Fungsional</label>
        <input type="text" name="position" class="form-control" value="{{ old('position', $lecturer->position ?? '') }}" placeholder="Contoh: Lektor Kepala / Dosen Tetap">
    </div>
</div>

<div class="mb-3">
    <label class="form-label font-weight-bold">Pendidikan Terakhir</label>
    <input type="text" name="education" class="form-control" value="{{ old('education', $lecturer->education ?? '') }}" placeholder="Contoh: S3 Ilmu Komputer - Universitas Indonesia">
</div>

<div class="mb-3">
    <label class="form-label font-weight-bold">Foto Dosen</label>
    @if(isset($lecturer) && $lecturer->photo)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $lecturer->photo) }}" class="rounded-circle border" width="100" height="100" style="object-fit: cover;" alt="{{ $lecturer->name }}">
        </div>
    @endif
    <input type="file" name="photo" class="form-control" accept="image/*">
    <small class="text-muted">Format: JPG, JPEG, PNG. Kosongkan bila tidak ingin mengubah foto.</small>
</div>

<div class="mb-3">
    <label class="form-label font-weight-bold">Biografi Singkat / Profil Akademik</label>
    <textarea name="bio" rows="4" class="form-control" placeholder="Tuliskan biografi singkat atau keahlian dosen...">{{ old('bio', $lecturer->bio ?? '') }}</textarea>
</div>
