<div class="row">

    {{-- Fakultas --}}
    <div class="col-md-6">

        <div class="form-group">

            <label>Fakultas (Opsional)</label>

            <select name="faculty_id" class="form-control">

                <option value="">Kampus Umum</option>

                @foreach($faculties as $faculty)

                    <option value="{{ $faculty->id }}"
                        @selected(old('faculty_id', $page->faculty_id ?? '') == $faculty->id)
                    >
                        {{ $faculty->name }}
                    </option>

                @endforeach

            </select>

        </div>

    </div>

    {{-- Prodi --}}
    <div class="col-md-6">

        <div class="form-group">

            <label>Program Studi (Opsional)</label>

            <select name="study_program_id" class="form-control">

                <option value="">Semua Prodi</option>

                @foreach($studyPrograms as $prodi)

                    <option value="{{ $prodi->id }}"
                        @selected(old('study_program_id', $page->study_program_id ?? '') == $prodi->id)
                    >
                        {{ $prodi->name }}
                    </option>

                @endforeach

            </select>

        </div>

    </div>

</div>

{{-- Title --}}
<div class="form-group">

    <label>Judul Halaman</label>

    <input type="text"
           name="title"
           class="form-control"
           value="{{ old('title',$page->title ?? '') }}"
           required>

</div>

{{-- Excerpt --}}
<div class="form-group">

    <label>Ringkasan</label>

    <textarea name="excerpt"
              class="form-control"
              rows="3">{{ old('excerpt',$page->excerpt ?? '') }}</textarea>

</div>

{{-- Featured Image --}}
<div class="form-group">

    <label>Featured Image</label>

    <input type="file"
           name="featured_image"
           class="form-control">

    @if(!empty($page->featured_image))
        <img src="{{ asset('storage/'.$page->featured_image) }}"
             width="120"
             class="mt-2">
    @endif

</div>

{{-- Status --}}
<div class="form-group">

    <label>Status</label>

    <select name="status" class="form-control">

        <option value="draft"
            @selected(old('status',$page->status ?? '') == 'draft')
        >Draft</option>

        <option value="publish"
            @selected(old('status',$page->status ?? '') == 'publish')
        >Publish</option>

    </select>

</div>

{{-- Content (CKEditor) --}}
<div class="form-group">

    <label>Isi Halaman</label>

    <textarea name="content"
              id="editor"
              class="form-control"
              rows="10">{{ old('content',$page->content ?? '') }}</textarea>

</div>

{{-- CKEditor --}}
@push('scripts')

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>

ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => {
        console.error(error);
    });

</script>

@endpush
