<div class="card-body">

    <div class="row">

        <div class="col-md-6">

            <div class="form-group">
                <label>Fakultas <span class="text-danger">*</span></label>

                <select name="faculty_id" class="form-control" required>

                    <option value="">Pilih Fakultas</option>

                    @foreach($faculties as $faculty)

                        <option
                            value="{{ $faculty->id }}"
                            {{ old('faculty_id', $studyProgram->faculty_id ?? '') == $faculty->id ? 'selected' : '' }}>

                            {{ $faculty->name }}

                        </option>

                    @endforeach

                </select>

            </div>

        </div>

        <div class="col-md-6">

            <div class="form-group">

                <label>Nama Program Studi</label>

                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ old('name', $studyProgram->name ?? '') }}"
                       required>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-4">

            <div class="form-group">

                <label>Jenjang</label>

                <select name="degree"
                        class="form-control">

                    <option value="">Pilih Jenjang</option>

                    @foreach(['D3','D4','S1','S2','S3'] as $degree)

                        <option
                            value="{{ $degree }}"
                            {{ old('degree', $studyProgram->degree ?? '') == $degree ? 'selected' : '' }}>

                            {{ $degree }}

                        </option>

                    @endforeach

                </select>

            </div>

        </div>

        <div class="col-md-4">

            <div class="form-group">

                <label>Akreditasi</label>

                <input type="text"
                       name="accreditation"
                       class="form-control"
                       value="{{ old('accreditation', $studyProgram->accreditation ?? '') }}">

            </div>

        </div>

        <div class="col-md-4">

            <div class="form-group">

                <label>Ketua Program Studi</label>

                <input type="text"
                       name="head_of_program"
                       class="form-control"
                       value="{{ old('head_of_program', $studyProgram->head_of_program ?? '') }}">

            </div>

        </div>

    </div>

    <div class="form-group">

        <label>Logo Program Studi</label>

        <input type="file"
               name="logo"
               class="form-control">

    </div>

    @isset($studyProgram)

        @if($studyProgram->logo)

            <div class="mb-3">

                <img src="{{ asset('storage/'.$studyProgram->logo) }}"
                     width="120"
                     class="img-thumbnail">

            </div>

        @endif

    @endisset

    <div class="form-group">

        <label>Visi</label>

        <textarea name="vision"
                  rows="4"
                  class="form-control">{{ old('vision', $studyProgram->vision ?? '') }}</textarea>

    </div>

    <div class="form-group">

        <label>Misi</label>

        <textarea name="mission"
                  rows="4"
                  class="form-control">{{ old('mission', $studyProgram->mission ?? '') }}</textarea>

    </div>

    <div class="form-group">

        <label>Deskripsi</label>

        <textarea name="description"
                  rows="5"
                  class="form-control">{{ old('description', $studyProgram->description ?? '') }}</textarea>

    </div>

</div>
