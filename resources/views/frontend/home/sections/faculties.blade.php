<section class="section-gray">

    <div class="container">

        <div class="section-header">

            <h2>Fakultas</h2>

        </div>

        <div class="row">

            @foreach($faculties as $faculty)

                <div class="col-lg-4 mb-4">

                    <div class="card h-100 border-0 shadow-sm">

                        <img src="{{ asset('storage/'.$faculty->image) }}"
                             class="card-img-top">

                        <div class="card-body">

                            <h5>
                                {{ $faculty->name }}
                            </h5>

                            <p>
                                {{ Str::limit(strip_tags($faculty->description),120) }}
                            </p>

                            <a href="{{ route('faculties.show',$faculty->slug) }}"
                               class="btn btn-outline-success">

                                Detail

                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>
