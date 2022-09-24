@extends('master.masterlayout')
@section("subtitle",$movie["judul"])

@section("navbar")
<x-navbar></x-navbar>
@stop
@section('body')
<div class="container mt-3">
    <div class="row">
        <div class="col-12 col-md-3 p-3">
            <img src="{{ asset("assets/images/".$movie['image']) }}" alt="" class="w-100 rounded">
        </div>
        <div class="col">
            <!-- DETAIL MOVIE -->
            <div class="">
                <p class="h4 text-black"><strong>{{ $movie["judul"] }}</strong></p>
                <div class="my-1"><i class="fa-regular fa-clock"></i> {{ $movie["duration"] }} Minutes</div>
                @foreach (explode(",",$movie["genre"]) as $g)
                    <span class="badge badge-info me-1">{{ $g }}</span>
                @endforeach
            </div>
            <!-- -->

            <!-- SCHEDULE MOVIE -->
            <h3 class="mt-4 mb-3">Jadwal</h3>
            @foreach ($branchNow as $b)
            @php $b = $b->branch @endphp
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item border-bottom mb-3">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed text-body p-0 pb-3" type="button" data-mdb-toggle="collapse"
                                data-mdb-target="#flush-{{ $b->id }}Collapse" aria-expanded="false" aria-controls="flush-{{ $b->id }}">
                                <span class="lead">
                                    <b>{{ $b->nama }}</b> <br> 
                                    <small>{{ date("l") }}, {{ date("d-m-Y") }}</small>
                                </span>
                            </button>
                        </h2>
                        <div id="flush-{{ $b->id }}Collapse" class="accordion-collapse collapse" aria-labelledby="flush-{{ $b->id }}">
                            <div class="accordion-body d-flex flex-wrap gap-2 pb-3">
                                @foreach ($scheduleNow->where("branch_id",$b->id) as $s)
                                    @php
                                        $timeShow = date("H:i",strtotime($s->time));
                                    @endphp
                                    <x-schedulepill status="enabled" idJadwal="{{ $s->id }}">{{ $timeShow }}</x-schedulepill>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <br>
            <!-- -->
        </div>
    </div>
</div>

<!-- Modal Ticket -->
<div class="modal fade" id="modalTicket" tabindex="-1" aria-labelledby="modalTicketLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <form method="GET" action="{{ url('/booking_seat/'.$movie["slug"]) }}">
                    @csrf
                    <h4 class="m-0 p-0">Ticket</h4>
                    <small class="fw-light text-muted">Masukkan jumlah tiket yang ingin dibeli</small>
                    <input type="hidden" id="inpJadwal" name="jadwal" value="">
                    <input type="hidden" id="inpIdJadwal" name="idJadwal" value="">
                    <select name="qtyTicket" class="form-select" aria-label="Default select example">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Continue</button>
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('pageScript')
    <script>
        $("#modalTicket").on("shown.bs.modal", function(event){
            var idJadwal = $(event.relatedTarget);
            idJadwal = idJadwal.attr("idJadwal");
            var b = $(event.relatedTarget).text().trim();
            var d = new Date();
            $("#inpJadwal").val(d.getDate()+"-"+d.getMonth()+"-"+d.getFullYear()+" "+b);
            $("#inpIdJadwal").val(idJadwal);
        });
    </script>
@endsection

@endsection