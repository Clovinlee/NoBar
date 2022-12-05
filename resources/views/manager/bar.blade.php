<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<main style="margin-top:8px">
    <div class="container pt-4" id="manager">
        <div class="row" style="margin-left: 2px;margin-right: 2px">
            <h1 style=" color:black">Film yang terjual 1 tahun terakhir</h1>
            <canvas id="myChart_semua_movie" height="100px"></canvas><br><hr>
            <label for="" class="form-label">Range tanggal : </label>
            <input type="date" name="start" id="awalMovie" >  S/D <input type="date" name="end" id="akhirMovie">
            <button id="btnTampilMovie" class="btn btn-primary">Tampil</button>
            <hr>
            <hr>
            <table class="table table-sm" border="1px" id="">
                <thead>
                    <tr class="fw-bold">
                        <td>
                            ID Movie
                        </td>
                        <td>
                            Judul film
                        </td>
                        <td>
                            Terjual 
                        </td>
                    </tr>
                </thead>
                <tbody id="report_body_movie">
                    @forelse ($report_all_movie as $tipe=>$item)
                    <tr height="70px" class="align-middle">
                        <td>
                        {{$item->id}}
                        </td>
                        <td>
                        {{$item->judul}}
                        </td>
                        <td>
                        {{$item->terjual}}
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
            <h3 style=" color:black" id="movie_terjual">Total tiket terjual : {{$total_movie}}</h3>
            <button id="generateMovie" class="btn btn-primary">Generate to pdf</button>
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

    $("#btnTampilMovie").on("click", function(){
            var awal = $("#awalMovie").val();
            var akhir = $("#akhirMovie").val();
            dn=$.ajax({
                type:"post",
                url:'{{url("/manager/cekMovie/")}}',
                data: {
                    _token:'{{ csrf_token() }}',
                    awal:awal,
                    akhir:akhir
                },
                success:function(data){
                    var d=JSON.parse(data,false)
                    console.log(d.cek2);
                    var str ="";
                    $("#report_body_movie").html("");
                    d.cek.forEach(el => {
                        str += `<tr height="70px" class="align-middle">
                        <td>${el.id}</td>
                        <td>${el.judul}</td>
                        <td>${el.terjual}</td>
                    </tr>`
                    });
                    myChart_semua_movie.data.datasets[0].data = d.cek2;
                    myChart_semua_movie.update();
                    $("#report_body_movie").html(str);
                    $("#movie_terjual").text("Total tiket terjual : " + d.jumlah)
                },error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                    console.log(xhr.responseText);
                }
            })
    })

    $("#generateMovie").on("click", function(){
        window.print();
    })
</script>
  
