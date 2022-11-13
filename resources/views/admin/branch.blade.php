<main style="margin-top:58px">
    <div class="container pt-4" id="branch">
      <section class="mb-4">
        <h1>Branch</h1>
        <button class="btn btn-primary"  data-mdb-toggle="modal" data-mdb-target="#modaladdbranch">Add new Branch here!</button>
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
                <strong>{{$b->nama}}</strong>
              </button>
            </h2>
            <div id="collapse{{$b->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$b->id}}">
              <div class="accordion-body" style="padding-left: 2%">
                <button class="linkgantinama btn btn-secondary" data-mdb-toggle="modal"data-id='{{$b->id}}' d='{{$b->nama}}' data-mdb-target="#modaleditbranch">Ganti nama branch?</button>
                <button class="linkhapusbranch btn btn-danger" data-mdb-toggle="modal"data-id='{{$b->id}}' d='{{$b->nama}}' data-mdb-target="#modaldeletebranch">Hapus branch ini!</button>
                <a href="" class="btn btn-warning">Add new studio here!</a>
                @forelse ($b->studio as $s)
                    <br>
                    <strong>{{$s->nama}}</strong>
                @empty
                    <h3>Branch ini belum punya studio</h3>
                @endforelse
            </div>
            <button onclick="Schedule(event)" value="/admin/branch/schedule/{{$b->id}}" class="btn btn-primary" style="margin-left: 2%">Cek Jadwal</button>
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
          <h5 class="modal-title">Add new Branch</h5>
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
  <div class="modal" tabindex="-1" id="modaldeletebranch">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Hapus branch</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
            <div class="form-outline mb-4">
              <h1 id="hapusbranchh1">Yakin mau hapus branch ini?</h1>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">No</button>
            <button type="button" class="btn btn-danger" data-mdb-dismiss="modal"id="DeleteBranch">Yes</button>
          </div>
      </div>
    </div>
  </div>
    <div class="modal" tabindex="-1" id="modaleditbranch">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Ganti Nama Branch</h5>
            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
          </div>
            <div class="modal-body">
              <div class="form-outline mb-4">
                <input type="text" class="form-control" id="nama_branch_edit" name="name"/>
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