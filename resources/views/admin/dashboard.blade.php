{{-- @php
 dd($data->snack_today);
@endphp --}}
<main style="margin-top:58px; margin-left: 58px">
    <div class="pt-4">
      <section class="mb-4">
        <h1 style="color: black">Dashboard</h1>
        <h2 style="color: black">Snack yang ditambahkan hari ini :</h2>
        <div id="containersnackdashboard" class="d-flex justify-content-center gap-3">
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
      </div>
      </section> 
    </div>
    <hr>

    <div class="row px-2">
      <section class="mb-4">
        <h2 style="color: black">Movie yang tayang hari ini: </h2>
        <div id="containermovietoday" class="d-flex row justify-content-center gap-4">
        @if(count($data->movie_today) > 0)
          @foreach($data->movie_today as $m)
          <div class="card col-3 col-md-3 mx-3 col-lg-3 my-5">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light" >
              <img src="{{asset('assets/images/'.$m->image)}}" height="200px" class="img-fluid" alt="{{$m->slug}}"/>
            </div>
            <div class="card-body">
              <h5 class="card-title text-dark">{{$m->judul}}</h5>
              <p class="card-text">
                Genre :<br>
                {{$m->genre}}<br>
                Duration :<br>
                {{$m->duration}} menit<br>
              </p>
            </div>
          </div>
          @endforeach
        @else
          <h2 style="color: black">Tidak ada movie yang tayang hari ini</h2>
        @endif
      </div>
      </section>
    </div>
    <hr>

    <div class="row px-2">
      <section class="mb-4">
        <h2 style="color: black">Movie terbaru: </h2>
        <div id="containermovienewest" class="d-flex row justify-content-center gap-4">
        @if(count($data->movie_newest) > 0)
          @foreach($data->movie_newest as $m)
          <div class="card col-3 col-lg-3 mb-3">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light" >
              <img src="{{asset('assets/images/'.$m->image)}}" class="img-fluid" />
            </div>
            <div class="card-body">
              <h5 class="card-title text-dark">{{$m->judul}}</h5>
              <p class="card-text">
                Genre :<br>
                {{$m->genre}}<br>
                Duration :<br>
                {{$m->duration}} menit<br>
              </p>
            </div>
          </div>
          @endforeach
        @else
          <h2 style="color: black">Tidak ada tambahan movie baru</h2>
        @endif
      </div>
      </section>
    </div>
    <hr>

    <div  class="row px-2">
      <section class="mb-4">
        <h2 style="color: black">Film Yang Pernah Dimainkan : </h2>
        <div id="containerscheduleberlalu">
        @if(count($data->schedulelalu) > 0)
          @foreach($data->schedulelalu as $m)
            <div class="card col-3 col-lg-3 mb-3">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light" >
                <img src="{{asset('assets/images/'.$m->image)}}" class="img-fluid" alt="{{$m->slug}}"/>
              </div>
              <div class="card-body">
                <h5 class="card-title text-dark">{{$m->judul}}</h5>
              </div>
            </div>
          @endforeach
        @else
          <h2 style="color: black">Tidak ada movie </h2>
        @endif
      </div>
      </section>
    </div>
    <hr>

    <div class="row px-2">
      <section class="mb-4">
        <h2 style="color: black">Coming Soon: </h2>
        <div id="containerschedulesetelah" class="d-flex justify-content-center row">
        @if(count($data->schedulesetelah) > 0)
          @foreach($data->schedulesetelah as $m)
          <div class="card col-3 col-lg-3 mb-3">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light" >
              <img src="{{asset('assets/images/'.$m->image)}}" class="img-fluid" alt="{{$m->slug}}"/>
            </div>
            <div class="card-body">
              <h5 class="card-title text-dark">{{$m->judul}}</h5>
              <p class="card-text">
                Studio :<br>
                {{$m->nama}}<br>
                Branch :<br>
                {{$m->lokasi}}<br>
              </p>
            </div>
          </div>
          @endforeach
        @else
          <h2 style="color: black">Tidak ada movie </h2>
        @endif
      </div>
      </section>
    </div>
    
  </main>