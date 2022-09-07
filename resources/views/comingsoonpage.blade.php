@extends('master.masterlayout')
@section("subtitle","Coming Soon")


@section("navbar")
<x-navbar></x-navbar>
@stop

@section("navbar2")
<x-fixednavbar></x-fixednavbar>
@stop

@section("body")

<div class="container">
    <section id="upcoming">
        <h1>Coming Soon</h1>
        <div class="row md-row-cols-2">
            <div class="col-sm-6 col-md-3 text-center">
                <x-movie  img="https://source.unsplash.com/random/600x1200?cinema,poster">Spiderverse The
                    Challenge</x-movie>
            </div>
            <div class="col-sm-6 col-md-3 text-center">
                <x-movie  img="https://source.unsplash.com/random/600x1200?cinema,poster">Manhattan
                    Family</x-movie>
            </div>
            <div class="col-sm-6 col-md-3 text-center">
                <x-movie  img="https://source.unsplash.com/random/600x1200?cinema,poster">Simpson Not
                    Home</x-movie>
            </div>
            <div class="col-sm-6 col-md-3 text-center">
                <x-movie  img="https://source.unsplash.com/random/600x1200?cinema,poster">Leverestence
                    Immacula</x-movie>
            </div>
            <div class="col-sm-6 col-md-3 text-center">
                <x-movie  img="https://source.unsplash.com/random/600x1200?cinema,poster">Spiderverse The
                    Challenge</x-movie>
            </div>
            <div class="col-sm-6 col-md-3 text-center">
                <x-movie  img="https://source.unsplash.com/random/600x1200?cinema,poster">Manhattan
                    Family</x-movie>
            </div>
            <div class="col-sm-6 col-md-3 text-center">
                <x-movie  img="https://source.unsplash.com/random/600x1200?cinema,poster">Simpson Not
                    Home</x-movie>
            </div>
            <div class="col-sm-6 col-md-3 text-center">
                <x-movie  img="https://source.unsplash.com/random/600x1200?cinema,poster">Leverestence
                    Immacula</x-movie>
            </div>
        </div>
    </section>
</div>

@stop