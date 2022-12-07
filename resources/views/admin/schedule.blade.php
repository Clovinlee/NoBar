<main style="margin-top:58px">
  <div class="container pt-4" id="branch">
    <section class="mb-4">
      <h1 class="text-dark">Jadwal {{$data->schedule->nama}}</h1>
      <br>
      @if (count($data->movie)>0 && count($data->studio)>0)
    <button type="button" class="btn btn-primary" data-mdb-toggle="modal" id="btnaddschedule" data-mdb-target="#tambahschedule">Add new schedule</button>
    @endif
    <br><br>
      <center class="col-12">
        <table class="table table-striped" id="schedule_table" style="min-width:100%">
          <thead>
            <tr>
            <th>Branch</th>
            <th>Studio</th>
            <th>Movie</th>
            <th>Waktu Tayang</th>
            <th>Harga (Rp)</th>
            <th>Action</th>
            </tr>
          </thead>
      </table>
      </center>
    </section> 
  </div>
</main>
{{-- <div class="modal" id="tambahschedule">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Jadwal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-outline mb-4">
          <select class="select" multiple data-mdb-filter="true" id="selectstudio">
              
          </select>
        <label class="form-label select-label">Studio</label><br>
          <select class="js-example-basic-single" data-mdb-filter="true" id="selectmovie">
              
          </select>
          <label class="form-label select-label">Movie</label>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div> --}}
<div class="modal" tabindex="1" id="tambahschedule">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark">Tambah Jadwal </h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <div class="form-outline mb-4">
              
            <label class="form-label select-label" for="selectstudio"><h5 class="text-dark">Studio</h5>
              <select class="js-example-basic-multiple col-4" multiple="multiple" data-mdb-filter="true" id="selectstudio">
                  
              </select>  
            </label><br>
              
              <label class="form-label select-label" for="selectmovie"><h5 class="text-dark">Movie</h5>
                <select class="js-example-basic-single" data-mdb-filter="true" id="selectmovie">
                  
                </select>
              </label><br>
              <label for="addtime"><h5 class="text-dark">Waktu tayang</h5></label><br>
              <input type="datetime-local" name="" id="addtime">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-mdb-dismiss="modal"id="tambahjadwal">Tambah Jadwal</button>
        </div>
    </div>
  </div>
</div>
<div class="modal" tabindex="-1" id="ubahjadwalbranch">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark">Ubah Jadwal </h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <div class="form-outline mb-4">
            Masukkan waktu main film yang baru!<br>
            <input type="datetime-local" name="" id="date">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-mdb-dismiss="modal"id="editjadwal">Edit Jadwal</button>
        </div>
    </div>
  </div>
</div>
<div class="modal" tabindex="-1" id="hapusjadwal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark">Hapus Jadwal </h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <div class="form-outline mb-4">
            Hapus Jadwal ini?
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">No</button>
          <button type="button" class="btn btn-danger" data-mdb-dismiss="modal"id="hapusjadwal">Yes</button>
        </div>
    </div>
  </div>
</div>