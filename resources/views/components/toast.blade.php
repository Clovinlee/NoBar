<div class="position-fixed p-3 bottom-0 end-0" style="z-index: 11">
    <div id="liveToast" class="toast toast-{{ $type }} fade" data-mdb-autohide="false" role="alert" aria-live="assertive"
        aria-atomic="true" data-mdb-position="top-right" data-mdb-stacking="true" data-mdb-container="toast-container">
        <div class="toast-header toast-{{ $type }}">
            @if ($type == "info")
                <i class="fa-solid fa-circle-info rounded me-2"></i>
            @elseif($type == "danger")
                <i class="fa-solid fa-circle-exclamation rounded me-2"></i>
            @elseif($type == "success")
                <i class="fa-solid fa-check rounded me-2"></i>
            @elseif($type == "warning")
                <i class="fa-solid fa-triangle-exclamation rounded me-2"></i>
            @endif
            <strong class="me-auto">{{ $title }}</strong>
            <button type="button" class="btn-close" data-mdb-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body toast-{{ $type }} rounded-3">
            {{ $slot }}
        </div>
    </div>
    <br>
</div>

