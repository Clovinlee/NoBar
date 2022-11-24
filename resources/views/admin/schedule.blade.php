<main style="margin-top:58px">
  <div class="container pt-4" id="branch">
    @if (count($data->movie)>0 && count($data->studio)>0)
    <button type="button" class="btn btn-primary" data-mdb-dismiss="modal" data-mdb-target="#tambahschedule">Add new schedule</button>
    @endif
    <section class="mb-4">
      <h1 class="text-dark">Jadwal {{$data->schedule->nama}}</h1>
      <br><br>
      <center>
        <table class="table table-striped" id="schedule_table">
          <thead>
            <tr>
            <th>Branch</th>
            <th>Studio</th>
            <th>Movie</th>
            <th>Waktu Tayang</th>
            <th>Harga</th>
            <th>Action</th>
            </tr>
          </thead>
      </table>
      </center>
    </section> 
  </div>
</main>
<div class="modal" tabindex="-1" id="tambahschedule">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark">Tambah Jadwal </h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
          <div class="form-outline mb-4">
            <select class="browser-default custom-select" id="selectmovie">
              
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
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