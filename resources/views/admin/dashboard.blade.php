{{-- @php
 dd($data->snack_today);
@endphp --}}
<main style="margin-top:58px">
    <div class="containersnack pt-4">
      <section class="mb-4">
        <h1 style="color: black">Dashboard</h1>
        <h2 style="color: black">Snack yang ditambahkan hari ini :</h2>
        @if(count($data->snack_today) > 0)
          @foreach($data->snack_today as $d)
          <div class="card col-12 col-md-6 col-lg-4 mb-3 mr-5" style="width: 30%;">
            <div class="bg-image hover-overlay ripple d-flex justify-content-center mt-3"  data-mdb-ripple-color="light" >
              <img src="{{asset('assets/images/'.$d->foto)}}" style="height: 150px;" class="img-fluid" />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
            <div class="card-body" style="height: 250px">
              <h5 class="card-title text-dark">{{$d->nama}}</h5> 
              <p class="card-text">
                Tipe :
                {{$d->tipe}}<br>
                Harga : 
                Rp.{{$d->harga}}<br>
                Deskripsi : 
                {{ $d->deskripsi }} <br>
              </p>
            </div>
          </div>
          @endforeach
        @else
          <h2 style="color: black">Hari ini tidak ada snack baru</h2>
        @endif
      </section> 
    </div>

    <div id="containermovietoday" class="row px-2">
      <section class="mb-4">
        <h2 style="color: black">Movie yang tayang hari ini: </h2>
        @if(count($data->movie_today) > 0)
          @foreach($data->movie_today as $m)
          <div class="card col-12 col-lg-6 mb-3">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light" >
              <img src="{{asset('assets/images/'.$m->image)}}" class="img-fluid" alt="{{$m->slug}}"/>
            </div>
            <div class="card-body">
              <h5 class="card-title text-dark">{{$m->judul}}</h5>
              <p class="card-text">
                Genre :<br>
                {{$m->genre}}<br>
                Duration :<br>
                {{$m->duration}}<br>
              </p>
            </div>
          </div>
          @endforeach
        @else
          <h2 style="color: black">Tidak ada movie yang tayang hari ini</h2>
        @endif
      </section>
    </div>

    <div id="containermovienewest" class="row px-2">
      <section class="mb-4">
        <h2 style="color: black">Movie terbaru: </h2>
        {{-- @if(count($data->movie_newest) > 0) --}}
          {{-- @foreach($data->movie_newest as $m) --}}
          <div class="card col-12 col-lg-6 mb-3">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light" >
              <img src="{{asset('assets/images/'.$data->movie_newest->image)}}" class="img-fluid" />
            </div>
            <div class="card-body">
              <h5 class="card-title text-dark">{{$data->movie_newest->judul}}</h5>
              <p class="card-text">
                Genre :<br>
                {{$data->movie_newest->genre}}<br>
                Duration :<br>
                {{$data->movie_newest->duration}}<br>
              </p>
            </div>
          </div>
          {{-- @endforeach --}}
        {{-- @else
          <h2 style="color: black">Tidak ada tambahan movie baru</h2>
        @endif --}}
      </section>
    </div>
  </main>