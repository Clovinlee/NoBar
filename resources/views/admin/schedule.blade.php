<main style="margin-top:58px">
  <div class="container pt-4" id="branch">
    <section class="mb-4">
      <h1 class="text-dark">Jadwal {{$data->schedule->nama}}</h1>
      <button class="btn btn-primary"  data-mdb-toggle="modal" data-mdb-target="#staticBackdrop">Add new schedule here!</button>
      <br><br>
      <table class="table table-striped">
          <thead>
            <th>Branch</th>
            <th>Studio</th>
            <th>Movie</th>
            <th>Waktu Tayang</th>
            <th>Harga</th>
          </thead>
          <tbody id="schedule_table">
            @forelse ($data->schedule as $s)
            <tr>
              <td>{{$s->branch->nama}}</td>
              <td>{{$s->studio->nama}}</td>
              <td>{{$s->movie->judul}}</td>
              <td>{{$s->time}}</td>
              <td>{{$s->price}}</td>
            </tr>
        @empty
            <h1>Belum ada jadwal untuk {{$data->schedule->asal}} ini!</h1>
        @endforelse
          </tbody>
      </table>
    </section> 
  </div>
</main>