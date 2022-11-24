<!-- header-area -->
    <header class="header-style-two">
        <div id="sticky-header" class="menu-area">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-12">
                        <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                        <div class="menu-wrap">
                            <nav class="menu-nav show">
                                <div class="logo">
                                    <a href="/">
                                        <img class="imageLogo" src="{{ asset('assets/img/logo/logo.png') }}" alt="Logo">
                                    </a>
                                </div>
                                <div class="navbar-wrap main-menu d-none d-lg-flex">
                                    <ul class="navigation">
                                        <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
                                        <li class="menu-item-has-children {{ Request::is('comingsoon') ? 'active' : '' }} {{ Request::is('playingnow') ? 'active' : '' }}"><a href="#">Movie</a>
                                            <ul class="submenu">
                                                <li><a href="{{ route('nowplaying') }}">Now Playing</a></li>
                                                <li><a href="{{ route('comingsoon') }}">Upcoming</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{ route('membership') }}">Membership</a></li>
                                        <li><a href="{{ route('contact') }}">contacts</a></li>
                                        <li class="{{ Request::is('/cafe') ? 'active' : '' }}"><a href="{{ url('/cafe') }}">Cafe</a></li>
                                    </ul>
                                </div>
                                <div class="header-action d-none d-md-block">
                                    <ul>
                                        {{-- ini bagian search --}}
                                        <li class="header-search"><a href="#" data-mdb-toggle="modal" data-mdb-target="#search-modal"><i class="fas fa-search"></i></a></li>
                                        @auth
                                            @php $user = Auth::user() @endphp
                                            <li class="header-btn">
                                                <button class="btnMovie dropdown-toggle"id="dropdownMenuAccount" data-mdb-toggle="dropdown" aria-expanded="false"> Account</button>
    
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuAccount">
                                                    <li>
                                                        <a href="{{ url('/user') }}">
                                                            <button class="dropdown-item" type="button">Your Account</button>
                                                        </a>
                                                    </li>
                                                    <li><a href="{{ url('/user/history') }}">
                                                            <button class="dropdown-item" type="button">History</button>    
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ url('/logout') }}" method="POST">
                                                            @csrf
                                                            <button class="dropdown-item" type="submit">Logout</button>    
                                                        </form>
                                                        <script>
                                                            function submitLogout(e) {
                                                                let frm = e.parentElement.parentElement;
                                                                frm.submit();
                                                            }
                                                        </script>
                                                    </li>
                                                </ul>
                                            </li>
                                        @else
                                        <li class="header-btn"><a href="{{ route('login') }}" class="btnMovie">Sign In</a></li>
                                        @endauth
                                    </ul>
                                </div>
                            </nav>
                        </div>
    
                        <!-- Mobile Menu  -->
                        <div class="mobile-menu">
                            <div class="close-btn"><i class="fas fa-times"></i></div>
    
                            <nav class="menu-box">
                                <div class="nav-logo"><a href="index.html"><img src="{{ asset('assets/img/logo/logo.png') }}" alt="" title=""></a>
                                </div>
                                <div class="menu-outer">
                                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                </div>
                                <div class="social-links">
                                    <ul class="clearfix">
                                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                        <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                                        <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                        <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                        <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu-backdrop"></div>
                        <!-- End Mobile Menu -->
    
                        <!-- Modal Search -->
                        <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form>
                                        <input type="text" placeholder="Search here...">
                                        <button><i class="fas fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Search-end -->
    
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-area-end -->
    