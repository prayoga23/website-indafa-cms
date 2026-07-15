<section class="py-5">

    <div class="container">

        <div class="section-header">

            <h2>Program Studi</h2>

        </div>

        <div class="row">

            @foreach($programs as $program)

                <div class="col-lg-3 col-md-6 mb-4">

                    <div class="program-card">

                        <h5>
                            {{ $program->name }}
                        </h5>

                        <small>
                            {{ $program->faculty->name ?? '-' }}
                        </small>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>
