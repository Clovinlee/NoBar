<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

{{-- BELUM DIKERJAIN --}}
<main style="margin-top:8px">
    <div class="container pt-4" id="manager">
        <div class="row" style="margin-left: 2px;margin-right: 2px">
            <form method="post" action="/manager/cekBar" >
                @csrf
                <label for="" class="form-label">Range tanggal : </label>
                <input type="date" name="start" id="" >  S/D <input type="date" name="end" id="">
                <input type="submit" value="Tampil" class="btn btn-primary">
            </form>
            <hr>
            <h1 style=" color:black">Laporan hari paling ramai</h1>
            <canvas id="myChart_hari" height="100px"></canvas>
        </div>
    </div>
</main>

<script type="text/javascript">
    var labels_hari =  ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday","Friday", "Saturday"];
    var bar_hari =  {{ Js::from($bar_hari) }};

    const data_hari = {
        labels: labels_hari,
        datasets: [{
        label: 'Pembeli tiket',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: bar_hari,
        }]
    };

    const config_hari = {
        type: 'bar',
        data: data_hari,
        options: {}
    };

    const myChart_hari = new Chart(
        document.getElementById('myChart_hari'),
        config_hari
    );
</script>
