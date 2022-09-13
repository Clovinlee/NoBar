<div class="w-100 top-0 position-sticky px-5 bg-dark" style="z-index: 99; padding: 15px; border-radius: 0px 0px 10px 10px">
    <div class="row">
        <div class="col-3">
            <a {{ Request::is("/") ? "" : "href=/" }} style="cursor:pointer;" class="text-decoration-none text-primary" id="nowplaying_link" target=""><i class="fa-solid fa-play"></i> Now Playing</a>
        </div>
        <div class="col-3">
            <a {{ Request::is("comingsoon") ? "" : "href=comingsoon" }} style="cursor:pointer;" class="text-decoration-none text-primary" id="upcoming_link" target=""><i class="fa-solid fa-bullhorn"></i> Upcoming</a>
        </div>
        <div class="col-3">
            <div class="dropdown">
                <div class="dropdown-toggle bg-transparent text-white" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="cursor:pointer;">
                    <i class="fa-solid fa-user"></i> Account
                </div>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    @auth
                    <li><a class="dropdown-item" href="{{ url('/user') }}"><i class="fa-solid fa-user"></i> Your Account</a></li>
                    <form action="{{ url('/logout') }}" method="POST">
                        @csrf
                        <li><span class="dropdown-item pointer" onclick="submitLogout(this)"><i class="fa-solid fa-right-from-bracket"></i> Logout</span></li>
                    </form>
                    <!-- Logout Submit Script -->
                    <script>
                        function submitLogout(e){
                            let frm = e.parentElement.parentElement;
                            frm.submit();
                        }
                    </script>
                    <!-- -------------------- -->
                    @else
                    <li class="d-flex justify-content-around"><a class="dropdown-item" href="{{ url('/login') }}"><i class="fa-solid fa-right-to-bracket"></i> Login</a></li>
                    <li><a class="dropdown-item" href="{{ url('/register') }}"><i class="fa-solid fa-user"></i> Register</a></li>
                  @endauth
                </ul>
              </div>
        </div>
    </div>
</div>