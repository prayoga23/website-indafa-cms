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

    <!-- Tailwind CSS (with preflight and visibility disabled to maintain Material Dashboard / Bootstrap compatibility) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            corePlugins: {
                preflight: false,
                visibility: false,
            },
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            500: '#10b981',
                            600: '#0b5345',
                            700: '#07352c',
                            gold: '#cca43b',
                            'gold-light': '#fdf8ec'
                        }
                    },
                    borderRadius: {
                        'xl': '0.75rem',
                        '2xl': '1rem',
                        '3xl': '1.5rem',
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif !important;
            color: #344767;
        }

        /* Modern Form & Input System (Jakub Skills UX Principles: Visual Hierarchy, Optical Alignment, Concentric Radii) */
        .admin-form-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 1rem;
            box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            margin-bottom: 2rem;
        }
        .admin-form-header {
            padding: 1.25rem 1.75rem;
            background: linear-gradient(135deg, #0b5345 0%, #134e4a 100%);
            color: #ffffff;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .admin-form-header h4, .admin-form-header h3 {
            color: #ffffff !important;
            margin: 0;
            font-weight: 700;
            font-size: 1.15rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .admin-form-header p {
            margin: 0.25rem 0 0 0;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.8125rem;
        }

        .form-section-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 0.875rem;
            padding: 1.25rem 1.5rem;
            margin-bottom: 1.25rem;
            transition: border-color 0.2s ease;
        }
        .form-section-card:hover {
            border-color: #cbd5e1;
        }
        .form-section-header {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            margin-bottom: 1rem;
            padding-bottom: 0.65rem;
            border-bottom: 1px solid #e2e8f0;
        }
        .form-section-icon {
            width: 32px;
            height: 32px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.5rem;
            background: #e6f4ea;
            color: #0b5345;
            font-size: 0.95rem;
            font-weight: 700;
        }
        .form-section-title {
            font-size: 0.9375rem;
            font-weight: 700;
            color: #1e293b;
            margin: 0;
        }
        .form-section-desc {
            font-size: 0.775rem;
            color: #64748b;
            margin: 0.15rem 0 0 0;
        }

        .form-label-custom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.8125rem;
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.4rem;
        }
        .badge-req {
            background-color: #fee2e2;
            color: #dc2626;
            font-size: 0.6875rem;
            font-weight: 700;
            padding: 0.15rem 0.5rem;
            border-radius: 9999px;
            letter-spacing: 0.3px;
        }
        .badge-opt {
            background-color: #f1f5f9;
            color: #64748b;
            font-size: 0.6875rem;
            font-weight: 600;
            padding: 0.15rem 0.5rem;
            border-radius: 9999px;
            letter-spacing: 0.3px;
        }

        .form-control-custom, .form-select-custom {
            width: 100%;
            background-color: #ffffff !important;
            border: 1.5px solid #cbd5e1 !important;
            border-radius: 0.625rem !important;
            padding: 0.625rem 0.95rem !important;
            font-size: 0.875rem !important;
            color: #1e293b !important;
            transition: all 0.2s ease-in-out !important;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.04) !important;
        }
        .form-control-custom:focus, .form-select-custom:focus {
            background-color: #ffffff !important;
            border-color: #0b5345 !important;
            box-shadow: 0 0 0 3.5px rgba(11, 83, 69, 0.15) !important;
            outline: none !important;
        }
        .form-control-custom::placeholder {
            color: #94a3b8 !important;
            font-size: 0.8125rem !important;
        }

        .form-hint {
            display: flex;
            align-items: center;
            gap: 0.35rem;
            font-size: 0.75rem;
            color: #64748b;
            margin-top: 0.35rem;
            line-height: 1.35;
        }
        .form-hint i {
            font-size: 0.8rem;
            color: #94a3b8;
        }

        /* Modern Interactive File Dropzone */
        .file-dropzone-wrapper {
            position: relative;
            background: #ffffff;
            border: 2px dashed #cbd5e1;
            border-radius: 0.75rem;
            padding: 1.25rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .file-dropzone-wrapper:hover, .file-dropzone-wrapper.dragover {
            border-color: #0b5345;
            background: #f0fdf4;
        }
        .file-dropzone-wrapper input[type="file"] {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
            z-index: 5;
        }
        .file-dropzone-icon {
            font-size: 2rem;
            color: #0b5345;
            margin-bottom: 0.35rem;
        }
        .file-preview-card {
            display: inline-flex;
            align-items: center;
            gap: 0.85rem;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 0.625rem;
            padding: 0.5rem 0.75rem;
            margin-top: 0.75rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        .file-preview-thumb {
            width: 56px;
            height: 56px;
            object-fit: cover;
            border-radius: 0.4rem;
            border: 1px solid #cbd5e1;
            background: #f8fafc;
        }

        /* Brand Action Buttons */
        .btn-brand-primary {
            background: linear-gradient(135deg, #0b5345 0%, #134e4a 100%) !important;
            color: #ffffff !important;
            border: none !important;
            border-radius: 0.625rem !important;
            padding: 0.65rem 1.35rem !important;
            font-weight: 600 !important;
            font-size: 0.875rem !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 0.45rem !important;
            box-shadow: 0 4px 12px rgba(11, 83, 69, 0.25) !important;
            transition: all 0.2s ease !important;
        }
        .btn-brand-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(11, 83, 69, 0.35) !important;
            color: #ffffff !important;
        }
        .btn-secondary-custom {
            background: #f1f5f9 !important;
            color: #475569 !important;
            border: 1px solid #cbd5e1 !important;
            border-radius: 0.625rem !important;
            padding: 0.65rem 1.35rem !important;
            font-weight: 600 !important;
            font-size: 0.875rem !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 0.45rem !important;
            transition: all 0.2s ease !important;
        }
        .btn-secondary-custom:hover {
            background: #e2e8f0 !important;
            color: #1e293b !important;
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

        /* ══════════════════════════════════════════════════
           CRITICAL FIX: Tailwind CSS vs Bootstrap / Material Collapse
           ══════════════════════════════════════════════════ */
        .collapse {
            visibility: visible !important;
        }
        .collapse:not(.show) {
            display: none !important;
        }
        .collapse.show {
            display: block !important;
            visibility: visible !important;
        }
        .collapsing {
            visibility: visible !important;
        }
        .navbar-collapse {
            visibility: visible !important;
        }
        @media (min-width: 992px) {
            .navbar-expand-lg .navbar-collapse {
                display: flex !important;
                visibility: visible !important;
            }
        }
        @media (min-width: 1200px) {
            .navbar-vertical.navbar-expand-xs .navbar-collapse {
                display: block !important;
                visibility: visible !important;
            }
        }
        #sidenav-collapse-main {
            display: block !important;
            visibility: visible !important;
            opacity: 1 !important;
            height: calc(100vh - 215px) !important;
            overflow-y: auto !important;
            overflow-x: hidden !important;
        }

        /* ══════════════════════════════════════════════════
           MODERN SIDENAV & OPTICAL ICON ALIGNMENT SYSTEM
           ══════════════════════════════════════════════════ */
        .sidenav {
            z-index: 1040;
            transition: all 0.25s ease;
            border: 1px solid #e2e8f0;
            background-color: #ffffff !important;
        }
        
        .sidenav-header {
            padding: 0.5rem 0.25rem;
        }

        /* Nav Header / Section Dividers */
        .sidenav .nav-header {
            font-size: 0.6875rem !important;
            font-weight: 800 !important;
            letter-spacing: 0.08em !important;
            text-transform: uppercase !important;
            color: #94a3b8 !important;
            padding: 1.15rem 1rem 0.4rem 1rem !important;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .sidenav .nav-header::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #e2e8f0;
        }

        /* Main Menu Links */
        .sidenav .navbar-nav .nav-link {
            display: flex !important;
            align-items: center !important;
            font-size: 0.845rem !important;
            font-weight: 500 !important;
            padding: 0.5rem 0.75rem !important;
            border-radius: 0.625rem !important;
            margin: 0.15rem 0.65rem !important;
            color: #334155 !important;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1) !important;
            position: relative;
        }
        .sidenav .navbar-nav .nav-link:hover {
            background-color: #f8fafc !important;
            color: #0b5345 !important;
            transform: translateX(2px);
        }

        /* Standardized Icon Box (Optical Alignment & Centering) */
        .sidenav .nav-icon {
            width: 32px !important;
            height: 32px !important;
            min-width: 32px !important;
            border-radius: 0.5rem !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            margin-right: 0.65rem !important;
            background-color: #f1f5f9;
            color: #64748b;
            transition: all 0.2s ease;
            flex-shrink: 0;
        }
        .sidenav .nav-icon i {
            font-size: 1.2rem !important;
            line-height: 1 !important;
            transition: transform 0.2s ease;
        }
        .sidenav .nav-link:hover .nav-icon {
            background-color: #e6f4ea;
            color: #0b5345;
            transform: scale(1.05);
        }

        /* Active Main Link */
        .sidenav .navbar-nav > .nav-item > .nav-link.active {
            background: linear-gradient(135deg, #0b5345 0%, #134e4a 100%) !important;
            color: #ffffff !important;
            box-shadow: 0 4px 14px rgba(11, 83, 69, 0.28) !important;
            font-weight: 600 !important;
        }
        .sidenav .navbar-nav > .nav-item > .nav-link.active .nav-icon {
            background: rgba(255, 255, 255, 0.2) !important;
            color: #ffffff !important;
            box-shadow: none;
        }
        .sidenav .navbar-nav > .nav-item > .nav-link.active .nav-link-text {
            color: #ffffff !important;
        }

        /* Active Dropdown Parent */
        .sidenav .nav-link.active-parent {
            background-color: #f0fdf4 !important;
            color: #0b5345 !important;
            font-weight: 600 !important;
        }
        .sidenav .nav-link.active-parent .nav-icon {
            background-color: #0b5345 !important;
            color: #ffffff !important;
        }

        /* Sidenav Arrow Animation */
        .sidenav-arrow {
            transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1) !important;
            font-size: 1.25rem !important;
            color: #94a3b8;
            margin-left: auto !important;
            flex-shrink: 0;
        }
        .nav-link[aria-expanded="true"] .sidenav-arrow {
            transform: rotate(180deg);
            color: #0b5345;
        }

        /* Remove duplicate pseudo-element arrow from Material Dashboard / Bootstrap */
        .navbar-vertical .navbar-nav .nav-link[data-bs-toggle="collapse"]::after,
        .navbar-vertical .navbar-nav .nav-link[data-bs-toggle="collapse"]:after,
        .sidenav .navbar-nav .nav-link::after,
        .sidenav .navbar-nav .nav-link:after {
            display: none !important;
            content: none !important;
        }

        /* ══════════════════════════════════════════════════
           DASHBOARD STAT CARD ICONS (OPTICAL CENTERING & ELEVATION)
           ══════════════════════════════════════════════════ */
        .card-header .icon-shape,
        .stat-card-icon {
            width: 48px !important;
            height: 48px !important;
            min-width: 48px !important;
            border-radius: 0.75rem !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            margin-top: -14px !important; /* Floating upwards above card body */
            position: relative !important;
            box-shadow: 0 4px 14px 0 rgba(0, 0, 0, 0.18) !important;
        }

        .card-header .icon-shape i,
        .card-header .icon-shape .material-symbols-rounded,
        .stat-card-icon i,
        .stat-card-icon .material-symbols-rounded,
        .icon-shape i,
        .icon-shape .material-symbols-rounded,
        .icon-md i,
        .icon-sm i,
        .icon-lg i {
            top: 0 !important;
            position: static !important;
            transform: none !important;
            line-height: 1 !important;
            margin: 0 !important;
            padding: 0 !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        .card-header .icon-shape i,
        .card-header .icon-shape .material-symbols-rounded,
        .stat-card-icon i,
        .stat-card-icon .material-symbols-rounded {
            font-size: 1.5rem !important;
        }

        /* Sub-menu / Child Navigation Styling */
        .sidenav .sub-menu-nav {
            margin-left: 1.35rem !important;
            padding-left: 0.65rem !important;
            border-left: 2px solid #e2e8f0;
            margin-top: 0.25rem;
            margin-bottom: 0.4rem;
            list-style: none;
        }
        .sidenav .sub-menu-nav .nav-link {
            display: flex !important;
            align-items: center !important;
            padding: 0.38rem 0.65rem !important;
            border-radius: 0.5rem !important;
            margin: 0.1rem 0 !important;
            color: #64748b !important;
            font-size: 0.8125rem !important;
            font-weight: 500 !important;
        }
        .sidenav .sub-menu-nav .nav-link:hover {
            color: #0b5345 !important;
            background-color: #f0fdf4 !important;
            padding-left: 0.8rem !important;
        }
        .sidenav .sub-dot {
            width: 6px;
            height: 6px;
            min-width: 6px;
            border-radius: 50%;
            background-color: #cbd5e1;
            margin-right: 0.6rem;
            transition: all 0.2s ease;
            display: inline-block;
            flex-shrink: 0;
        }
        .sidenav .sub-menu-nav .nav-link:hover .sub-dot {
            background-color: #0b5345;
            transform: scale(1.3);
        }
        .sidenav .sub-menu-nav .nav-link.active-sub {
            background-color: #ecfdf5 !important;
            color: #065f46 !important;
            font-weight: 700 !important;
        }
        .sidenav .sub-menu-nav .nav-link.active-sub .sub-dot {
            background-color: #10b981 !important;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.25);
            transform: scale(1.2);
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
            width: 4px;
        }
        #sidenav-collapse-main::-webkit-scrollbar-track {
            background: transparent;
        }
        #sidenav-collapse-main::-webkit-scrollbar-thumb {
            background-color: #e2e8f0;
            border-radius: 9999px;
        }
        #sidenav-collapse-main::-webkit-scrollbar-thumb:hover {
            background-color: #cbd5e1;
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

    <script>
        // Global Dropzone & Image Preview Helper
        document.addEventListener('DOMContentLoaded', function () {
            // Dropzone drag-and-drop visuals
            document.querySelectorAll('.file-dropzone-wrapper').forEach(function (wrapper) {
                const input = wrapper.querySelector('input[type="file"]');
                if (!input) return;

                ['dragenter', 'dragover'].forEach(eventName => {
                    wrapper.addEventListener(eventName, (e) => {
                        e.preventDefault();
                        wrapper.classList.add('dragover');
                    }, false);
                });

                ['dragleave', 'drop'].forEach(eventName => {
                    wrapper.addEventListener(eventName, (e) => {
                        e.preventDefault();
                        wrapper.classList.remove('dragover');
                    }, false);
                });

                // Live preview upon selecting a file
                input.addEventListener('change', function () {
                    const file = this.files[0];
                    const previewId = this.getAttribute('data-preview');
                    const targetEl = previewId ? document.getElementById(previewId) : wrapper.parentElement.querySelector('.live-preview-box');

                    if (file && targetEl) {
                        if (file.type.startsWith('image/')) {
                            const reader = new FileReader();
                            reader.onload = function (e) {
                                targetEl.innerHTML = `
                                    <div class="file-preview-card">
                                        <img src="${e.target.result}" class="file-preview-thumb" alt="Preview">
                                        <div class="text-start">
                                            <div class="text-xs font-semibold text-slate-800 text-truncate" style="max-width: 180px;">${file.name}</div>
                                            <div class="text-xxs text-emerald-600 font-bold">${(file.size / 1024).toFixed(1)} KB &bull; Siap diupload</div>
                                        </div>
                                    </div>
                                `;
                                targetEl.style.display = 'block';
                            };
                            reader.readAsDataURL(file);
                        }
                    }
                });
            });
        });
    </script>

    @stack('js')
    @stack('scripts')

</body>
</html>

