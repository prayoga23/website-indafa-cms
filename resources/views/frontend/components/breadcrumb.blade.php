<section class="breadcrumb-area">

    <div class="container">

        <nav>

            <ol class="breadcrumb">

                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">
                        Beranda
                    </a>
                </li>

                @foreach($items as $item)

                    <li class="breadcrumb-item">

                        {{ $item }}

                    </li>

                @endforeach

            </ol>

        </nav>

    </div>

</section>
