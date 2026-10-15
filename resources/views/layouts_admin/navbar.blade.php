<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">@yield('page-title', 'Dashboard')</li>
            </ol>
            <h6 class="font-weight-bolder mb-0 text-dark">@yield('page-title', 'Dashboard')</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <a href="{{ route('home') }}" target="_blank" class="btn btn-outline-dark btn-sm mb-0 me-2 d-none d-md-inline-flex align-items-center shadow-none">
                    <i class="material-symbols-rounded text-sm me-1">open_in_new</i>
                    <span>Kunjungi Web</span>
                </a>
            </div>
            <ul class="navbar-nav d-flex align-items-center justify-content-end">
                {{-- Mobile Sidenav Toggle --}}
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center me-3">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                {{-- User Profile Dropdown --}}
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0 d-flex align-items-center font-weight-bold" id="dropdownUserButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar avatar-sm bg-gradient-dark me-2 d-flex align-items-center justify-content-center text-white text-xs font-weight-bold rounded-circle shadow-sm">
                            {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                        </div>
                        <span class="d-none d-sm-inline text-sm text-dark me-1">{{ auth()->user()->name ?? 'Administrator' }}</span>
                        <i class="material-symbols-rounded text-sm text-secondary">expand_more</i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4 shadow border-0" aria-labelledby="dropdownUserButton">
                        <li class="mb-2 px-3 py-1">
                            <p class="text-xs text-secondary mb-0">Login sebagai</p>
                            <h6 class="text-sm font-weight-bold mb-0 text-dark">{{ auth()->user()->name ?? 'Admin' }}</h6>
                            <span class="badge bg-light text-dark text-xxs border mt-1">Administrator</span>
                        </li>
                        <li><hr class="dropdown-divider my-2"></li>
                        <li>
                            <a class="dropdown-item border-radius-md py-2 d-flex align-items-center" href="{{ route('home') }}" target="_blank">
                                <i class="material-symbols-rounded me-2 text-sm text-secondary">public</i>
                                <span class="text-sm">Buka Halaman Depan</span>
                            </a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="m-0">
                                @csrf
                                <button type="submit" class="dropdown-item border-radius-md py-2 d-flex align-items-center text-danger">
                                    <i class="material-symbols-rounded me-2 text-sm text-danger">logout</i>
                                    <span class="text-sm font-weight-bold">Logout</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
