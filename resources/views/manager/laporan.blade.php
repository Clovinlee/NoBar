{{-- note :
- Manager includes :
 + ChartJS
 + Laporan (5 minimal) - PDF
 + Filter and sort laporan --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Laporan profit 12 bulan terakhir</h1>
    <canvas id="myChart" height="100px"></canvas>
    <a href="/manager/generateChart">generate</a>
    <hr>
    <h1>Report</h1>
    {{-- href="{{ url('/manager/formAdmin') }}" --}}
    <form method="post" action=" {{ url('/manager/cekReport') }}" >
        @csrf
        <label for="" class="form-label">Range tanggal : </label>
        <input type="date" name="start" id="" >  S/D <input type="date" name="end" id="">
        <input type="submit" value="Tampil" class="btn btn-primary">
    </form>
    <br>
    <hr>
    @if($tipe!="")
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
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">
    var labels =  {{ Js::from($labels) }};
    var htrans =  {{ Js::from($data) }};

    var labels_snack =  {{ Js::from($labels_snack) }};
    var htrans_snack =  {{ Js::from($data_snack) }};

    const data = {
        label: "Tiket Bioskop",
        data: htrans,
        lineTension: 0,
        fill: false,
        borderColor: 'red'
    };

    const data_snack = {
        label: "Snack Bioskop",
        data: htrans_snack,
        lineTension: 0,
        fill: false,
        borderColor: 'blue'
    };

    var merge = {
        labels: labels,
        datasets: [data, data_snack]
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

    const config = {
        type: 'line',
        data: merge,
        options: {}
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>

</html>