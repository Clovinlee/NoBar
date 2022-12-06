<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

{{-- BELUM DIKERJAIN --}}
<main style="margin-top:8px">
    <div class="container pt-4" id="manager">
        <div class="row" style="margin-left: 2px;margin-right: 2px">
            <h1 style=" color:black">Bar chart snack yang dipesan</h1>
            <label for="" class="form-label">Range tanggal : </label>
            <input type="date" name="start" id="awalSnack" >  S/D <input type="date" name="end" id="akhirSnack">
            <button class="btn btn-primary" id="btnTampilSnack">TampilSnack</button>
            <br>
            <canvas id="myChart_semua_snack" height="100px"></canvas><br>
            <hr>
            <h3 style=" color:black" id="snack_terjual">Total snack terjual : {{$total_snack}} pcs</h3>
            <hr>
            <table class="table table-sm" border="1px" id="">
                <thead>
                    <tr class="fw-bold">
                        <td>
                            ID Transaksi
                        </td>
                        <td>
                            Nama user
                        </td>
                        <td>
                            Snack
                        </td>
                        <td>
                            Harga
                        </td>
                        <td>
                            Quantity
                        </td>
                    </tr>
                </thead>
                <tbody id="report_body_snack">
                    @forelse ($report_snack as $tipe=>$item)
                    <tr height="70px" class="align-middle">
                        <td>
                        {{$item->id}}
                        </td>
                        <td>
                        {{$item->nama}}
                        </td>
                        <td>
                        {{$item->label}}
                        </td>
                        <td>
                        Rp. {{number_format($item->harga,2,',','.')}}
                        </td>
                        <td>
                            {{$item->count}}pcs
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <p></p>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <hr>
            
            
            <button id="generateSnack" class="btn btn-primary">Generate to pdf</button>
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

    $("#btnTampilSnack").on("click", function(){
            var awal = $("#awalSnack").val();
            var akhir = $("#akhirSnack").val();
            dn=$.ajax({
                type:"post",
                url:'{{url("/manager/cekSnack/")}}',
                data: {
                    _token:'{{ csrf_token() }}',
                    awal:awal,
                    akhir:akhir
                },
                success:function(data){
                    var d=JSON.parse(data,false)
                    console.log(d.cek2);
                    var str ="";
                    $("#report_body_snack").html("");
                    d.cek.forEach(el => {
                        str += `<tr height="70px" class="align-middle">
                        <td>${el.id}</td>
                        <td>${el.nama}</td>
                        <td>${el.label}</td>
                        <td>Rp. ${el.harga}</td>
                        <td>${el.count}pcs</td>
                    </tr>`
                    });
                    myChart_semua_snack.data.datasets[0].data = d.cek2;
                    myChart_semua_snack.update();
                    $("#report_body_snack").html(str);
                    $("#snack_terjual").text("Total snack terjual : " + d.jumlah)
                },error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                    console.log(xhr.responseText);
                }
            })
    })

    $("#generateSnack").on("click", function(){
        window.print();
    })
</script>
  
