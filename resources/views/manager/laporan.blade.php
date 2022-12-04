<main style="margin-top:8px;">
    <div class="container pt-4" id="manager">
        <div class="row" style="margin-left: 2px;margin-right: 2px;">
            <h1 style=" color:black">Laporan profit 12 bulan terakhir</h1>
            <canvas id="myChart_movie_snack" height="100px"></canvas>
            <hr>
            <form method="post" action=" {{ url('/manager/cekReport') }}" >
                @csrf
                <label for="" class="form-label">Range tanggal : </label>
                <input type="date" name="start" id="" >  S/D <input type="date" name="end" id="">
                <input type="submit" value="Tampil" class="btn btn-primary">
            </form>
            <br>
            <hr>
            @if($tipe != "")
                <h4>{{$tipe}}</h4>
            @else
                <h4></h4>
            @endif
            <table class="table table-sm" border="1px">
                <thead>
                    <tr class="fw-bold">
                        <td>
                            ID Transaksi
                        </td>
                        <td>
                            Nama user
                        </td>
                        <td>
                            Judul film
                        </td>
                        <td>
                            Studio
                        </td>
                        <td>
                            Lokasi
                        </td>
                        <td>
                            Total transaksi
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($report as $tipe=>$item)
                    <tr height="70px" class="align-middle">
                        <td>
                        {{$item->id}}
                        </td>
                        <td>
                        {{$item->nama_user}}
                        </td>
                        <td>
                        {{$item->movie_title}}
                        </td>
                        <td>
                        {{$item->studio}}
                        </td>
                        <td>
                            {{$item->branch}}
                        </td>
                        <td>
                        Rp. {{$item->total}}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <p></p>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <h3>Total semua Transaksi : Rp. {{$jumlah}}</h3>
            {{-- href="{{ url('/manager/formAdmin') }}" --}}
            <a href="{{ url( '/manager/generate/'.$awal.'/'.$akhir ) }}">generate</a>
        </div>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">
    var labels_htrans_movie =  {{ Js::from($labels_htrans_movie) }};
    var data_htrans_movie =  {{ Js::from($data_htrans_movie) }};

    var labels_htrans_snack =  {{ Js::from($labels_htrans_snack) }};
    var data_htrans_snack =  {{ Js::from($data_htrans_snack) }};

    const data_tampil_htrans_movie = {
        label: "Tiket Bioskop",
        data: data_htrans_movie,
        lineTension: 0,
        fill: false,
        borderColor: 'red'
    };

    const data_tampil_htrans_snack = {
        label: "Snack Bioskop",
        data: data_htrans_snack,
        lineTension: 0,
        fill: false,
        borderColor: 'blue'
    };

    var merge = {
        labels: labels_htrans_movie,
        datasets: [data_tampil_htrans_movie, data_tampil_htrans_snack]
    };

    var chartOptions = {
        legend: {
            display: true,
            position: 'top',
            labels: {
            boxWidth: 80,
            fontColor: 'black'
            }
        }
    };

    const config_tampil_htrans = {
        type: 'line',
        data: merge,
        options: {}
    };

    const myChart_tampil_htrans = new Chart(
        document.getElementById('myChart_movie_snack'),
        config_tampil_htrans
    );
</script>

</html>