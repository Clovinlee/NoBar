@extends('master.masterlayout')
@section("subtitle","Home")

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
            <x-navbar></x-navbar>
        @endsection
        

        <!-- main-area -->
        <main>

            <!-- banner-area -->
            <section class="banner-area banner-bg" data-background="{{ asset('assets/img/banner/banner_bg01.jpg') }}">
                <div class="container custom-container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-8">
                            <div class="banner-content">
                                <h6 class="sub-title wow fadeInUp" data-wow-delay=".2s" data-wow-duration="1.8s">NoBar</h6>
                                <h2 class="title wow fadeInUp" data-wow-delay=".4s" data-wow-duration="1.8s">Unlimited <span>Movies</span>, and Fun</h2>
                                <div class="banner-meta wow fadeInUp" data-wow-delay=".6s" data-wow-duration="1.8s">
                                </div>
                                <a href="#nowPlaying" class="banner-btn btnMovie"><i class="fas fa-play"></i> Watch Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- banner-area-end -->

            <!-- up-coming-movie-area -->
            
            <section id="nowPlaying" class="ucm-area ucm-bg" data-background="{{ asset('assets/img/bg/ucm_bg.jpg') }}">
            {{-- <section class="" data-background="{{ asset('assets/img/bg/ucm_bg.jpg') }}"> --}}
                <div class="ucm-bg-shape" data-background="{{ asset('assets/img/bg/ucm_bg_shape.png') }}"></div>
                <div class="container">
                    <div class="row align-items-end mb-55">
                        <div class="col-lg-6">
                            <div class="section-title text-left">
                                <span class="sub-title">PREMIERED IN CINEMA</span>
                                <h2 class="">Now Playing</h2>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tvShow" role="tabpanel" aria-labelledby="tvShow-tab">
                            <div class="ucm-active owl-carousel">
                                @foreach ($nowPlaying as $now)
                                    @php
                                        $m = \App\Models\Movie::find($now);
                                    @endphp
                                    @if ($m != null)
                                        <x-movie slug="{{ $m->slug }}" img="{{ $m->image }}">{{ $m->judul }}</x-movie>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- up-coming-movie-area-end -->

            <!-- services-area -->
            <section class="services-area services-bg" data-background="{{ asset('assets/img/bg/services_bg.jpg') }}">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="services-img-wrap">
                                <img src="{{ asset('assets/img/images/services_img.jpg') }}" alt="">
                                {{-- <a href="{{ asset('assets/img/images/services_img.jpg') }}" class="download-btn" download>Download <img src="{{ asset('fonts/download.svg') }}" alt=""></a> --}}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="services-content-wrap">
                                <div class="section-title title-style-two mb-20">
                                    <span class="sub-title">Our Services</span>
                                    <h2 class="title">Enjoy Quality Time with NoBar</h2>
                                </div>
                                <p>Loves to watch movie? Never miss a moment with NoBar. Our services provide easy access for you to watch your favorite movie in cinema with your family, friend, or relatives.</p>
                                <div class="services-list">
                                    <ul>
                                        <li>
                                            <div class="icon">
                                                <i class="flaticon-television"></i>
                                            </div>
                                            <div class="content">
                                                <h5>Enjoy High Quality Service</h5>
                                                <p>With 4K UHD Quality, we will definitely please your eyes.</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="icon">
                                                <i class="flaticon-video-camera"></i>
                                            </div>
                                            <div class="content">
                                                <h5>Dolby Sound 5.1</h5>
                                                <p>With surreal audio to bring you an immersive experience</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- services-area-end -->

            <!-- upcoming-movie -->
            <section class="top-rated-movie tr-movie-bg" data-background="{{ asset('assets/img/bg/tr_movies_bg.jpg') }}">
                {{-- <section class="" data-background="{{ asset('assets/img/bg/ucm_bg.jpg') }}"> --}}
                    <div class="ucm-bg-shape" data-background="{{ asset('assets/img/bg/ucm_bg_shape.png') }}"></div>
                    <div class="container">
                        <div class="row align-items-end mb-55">
                            <div class="col-lg-6">
                                <div class="section-title text-start">
                                    <span class="sub-title">COMING SOON</span>
                                    <h2 class="">Upcoming</h2>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tvShow" role="tabpanel" aria-labelledby="tvShow-tab">
                                <div class="ucm-active owl-carousel">
                                    @foreach ($upComing as $up)
                                        <x-movie slug="{{ $up->slug }}" img="{{ $up->image }}">{{ $up->judul }}</x-movie>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <!-- upcoming-movie-end -->

            <!-- live-area -->
            <section class="live-area live-bg fix" data-background="{{ asset('assets/img/bg/live_bg.jpg') }}">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-5 col-lg-6">
                            <div class="section-title title-style-two mb-25">
                                <span class="sub-title">WATCH MOVIE ON CINEMA</span>
                                <h2 class="title">Do Activities Together By Watching Movies</h2>
                            </div>
                            <div class="live-movie-content">
                                <p>Watching movies with your family, friends or partner using NoBar, you will get the Benefits and also don't.. forget you will get the experience of buying tickets easily and quickly if you use NoBar</p>
                                <div class="live-fact-wrap">
                                    <div class="resolution">
                                        <h2>FHD 4K</h2>
                                    </div>
                                    <div class="active-customer">
                                        <h4><span class="odometer" data-count="20"></span>K+</h4>
                                        <p>Likes From Customer</p>
                                    </div>
                                </div>
                                <a href="#nowPlaying" class="btnMovie"><i class="fas fa-play"></i> Watch Now</a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6">
                            <div class="live-movie-img wow fadeInRight" data-wow-delay=".2s" data-wow-duration="1.8s">
                                <img src="{{ asset('assets/img/images/live_img.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- live-area-end -->

            <!-- newsletter-area -->
            <section class="newsletter-area newsletter-bg" data-background="{{ asset('assets/img/bg/newsletter_bg.jpg') }}">
                <div class="container">
                    <div class="newsletter-inner-wrap">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="newsletter-content">
                                    <a href="{{url('/register')}}">
                                        <h4>Join now</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- newsletter-area-end -->

        </main>
        <!-- main-area-end -->

        <x-footer></x-footer>

@endsection

@section('pageScript')
    <script>
        function prevent(e){
            e.preventDefault();
        }
    </script>
@endsection