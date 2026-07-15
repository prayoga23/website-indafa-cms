<div class="card-body">

    <div class="row">

        <div class="col-md-6">
            <label>Fakultas</label>
            <select name="faculty_id" class="form-control" required>
                <option value="">Pilih Fakultas</option>

                @foreach($faculties as $f)
                    <option value="{{ $f->id }}"
                        {{ old('faculty_id', $lecturer->faculty_id ?? '') == $f->id ? 'selected' : '' }}>
                        {{ $f->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <label>Program Studi</label>
            <select name="study_program_id" class="form-control" required>
                <option value="">Pilih Prodi</option>

                @foreach($studyPrograms as $s)
                    <option value="{{ $s->id }}"
                        {{ old('study_program_id', $lecturer->study_program_id ?? '') == $s->id ? 'selected' : '' }}>
                        {{ $s->name }}
                    </option>
                @endforeach
            </select>
        </div>

    </div>

    <div class="form-group mt-2">
        <label>Nama Dosen</label>
        <input type="text"
               name="name"
               class="form-control"
               value="{{ old('name', $lecturer->name ?? '') }}"
               required>
    </div>

    <div class="row">

        <div class="col-md-6">
            <label>NIDN</label>
            <input type="text"
                   name="nidn"
                   class="form-control"
                   value="{{ old('nidn', $lecturer->nidn ?? '') }}">
        </div>

        <div class="col-md-6">
            <label>Jabatan</label>
            <input type="text"
                   name="position"
                   class="form-control"
                   value="{{ old('position', $lecturer->position ?? '') }}">
        </div>

    </div>

    <div class="form-group mt-2">
        <label>Pendidikan</label>
        <input type="text"
               name="education"
               class="form-control"
               value="{{ old('education', $lecturer->education ?? '') }}">
    </div>

    <div class="form-group">
        <label>Foto</label>
        <input type="file"
               name="photo"
               class="form-control">
    </div>

    @isset($lecturer)
        @if($lecturer->photo)
            <img src="{{ asset('storage/'.$lecturer->photo) }}"
                 width="100"
                 class="img-thumbnail">
        @endif
    @endisset

    <div class="form-group mt-2">
        <label>Bio</label>
        <textarea name="bio"
                  rows="5"
                  class="form-control">{{ old('bio', $lecturer->bio ?? '') }}</textarea>
    </div>

</div>
