<main style="margin-top:58px">
    <div class="container pt-4" id="branch">
      <section class="mb-4">
        <h1>Movie</h1>
        <button class="btn btn-primary"  data-mdb-toggle="modal" data-mdb-target="#staticBackdrop">Add new movie here!</button>
        <br><br>
        @forelse ($data->movie as $m)
        <div class="card" style="width: 30%; display: inline-block; margin: 9%;">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light" >
              <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/111.webp" class="img-fluid" alt="{{$m->slug}}"/>
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
              </a>
            </div>
            <div class="card-body">
              <h5 class="card-title">{{$m->judul}}</h5>
              <p class="card-text">
                Genre :<br>
                {{$m->genre}}<br>
                Duration :<br>
                {{$m->duration}}<br>
              </p>
              <button onclick="Schedule(event)" value="/admin/movie/schedule/{{$m->id}}" class="btn btn-primary">Jadwal</button>
              <a href="#!" class="btn btn-warning">Edit</a>
              <a href="#!" class="btn btn-danger">Delete</a>
            </div>
          </div>
        @empty
            <h2>Belum ada film yang main!</h2>
        @endforelse
      </section> 
    </div>
  </main>
  <div class="modal" tabindex="-1" id="modaladdbranch">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add new Branch</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="post">
          @csrf
          <div class="modal-body">
            <div class="form-outline mb-4">
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"/>
              <label class="form-label">Nama branch</label>
              @error('name')
                  <div class="invalid-feedback"> 
                      {{ $message }}
                  </div>
                @enderror
            </div>
          </div>
          <div class="modal-footer" style="align-content: center">
            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Add branch</button>
          </div>
        </form>
      </div>
    </div>
  </div>