<main style="margin-top:58px">
    <div class="container pt-4" id="branch">
      <section id="movsec" class="mb-4">
        <h1 class="text-dark">Movie</h1>
        <button class="btn btn-primary" id="btnaddmovie">Add new movie here!</button>
        <br><br>
        <div id="containermovie">
          @forelse ($data->movie as $m)
        <div class="card" style="width: 30%; display: inline-block; margin: 9%;">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light" >
              <img src="{{asset('storage/movie/'.$m->image)}}" class="img-fluid" alt="{{$m->slug}}"/>
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
            <div class="card-body">
              <h5 class="card-title text-dark">{{$m->judul}}</h5>
              <p class="card-text">
                Genre :<br>
                {{$m->genre}}<br>
                Duration :<br>
                {{$m->duration}}<br>
              </p>
              <button onclick="Schedule(event)" value="/admin/movie/schedule/{{$m->id}}" class="btn btn-primary">Jadwal</button>
              <a href="#!" class="btn btn-warning">Edit</a>
              <button href="" data-mdb-toggle="modal" value="{{$m->id}}" d="{{$m->judul}}" data-mdb-target="#modaldeletemovie" class="delmovie btn btn-danger">Delete</button>
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
          <h5 class="modal-title text-dark">Delete Movie</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <h4 class="text-dark">Anda yakin mau hapus film ini?</h4>
          <div class="modal-footer" style="align-content: center">
            <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">No</button>
            <button type="button" class="btn btn-danger" data-mdb-dismiss="modal" id="deletemovie">Yes</button>
          </div>
        </form>
      </div>
    </div>
  </div>