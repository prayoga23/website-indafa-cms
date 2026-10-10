<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link"
               data-widget="pushmenu"
               href="#">
                <i class="fas fa-bars"></i>
            </a>
        </li>

    </ul>

    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">

            <a class="nav-link"
               data-toggle="dropdown"
               href="#">
                <i class="fas fa-user-circle"></i>
                {{ auth()->user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right">

                <form action="{{ route('logout') }}"
                      method="POST">

                    @csrf

                    <button type="submit"
                        class="dropdown-item">
                        Logout
                    </button>

                </form>

            </div>

        </li>

    </ul>

</nav>
