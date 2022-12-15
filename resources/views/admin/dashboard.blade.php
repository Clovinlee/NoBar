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
<main style="margin-top:58px; margin-left: 58px">
    <div class="d-flex">
      <div class="col-6  mx-4 d-flex">
        <div class="col-5 dboardContainer my-3 mr-2">
          <h4 class="">Snack Terbaru</h4>
          <div id="newsnack" class="justify-content-center">
            <center>
              @if ($data->snacknew!=null)          
                <img src="{{asset('assets/images/'.$data->snacknew->foto)}}" alt="{{$data->snacknew->slug}}" srcset=""><br>
                <h4 class="">{{$data->snacknew->nama}}</h4>
                <h5 class="">jenis : </h5> 
                <h5 class="">{{$data->snacknew->tipe}}</h5>   
                <h5 class="">Harga :</h5> 
                <h5 class="">Rp. {{number_format($data->snacknew->harga)}}</h5>                     
              @else
                <h4 class="">Belum ada Snack!</h4>
              @endif
            </center>
          </div> 
        </div>
        <div class="col-5 dboardContainer my-3 ml-2" width="100%">
          <h4 class="" >Movie Terbaru</h4>
          <div id="newmovie" class="justify-content-center">
          <center>
            @if ($data->movienew!=null)
                <img src="{{asset('assets/images/'.$data->movienew->image)}}" alt="{{$data->movienew->slug}}" width="100%" srcset=""><br>
                <h4 class="">{{$data->movienew->judul}}</h4>
                <h5 class="">Genre :</h5>    
                <h5 class="">{{$data->movienew->genre}}</h5>
                <h5 class="">Durasi :</h5>    
                <h5 class="">{{$data->movienew->duration}} menit</h5>               
            @else
                <h4 class="">Belum ada Movie!</h4>
            @endif
          </center>
          </div>  
        </div>
      </div>
      <div class="col-4 dboardContainer mx-3">
        <h4 class="" >Jadwal terdekat setiap branch</h4>
        <div id="sb">
          @forelse ($data->sb as $d)
              <div class="border border-light border-top-5 border-bottom-5 border-end-0 border-start-0 my-1" >
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
      </div>
    </div>
  </main>