<div class="card-body">

    <div class="form-group">
        <label>Nama Fakultas</label>

        <input type="text"
               name="name"
               class="form-control"
               value="{{ old('name', $faculty->name ?? '') }}"
               required>
    </div>

    <div class="form-group">
        <label>Dekan</label>

        <input type="text"
               name="dean"
               class="form-control"
               value="{{ old('dean', $faculty->dean ?? '') }}">
    </div>

    <div class="form-group">
        <label>Logo</label>
        
        <input type="file"
               name="logo"
               class="form-control">
        <p style="color: red;">Harus Foto Berbentuk Logo. Selain Gambar Logo Tidak Diperbolehkan</p>
    </div>

    @isset($faculty)
        @if($faculty->logo)
            <img src="{{ asset('storage/'.$faculty->logo) }}"
                 width="120"
                 class="mb-3">
        @endif
    @endisset

    <div class="form-group">
        <label>Deskripsi</label>

        <textarea name="description"
                  rows="5"
                  class="form-control">{{ old('description', $faculty->description ?? '') }}</textarea>
    </div>

</div>
