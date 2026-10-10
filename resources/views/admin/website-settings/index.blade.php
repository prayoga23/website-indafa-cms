@extends('layouts_admin.admin')

@section('title','Website Setting')
@section('page-title','Website Setting')

@section('content')

<form action="{{ route('admin.website-settings.update') }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="row">

        {{-- KOLOM KIRI --}}
        <div class="col-md-8">

            {{-- INFORMASI KAMPUS --}}
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Informasi Kampus</h3>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <label>Nama Kampus</label>
                        <input type="text"
                               name="site_name"
                               class="form-control"
                               value="{{ old('site_name', $setting->site_name ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label>Tagline</label>
                        <input type="text"
                               name="tagline"
                               class="form-control"
                               value="{{ old('tagline', $setting->tagline ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="description"
                                  rows="4"
                                  class="form-control">{{ old('description', $setting->description ?? '') }}</textarea>
                    </div>

                </div>
            </div>


            {{-- KONTAK --}}
            <div class="card card-info mt-3">
                <div class="card-header">
                    <h3 class="card-title">Kontak</h3>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="address"
                                  class="form-control"
                                  rows="3">{{ old('address', $setting->address ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text"
                               name="phone"
                               class="form-control"
                               value="{{ old('phone', $setting->phone ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label>WhatsApp</label>
                        <input type="text"
                               name="whatsapp"
                               class="form-control"
                               value="{{ old('whatsapp', $setting->whatsapp ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email"
                               name="email"
                               class="form-control"
                               value="{{ old('email', $setting->email ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label>Website</label>
                        <input type="text"
                               name="website"
                               class="form-control"
                               value="{{ old('website', $setting->website ?? '') }}">
                    </div>

                </div>
            </div>


            {{-- GOOGLE MAPS --}}
            <div class="card card-success mt-3">
                <div class="card-header">
                    <h3 class="card-title">Google Maps</h3>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <label>Embed Google Maps</label>
                        <textarea name="google_maps"
                                  rows="5"
                                  class="form-control"
                                  placeholder="<iframe ...>">{{ old('google_maps', $setting->google_maps ?? '') }}</textarea>
                    </div>

                </div>
            </div>


            {{-- SOSIAL MEDIA --}}
            <div class="card card-warning mt-3">
                <div class="card-header">
                    <h3 class="card-title">Sosial Media</h3>
                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6">
                            <label>Facebook</label>
                            <input type="text" name="facebook"
                                   class="form-control"
                                   value="{{ old('facebook', $setting->facebook ?? '') }}">
                        </div>

                        <div class="col-md-6">
                            <label>Instagram</label>
                            <input type="text" name="instagram"
                                   class="form-control"
                                   value="{{ old('instagram', $setting->instagram ?? '') }}">
                        </div>

                        <div class="col-md-6 mt-2">
                            <label>YouTube</label>
                            <input type="text" name="youtube"
                                   class="form-control"
                                   value="{{ old('youtube', $setting->youtube ?? '') }}">
                        </div>

                        <div class="col-md-6 mt-2">
                            <label>TikTok</label>
                            <input type="text" name="tiktok"
                                   class="form-control"
                                   value="{{ old('tiktok', $setting->tiktok ?? '') }}">
                        </div>

                        <div class="col-md-6 mt-2">
                            <label>Twitter / X</label>
                            <input type="text" name="twitter"
                                   class="form-control"
                                   value="{{ old('twitter', $setting->twitter ?? '') }}">
                        </div>

                        <div class="col-md-6 mt-2">
                            <label>LinkedIn</label>
                            <input type="text" name="linkedin"
                                   class="form-control"
                                   value="{{ old('linkedin', $setting->linkedin ?? '') }}">
                        </div>

                    </div>

                </div>
            </div>


            {{-- FOOTER --}}
            <div class="card card-dark mt-3">
                <div class="card-header">
                    <h3 class="card-title">Footer</h3>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <label>Footer Text</label>
                        <textarea name="footer_text"
                                  rows="3"
                                  class="form-control">{{ old('footer_text', $setting->footer_text ?? '') }}</textarea>
                    </div>

                </div>
            </div>


            {{-- SEO --}}
            <div class="card card-secondary mt-3">
                <div class="card-header">
                    <h3 class="card-title">SEO</h3>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <label>Meta Title</label>
                        <input type="text"
                               name="meta_title"
                               class="form-control"
                               value="{{ old('meta_title', $setting->meta_title ?? '') }}">
                    </div>

                    <div class="form-group">
                        <label>Meta Description</label>
                        <textarea name="meta_description"
                                  class="form-control"
                                  rows="3">{{ old('meta_description', $setting->meta_description ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Meta Keywords</label>
                        <textarea name="meta_keywords"
                                  class="form-control"
                                  rows="2">{{ old('meta_keywords', $setting->meta_keywords ?? '') }}</textarea>
                    </div>

                </div>
            </div>

        </div>


        {{-- KOLOM KANAN --}}
        <div class="col-md-4">

            {{-- BRANDING --}}
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Branding</h3>
                </div>

                <div class="card-body">

                    {{-- LOGO --}}
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" name="logo" class="form-control">

                        @if(!empty($setting->logo))
                            <img src="{{ asset('storage/'.$setting->logo) }}"
                                 class="img-fluid mt-2 rounded"
                                 style="max-height:120px;">
                        @endif
                    </div>

                    {{-- FAVICON --}}
                    <div class="form-group mt-3">
                        <label>Favicon</label>
                        <input type="file" name="favicon" class="form-control">

                        @if(!empty($setting->favicon))
                            <img src="{{ asset('storage/'.$setting->favicon) }}"
                                 class="img-fluid mt-2 rounded"
                                 style="max-height:80px;">
                        @endif
                    </div>

                </div>

                <div class="card-footer">
                    <button class="btn btn-primary btn-block">
                        <i class="fas fa-save"></i> Simpan Setting
                    </button>
                </div>

            </div>

        </div>

    </div>

</form>

@endsection
