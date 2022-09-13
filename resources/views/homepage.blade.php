@extends('master.masterlayout')
@section("subtitle","Home")

@section("navbar")
<x-navbar></x-navbar>
@stop

@section("navbar2")
<x-fixednavbar></x-fixednavbar>
@stop

@section('body')
<div class="container">
    <x-carousel></x-carousel>
    <section id="nowplaying">
        <h1>Now Playing</h1>
        <div class="row md-row-cols-2">
            @foreach ($listMovie as $movie)
            <div class="col-sm-6 col-md-3 text-center">
                <a href='{{ url("movie/$movie->slug") }}'>
                    <!-- movie[img] -->
                    <x-movie img="https://source.unsplash.com/random/600x1200?cinema,poster">{{ $movie["judul"] }}</x-movie>
                </a>
            </div>
            @endforeach
        </div>
    </section>
    <section id="upcoming">
        <h1>Up coming</h1>
        <div class="row blue row-cols-4">
            <div class="col red text-center">1</div>
            <div class="col red text-center">2</div>
            <div class="col red text-center">4</div>
            <div class="col red text-center">3</div>
            <div class="col red text-center">5</div>
            <div class="col red text-center">6</div>
        </div>
    </section>
</div>
@endsection