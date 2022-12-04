<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<main style="margin-top:8px">
    <div class="container pt-4" id="manager">
        <div class="row" style="margin-left: 2px;margin-right: 2px">
            <h1 style="color: black">Report branch</h1>
            <form method="post" action="/manager/cekBar" >
                @csrf
                <label for="" class="form-label">Range tanggal : </label>
                <input type="date" name="start" id="" >  S/D <input type="date" name="end" id="">
                <input type="submit" value="Tampil" class="btn btn-primary">
            </form>
            <hr>
            <h1 style=" color:black">Bar chart branch</h1>
            <canvas id="myChart_semua_branch" height="100px"></canvas><br>
        </div>
    </div>
</main>

<script type="text/javascript">
    var semua_branch =  {{ Js::from($semua_branch) }};
    var data_branch_2 =  {{ Js::from($data_branch) }};

    const data_semua_branch = {
        labels: semua_branch,
        datasets: [{
        label: 'Pembeli snack',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: data_branch_2,
        }]
    };

    const config_semua_branch = {
        type: 'bar',
        data: data_semua_branch,
        options: {}
    };

    const myChart_semua_branch = new Chart(
        document.getElementById('myChart_semua_branch'),
        config_semua_branch
    );
</script>