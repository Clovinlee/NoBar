@extends('master.masterlayout')

@section('subtitle',"History")

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
                            <h5 class="title">History</h5>
                            <br>
                            {{-- <div class="col-10 my-3" width="100%" style="color: #252631; background-color: white; border-radius: 10px; padding: 1%">
                                <form action="" method="get">
                                    <label for="" class="form-label">Range tanggal : </label>
                                    <input type="date" name="start" id="awal" >  S/D 
                                    <input type="date" name="end" id="akhir">
                                    <button class="btn btn-warning">Search</button>
                                </form>
                            </div> --}}
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
                                            style="color: white; background-color: #252631;">
                                            {{$a->created_at}}
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-{{$a->id}}" class="accordion-collapse collapse" aria-labelledby="headingOneX"  style="border-top: 10px; border-top-color: red;">
                                            <div class="accordion-body">
                                            <div class="col-10 my-3" width="100%" style="color: white; background-color: #252631; border-radius: 25px; padding: 3%;">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <center>
                                                                <img src="{{asset('assets/images/'.$a->schedule->movie->image)}}" style="width: 60%; height: 60%;">
                                                            </center>
                                                        </td>
                                                        <td style="width: 50%">
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        Judul Film: 
                                                                    </td>
                                                                    <td style="color: yellow">
                                                                        {{$a->schedule->movie->judul}} 
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Waktu Pesan:
                                                                    </td>
                                                                    <td style="color: yellow">
                                                                        {{$a->created_at}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        tempat duduk:
                                                                    </td>
                                                                    <td style="color: yellow">
                                                                        @foreach($a->dtrans as $s)
                                                                        {{$s->seat}};
                                                                        @endforeach 
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        Total Pesanan:
                                                                    </td>
                                                                    <td style="color: yellow">
                                                                        Rp.{{number_format($a['total'])}},- 
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <button type="button" class="btn btn-info" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                                                                            QR Code
                                                                        </button>
                                                                        {{-- <button class="btn btn-info">QR Code</button> --}}
                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel" style="color: black">QR Code</h5>
                                                                                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body" style="display: flex; justify-content: center; align-items: center;">
                                                                                    <div>
                                                                                        <h3 style="color: black; display: flex; justify-content: center; align-items: center;">Scan Me</h3>
                                                                                        <br>
                                                                                        {!! QrCode::size(250)->generate('Silahkan Masuk Ke Studio!'); !!} 
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                                                                                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                                                </div>
                                                                            </div>
                                                                            </div>
                                                                        </div>
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