<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
         <meta name="description"
          content="@yield('meta_description', $setting->seo_description ?? '')">

    <meta name="keywords"
          content="@yield('meta_keywords', $setting->seo_keywords ?? '')">

    <meta name="author"
          content="{{ $setting->site_name ?? '' }}">

    <link rel="icon"
          href="{{ $setting && $setting->favicon ? asset('storage/'.$setting->favicon) : '' }}">


        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap"
            rel="stylesheet"
        />

        <!-- Icon Font Stylesheet -->
        <link
            rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
            rel="stylesheet"
        />

        <!-- Libraries Stylesheet -->
        <link
            href="{{ secure_asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}"
            rel="stylesheet"
        />
        <link href="{{ secure_asset('assets/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet" />

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ secure_asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

        <!-- Template Stylesheet -->
        <link href="{{ secure_asset('assets/css/style.css') }}" rel="stylesheet" />

        <link href="{{ secure_asset('assets/css/beranda/style.css') }}" rel="stylesheet" />
<style>
    /* Kondisi 1: Awal di atas (Transparan Blur tipis) */
    .navbar-transparent {
        background-color: rgba(255, 255, 255, 0.15) !important;
        backdrop-filter: blur(12px) !important;
        -webkit-backdrop-filter: blur(12px) !important;
    }

    /* Kondisi 2: Saat di-scroll kebawah (Putih Padat & super slim) */
    .navbar-scrolled {
        background-color: #ffffff !important;
        padding-top: 0.25rem !important; /* Menyusut sangat tipis saat di-scroll */
        padding-bottom: 0.25rem !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08) !important;
    }

    /* Indikator Garis Emas Aktif - disesuaikan posisinya ke -8px agar tidak kejauhan */
    .active-menu {
        color: #b88d21 !important;
    }
    .active-menu::before {
        content: "";
        position: absolute;
        top: -8px;
        left: 50%;
        transform: translateX(-50%);
        width: 25px;
        height: 4px;
        background-color: #b88d21;
        border-radius: 0 0 4px 4px;
    }

    .popup-menu .dropdown-item {
        color: #0b666a;
        font-weight: 600;
    }
    .popup-menu .dropdown-item:hover {
        background-color: #0b666a;
        color: #ffffff;
    }

    @media (max-width: 1199.98px) {
        .navbar-collapse {
            background-color: white;
            padding: 1rem;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-top: 10px;
        }
    }
</style>


    </head>

    <body>
        <!-- Spinner Start -->
        <div
            id="spinner"
            class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50 d-flex align-items-center justify-content-center"
        >
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar start -->
       @include('frontend.layouts.header')
        <!-- Navbar End -->

        @yield('content')

       @include('frontend.layouts.footer')

        <!-- Copyright Start -->
        <div class="container-fluid copyright py-4">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-md-4 text-center text-md-start mb-md-0">
                        <span class="text-body"
                            ><a href="#"
                                ><i class="fas fa-copyright text-light me-2"></i
                                >Your Site Name</a
                            >, All right reserved.</span
                        >
                    </div>
                    <div class="col-md-4 text-center">
                        <div
                            class="d-flex align-items-center justify-content-center"
                        >
                            <a
                                href="#"
                                class="btn-hover-color btn-square text-white me-2"
                                ><i class="fab fa-facebook-f"></i
                            ></a>
                            <a
                                href="#"
                                class="btn-hover-color btn-square text-white me-2"
                                ><i class="fab fa-twitter"></i
                            ></a>
                            <a
                                href="#"
                                class="btn-hover-color btn-square text-white me-2"
                                ><i class="fab fa-instagram"></i
                            ></a>
                            <a
                                href="#"
                                class="btn-hover-color btn-square text-white me-2"
                                ><i class="fab fa-pinterest"></i
                            ></a>
                            <a
                                href="#"
                                class="btn-hover-color btn-square text-white me-0"
                                ><i class="fab fa-linkedin-in"></i
                            ></a>
                        </div>
                    </div>
                    <div class="col-md-4 text-center text-md-end text-body">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By
                        <a class="border-bottom" href="https://htmlcodex.com"
                            >HTML Codex</a
                        >
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->

        <!-- Back to Top -->
        <a
            href="#"
            class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"
            ><i class="fa fa-arrow-up"></i
        ></a>

        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ secure_asset('assets/lib/easing/easing.min.js') }}"></script>
        <script src="{{ secure_asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ secure_asset('assets/lib/counterup/counterup.min.js') }}"></script>
        <script src="{{ secure_asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ secure_asset('assets/lib/lightbox/js/lightbox.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ secure_asset('assets/js/main.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const navbar = document.getElementById("mainNavbar");

        window.addEventListener("scroll", function () {
            // Diturunkan ke 10px agar langsung merespon begitu di-scroll sedikit
            if (window.scrollY > 10) {
                navbar.classList.remove("navbar-transparent");
                navbar.classList.add("navbar-scrolled");
            } else {
                navbar.classList.remove("navbar-scrolled");
                navbar.classList.add("navbar-transparent");
            }
        });
    });
</script>
    </body>
</html>

