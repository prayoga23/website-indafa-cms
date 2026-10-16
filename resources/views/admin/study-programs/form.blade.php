<div class="card-body">
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label font-weight-bold">Fakultas <span class="text-danger">*</span></label>
                <select name="faculty_id" class="form-control border px-3 py-2" required>
                    <option value="">Pilih Fakultas</option>
                    @foreach($faculties as $faculty)
                        <option value="{{ $faculty->id }}" {{ old('faculty_id', $studyProgram->faculty_id ?? '') == $faculty->id ? 'selected' : '' }}>
                            {{ $faculty->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label font-weight-bold">Nama Program Studi <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control border px-3 py-2" value="{{ old('name', $studyProgram->name ?? '') }}" placeholder="Contoh: Hukum Keluarga Islam" required>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label font-weight-bold">Jenjang</label>
                <select name="degree" class="form-control border px-3 py-2">
                    <option value="">Pilih Jenjang</option>
                    @foreach(['D3', 'D4', 'S1', 'S2', 'S3'] as $degree)
                        <option value="{{ $degree }}" {{ old('degree', $studyProgram->degree ?? '') == $degree ? 'selected' : '' }}>
                            {{ $degree }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label font-weight-bold">Akreditasi</label>
                <input type="text" name="accreditation" class="form-control border px-3 py-2" value="{{ old('accreditation', $studyProgram->accreditation ?? '') }}" placeholder="Contoh: Baik Sekali / A">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label class="form-label font-weight-bold">Ketua Program Studi</label>
                <input type="text" name="head_of_program" class="form-control border px-3 py-2" value="{{ old('head_of_program', $studyProgram->head_of_program ?? '') }}" placeholder="Nama Kaprodi & Gelar">
            </div>
        </div>
    </div>

    <div class="form-group mb-3">
        <label class="form-label font-weight-bold">Logo Program Studi</label>
        <input type="file" name="logo" class="form-control border px-3 py-2" accept="image/*">
        @if(isset($studyProgram) && $studyProgram->logo)
            <div class="mt-2">
                <img src="{{ asset('storage/'.$studyProgram->logo) }}" width="80" class="img-thumbnail rounded" alt="{{ $studyProgram->name }}">
            </div>
        @endif
    </div>

    <div class="form-group mb-3">
        <label class="form-label font-weight-bold">Visi Program Studi</label>
        <textarea name="vision" rows="3" class="form-control border px-3 py-2" placeholder="Visi program studi">{{ old('vision', $studyProgram->vision ?? '') }}</textarea>
    </div>

    <div class="form-group mb-3">
        <label class="form-label font-weight-bold">Misi Program Studi</label>
        <textarea name="mission" rows="3" class="form-control border px-3 py-2" placeholder="Misi program studi">{{ old('mission', $studyProgram->mission ?? '') }}</textarea>
    </div>

    <div class="form-group mb-3">
        <label class="form-label font-weight-bold">Deskripsi / Profil Lengkap</label>
        <textarea name="description" rows="5" class="form-control border px-3 py-2" placeholder="Deskripsi umum program studi">{{ old('description', $studyProgram->description ?? '') }}</textarea>
    </div>
</div>

