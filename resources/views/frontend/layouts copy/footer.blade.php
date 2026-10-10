<footer class="footer-area">

    <div class="container">

        <div class="row">

            <div class="col-lg-4">

                @if($setting?->logo)

                    <img src="{{ asset('storage/'.$setting->logo) }}"
                         height="70">

                @endif

                <p class="mt-3">
                    {{ $setting->tagline }}
                </p>

            </div>

            <div class="col-lg-4">

                <h5>Kontak</h5>

                <ul class="list-unstyled">

                    <li>{{ $setting->address }}</li>
                    <li>{{ $setting->phone }}</li>
                    <li>{{ $setting->email }}</li>

                </ul>

            </div>

            <div class="col-lg-4">

                <h5>Lokasi</h5>

                {!! $setting->google_maps !!}

            </div>

        </div>

        <hr>

        <div class="text-center">

            {!! $setting->footer_text !!}

        </div>

    </div>

</footer>
