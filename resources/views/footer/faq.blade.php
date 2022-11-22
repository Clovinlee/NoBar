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
            {{-- Testing ISI FAQ --}}
            <h3>About NoBar</h3>
            <a href="">How To Buy Ticket?</a>
            <br>
            <a href="">Is NoBar Perfect?</a>
            <br>
            <a href="">Can I Free Ticket?</a>
            <br>
            <a href="">How To Register?</a>
            <br>
            <a href="">How To Make Payment?</a>
            <br>
            <a href="">How to choose a chair?</a>
            {{-- <div class="ucm-active owl-carousel">
                
            </div> --}}
        </div>
    </div>
</div>
</section>
<!-- up-coming-movie-area-end -->
    <x-footer></x-footer>
@endsection