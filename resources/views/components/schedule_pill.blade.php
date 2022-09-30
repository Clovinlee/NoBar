<button 
    type="button" 
    idJadwal = "{{ $idJadwal }}"
    class="btn btn-secondary btn-rounded {{ $status == 'disabled' ? 'disabled' : '' }}" 
    data-mdb-toggle={{ $status == 'disabled' ? '' : 'modal' }} 
    data-mdb-target={{ $status == 'disabled' ? '' : '#modalTicket' }}>
    {{ $slot }}
</button>
