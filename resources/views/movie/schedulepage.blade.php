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
                <div class="my-1"><i class="fa-regular fa-clock"></i> 116 Minutes</div>
                <div>
                    <span class="badge badge-info">3D</span> &nbsp;<span class="badge badge-info">Horror</span>
                    &nbsp;<span class="badge badge-info">Comedy</span>
                </div>
            </div>

            <!-- SCHEDULE MOVIE -->
            <br>
            <h3 class="mb-4">Jadwal</h3>
            <x-schedule></x-schedule>
            <!-- -->
        </div>
    </div>
    @endsection