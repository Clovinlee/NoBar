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
            <h1 style=" color:black">Bar chart snack yang dipesan</h1>
            <canvas id="myChart_semua_snack" height="100px"></canvas><br>
            {{-- <h3 style=" color:black">Total snack terjual : {{$total_snack}}</h3> --}}
        </div>
    </div>
</main>
<script type="text/javascript">
    var semua_htrans_snack =  {{ Js::from($semua_htrans_snack) }};
    var bar_htrans_snack =  {{ Js::from($bar_htrans_snack) }};

    const data_semua_snack = {
        labels: semua_htrans_snack,
        datasets: [{
        label: 'Pembeli snack',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: bar_htrans_snack,
        }]
    };

    const config_semua_snack = {
        type: 'bar',
        data: data_semua_snack,
        options: {}
    };

    const myChart_semua_snack = new Chart(
        document.getElementById('myChart_semua_snack'),
        config_semua_snack
    );
</script>
  
