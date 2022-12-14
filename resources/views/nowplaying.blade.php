@extends('master.masterlayout')
@section("subtitle","Now Playing")


@section("navbar")
<x-navbar></x-navbar>
@stop

@section("body")
<section class="ucm-area ucm-bg" data-background="{{ asset('assets/img/bg/ucm_bg.jpg') }}">
    {{-- <section class="" data-background="{{ asset('assets/img/bg/ucm_bg.jpg') }}"> --}}
<div class="ucm-bg-shape" data-background="{{ asset('assets/img/bg/ucm_bg_shape.png') }}"></div>
<div class="container">
    <br>
    <br>
    <br>
        <div class="row align-items-end mb-55">
            <div class="col-lg-6">
                <div class="section-title text-left">
                    <span class="sub-title">Premiered in Cinema</span>
                    <h2 class="">Now Playing</h2>
                </div>
            </div>
        </div>
        <div class="row md-row-cols-2">
            @foreach ($nowPlaying as $np)
                @php $m = \App\Models\Movie::find($np) @endphp
                @if ($m != null)
                <div class="col-sm-6 col-md-3 text-left">
                        <x-movie slug="{{ $m->slug }}" img="{{ $m->image }}">{{ $m->judul }}</x-movie>
                </div>
                @endif
            @endforeach
        </div>
</div>
<div class="d-flex justify-content-center align-items-center">
    <div class="pagination-wrap mt-60">
        <nav>
            <ul>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</div>
</section>
<x-footer></x-footer>
@stop