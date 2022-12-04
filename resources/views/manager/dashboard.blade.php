<style>
  .dboardContainer{
    border-radius: 25px;
    padding: 20px;
    background-color: bisque;
    box-shadow: 2px 2px 2px 2px black;
  }
</style>
<main style="margin-top:8px">
    <div class="container pt-4" id="manager">
      <div class="row" style="margin-left: 2px;margin-right: 2px">
        <div class="col-12 col-md-6 dboardContainer">
          Pendapatan Movie hari ini : Rp. {{ number_format($profit,2,',','.') }}
          <br>
          <canvas id="myChart" height="100px" style="background-color:antiquewhite"></canvas>
        </div>
        <div class="col-12 col-md-6 dboardContainer">
          Pendapatan Snack hari ini : Rp. {{ number_format($profit_snack,2,',','.') }}
          <br>
          <canvas id="myChart2" height="100px" style="background-color:antiquewhite"></canvas>
        </div>
        <div class="col-12 dboardContainer">
          Pendapatan total hari ini : Rp. {{ $total }}
          <br>
          <canvas id="myChart6" height="100px" style="background-color:antiquewhite"></canvas>
        </div>
        <div class="col-4 dboardContainer">
          Snack paling banyak dibeli 7 hari terakhir
          <br>
          <canvas id="myChart3" height="100px" style="background-color:antiquewhite"></canvas>
        </div>
        <div class="col-4 dboardContainer">
          Branch paling ramai 7 hari terakhir
          <br>
          <canvas id="myChart4" height="250px" style="background-color:antiquewhite"></canvas>
        </div>
        <div class="col-4 dboardContainer">
          Movie paling banyak dibeli 7 hari terakhir
          <br>
          <canvas id="myChart5" height="100px" style="background-color:antiquewhite"></canvas>
        </div>
      </div>
    </div>
  </main>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script type="text/javascript">
    var labels =  {{ Js::from($labels) }};
    var htrans =  {{ Js::from($data) }};

    var labels_movie_mgg =  {{ Js::from($semua) }};
    var hasil_movie_mgg =  {{ Js::from($bar) }};

    var labels_snack_mgg =  {{ Js::from($semua_snack) }};
    var hasil_snack_mgg =  {{ Js::from($bar_snack) }};

    var labels_snack =  {{ Js::from($labels_snack) }};
    var htrans_snack =  {{ Js::from($data_snack) }};

    var branch_label =  {{ Js::from($branch_label) }};
    var branch_count =  {{ Js::from($branch_count) }};

    const data = {
        labels: labels,
        datasets: [{
        label: 'Profit penjualan tiket 7 hari terakhir',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: htrans,
        }]
    };

    const data2 = {
        label: "Tiket Bioskop",
        data: htrans,
        lineTension: 0,
        fill: false,
        borderColor: 'red'
    };

    const data_snack = {
        labels: labels_snack,
        datasets: [{
        label: 'Profit penjualan snack 7 hari terakhir',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: htrans_snack,
        }]
    };

    const data_snack2 = {
        label: "Snack Bioskop",
        data: htrans_snack,
        lineTension: 0,
        fill: false,
        borderColor: 'blue'
    };

    const data_movie_mgg = {
        labels: labels_movie_mgg,
        datasets: [{
        label: 'Jumlah tiket terjual',
        data: hasil_movie_mgg,
        backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255,0,255)',
            'rgb(255,255,0)',
            'rgb(0,255,0)',
            'rgb(0,128,128)',
            'rgb(255,69,0)',
            'rgb(160,82,45)'
        ],
        hoverOffset: 4
        }]
    };

    const data_snack_mgg = {
        labels: labels_snack_mgg,
        datasets: [{
        label: 'Jumlah terjual',
        data: hasil_snack_mgg,
        backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
        ],
        hoverOffset: 4
        }]
    };

    const data_branch = {
        labels: branch_label,
        datasets: [{
        label: 'Pengunjung',
        backgroundColor: 'rgb(0,128,128)',
        borderColor: 'rgb(0,128,128)',
        data: branch_count,
        }]
    };

    var merge = {
        labels: labels,
        datasets: [data2, data_snack2]
    };

    const config_merge = {
        type: 'line',
        data: merge,
        options: {}
    };

    const config = {
        type: 'line',
        data: data,
        options: {}
    };

    const config_snack = {
        type: 'line',
        data: data_snack,
        options: {}
    };

    const config_movie_mgg = {
        type: 'pie',
        data: data_movie_mgg
    };

    const config_snack_mgg = {
        type: 'pie',
        data: data_snack_mgg
    };

    const config_branch = {
        type: 'bar',
        data: data_branch,
        options: {}
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );

    const myChart_snack = new Chart(
        document.getElementById('myChart2'),
        config_snack
    );

    const myChart_movie_mgg = new Chart(
        document.getElementById('myChart5'),
        config_movie_mgg
    );

    const myChart_branch = new Chart(
        document.getElementById('myChart4'),
        config_branch
    );

    const myChart_snack_mgg = new Chart(
        document.getElementById('myChart3'),
        config_snack_mgg
    );

    const myChart_total = new Chart(
        document.getElementById('myChart6'),
        config_merge
    );
</script>
  