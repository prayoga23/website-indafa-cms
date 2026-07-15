<section class="section-gray">

    <div class="container">

        <h2>Galeri Kampus</h2>

        <div class="row">

            @foreach($albums as $album)

                <div class="col-lg-3 mb-4">

                    <div class="card">

                        <div class="card-body">

                            <h5>{{ $album->name }}</h5>

                            <small>
                                {{ $album->images_count }} Foto
                            </small>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>
