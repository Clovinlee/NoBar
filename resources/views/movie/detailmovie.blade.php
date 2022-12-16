@extends('master.masterlayout')

@section('subtitle',$movie->judul)

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
    <!-- movie-details-area -->
    <section class="movie-details-area" data-background="{{ asset('assets/img/bg/movie_details_bg.jpg') }}">
        <div class="container">
            <div class="row align-items-center position-relative">
                <div class="col-xl-3 col-lg-4">
                    <div class="movie-details-img">
                        <img style="object-fit: contain; width: 303px; height: 430px;"
                            src="{{ asset('assets/images/'.$movie->image) }}" alt="">
                        {{-- <a href="https://www.youtube.com/watch?v=R2gbPxeNk2E" class="popup-video"><img
                                src="{{ asset('assets/img/images/play_icon.png') }}" alt=""></a> --}}
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8">
                    <div class="movie-details-content">
                        <h5>{{ $movieStatus }}</h5>

                        @php
                        // The Easy <span>Reach</span>
                        $judulList = explode(" ", $movie->judul);
                        $judul = "";
                        for ($i=0; $i < count($judulList)-1; $i++) { $judul .=$judulList[$i]." ";
                                }
                                $judul .= " <span>".$judulList[count($judulList)-1]."</span>";
                            @endphp

                            <h2>{!! $judul !!}</h2>
                            <div class="banner-meta">
                                <ul>
                                    <li class="quality">
                                        <span>Pg 18</span>
                                        <span>4K</span>
                                    </li>
                                    <li class="category">
                                        @php
                                        $categories = explode(", ",$movie->genre);
                                        @endphp
                                        @foreach ($categories as $c)
                                        <a href="#">{{ $c }}</a>
                                        @endforeach
                                    </li>
                                    <li class="release-time">
                                        <span><i class="far fa-calendar-alt"></i>
                                            {{ date("Y",strtotime($movie->created_at)) }}</span>
                                        <span><i class="far fa-clock"></i> {{ $movie->duration }} min</span>
                                    </li>
                                </ul>
                            </div>
                            <p>{{ $movie->synopsis }}</p>
                            <div class="movie-details-prime">
                                <ul>
                                    <li class="share"><a href="#"><i class="fas fa-share-alt"></i>Share</a></li>
                                    <li>Copy to clipboard</li>
                                </ul>
                            </div>
                    </div>
                </div>
                @if ($movieStatus == "Now Playing")
                <div id="bookTicketBtn" class="movie-details-btn">
                    <a href="#" class="download-btn">Book Ticket<img src="{{ asset('assets/fonts/download.svg') }}"
                            alt=""></a>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- movie-details-area-end -->

    <!-- schedule-area -->
    <section id="schedule" class="episode-area episode-bg"
        data-background="{{ asset('assets/img/bg/episode_bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="movie-episode-wrap">
                        <div class="episode-top-wrap">
                            <div class="section-title">
                                <span class="sub-title">SCHEDULES</span>
                                <h2 class="title">Check the schedules</h2>
                            </div>
                        </div>
                        <div class="episode-watch-wrap">
                            <div class="accordion" id="accordionPanelsStayOpenExample" style="background-color: transparent">
                                @forelse ($branches as $k =>$b)
                                @php $branch = \App\Models\Branch::find($b) @endphp
                                <div class="accordion-item" style="background-color: transparent">
                                    <h2 class="accordion-header shadow-3 rounded-top" id="heading{{ $b }}" style="text-decoration: none; color: white; background-color: #181820">
                                      <button class="accordion-button collapsed" type="button" data-mdb-toggle="collapse"
                                        data-mdb-target="#panelsStayOpen-collapse{{ $b }}" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapse{{ $b }}" style="background-color: transparent; text-decoration: none; color: white">
                                        <h4 class="">{{ $branch->nama }}</h4>
                                      </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapse{{ $b }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $b }}">
                                      <div class="accordion-body">
                                        @for ($i = 0; $i < $scheduleUntil; $i++)
                                            @php 
                                                $temp = clone $schedules;
                                                $tNext = date("Y-m-d", strtotime(date("Y-m-d") ."$i days"));
                                                $schedule_branch = $temp->where("branch_id",$b)->whereDate("time","=",$tNext)->orderBy("time","ASC")->get();
                                            @endphp
                                            @if (count($schedule_branch) > 0)
                                                <h5 class="title"><span style="color: yellow">{{ date("l",strtotime(date("Y-m-d") . $i." days"))}}</span>{{ ", ".$tNext }}</h5>
                                                @foreach ($schedule_branch as $s)
                                                    @php $timeShow = date("H:i",strtotime($s->time)); @endphp
                                                    {{-- <x-schedulepill status="enabled" idJadwal="{{ $s->id }}">{{ $timeShow }}</x-schedulepill> --}}
                                                    <x-pill status="enabled" idJadwal="{{ $s->id }}">{{ $timeShow }}</x-pill>
                                                @endforeach
                                                <br>
                                                <br>
                                            @endif
                                        @endfor
                                      </div>
                                    </div>
                                  </div>
                                @empty
                                  
                                <h4 class="title">Sorry</h4>
                                <p>This movie still hasn't been released yet. Stay tuned for new update on this movie!</p>

                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="episode-img">
                        <img src="{{ asset('assets/images/'.$movie->image) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- schedule-area-end -->

<!-- Modal Ticket -->
<div class="modal fade" id="modalTicket" tabindex="-1" aria-labelledby="modalTicketLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content bg-dark">
            <div class="modal-body">
                <form method="GET" action="{{ url('/booking_seat/'.$movie["slug"]) }}">
                    @csrf
                    <h4 class="m-0 p-0">Ticket</h4>
                    <small class="fw-light text-white">Masukkan jumlah tiket yang ingin dibeli</small>
                    <input type="hidden" id="inpJadwal" name="jadwal" value="">
                    <input type="hidden" id="inpIdJadwal" name="idJadwal" value="">
                    <select name="qtyTicket" class="form-select bg-dark text-white" aria-label="Default select example">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Continue</button>
                    <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

</main>
<!-- main-area-end -->
<x-footer></x-footer>

@section('pageScript')
<script>
        $("#modalTicket").on("shown.bs.modal", function(event){
            var idJadwal = $(event.relatedTarget);
            idJadwal = idJadwal.attr("idJadwal");
            var b = $(event.relatedTarget).text().trim();
            var d = new Date();
            $("#inpJadwal").val(d.getDate()+"-"+d.getMonth()+"-"+d.getFullYear()+" "+b);
            $("#inpIdJadwal").val(idJadwal);
        });

    //SCROLL TO SECTION SCHEDULE ON BOOK BUTTON PRESS 
    $("#bookTicketBtn").click(function () {
        $('html, body').animate({
            scrollTop: $("#schedule").offset().top
        }, 800);
    });
</script>
@endsection
@endsection