<div class="w-100 top-0 position-sticky px-5 bg-dark" style="z-index: 99; padding: 15px; border-radius: 0px 0px 10px 10px">
    <div class="row">
        <div class="col-3">
            <a {{ Request::is("/") ? "" : "href=/" }} style="cursor:pointer;" class="text-decoration-none text-primary" id="nowplaying_link" target=""><i class="fa-solid fa-play"></i> Now Playing</a>
        </div>
        <div class="col-3">
            <a {{ Request::is("comingsoon") ? "" : "href=comingsoon" }} style="cursor:pointer;" class="text-decoration-none text-primary" id="upcoming_link" target=""><i class="fa-solid fa-bullhorn"></i> Upcoming</a>
        </div>
        <div class="col-3">
            <a href="/user" class="text-decoration-none"><i class="fa-solid fa-user"></i> Account</a>
        </div>
    </div>
</div>