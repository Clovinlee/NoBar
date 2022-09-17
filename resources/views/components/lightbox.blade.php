<img class="w-100 h-100 rounded movie-poster-link img-fluid button" src="{{ asset("assets/images/$img") }}" alt=""
    srcset="" data-bs-toggle="modal" data-bs-target="#{{ $id }}">

<div class="modal fade" id={{ $id }} tabindex="-1" aria-labelledby="imgSpider" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-lightbox">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img class="w-100 h-100" src="{{ asset("assets/images/$img") }}" alt="">
            </div>
            <div class="modal-footer modal-footer-lightbox text-center m-auto border-none">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
