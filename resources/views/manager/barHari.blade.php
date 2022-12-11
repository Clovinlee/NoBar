<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

{{-- BELUM DIKERJAIN --}}
<main style="margin-top:8px">
    <div class="container pt-4" id="manager">
        <div class="row" style="margin-left: 2px;margin-right: 2px">
            <label for="" class="form-label" style="color:white">Range tanggal : </label>
            <input type="date" name="start" id="awalHari"> S/D <input type="date" name="end" id="akhirHari">
            <button id="btnTampilHari" class="btn btn-primary" style="color:white">Tampil</button>
            <div style="height: 10px"></div>
            <button id="generateHari" class="btn btn-primary" style="color:white">Generate to pdf</button>
            <hr>
            <h1 style="color:white">Laporan hari paling ramai</h1>
            <canvas id="myChart_hari" height="100px"></canvas>
            <hr>
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
    
    console.log(config_hari.data);

    $("#btnTampilHari").on("click", function(){
            var awal = $("#awalHari").val();
            var akhir = $("#akhirHari").val();
            dn=$.ajax({
                type:"post",
                url:'{{url("/manager/cekHari/")}}',
                data: {
                    _token:'{{ csrf_token() }}',
                    awal:awal,
                    akhir:akhir
                },
                success:function(data){
                    var d=JSON.parse(data,false)
                    var str ="";
                    myChart_hari.data.datasets[0].data = d;
                    console.log(d);
                    myChart_hari.update();
                },error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                    console.log(xhr.responseText);
                }
            })
    })

    $("#generateHari").on("click", function(){
        window.print();
    })
</script>
