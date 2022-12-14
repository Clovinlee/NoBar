<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<main style="margin-top:8px">
    <div class="container pt-4" id="manager">
        <div class="row" style="margin-left: 2px;margin-right: 2px">
            <h1 style="color:white">Laporan branch paling banyak dikunjungi</h1>
            <label for="" class="form-label" style="color:white">Range tanggal : </label>
            <input type="date" name="start" id="awalBranch">  S/D <input type="date" name="end" id="akhirBranch">
            <div style="height: 10px"></div>
            <button id="btnTampilBranch" class="btn btn-primary" style="color:white">Tampil</button>
            <div style="height: 10px"></div>
            <button id="generateBranch" class="btn btn-primary" style="color:white">Generate to pdf</button>
            <hr>
            <canvas id="myChart_semua_branch" height="100px" style="background-color:white"></canvas>
            <hr>
        </div>
    </div>
</main>

<script type="text/javascript">
    var semua_branch =  {{ Js::from($semua_branch) }};
    var data_branch_2 =  {{ Js::from($data_branch) }};

    const data_semua_branch = {
        labels: semua_branch,
        datasets: [{
        label: 'pengunjung',
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

    $("#btnTampilBranch").on("click", function(){
            var awal = $("#awalBranch").val();
            var akhir = $("#akhirBranch").val();
            dn=$.ajax({
                type:"post",
                url:'{{url("/manager/cekBranch/")}}',
                data: {
                    _token:'{{ csrf_token() }}',
                    awal:awal,
                    akhir:akhir
                },
                success:function(data){
                    var d=JSON.parse(data,false)
                    var str ="";
                    myChart_semua_branch.data.datasets[0].data = d;
                    myChart_semua_branch.update();
                },error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                    console.log(xhr.responseText);
                }
            })
    })

    $("#generateBranch").on("click", function(){
        window.print();
    })
</script>