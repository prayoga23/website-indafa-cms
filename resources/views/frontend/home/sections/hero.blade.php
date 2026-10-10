<section class="hero-section">

    <div class="swiper heroSwiper">

        <div class="swiper-wrapper">

            @foreach($banners as $banner)

                <div class="swiper-slide">

                    <div class="hero-slide">

                        <div class="container">

                            <div class="row align-items-center">

                                <div class="col-lg-6">

                                    <span class="hero-subtitle">
                                        {{ $banner->subtitle }}
                                    </span>

                                    <h1 class="hero-title">
                                        {{ $banner->title }}
                                    </h1>

                                    <p class="hero-desc">
                                        {{ $banner->description }}
                                    </p>

                                    @if($banner->button_link)

                                        <a href="{{ $banner->button_link }}"
                                           class="btn btn-success btn-lg">

                                            {{ $banner->button_text }}

                                        </a>

                                    @endif

                                </div>

                                <div class="col-lg-6 text-center">

                                    <img src="{{ asset('storage/'.$banner->image) }}"
                                         class="img-fluid hero-image">

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

        <div class="swiper-pagination"></div>

    </div>

</section>

@push('scripts')

<script>

new Swiper(".heroSwiper",{
    loop:true,
    autoplay:{
        delay:5000
    },
    pagination:{
        el:".swiper-pagination"
    }
});

</script>

@endpush
