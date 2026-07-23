<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title','INDAFA Bondowoso')</title>

    @if(isset($setting) && $setting->logo)
        <link rel="shortcut icon" href="{{ asset('storage/'.$setting->logo) }}" type="image/x-icon">
    @endif

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">
    <link class="nav-style" rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link class="nav-style" rel="stylesheet" href="{{ asset('assets/css/beranda/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/style.css') }}">

    @stack('styles')
</head>
<body>

    @include('frontend.layouts.header')

    @yield('content')

    @include('frontend.layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.custom-navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
