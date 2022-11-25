<main style="margin-top:58px">
    <div class="container pt-4" id="branch">
      <section class="mb-4">
        <h1 style="color: black">Snack</h1>
        <div class="form-outline mb-4">
          <input type="text" class="form-control" id="search_branch" name="name"/>
          <label class="form-label">Nama Snack</label>
        </div>
        <button class="btn btn-primary" id="btn_search_branch">Search</button> 
        <br>
        <br>
        <button class="btn btn-primary"  data-mdb-toggle="modal" data-mdb-target="#modaladdSnack">Add new Snack!</button>
        <br>
        <br>
        <div class="container pt-4" id="branch">
          <section id="movsec" class="mb-4">
            <div id="containersnack">
              @forelse ($data->snack as $m)
            <div class="card" style="width: 30%; display: inline-block; margin: 9%;">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light" >
                  <img src="{{asset('assets/images/'.$m->foto)}}" class="img-fluid" width="150px"/>
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                  </a>
                </div>
                <div class="card-body">
                  <h5 class="card-title text-dark">{{$m->nama}}</h5>
                  <p class="card-text">
                    Harga :<br>
                    Rp.{{$m->harga}}<br>
                    Tipe :<br>
                    {{$m->tipe}}<br>
                  </p>
                  <button class="btn btn-warning movieedit" value="{{$m->id}}">Edit</button>
                  <button href="" data-mdb-toggle="modal" value="{{$m->id}}" d="{{$m->judul}}" data-mdb-target="#modaldeletemovie" class="delmovie btn btn-danger">Delete</button>
                </div>
              </div>
            @empty
                <h2>Belum ada snack yang terdaftar</h2>
            @endforelse
            </div>
          </section> 
        </div>
      </section> 
    </div>
  </main>

  {{-- modal untuk add snack  --}}
  <div class="modal" tabindex="-1" id="modaladdSnack">
    <div class="modal-dialog">
        <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" style='color: black;'>Add new Snack</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
              </div>
          <form action="{{url('/admin/snack/add')}}" method="post" enctype="multipart/form-data">
            @csrf
              <div class="modal-body">
                <div class='row'>
                  <div class='col-md-1'>&nbsp;</div>
                  <div class='col-md-10'>
                      <input type='text' class='form-control' placeholder='Nama Snack' id="nama_snack" name="name"><br>
                      <input type='text' class='form-control' placeholder='Harga Snack' id="harga_snack" name="harga"><br>
                      <input type='file' class='form-control' id="foto_snack" name="foto"><br>

                      <input type='radio' name='jenis_snack' checked value='Food'>&nbsp;&nbsp;&nbsp;&nbsp; Food
                      <input type='radio' name='jenis_snack' value='Beverage'>&nbsp;&nbsp;&nbsp;&nbsp; Beverage
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                {{-- <input type="submit" class="btn btn-primary" data-mdb-dismiss="modal" value="Add snack"> --}}
                <button class="btn btn-primary" data-mdb-dismiss="modal" id="AddSnack">Add Snack</button>
              </div>
          </form>
        </div>
    </div>
   </div>
  
  
  <div class="modal" tabindex="-1" id="modaleditsnack">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="color: black;">Edit Snack</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-10">
                  <div class="form-outline mb-4">
                    <input type='text' class='form-control' placeholder='Nama Snack' id="nama_snack" name="name"><br>
                      <input type='text' class='form-control' placeholder='Harga Snack' id="harga_snack" name="harga"><br>
                      <input type='file' class='form-control' id="foto_snack" name="foto"><br>

                      <input type='radio' name='jenis_snack' checked value='Food'>&nbsp;&nbsp;&nbsp;&nbsp; Food
                      <input type='radio' name='jenis_snack' value='Beverage'>&nbsp;&nbsp;&nbsp;&nbsp; Beverage
                  </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" data-mdb-dismiss="modal"id="EditSnack">Edit Studio!</button>
          </div>
      </div>
    </div>
  </div>
  
  <div class="modal" tabindex="-1" id="modalhapussnack">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Hapus Studio</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
            <div class="form-outline mb-4">
              <h1 id="hapusstudioh1">Yakin mau hapus Studio ini?</h1>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">No</button>
            <button type="button" class="btn btn-danger" data-mdb-dismiss="modal"id="DeleteStudio">Yes</button>
          </div>
      </div>
    </div>
  </div>
    