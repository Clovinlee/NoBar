<style>
  
</style>
<main style="margin-top:58px">
    <div class="container pt-4 col-7"  id="branch">
      <section class="mb-4">
        <h1 class="">Branch</h1>
        <div class="form-outline mb-4">
          <input type="text" class="form-control" id="search_branch" name="name"/>
          <label class="form-label text-white" >Nama branch</label>
        </div>
        <button class="btn btn-primary mb-4" id="btn_search_branch">Search</button><br>
        <button class="btn btn-primary mb-4"  data-mdb-toggle="modal" data-mdb-target="#modaladdbranch">Add new Branch here!</button>
        <br>
        <div class="accordion" id="accordionExample">
          @forelse ($data->branch as $b)
          <div class="accordion-item" id="branchacc{{$b->id}}">
            <h2 class="accordion-header" id="heading{{$b->id}}">
              <button
                class="accordion-button collapsed"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#collapse{{$b->id}}"
                aria-expanded="false"
                aria-controls="collapse{{$b->id}}"
              >
              <h2 class="">{{$b->nama}}</h2>

              </button>
            </h2>
            <div id="collapse{{$b->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$b->id}}">
              <div class="accordion-body" style="padding-left: 2%">
                <div class="d-flex justify-content-center">
                  <button class="linkgantinama btn btn-secondary mx-3" data-mdb-toggle="modal"data-id='{{$b->id}}' d='{{$b->nama}}' data-mdb-target="#modaleditbranch">Rename</button>
                  <button class="linkhapusbranch btn btn-danger mx-3" data-mdb-toggle="modal"data-id='{{$b->id}}' d='{{$b->nama}}' data-mdb-target="#modaldeletebranch">Delete Branch</button>
                  <a href="" class="tambahstudio btn btn-warning mx-3" data-mdb-toggle="modal"data-id='{{$b->id}}' d='{{$b->nama}}' data-mdb-target="#modaladdstudio">Add new studio &nbsp;<i class="fa-solid fa-plus fa-lg"></i></a>
                </div>
                @forelse ($b->studio as $s)
                    <hr style="height: 3px;">
                    <div data-background="{{ asset('assets/images/bgstudio.jpg') }}" class="ucm-area ucm-bg rounded shadow-2" style="background-position-y: 100%; max-height: 50px">
                      <div class=" d-flex justify-content-between align-item-center px-5 py-0 mt-0">
                        <h3 class=" d-inline-block m-0 p-0 align-middle">{{$s->nama}}</h3>
                        <span>
                          <button class="linkeditstudio btn-warning btn" data-mdb-toggle="modal"data-id='{{$s->id}}' data-slot='{{$s->slot}}' d='{{$s->nama}}' data-mdb-target="#modaleditstudio"><i class="fa-regular fa-pen-to-square fa-2x"></i></button>
                          <button class="linkhapusstudio btn-danger btn" data-mdb-toggle="modal"data-id='{{$s->id}}' d='{{$s->nama}}' data-mdb-target="#modalhapusstudio"><i class="fa-solid fa-trash-can fa-2x"></i></button>
                        </span>
                      </div>
                    </div>
                @empty
                    <h3>Branch ini belum punya studio</h3>
                @endforelse
            </div>
          </div>
          </div>
          @empty
              <h1>Belum ada branch!</h1>
          @endforelse
        </div>
      </section> 
    </div>
  </main>
  <div class="modal" tabindex="-1" id="modaladdbranch">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark">Add new Branch</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
            <div class="form-outline mb-4">
              <input type="text" class="form-control" id="nama_branch" name="name"/>
              <label class="form-label">Nama branch</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" data-mdb-dismiss="modal"id="AddBranch">Add branch</button>
          </div>
      </div>
    </div>
  </div>
  <div class="modal" tabindex="-1" id="modaladdstudio">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark" id="modaladdstudioh5">Add new Studio for </h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
            <div class="form-outline mb-4">
              <input type="text" class="form-control" id="nama_studio" name="name"/>
              <label class="form-label" for="nama_studio">Nama Studio</label>
            </div>
            <br>
              <div class="form-outline mb-4">
                <input type="number" class="form-control" id="slot_studio" name="slot"/>
                <label class="form-label" for="slot_studio">Jumlah Slot</label>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" data-mdb-dismiss="modal"id="AddStudio">Add new studio!</button>
          </div>
      </div>
    </div>
  </div>
  <div class="modal" tabindex="-1" id="modaleditstudio">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark">Edit Studio </h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
            <div class="form-outline mb-4">
              <input type="text" class="form-control active" id="nama_studio_edit" name="name"/>
              <label class="form-label">Nama Studio</label>
            </div>
            <br>
            <div class="form-outline mb-4">
              <input type="number" class="form-control active" id="slot_studio_edit" name="slot"/>
              <label class="form-label">Jumlah Slot</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" data-mdb-dismiss="modal"id="EditStudio">Edit Studio!</button>
          </div>
      </div>
    </div>
  </div>
  <div class="modal" tabindex="-1" id="modaldeletebranch">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark">Hapus branch</h5>
          <button type="button" class="btn-close " data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
            <div class="form-outline mb-4">
              <h1 id="hapusbranchh1 " class="text-dark">Yakin mau hapus branch ini?</h1>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">No</button>
            <button type="button" class="btn btn-danger" data-mdb-dismiss="modal"id="DeleteBranch">Yes</button>
          </div>
      </div>
    </div>
  </div>
  <div class="modal" tabindex="-1" id="modalhapusstudio">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-dark">Hapus Studio</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
            <div class="form-outline mb-4">
              <h1 id="hapusstudioh1" class="text-dark">Yakin mau hapus Studio ini?</h1>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">No</button>
            <button type="button" class="btn btn-danger" data-mdb-dismiss="modal"id="DeleteStudio">Yes</button>
          </div>
      </div>
    </div>
  </div>
    <div class="modal" tabindex="-1" id="modaleditbranch">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-dark">Ganti Nama Branch</h5>
            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
          </div>
            <div class="modal-body">
              <div class="form-outline mb-4">
                <input type="text" class="form-control active" id="nama_branch_edit" name="name"/>
                <label class="form-label">Nama branch</label>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" data-mdb-dismiss="modal"id="EditBranch">Ganti Nama branch</button>
            </div>
        </div>
      </div>
  </div>