{{-- @php
 dd($data->snack_today);
@endphp --}}
<style>
  .dboardContainer{
    border-radius: 25px;
    padding: 20px;
    background-color: #252631;
    box-shadow: 2px 2px 2px 2px black;
    margin: 10px;
    display: inline-block;
    overflow: visible;
  }
  center img{
    width: 150px;
    height: 200px;
  }
</style>
<main style="margin-top:58px;">
  <div class="d-flex pr-4">
    <div class="col-12 col-md-3 dboardContainer my-3 mr-2">
      <h4 class="">Snack Terbaru</h4>
      @if ($data->snacknew!=null)
      <div id="newsnack" class="justify-content-center h-50">
        <center>
          <img class="img-fluid h-100" src="{{asset('assets/images/'.$data->snacknew->foto)}}"
            alt="{{$data->snacknew->slug}}" width="100%" srcset=""><br>
  
  
        </center>
      </div>
      <h4 class="">{{$data->snacknew->nama}}</h4>
      <h5 class="">jenis : </h5>
      <h5 class="">{{$data->snacknew->tipe}}</h5>
      <h5 class="">Harga :</h5>
      <h5 class="">Rp. {{number_format($data->snacknew->harga)}}</h5>
      @else
      <h4 class="">Belum ada Snack!</h4>
      @endif
    </div>
    <div class="col-12 col-md-3 dboardContainer my-3 ml-2">
      <h4 class="">Movie Terbaru</h4>
      @if ($data->movienew!=null)
      <div id="newmovie" class="justify-content-center h-30">
        <center>
  
          <img class="img-fluid" src="{{asset('assets/images/'.$data->movienew->image)}}" alt="{{$data->movienew->slug}}"
            width="100%" srcset=""><br>
  
  
        </center>
      </div>
      <h4 class="">{{$data->movienew->judul}}</h4>
      <h5 class="">Genre :</h5>
      <h5 class="">{{$data->movienew->genre}}</h5>
      <h5 class="">Durasi :</h5>
      <h5 class="">{{$data->movienew->duration}} menit</h5>
      @else
      <h4 class="">Belum ada Movie!</h4>
      @endif
    </div>
    <div class="col-12 col-md-5 dboardContainer">
      <center>
        <h4 class="">Jadwal terdekat setiap branch</h4>
      <div id="sb">
        @forelse ($data->sb as $d)
        <div class="border border-light border-top-5 border-bottom-5 border-end-0 border-start-0 my-1">
          <h4 class="">{{$d->nama}}</h4>
          @if ($d->time==null)
          <h5 class="">Belum ada film di cabang {{$d->nama}}</h5>
          @else
          <h5 class="">{{$d->film}}</h5>
          <h5 class="">{{$d->time}}</h5>
          @endif
        </div>
        @empty
        <h4 class="">Belum ada branch!</h4>
        @endforelse
      </div>
      </center>
    </div>
  </div>
  </main>