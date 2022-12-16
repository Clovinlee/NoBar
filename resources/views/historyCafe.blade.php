@extends('master.masterlayout')

@section('subtitle',"HistoryCafe")

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
                                <div class="accordion accordion" id="accordionFlushExampleX">
                                    @foreach($itemBuy as $a)
                                    <div class="accordion-item" style="color: white; background-color: #252631; border-bottom: 10%; border-bottom-color: rgb(255, 251, 0);">
                                        <h2 class="accordion-header" id="{{$a->id}}">
                                            <button class="accordion-button collapsed" 
                                            type="button" 
                                            data-mdb-toggle="collapse"
                                            data-mdb-target="#panelsStayOpen-{{$a->id}}" 
                                            aria-expanded="true" 
                                            aria-controls="panelsStayOpen-{{$a->id}}"
                                            style="color: white; background-color: #252631">
                                            {{$a->created_at}}
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-{{$a->id}}" 
                                            class="accordion-collapse collapse"
                                            aria-labelledby="headingOneX">
                                            <div class="accordion-body">
                                                <div class="col-5 my-3" width="100%" style="color: white; background-color: #252631; border-radius: 25px; padding: 3%">
                                                    <table>
                                                        <tr>
                                                            <td style="width: 50%;">
                                                                <table>
                                                                        {{-- <tr>
                                                                            <td>
                                                                                Snack Pesanan:
                                                                            </td>
                                                                            <td style="color: yellow">
                                                                                @foreach($snacks as $s)
                                                                                    {{$s->snack->nama}};
                                                                                @endforeach 
                                                                            </td>
                                                                        </tr> --}}
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
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                    </div>
                                        </div>
                                    </div>  
                                    @endforeach
                                </div>
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