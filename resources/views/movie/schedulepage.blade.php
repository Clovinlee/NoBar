@extends('master.masterlayout')
@section("subtitle",$movie["judul"])

@section("navbar")
<x-navbar></x-navbar>
@stop

@section('body')
<div class="container mt-3">
    <div class="row">
        <div class="col-3">
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

            <!-- SCHEDULE MOVIE -->
            <br>
            <h3 class="mb-4">Jadwal</h3>
            <x-schedule movieId="{{ $movie['id'] }}"></x-schedule>
            <!-- -->
        </div>
    </div>
</div>

<!-- Modal Ticket -->
<div class="modal fade" id="modalTicket" tabindex="-1" aria-labelledby="modalTicketLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <form method="GET" action="{{ url('/booking_seat') }}">
                    @csrf
                    <input type="hidden" name="slugMovie" value={{ $movie["slug"] }}>
                    <h4 class="m-0 p-0">Ticket</h4>
                    <small class="fw-light text-muted">Masukkan jumlah tiket yang ingin dibeli</small>
                    <select name="qtyTicket" class="form-select" aria-label="Default select example">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="3">4</option>
                        <option value="3">5</option>
                        <option value="3">6</option>
                        <option value="3">7</option>
                        <option value="3">8</option>
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
@endsection