<section class="py-5">

    <div class="container">

        <h2>Pengumuman</h2>

        <div class="list-group">

            @foreach($announcements as $announcement)

                <a href="{{ route('announcements.show',$announcement->slug) }}"
                   class="list-group-item">

                    {{ $announcement->title }}

                </a>

            @endforeach

        </div>

    </div>

</section>
