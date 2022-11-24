<main style="margin-top:58px">
  <div class="container pt-4" id="branch">
    <section class="mb-4">
      <h1 class="text-dark">Jadwal {{$data->schedule->nama}}</h1>
      <button class="btn btn-primary"  data-mdb-toggle="modal" data-mdb-target="#staticBackdrop">Add new schedule here!</button>
      <br><br>
      <center>
        <table class="table table-striped" id="schedule_table">
          <thead>
            <tr>
            <th>branch.nama</th>
            <th>Studio</th>
            <th>Movie</th>
            <th>Waktu Tayang</th>
            <th>Harga</th>
            </tr>
          </thead>
      </table>
      </center>
    </section> 
  </div>
</main>