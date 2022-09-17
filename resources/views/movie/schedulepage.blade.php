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
            <x-schedule></x-schedule>
            <!-- -->
        </div>
    </div>
    @endsection