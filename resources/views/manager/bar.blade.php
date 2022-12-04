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
            <h1 style=" color:black">Bar chart film yang dipesan</h1>
            <canvas id="myChart_semua_movie" height="100px"></canvas><br>
            <h3 style=" color:black">Total tiket terjual : {{$total_movie}}</h3>
        </div>
    </div>
</main>
<script type="text/javascript">
    var semua_judul_movie =  {{ Js::from($semua_judul_movie) }};
    var bar_semua_movie =  {{ Js::from($bar_semua_movie) }};

    const data_semua_movie = {
        labels: semua_judul_movie,
        datasets: [{
        label: 'Pembeli tiket',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: bar_semua_movie,
        }]
    };

    const config_semua_movie = {
        type: 'bar',
        data: data_semua_movie,
        options: {}
    };

    const myChart_semua_movie = new Chart(
        document.getElementById('myChart_semua_movie'),
        config_semua_movie
    );
</script>
  
