@extends('admin.sidebaradmin')
@section('body-nav')
    <div id="div_branch" style="display:block ">
      <x-sidebaradmin></x-sidebaradmin>
      <div style="display: block;">
        <h1>Jadwal {{$data["nama"]}}</h1>
        <table class="table table-striped">
          <tr>
            <thead>
              <th>Branch</th>
              <th>Studio</th>
              <th>Movie</th>
              <th>Waktu</th>
              <th>Harga</th>
            </thead>
          </tr>
          @forelse ($data["jadwal"] as $s)
              <tr>
                <td>{{$s->branch->nama}}</td>
                <td>{{$s->studio->nama}}</td>
                <td>{{$s->movie->judul}}</td>
                <td>{{$s->time}}</td>
                <td>{{$s->price}}</td>
              </tr>
          @empty
              <h1>Belum ada jadwal untuk {{$data["asal"]}} ini!</h1>
          @endforelse
        </table>
      </div>
    </div>
@endsection