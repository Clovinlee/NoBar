<style>
  .card{
    background-color: #252631;
    color:white;
  }
</style>
<main style="margin-top:58px">
    <div class="container pt-4" id="branch">
      <section id="movsec" class="mb-4">
        <h1 class="">Movie</h1>
        <button class="btn btn-primary" id="btnaddmovie">Add new movie here!</button>
        <br><br>
        <div id="containermovie" class="row px-2 d-flex justify-content-center">
          @forelse ($data->movie as $m)
        <div class="card col-12 mx-5 col-md-6 col-lg-4 my-5 py-3">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light" >
              <img src="{{asset('assets/images/'.$m->image)}}" class="img-fluid" alt="{{$m->slug}}"/>
            </div>
            <div class="card-body pl-2">
              <h5 class="card-title ">{{$m->judul}}</h5>
              <p class="card-text">
                Genre :<br>
                {{$m->genre}}<br>
                Duration :<br>
                {{$m->duration}} menit<br>
              </p>
              <div class="d-flex justify-content-center">
                <button class="btn btn-warning movieedit mx-3" value="{{$m->id}}"><i class="fa-regular fa-pen-to-square fa-2x"></i></button>
              <button href="" data-mdb-toggle="modal" value="{{$m->id}}" d="{{$m->judul}}" data-mdb-target="#modaldeletemovie" class="delmovie btn btn-danger"><i class="fa-solid fa-trash-can fa-2x"></i></button>
              </div>
            </div>
          </div>
        @empty
            <h2>Belum ada film yang main!</h2>
        @endforelse
        </div>
      </section> 
    </div>
  </main>
  <div class="modal" tabindex="-1" id="modaldeletemovie">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title ">Delete Movie</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <h4 class="">Anda yakin mau hapus film ini?</h4>
          <div class="modal-footer" style="align-content: center">
            <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">No</button>
            <button type="button" class="btn btn-danger" data-mdb-dismiss="modal" id="deletemovie">Yes</button>
          </div>
        </form>
      </div>
    </div>
  </div>