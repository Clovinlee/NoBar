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
            <div class="accordion accordion-borderless" id="accordionFlushExampleX">

                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOneX">
                    <button class="accordion-button" type="button" data-mdb-toggle="collapse"
                      data-mdb-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                      How To Buy Ticket?
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                    aria-labelledby="headingOneX">
                    <div class="accordion-body">
                        Login Sebagai Member, <br>
                        Pilih Movie dan Now Playing,<br>
                        Pilih Film yang ingin di nikmati,<br>
                        Pilih Mall dimana anda ingin menonton,<br>
                        Pilih Jam yang sesuai waktu yang anda inginkan, <br>
                        Masukan jumlah pesanan Ticket,<br>
                        pilih bangku yang ingin dipesan,<br>
                        Selesai.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwoX">
                    <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                      data-mdb-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                      Is NoBar Perfect?
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwoX">
                    <div class="accordion-body">
                      Placeholder content for this accordion, which is intended to demonstrate the
                      <code>.accordion-flush</code> class. This is the second item's accordion body.
                      Let's imagine this being filled with some actual content.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThreeX">
                    <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                      data-mdb-target="#panelsStayOpen-collapseThreeX" aria-expanded="false" aria-controls="panelsStayOpen-collapseThreeX">
                      Can I Get Free Ticket?
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseThreeX" class="accordion-collapse collapse" aria-labelledby="headingThreeX">
                    <div class="accordion-body">
                      Placeholder content for this accordion, which is intended to demonstrate the
                      <code>.accordion-flush</code> class. This is the third item's accordion body.
                      Nothing more exciting happening here in terms of content, but just filling up
                      the space to make it look, at least at first glance, a bit more representative
                      of how this would look in a real-world application.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFourX">
                      <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                        data-mdb-target="#panelsStayOpen-collapseFourX" aria-expanded="false" aria-controls="panelsStayOpen-collapseFourX">
                        How To Register?
                      </button>
                    </h2>
                    <div id="panelsStayOpen-collapseFourX" class="accordion-collapse collapse" aria-labelledby="headingFourX">
                      <div class="accordion-body">
                        Placeholder content for this accordion, which is intended to demonstrate the
                        <code>.accordion-flush</code> class. This is the second item's accordion body.
                        Let's imagine this being filled with some actual content.
                      </div>
                    </div>

                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingFiveX">
                    <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                      data-mdb-target="#panelsStayOpen-collapseFiveX" aria-expanded="false" aria-controls="panelsStayOpen-collapseFiveX">
                      How To Make Payment?
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseFiveX" class="accordion-collapse collapse" aria-labelledby="headingFiveX">
                    <div class="accordion-body">
                      Placeholder content for this accordion, which is intended to demonstrate the
                      <code>.accordion-flush</code> class. This is the third item's accordion body.
                      Nothing more exciting happening here in terms of content, but just filling up
                      the space to make it look, at least at first glance, a bit more representative
                      of how this would look in a real-world application.
                    </div>
                  </div>
                </div>

                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingSixX">
                    <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                      data-mdb-target="#panelsStayOpen-collapseSixX" aria-expanded="false" aria-controls="panelsStayOpen-collapseSixX">
                      How to choose a chair?
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapseSixX" class="accordion-collapse collapse" aria-labelledby="headingSixX">
                    <div class="accordion-body">
                      Placeholder content for this accordion, which is intended to demonstrate the
                      <code>.accordion-flush</code> class. This is the third item's accordion body.
                      Nothing more exciting happening here in terms of content, but just filling up
                      the space to make it look, at least at first glance, a bit more representative
                      of how this would look in a real-world application.
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- up-coming-movie-area-end -->
    <x-footer></x-footer>
@endsection