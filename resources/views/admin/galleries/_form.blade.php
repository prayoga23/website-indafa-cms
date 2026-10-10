<div class="row">

    <div class="col-md-6">

        <div class="form-group">

            <label>Fakultas</label>

            <select
                name="faculty_id"
                class="form-control">

                <option value="">
                    Kampus Umum
                </option>

                @foreach($faculties as $faculty)

                    <option
                        value="{{ $faculty->id }}"
                        @selected(old('faculty_id',$gallery->faculty_id ?? '') == $faculty->id)>

                        {{ $faculty->name }}

                    </option>

                @endforeach

            </select>

        </div>

    </div>

    <div class="col-md-6">

        <div class="form-group">

            <label>Program Studi</label>

            <select
                name="study_program_id"
                class="form-control">

                <option value="">
                    Semua Prodi
                </option>

                @foreach($studyPrograms as $prodi)

                    <option
                        value="{{ $prodi->id }}"
                        @selected(old('study_program_id',$gallery->study_program_id ?? '') == $prodi->id)>

                        {{ $prodi->name }}

                    </option>

                @endforeach

            </select>

        </div>

    </div>

</div>

<div class="form-group">

    <label>Judul Album</label>

    <input
        type="text"
        name="title"
        class="form-control"
        value="{{ old('title',$gallery->title ?? '') }}"
        required>

</div>

<div class="form-group">

    <label>Deskripsi</label>

    <textarea
        name="description"
        rows="5"
        class="form-control">{{ old('description',$gallery->description ?? '') }}</textarea>

</div>

<div class="form-group">

    <label>Cover Album</label>

    <input
        type="file"
        name="cover_image"
        class="form-control">

</div>

<div class="form-group">

    <label>Status</label>

    <select
        name="status"
        class="form-control">

        <option value="draft">
            Draft
        </option>

        <option value="publish">
            Publish
        </option>

    </select>

</div>
