<div class="card-body">

    <div class="row">

        <div class="col-md-6">
            <label>Fakultas</label>
            <select name="faculty_id" class="form-control">
                <option value="">Umum</option>

                @foreach($faculties as $f)
                    <option value="{{ $f->id }}"
                        {{ old('faculty_id', $news->faculty_id ?? '') == $f->id ? 'selected' : '' }}>
                        {{ $f->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <label>Program Studi</label>
            <select name="study_program_id" class="form-control">
                <option value="">Umum</option>

                @foreach($studyPrograms as $s)
                    <option value="{{ $s->id }}"
                        {{ old('study_program_id', $news->study_program_id ?? '') == $s->id ? 'selected' : '' }}>
                        {{ $s->name }}
                    </option>
                @endforeach
            </select>
        </div>

    </div>

    <div class="form-group mt-2">
        <label>Judul Berita</label>
        <input type="text"
               name="title"
               class="form-control"
               value="{{ old('title', $news->title ?? '') }}"
               required>
    </div>

    <div class="form-group">
        <label>Thumbnail</label>
        <input type="file" name="thumbnail" class="form-control">
    </div>

    @isset($news)
        @if($news->thumbnail)
            <img src="{{ asset('storage/'.$news->thumbnail) }}"
                 width="120"
                 class="mb-2">
        @endif
    @endisset

    <div class="form-group mt-2">
        <label>Konten</label>
        <textarea name="content"
                  id="editor"
                  class="form-control"
                  rows="10">{{ old('content', $news->content ?? '') }}</textarea>
    </div>

    <div class="form-group">
        <label>Status</label>

        <select name="status" class="form-control">
            <option value="draft"
                {{ old('status', $news->status ?? '') == 'draft' ? 'selected' : '' }}>
                Draft
            </option>

            <option value="publish"
                {{ old('status', $news->status ?? '') == 'publish' ? 'selected' : '' }}>
                Publish
            </option>
        </select>
    </div>

</div>
