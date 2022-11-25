@extends('master.masterlayout')
@section("subtitle","Cafe")

@section('body')
<!-- preloader -->
<div id="preloader">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <img src="{{ asset('assets/img/preloader.svg') }}" alt="">
        </div>
    </div>
</div>
<!-- preloader-end -->

<!-- Scroll-top -->
<button class="scroll-top scroll-to-target" data-target="html">
    <i class="fas fa-angle-up"></i>
</button>
<!-- Scroll-top-end-->

@section('navbar')
<x-navbar2></x-navbar2>
@endsection


<!-- main-area -->
<main>
    <section class="ucm-area ucm-bg" data-background="{{ asset('assets/images/cafe_bg.jpg') }}">
        <br>
        <div class="container">
            <div class="row align-items-end mb-55">
                <div class="col-lg-6">
                    <div class="section-title text-left">
                        <span class="sub-title">Welcome To</span>
                        <h2 class="">NoBar Cafe</h2>
                    </div>
                </div>
            </div>

            <div>
                <!-- Tabs navs -->
                <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="navCafe nav-link active" id="ex3-tab-1" data-mdb-toggle="tab" href="#ex3-tabs-1" role="tab"
                            aria-controls="ex3-tabs-1" aria-selected="true">
                            <i class="fa-solid fa-pizza-slice"></i> &nbsp; Foods
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="navCafe nav-link" id="ex3-tab-2" data-mdb-toggle="tab" href="#ex3-tabs-2" role="tab"
                            aria-controls="ex3-tabs-2" aria-selected="false">
                            <i class="fa-solid fa-mug-saucer"></i> &nbsp; Beverages
                        </a>
                    </li>
                </ul>
                <!-- Tabs navs -->

                <!-- Tabs content -->
                <div class="tab-content shadow rounded-3 p-4" id="ex2-content" style="background-color: #14141d8a;">
                    <div class="tab-pane fade show active" id="ex3-tabs-1" role="tabpanel" aria-labelledby="ex3-tab-1">
                        <div class="row">
                            <div class="col-6 col-lg-3">
                                <x-foodcard>Popcorn</x-foodcard>
                            </div>
                            <div class="col-6 col-lg-3">
                                <x-foodcard>Barbeque</x-foodcard>
                            </div>
                            <div class="col-6 col-lg-3">
                                <x-foodcard>Kentang</x-foodcard>
                            </div>
                            <div class="col-6 col-lg-3">
                                <x-foodcard>Keju Cheese</x-foodcard>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="ex3-tabs-2" role="tabpanel" aria-labelledby="ex3-tab-2">
                        <div class="row">
                            <div class="col-6 col-lg-3">
                                <x-foodcard>Taro</x-foodcard>
                            </div>
                            <div class="col-6 col-lg-3">
                                <x-foodcard>Cincau</x-foodcard>
                            </div>
                            <div class="col-6 col-lg-3">
                                <x-foodcard>Fanta</x-foodcard>
                            </div>
                            <div class="col-6 col-lg-3">
                                <x-foodcard>Coca Cola</x-foodcard>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tabs content -->
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center col-12">
            <br>
            @php
                $openTime = "10:00";
                $closeTime = "22:30";
                date_default_timezone_set("Asia/Jakarta");
            @endphp
            @if (time() >= strtotime($openTime) && time() <= strtotime($closeTime))
                <button class="btn btn-danger p-3 px-5">
                    Confirm Order
                </button>
            @else
                <button class="btn btn-danger disabled">
                    Sorry we are still closed. <br><span class="fw-bold h5">Open time : {{ $openTime }} - {{ $closeTime }}</span>
                </button>
            @endif
        </div>
    </section>

</main>
<!-- main-area-end -->

<x-footer></x-footer>

@endsection