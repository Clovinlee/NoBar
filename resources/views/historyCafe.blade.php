@extends('master.masterlayout')

@section('subtitle',"Membership")

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
                    <div class="contact-form-wrap">
                        <div class="widget-title mb-50">
                            <h5 class="title">History Cafe</h5>
                            <br>
                            <div class="contact">
                                {{-- @foreach ($itemBuy as $H)
                                    $movie = H->schedule->movie
                                    $transaction = H --}}
                                @foreach($itemBuy as $a)
                                <div class="col-5 my-3" width="100%" style="color: white; background-color: rgb(39, 39, 39); border-radius: 25px; padding: 3%">
                                    <table>
                                        <tr>
                                            {{-- <td> --}}
                                                {{-- <center>
                                                    <img src="{{asset('assets/images/'.$a->snack)}}" style="width: 80%; height: 80%;">
                                                </center> --}}
                                            {{-- </td> --}}
                                            <td style="width: 50%;">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            Snack Pesanan:
                                                        </td>
                                                        <td style="color: yellow">
                                                            @foreach($snacks as $s)
                                                                {{$s->snack->nama}};
                                                            @endforeach 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Waktu Pesan:
                                                        </td>
                                                        <td style="color: yellow">
                                                            {{$transaction = $a->created_at}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Total Pesanan:
                                                        </td>
                                                        <td style="color: yellow">
                                                            Rp.{{$a['total']}},- 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        {{-- <td>
                                                            <button class="btn btn-warning">QR Code</button>
                                                        </td> --}}
                                                        <td>
                                                            <button class="btn btn-danger">Delete</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                                {{-- Pesanan: @foreach($snacks as $s)
                                                {{$s->snack->nama}};
                                                @endforeach  <br>
                                                <hr>
                                                Waktu Pesan: {{$transaction = $a->created_at}} <br> --}}
                                                {{-- seat: {{$seat= $a->seat}} <br> --}}
                                                
                                                {{-- Total Pesanan: Rp.{{$a['total']}},-  --}}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                @endforeach
                                {{-- <table>
                                    <tr>
                                        <th>user</th>
                                        <th>transaction</th>
                                        <th>schedule</th>
                                        <th>Total</th>
                                    </tr>
                                        @foreach($itemBuy as $a)
                                        <tr>
                                            <td>{{$a['user_id']}}</td>
                                            <td>{{$a['transaction_id']}}</td>
                                            <td>{{$a['schedule_id']}}</td>
                                            <td>{{$a['total']}}</td>
                                        </tr>
                                        @endforeach
                                </table> --}}
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