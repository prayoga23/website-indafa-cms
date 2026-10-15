<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title', 'Admin Panel') - IAI Darul Falah</title>

    @if(isset($setting) && $setting->logo)
        <link rel="icon" type="image/png" href="{{ asset('storage/'.$setting->logo) }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('storage/'.$setting->logo) }}">
    @endif

    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('template-dashboard/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('template-dashboard/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Material Symbols -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('template-dashboard/assets/css/material-dashboard.min.css?v=3.2.0') }}" rel="stylesheet" />

    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
            color: #344767;
        }

        /* Form styling compatibility */
        .form-control, .form-select {
            border: 1px solid #d2d6da !important;
            padding: 0.55rem 0.85rem !important;
            border-radius: 0.375rem !important;
            font-size: 0.875rem !important;
            background-color: #fff !important;
        }
        .form-control:focus, .form-select:focus {
            border-color: #2e7d32 !important;
            box-shadow: 0 0 0 2px rgba(46, 125, 50, 0.2) !important;
        }
        .form-group {
            margin-bottom: 1.15rem;
        }
        .form-group label, .form-label {
            font-size: 0.875rem;
            font-weight: 600;
            color: #344767;
            margin-bottom: 0.4rem;
            display: inline-block;
        }

        /* Table styling compatibility */
        .table-bordered {
            border: 1px solid #e9ecef !important;
        }
        .table-bordered th, .table-bordered td {
            border: 1px solid #e9ecef !important;
            vertical-align: middle;
        }
        .table th {
            text-transform: uppercase;
            font-size: 0.725rem !important;
            font-weight: 700 !important;
            color: #7b809a;
            letter-spacing: 0.5px;
            background-color: #f8f9fa;
        }

        /* Sidenav custom refinements */
        .sidenav {
            z-index: 1040;
            transition: all 0.25s ease;
        }
        .sidenav .navbar-nav .nav-link {
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.65rem 1rem;
            border-radius: 0.5rem;
            margin: 0.1rem 0;
            color: #344767;
            transition: all 0.2s ease;
        }
        .sidenav .navbar-nav .nav-link:hover {
            background-color: rgba(0, 0, 0, 0.04);
            color: #111827;
        }
        .sidenav .navbar-nav .nav-link.active {
            background: linear-gradient(195deg, #42424a 0%, #191919 100%) !important;
            color: #fff !important;
            box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.14), 0 7px 10px -5px rgba(64, 64, 64, 0.4) !important;
        }
        .sidenav .navbar-nav .nav-link.active i {
            color: #fff !important;
        }
        .sidenav .collapse .nav-link {
            font-size: 0.8125rem;
            padding: 0.45rem 0.85rem;
            border-radius: 0.375rem;
            margin: 0.1rem 0;
            color: #67748e;
        }
        .sidenav .collapse .nav-link:hover {
            color: #191919;
            background-color: rgba(0, 0, 0, 0.03);
        }
        .sidenav .collapse .nav-link.active-sub {
            background-color: rgba(46, 125, 50, 0.12);
            color: #2e7d32 !important;
            font-weight: 700;
        }
        .sidenav-arrow {
            transition: transform 0.25s ease;
            font-size: 1.15rem;
            line-height: 1;
        }
        .nav-link[aria-expanded="true"] .sidenav-arrow {
            transform: rotate(180deg);
        }
        .nav-header {
            font-size: 0.7rem;
            font-weight: 800;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            color: #8392ab;
            padding: 1rem 1rem 0.35rem 1rem;
        }

        /* Buttons & Badges */
        .btn {
            font-weight: 600;
            letter-spacing: 0.3px;
        }
        .badge {
            font-weight: 600;
        }

        /* Alert Styling */
        .alert {
            border-radius: 0.5rem;
            font-size: 0.875rem;
        }

        /* Sidenav Scrollbar */
        #sidenav-collapse-main::-webkit-scrollbar {
            width: 5px;
        }
        #sidenav-collapse-main::-webkit-scrollbar-thumb {
            background-color: rgba(0, 0, 0, 0.15);
            border-radius: 4px;
        }
    </style>

    @stack('css')
</head>

<body class="g-sidenav-show bg-gray-100">

    @include('layouts_admin.sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

        @include('layouts_admin.navbar')

        <div class="container-fluid py-4">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible text-white fade show mb-4 border-0 shadow-sm" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="material-symbols-rounded me-2 fs-5">check_circle</i>
                        <div>
                            <strong>Berhasil!</strong> {{ session('success') }}
                        </div>
                    </div>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible text-white fade show mb-4 border-0 shadow-sm" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="material-symbols-rounded me-2 fs-5">error</i>
                        <div>
                            <strong>Gagal!</strong> {{ session('error') }}
                        </div>
                    </div>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if(isset($errors) && $errors->any())
                <div class="alert alert-danger alert-dismissible text-white fade show mb-4 border-0 shadow-sm" role="alert">
                    <div class="d-flex align-items-start">
                        <i class="material-symbols-rounded me-2 fs-5 mt-1">warning</i>
                        <div>
                            <strong>Terdapat Kesalahan:</strong>
                            <ul class="mb-0 ps-3 mt-1">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @yield('content')

            @include('layouts_admin.footer')

        </div>

    </main>

    <!-- Core JS Files -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('template-dashboard/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('template-dashboard/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template-dashboard/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('template-dashboard/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('template-dashboard/assets/js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('template-dashboard/assets/js/material-dashboard.min.js?v=3.2.0') }}"></script>

    @stack('js')

</body>
</html>
