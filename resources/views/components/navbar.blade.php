<!-- Navbar -->

<nav class="navbar navbar-expand-lg bg-transparent navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">Nobar</a>
    </div>
</nav>

<nav id="navbar" class="navbar navbar-expand-lg bg-dark navbar-dark">
    <!-- Container wrapper -->
    <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand" href="{{ url('/') }}">Nobar</a>

        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
            data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a {{ Request::is("/") ? "" : "href=/" }} id="nowplaying_link" target="" class="nav-link pointer"><i
                            class="fa-solid fa-play" class="nav-link"></i> Now Playing</a>
                </li>
                <li class="nav-item">
                    <a {{ Request::is("comingsoon") ? "" : "href=comingsoon" }} id="upcoming_link" target=""
                        class="nav-link pointer"><i class="fa-solid fa-bullhorn"></i> Upcoming</a>
                </li>

                <!-- Account -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-mdb-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user"></i> Account
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                        @auth
                        <li><a class="dropdown-item" href="{{ url('/user') }}"><i class="fa-solid fa-user"></i> Your
                                Account</a></li>
                        <form action="{{ url('/logout') }}" method="POST">
                            @csrf
                            <li><span class="dropdown-item pointer" onclick="submitLogout(this)"><i
                                        class="fa-solid fa-right-from-bracket"></i> Logout</span></li>
                        </form>
                        <!-- Logout Submit Script -->
                        <script>
                            function submitLogout(e) {
                                let frm = e.parentElement.parentElement;
                                frm.submit();
                            }
                        </script>
                        <!-- -------------------- -->
                        @else
                        <li class="d-flex justify-content-around"><a class="dropdown-item" href="{{ url('/login') }}"><i
                                    class="fa-solid fa-right-to-bracket"></i> Login</a></li>
                        <li><a class="dropdown-item" href="{{ url('/register') }}"><i class="fa-solid fa-user"></i>
                                Register</a></li>
                        @endauth
                        {{-- <li><hr class="dropdown-divider" /></li> --}}
                    </ul>
                </li>
            </ul>

            <!-- Icons -->
            <ul class="navbar-nav d-flex flex-row me-1">
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i></a>
                </li>
                <li class="nav-item me-3 me-lg-0">
                    <a class="nav-link" href="#"><i class="fab fa-twitter"></i></a>
                </li>
            </ul>
            <!-- Search -->
            <form class="w-auto" method="GET" action="{{ url('/find') }}">
                <div class="input-group">
                    <input type="search" name="search" placeholder="Search" class="form-control" aria-label="Search" />
                    <button class="btn btn-outline-info">Search</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->

<script>
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
        document.getElementById("navbar").style.top = "0";
    } else {
        document.getElementById("navbar").style.top = "-60px";
    }
    prevScrollpos = currentScrollPos;
    }
</script>