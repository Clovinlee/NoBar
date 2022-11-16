<button 
    type="button" 
    idJadwal = "{{ $idJadwal }}"
    class="btn btn-rounded btn-secondary btnPill {{ $status == 'disabled' ? 'disabled' : '' }} fw-bold"
    style="" 
    data-mdb-toggle={{ $status == 'disabled' ? '' : 'modal' }} 
    data-mdb-target={{ $status == 'disabled' ? '' : '#modalTicket' }}>
    {{ $slot }}
</button>