@extends('master.masterlayout')

@section('subtitle',"HistoryQR")

@section('navbar')
<x-navbar></x-navbar>
@endsection

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

<!-- main-area -->
<main>
    <!-- contact-area -->
    <section class="contact-area contact-bg" data-background="{{ asset('assets/img/bg/contact_bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="contact-form-wrap" >
                        <div class="widget-title mb-50">
                            <h5 class="title">History QR Code</h5>
                            <br>
                            <div style="align-items: center;">
                                {{-- <img src="{{ asset('assets/images/qrCode.png') }}" alt="" style="height: 80%; width: 80%;"> --}}
                            </div>
                            <br><br>
                            {!! QrCode::generate('Make me into a QrCode!'); !!}
                            <a href="{{url('/user/history')}}" class="btn btn-warning">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->

    <!-- newsletter-area -->
    <section class="newsletter-area newsletter-bg" data-background="{{ asset('assets/img/bg/newsletter_bg.jpg') }}">
        <div class="container">
            <div class="newsletter-inner-wrap">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="newsletter-content">
                            <h4>Trial Start First 30 Days.</h4>
                            <p>Enter your email to create or restart your membership.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <form action="#" class="newsletter-form">
                            <input type="email" required placeholder="Enter your email">
                            <button class="btn">get started</button>
                        </form>
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