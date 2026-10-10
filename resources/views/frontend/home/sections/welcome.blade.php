@php
use Illuminate\Support\Str;
@endphp
<section class="py-5">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-5">

                @if($welcomePage?->featured_image)

                    <img src="{{ asset('storage/'.$welcomePage->featured_image) }}"
                         class="img-fluid rounded shadow">

                @endif

            </div>

            <div class="col-lg-7">

                <h2 class="section-title">
                    Sambutan Rektor
                </h2>

                <div>
                    {!! Str::limit(strip_tags($welcomePage?->content), 700) !!}
                </div>

                @if($welcomePage)

                    <a href="{{ route('page.show',$welcomePage->slug) }}"
                       class="btn btn-success mt-3">

                        Selengkapnya

                    </a>

                @endif

            </div>

        </div>

    </div>

</section>
