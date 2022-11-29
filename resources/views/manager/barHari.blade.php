<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

{{-- BELUM DIKERJAIN --}}
<form method="post" action="/manager/cekBar" >
    @csrf
    <label for="" class="form-label">Range tanggal : </label>
    <input type="date" name="start" id="" >  S/D <input type="date" name="end" id="">
    <input type="submit" value="Tampil" class="btn btn-primary">
</form>
<hr>
<h1>Bar hari</h1>
<canvas id="myChart" height="100px"></canvas>

<script type="text/javascript">
    var labels =  ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday","Friday", "Saturday"];
    var htrans =  {{ Js::from($bar) }};

    const data = {
        labels: labels,
        datasets: [{
        label: 'Pembeli tiket',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: htrans,
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {}
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>
