<main style="margin-top:58px">
  <div class="container pt-4" id="branch">
    <section class="mb-4">
      <h1>Snack</h1>
      <br>
      <br>
      <button class="btn btn-primary"  data-mdb-toggle="modal" data-mdb-target="#modaladdSnack">Add new Snack!</button>
      <br>
      <br>
      <div id="containersnack" class="row px-2 gap-2" style="width: 100%;">
        @forelse ($data->snack as $m)
              <input type='hidden' id='id{{$m->id}}' value='{{$m->id}}'>
              <input type='hidden' id='nama{{$m->id}}' value='{{$m->nama}}'>
              <input type='hidden' id='harga{{$m->id}}' value='{{$m->harga}}'>
              <input type='hidden' id='tipe{{$m->id}}' value='{{$m->tipe}}'>
              <input type='hidden' id='foto{{$m->id}}' value='{{$m->foto}}'>
              <div class="card col-12 col-md-6 col-lg-4 mb-3 mr-5" style="width: 30%;">
                <div class="bg-image hover-overlay ripple d-flex justify-content-center mt-3"  data-mdb-ripple-color="light" >
                  <img src="{{asset('assets/images/'.$m->foto)}}" style="height: 150px;" class="img-fluid" alt="{{$m->slug}}"/>
                  <a href="#!">
                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                  </a>
                </div>
                <div class="card-body" style="height: 250px">
                  <h5 class="card-title ">{{$m->nama}}</h5> 
                  <p class="card-text">
                    Tipe :
                    {{$m->tipe}}<br>
                    Harga : 
                    Rp.{{$m->harga}}<br>
                    Deskripsi : 
                    {{ $m->deskripsi }} <br>
                  </p>
                </div>
                <div class="d-flex justify-content-center mb-10" >
                  <button class="btn btn-warning"  data-mdb-toggle="modal" data-mdb-target="#modaleditSnack" onclick='editSnack({{$m->id}})'>Edit</button> &nbsp;&nbsp;&nbsp;
                  <button href="" data-mdb-toggle="modal" value="{{$m->id}}" d="{{$m->nama}}" data-mdb-target="#modaldeletesnack" class="delmovie btn btn-danger" onclick='deletesnack({{$m->id}})'>Delete</button>
                </div>
              </div>
        @empty
            <h1>Belum ada snack!</h1>
        @endforelse
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
            <div class="modal-body">
              <div class='row'>
                <div class='col-md-1'>&nbsp;</div>
                <div class='col-md-10'>
                  
                    <input type='text' class='form-control' placeholder='Nama Snack'  id="nama_snack_add"   name="name"><br>
                    <input type='text' class='form-control' placeholder='Harga Snack' id="harga_snack_add"  name="harga"><br>
                    <input type='file' class='form-control'                           id="foto_snack_add"   name="foto"><br>
                    <textarea name="deskripsi" id="deskripsi_snack_add" cols="30" rows="10" placeholder="Masukkan deskripsi snack..."></textarea> <br>

                    <input type='radio' name='jenis_snack_add' id='jenis_food_add' checked value='Food'>&nbsp;&nbsp;&nbsp;&nbsp; Food
                    <input type='radio' name='jenis_snack_add' id='jenis_beverage_add' value='Beverage'>&nbsp;&nbsp;&nbsp;&nbsp; Beverage
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" data-mdb-dismiss="modal"id="AddSnack">Add Snack</button>
            </div>
      </div>
  </div>
 </div>


 <div class="modal" tabindex="-1" id="modaleditSnack">
  <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" style='color: black;'>Edit Snack</h5>
              <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class='row'>
                <div class='col-md-1'>&nbsp;</div>
                <div class='col-md-10'>
                    <input type='hidden' class='form-control' placeholder='Nama Snack'  id="id_snack_edit"   name="id"><br>
                    <input type='text' class='form-control' placeholder='Nama Snack'  id="nama_snack_edit"   name="name"><br>
                    <input type='text' class='form-control' placeholder='Harga Snack' id="harga_snack_edit"  name="harga"><br>
                    <input type='file' class='form-control'                           id="foto_snack_edit"   name="foto"><br>
                    <textarea name="deskripsi" id="deskripsi_snack_edit" cols="30" rows="10"></textarea> <br>

                    <input type='radio' name='jenis_snack_edit' id='jenis_food_edit' checked value='Food'>&nbsp;&nbsp;&nbsp;&nbsp; Food
                    <input type='radio' name='jenis_snack_edit' id='jenis_beverage_edit' value='Beverage'>&nbsp;&nbsp;&nbsp;&nbsp; Beverage
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" data-mdb-dismiss="modal"id="EditSnack">Edit Snack</button>
            </div>
      </div>
  </div>
 </div>

<div class="modal" tabindex="-1" id="modaldeletesnack">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="color: black;">Hapus Snack</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <div class="form-outline mb-4">
            <input type='hidden' id='delete_id_snack' value=''>
            <h1 id="hapusstudioh1" style="color: black; font-size: 20px;">Yakin mau hapus Snack ini?</h1>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">No</button>
          <button type="button" class="btn btn-danger" data-mdb-dismiss="modal" id="DeleteSnack">Yes</button>
        </div>
    </div>
  </div>
</div>