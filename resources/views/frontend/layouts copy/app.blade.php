<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        @yield('title', $setting->site_name ?? 'Website Kampus')
    </title>

    <meta name="description"
          content="@yield('meta_description', $setting->seo_description ?? '')">

    <meta name="keywords"
          content="@yield('meta_keywords', $setting->seo_keywords ?? '')">

    <meta name="author"
          content="{{ $setting->site_name ?? '' }}">

    <link rel="icon"
          href="{{ $setting && $setting->favicon ? asset('storage/'.$setting->favicon) : '' }}">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
          rel="stylesheet">

    {{-- Swiper --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    {{-- Custom CSS --}}
    {{-- <link href="{{ asset('frontend/css/style.css') }}"
          rel="stylesheet"> --}}

    @stack('styles')

</head>

<body>

    @include('frontend.layouts.header')

    <main>

        @yield('content')

    </main>

    @include('frontend.layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    @stack('scripts')

</body>

</html>
