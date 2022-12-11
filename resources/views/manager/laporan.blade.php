<style type="text/css" media="print">
    @media print{
        nav {display : none;}
    }
</style>
<main style="margin-top:8px;">
    <div class="container pt-4" id="manager">
        <div class="row" style="margin-left: 2px;margin-right: 2px;color:white">
            <h1 style="">Laporan profit 12 bulan terakhir</h1>
            <canvas id="myChart_movie_snack" height="100px"></canvas>
            <hr>
            <label for="" class="form-label">Range tanggal : </label>
            <input type="date" name="start" id="awal" >  S/D 
            <input type="date" name="end" id="akhir">
            <button id="btnTampil" class="btn btn-primary">Tampil</button>
            <br>
            <h3 id="total_laporan" style="color:white">Total semua Transaksi : Rp. {{number_format($jumlah,2,',','.')}}</h3>
            <hr>
            <table class="table table-sm" border="1px" id="" style="color:white">
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
                <tbody id="report_body">
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
                        Rp. {{number_format($item->total,2,',','.')}}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <p></p>
                    </tr>
                    @endforelse
                </tbody>
            </table>
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
            fontColor: '#fff'
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
    
    $("#btnTampil").on("click", function(){
            var awal = $("#awal").val();
            var akhir = $("#akhir").val();
            dn=$.ajax({
                type:"post",
                url:'{{url("/manager/cekReport/")}}',
                data: {
                    _token:'{{ csrf_token() }}',
                    awal:awal,
                    akhir:akhir
                },
                success:function(data){
                    var d=JSON.parse(data,false)
                    console.log(d);
                    var str ="";
                    $("#report_body").html("");
                    d.cek.forEach(el => {
                        str += `<tr height="70px" class="align-middle">
                        <td>${el.id}</td>
                        <td>${el.nama_user}</td>
                        <td>${el.movie_title}</td>
                        <td>${el.studio}</td>
                        <td>${el.branch}</td>
                        <td>Rp. ${el.total}</td>
                    </tr>`
                    });
                    $("#report_body").html(str);
                    $("#total_laporan").text("Total semua Transaksi : Rp. " + d.jumlah)
                },error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                    console.log(xhr.responseText);
                }
            })
    })

    $("#generate").on("click", function(){
        window.print();
    })
</script>

</html>