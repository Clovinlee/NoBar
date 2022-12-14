@extends('master.masterlayout')
@section("subtitle","History")

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

    <!-- breadcrumb-area -->
    {{-- <section class="breadcrumb-area breadcrumb-bg" data-background="{{ asset('assets/img/bg/breadcrumb_bg2.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">Our Membership Plan</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pricing</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- breadcrumb-area-end -->

    <!-- contact-area -->
    <section class="contact-area contact-bg" data-background="{{ asset('assets/img/bg/contact_bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="contact-form-wrap">
                        <div class="widget-title mb-50">
                            <h5 class="title">History</h5>
                            <br>
                            <div class="contact-form">
                                <table>
                                    <thead>
                                        <tr>
                                          <th scope="col">ID</th>
                                          <th scope="col">Kode Barang</th>
                                          <th scope="col">Harga</th>
                                          <th scope="col">Jumlah</th>
                                          <th scope="col">Gambar</th>
                                          <th scope="col">Tanggal Beli</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                          @foreach ($itemBuy as $a)
                                              <tr>
                                              <td>{{$a->id}}</td>
                                              <td>{{$a->kode}}</td>
                                              <td>{{$a->harga}}</td>
                                              <td>{{$a->jumlah}}</td>
                                              <td><img src="/storage/barang/{{ $a->foto }}" alt="" width="110px"></td>
                                              <td>{{$a->created_at}}</td>
                                          @endforeach
                                      </tbody>
                                </table>
                            </div>
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