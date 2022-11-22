@extends('master.masterlayout')
@section("subtitle","FAQ")

@section("navbar")
<x-navbar2></x-navbar>
@stop

@section('body')
<section class="ucm-area ucm-bg">
    {{-- <section class="" data-background="{{ asset('assets/img/bg/ucm_bg.jpg') }}"> --}}
        {{-- <div class="ucm-bg-shape" data-background="{{ asset('assets/img/bg/ucm_bg_shape.png') }}"></div> --}}
        <br>
        <div class="container">
    <div class="row align-items-end mb-55">
        <div class="col-lg-6">
            <div class="section-title text-left">
                <span class="sub-title">For Your Information</span>
                <h2 class="">FAQ</h2>
            </div>
        </div>
    </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tvShow" role="tabpanel" aria-labelledby="tvShow-tab">
            <div class="ucm-active owl-carousel">
                ini apa coba
                {{-- @foreach ($nowPlaying as $now)
                    @php
                        $m = \App\Models\Movie::find($now);
                    @endphp
                    <x-movie id="{{ $now }}">{{ $m->judul }}</x-movie>
                @endforeach --}}
            </div>
        </div>
    </div>
</div>
</section>
<!-- up-coming-movie-area-end -->
    <x-footer></x-footer>
@endsection