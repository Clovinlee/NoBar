@extends('master.masterlayout')
@section("subtitle","Admin")
@section('body')
<style>
    div.dataTables_processing div {
        display: none;
    }
</style>
<x-sidebaradmin></x-sidebaradmin>
<div id="div_dashboard" style="display:block">
    @include('admin.dashboard')
</div>
<div id="div_branch" style="display:none">
    @include('admin.branch')
</div>
<div id="div_movie" style="display: none">
    @include('admin.movie')
</div>
<div id="div_schedule" style="display: none">
    @include('admin.schedule')
</div>
<div id="div_snack" style="display: none">
    @include('admin.snack')
</div>
<div id="div_add" style="display: none">
    @include('admin.movieadd')
</div>
<div id="toast"></div>
@endsection
@section('pageScript')
<script>
    // console.log("HEY")
    $(document).ready(function () {
        $('.js-example-basic-single').select2({
            dropdownParent: $('#tambahschedule')
        });
        $('.js-example-basic-multiple').select2({
            dropdownParent: $('#tambahschedule'),
            placeholder: 'Pilih studio',
        });
        //$.fn.modal.Constructor.prototype.enforceFocus = function() {};
        Schedule()
    });
    var dt = null;
    var current = 0;
    var cbranch = -1
    var cstudio = -1
    var csched = -1
    var cmov = -1
    var produser = [];
    var casts = []
    var director = []
    const page = ["dashboard", "branch", "movie", "snack", "schedule"];
    var genre = ["Comedy", "Horror", "Action", "Romance", "Fantasy", "Superhero", "History", "Life", "Nature"]

    function Reload(data) {
        $("#accordionExample").html("")
        var str = "";
        data.forEach(b => {
            str += `<div class="accordion-item" id="branchacc${b.id}">
            <h2 class="accordion-header" id="heading${b.id}">
              <button
                class="accordion-button collapsed"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#collapse${b.id}"
                aria-expanded="false"
                aria-controls="collapse${b.id}"
              >
              <h2 class="text-dark">${b.nama}</h2>

              </button>
            </h2>
            <div id="collapse${b.id}" class="accordion-collapse collapse" aria-labelledby="heading${b.id}">
              <div class="accordion-body" style="padding-left: 2%">
                <div class="d-flex justify-content-center">
                  <button class="linkgantinama btn btn-secondary mx-3" data-mdb-toggle="modal"data-id='${b.id}' d='${b.nama}' data-mdb-target="#modaleditbranch">Rename</button>
                  <button class="linkhapusbranch btn btn-danger mx-3" data-mdb-toggle="modal"data-id='${b.id}' d='${b.nama}' data-mdb-target="#modaldeletebranch">Delete Branch</button>
                  <a href="" class="tambahstudio btn btn-warning mx-3" data-mdb-toggle="modal"data-id='${b.id}' d='${b.nama}' data-mdb-target="#modaladdstudio">Add new studio &nbsp;<i class="fa-solid fa-plus fa-lg"></i></a>
                </div>`
            if (b.studio.length > 0) {
                b.studio.forEach(s => {
                    str += `<hr style="height: 3px;">
                    <div data-background="{{ asset('assets/images/bgstudio.jpg') }}" class="ucm-area ucm-bg rounded shadow-2" style="background-position-y: 100%; max-height: 50px">
                      <div class=" d-flex justify-content-between align-item-center px-5 py-0 mt-0">
                        <h3 class=" d-inline-block m-0 p-0 align-middle">${s.nama}</h3>
                        <span>
                          <button class="linkeditstudio btn-warning btn" data-mdb-toggle="modal"data-id='${s.id}' data-slot='${s.slot}' d='${s.nama}' data-mdb-target="#modaleditstudio"><i class="fa-regular fa-pen-to-square fa-2x"></i></button>
                          <button class="linkhapusstudio btn-danger btn" data-mdb-toggle="modal"data-id='${s.id}' d='${s.nama}' data-mdb-target="#modalhapusstudio"><i class="fa-solid fa-trash-can fa-2x"></i></button>
                        </span>
                      </div>
                    </div>`
                })
            } else {
                str += "<h3>Branch ini belum punya studio</h3>"
            }
            str += "</div></div></div>"
        });
        $("#accordionExample").html(str)
        dashboardreload()
    }

    function delproducer(e) {
        const i = $(e.target).val()
        produser.splice(i, 1)
        ReloadProducer()
    }
    function dashboardreload() {
        $.ajax({
            type: "get",
            url: '{{url("/admin/schedule/dashboard")}}',
            success: function (data) {
                const da=JSON.parse(data,false);
                var str=""
                if (da.length>0) {
                    da.forEach(d => {
                        str+=`<div class="border border-dark border-top-5 border-bottom-5 border-end-0 border-start-0" >
                    <h4 class="text-dark">${d.nama}</h4>`
                    if (d.time==null) {
                        str+=`<h5 class="text-dark">Belum ada film di cabang ${d.nama}</h5>`
                    } else {
                        str+=`<h5 class="text-dark">${d.film}</h5>
                            <h5 class="text-dark">${d.time}</h5>`
                    }
                    str+=`</div>` 
                    });
                }else{
                    str+=`<h4 class="text-dark">Belum ada branch!</h4>`
                }
                $("#sb").html(str)
            }   
        })
    }
    function dashboard_movie(){
        $.ajax({
            type:"get",
            url:"{{url('/admin/movie/dashboard')}}",
            success:function(data){
                const d=JSON.parse(data,false)
                var str="<center>"
                if (d!=null) {
                    str+=`<img src="{{asset('assets/images/${d.image}')}}" alt="${d.slug}"   srcset=""><br>
                <h4 class="text-dark">${d.judul}</h4>
                <h5 class="text-dark">Genre :</h5>    
                <h5 class="text-dark">${d.genre}}</h5>
                <h5 class="text-dark">Durasi :</h5>    
                <h5 class="text-dark">${d.duration} menit</h5>`
                } else {
                    str+=`<h4 class="text-dark">Belum ada Movie!</h4>`
                }
                str+="</center>"
                $("#newmovie").html(str)
                dashboardreload()
            }
            
        })
    }
    function dashboard_snack() { 
        $.ajax({
            type: "get",
            url: '{{url("/admin/snack/dashboard")}}',
            success: function (data) {
                const d=JSON.parse(data,false);
                var str="<center>"
                if (d!=null) {
                    str+=`<img src="{{asset('assets/images/${d.foto}')}}" alt="" srcset=""><br>
                        <h5 class="text-dark">${d.nama}</h5>
                        <h5 class="text-dark">jenis : </h5> 
                        <h5 class="text-dark">${d.tipe}</h5>   
                        <h5 class="text-dark">Harga :</h5> 
                        <h5 class="text-dark">Rp. ${d.harga.toLocaleString('en-US')}</h5>`
                } else {
                    str+=`<h4 class="text-dark">Belum ada Snack!</h4>`
                }
                str+="</center>"
                $("#newsnack").html(str)
            },
            
        })
     }  
    function deldirektur(e) {
        const i = $(e.target).val()
        director.splice(i, 1)
        ReloadDirector()
    }

    function delcast(e) {
        const i = $(e.target).val()
        casts.splice(i, 1)
        ReloadCast()
    }
    $("#tambahjadwal").on("click", function () {
        const studio = $("#selectstudio").val()
        if (studio.length > 0) {
            if ($("#addtime").val() != "") {
                $.ajax({
                    type: "POST",
                    url: '{{url("/admin/schedule/add")}}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        studio: studio,
                        movie: $("#selectmovie").val(),
                        time: $("#addtime").val()
                    },
                    success: function (data) {
                        dt.ajax.reload()
                        $("#selectstudio").val(null).trigger('change')
                        $("#selectmovie").val(null).trigger('change')
                        $("#addtime").val("")
                        dashboardreload()
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                        console.log(xhr.responseText);
                    }
                })
            } else {
                alert("Waktu tayang belum diisi!")
            }
        } else {
            alert("Belum pilih studio!")
            $("#selectstudio").val(null).trigger('change')
        }
    })

    function ReloadProducer() {
        var c = ""
        var i = 0
        produser.forEach(p => {
            c += "<div class='d-flex justify-content-between align-item-center my-2 py-3 border-dark border-3 border-top border-bottom'><h6 class='d-inline-block text-dark align-middle mt-2'>" + p +
                "</h6><button class='btn btn-danger justify-content-end align-items-center' onclick='delproducer(event)' value='" +
                i + "'><i class='fa-solid fa-trash-can fa-2x'></i></button></div>"
            i++
        });
        $("#list_produser").html(c)
    }

    function ReloadDirector() {
        var c = ""
        var i = 0
        director.forEach(d => {
            c += "<div class='d-flex justify-content-between align-item-center my-2 py-3 border-dark border-3 border-top border-bottom'><h6 class='d-inline-block text-dark align-middle mt-2'>" + d +
                "</h6><button class='btn btn-danger justify-content-end align-items-center' onclick='deldirektur(event)' value='" +
                i + "'><i class='fa-solid fa-trash-can fa-2x'></i></button></div>"
            i++
        });
        $("#list_direktur").html(c)
    }

    function ReloadCast() {
        var c = ""
        var i = 0
        casts.forEach(ca => {
            c += "<div class='d-flex justify-content-between align-item-center my-2 py-3 border-dark border-3 border-top border-bottom'><h6 class='d-inline-block text-dark align-middle mt-2'>" + ca +
                "</h6><button class='btn btn-danger justify-content-end align-items-center' onclick='delcast(event)' value='" +
                i + "'><i class='fa-solid fa-trash-can fa-2x'></i></button></div>"
            i++
        });
        $("#list_cast").html(c)
    }
    $('input[type=text], input[type=password], input[type=email], input[type=url], input[type=tel], input[type=number], input[type=search], input[type=date], input[type=time], textarea').each(function (element, i) {
      if ((element.value !== undefined && element.value.length > 0) || $(this).attr('placeholder') !== undefined) {
        $(this).siblings('label').addClass('active');
      }
      else {
        $(this).siblings('label').removeClass('active');
      }
    });
$('input[type=email]').val('test').siblings('label').addClass('active');
    function ReloadMovie(data) {
        var c = $("#containermovie")
        c.html("")
        var str = ""
        if (data.length > 0) {
            data.forEach(m => {
                str += `<div class="card col-12 mx-5 col-md-6 col-lg-4 my-5">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light" >
              <img src="{{asset('assets/images/${m.image}')}}" class="img-fluid" alt="${m.slug}"/>
            </div>
            <div class="card-body pl-2">
              <h5 class="card-title text-dark">${m.judul}</h5>
              <p class="card-text">
                Genre :<br>
                ${m.genre}<br>
                Duration :<br>
                ${m.duration}<br>
              </p>
              <div class="d-flex justify-content-center">
                <button class="btn btn-warning movieedit mx-3" value="${m.id}"><i class="fa-regular fa-pen-to-square fa-2x"></i></button>
              <button href="" data-mdb-toggle="modal" value="${m.id}" d="${m.judul}" data-mdb-target="#modaldeletemovie" class="delmovie btn btn-danger"><i class="fa-solid fa-trash-can fa-2x"></i></button>
              </div>
            </div>
          </div>`
            })
        } else {
            str = "<h2>Belum ada film yang main!</h2>"
        }
        c.html(str)
        dashboard_movie();
    }
    $("#editjadwal").on("click", function () {
        const time = $("#date").val()
        dn = $.ajax({
            type: "POST",
            url: '{{url("/admin/schedule")}}' + "/" + cshed,
            data: {
                _token: '{{ csrf_token() }}',
                id: csched,
                time: time
            },
            success: function (data) {
                dt.ajax.reload()
                dashboardreload()
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
                console.log(xhr.responseText);
            }
        })
    })
    $("#movsec").on("click", ".movieedit", function () {
        var id = $(this).val()
        $.ajax({
            type: "get",
            url: '{{url("/admin/movie/get")}}',
            data: {
                id: id
            },
            success: function (data) {
                const m = JSON.parse(data, false)
                $("#movie_judul").val(m.judul)
                produser = m.producer.split(", ")
                director = m.director.split(", ")
                casts = m.casts.split(", ")
                $("#synopsis").val(m.synopsis)
                const temp = m.genre.split(", ")
                $("#durasi").val(m.duration)
                temp.forEach(g => {
                    $("#add_" + g).prop("checked", true)
                });
                ReloadProducer()
                ReloadDirector()
                ReloadCast()
                $("#div_add").css("display", "block")
                $("#div_movie").css("display", "none")
                $("#addmovie").val("edit")
                $("#addmovie").text("Edit Film")
                $("#juduladd").text("Edit Film " + m.judul)
                cmov = id
            }
        })
    })
    $("#btnaddschedule").on("click", function () {
        $.ajax({
            type: "get",
            url: '{{url("/admin/get")}}',
            success: function (data) {
                $d = JSON.parse(data, false)
                var str = ""
                $d.branch.forEach(b => {
                    str += "<optgroup label='" + b.nama + "'>"
                    b.studio.forEach(s => {
                        str += "<option value='" + b.id + "," + s.id + "'>" + s
                            .nama + "</option>"
                    })
                });
                $("#selectstudio").html(str)
                str = ""
                $d.movie.forEach(m => {
                    str += "<option value='" + m.id + "'>" + m.judul + "</option>"
                });
                $("#selectmovie").html(str)
            }
        })
    })
    $("#schedule_table").on("click", ".editschedule", function () {
        const data = dt.row($(this).parents('tr')).data()
        cshed = data.id;
        $("#date").val(data.time)
    })
    $("#schedule_table").on("click", ".deleteschedule", function () {
        csched = dt.row($(this).parents('tr')).data().id;

    })
    $("#hapusjadwal").on("click", function () {
        dn = $.ajax({
            type: "post",
            url: '{{url("/admin/schedule/delete")}}',
            data: {
                _token: '{{ csrf_token() }}',
                id: csched
            },
            success: function (data) {
                dt.ajax.reload()
                dashboardreload()
            }
        })
    })
    function Schedule() {
        // if (dt != null) {
        //     dt.destroy()
        //     console.log("destroyed");
        // }
        dt = $("#schedule_table").on( 'search.dt', function () {
        $("#schedule_table").busyLoad("show",{
            spinner:"cube"
        })
    } ).DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            autowidth: true,
            pagingType: 'full_numbers',
            drawCallback: function( settings ) {
                $("#schedule_table").busyLoad("hide")
            },
            ajax: "{{url('/admin/schedule')}}",
            aoColumns: [{
                mData: "branch.nama"
            }, {
                mData: "studio.nama"
            }, {
                mData: "movie.judul"
            }, {
                mData: "time"
            }, {
                mData: "harga"
            }, {
                target: -1,
                data: null,
                defaultContent: "<button class='btn btn-warning editschedule form-control' data-mdb-toggle='modal' data-mdb-target='#ubahjadwalbranch'><i class='fa-regular fa-pen-to-square fa-2x'></i></button><button class='btn btn-danger deleteschedule form-control' data-mdb-toggle='modal' data-mdb-target='#hapusjadwal'><i class='fa-solid fa-trash-can fa-2x'></i></button>"
            }]
        });
    };

    function PageChange(e) {
        current = $(e.target).attr("target");
        for (let i = 0; i < page.length; i++) {
            const p = page[i];
            if (i == current) {
                $("#nav_" + p).addClass("active");
                $("#div_" + p).css("display", "block");
            } else {
                $("#nav_" + p).removeClass("active");
                $("#div_" + p).css("display", "none");
            }
        };
        $("#div_add").css("display", "none");
        $("#div_edit").css("display", "none");
    }

    $("#EditBranch").on("click", function () {
        const nama = $("#nama_branch_edit").val();
        if (nama.length > 0) {
            dn = $.ajax({
                type: "post",
                url: '{{url("/admin/branch/edit")}}',
                data: {
                    _token: '{{ csrf_token() }}',
                    nama: nama,
                    id: cbranch
                },
                success: function (data) {
                    var d = JSON.parse(data, false)
                    Reload(d)
                }
            })
        } else {
            alert("Nama tidak boleh kosong!");
        }
    })
    $("#DeleteBranch").on("click", function () {
        dn = $.ajax({
            type: "post",
            url: '{{url("/admin/branch/delete")}}',
            data: {
                _token: '{{ csrf_token() }}',
                id: cbranch
            },
            success: function (data) {
                var d = JSON.parse(data, false)
                Reload(d)
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
                console.log(xhr.responseText);
            }
        })
    })
    $("#DeleteStudio").on("click", function () {
        dn = $.ajax({
            type: "post",
            url: '{{url("/admin/studio/delete")}}',
            data: {
                _token: '{{ csrf_token() }}',
                id: cstudio
            },
            success: function (data) {
                var d = JSON.parse(data, false)
                Reload(d)
            }
        })
    })
    $("#EditStudio").on("click", function () {
        const nama = $("#nama_studio_edit").val()
        const slot = $("#slot_studio_edit").val()
        dn = $.ajax({
            type: "post",
            url: '{{url("/admin/studio/edit")}}',
            data: {
                _token: '{{ csrf_token() }}',
                nama: nama,
                slot: slot,
                id: cstudio
            },
            success: function (data) {
                var d = JSON.parse(data, false)
                Reload(d)
            }
        })
    })
    $("#addproducer").on("click", function () {
        const tp = $("#movie_produser").val()
        produser.push(tp)
        $("#movie_produser").val("")
        ReloadProducer()
    })
    $("#adddirektur").on("click", function () {
        const tp = $("#movie_direktur").val()
        director.push(tp)
        $("#movie_direktur").val("")
        ReloadDirector()
    })
    $("#addcast").on("click", function () {
        const tp = $("#movie_cast").val()
        casts.push(tp)
        $("#movie_cast").val("")
        ReloadCast()
    })
    $("#AddStudio").on("click", function () {
        const nama = $("#nama_studio").val();
        const slot = $("#slot_studio").val();
        dn = $.ajax({
            type: "POST",
            url: '{{url("/admin/studio/add")}}',
            data: {
                _token: '{{ csrf_token() }}',
                nama: nama,
                branch: cbranch,
                slot: slot
            },
            success: function (data) {
                var d = JSON.parse(data, false)
                Reload(d)
            }
        });
    });
    function Toast(title,type,text) {
        $("#toast").html(`<x-toast title="${title}" type="${type}">${text}</x-toast>`)
        $(".toast").toast("show");
    }
    $("#addmovie").on("click", function () {
        if ($(this).val() == "add") {
            const judul = $("#movie_judul").val();
            const synopsis = $("#synopsis").val();
            const duration = $("#durasi").val()
            if (judul.length > 0) {
                if (produser.length > 0 && casts.length > 0 && director.length > 0) {
                    if (synopsis.length <= 0) {
                        alert("sinopsis tidak boleh kosong!")
                    } else {
                        var addgenre = []
                        genre.forEach(g => {
                            if ($("#add_" + g).is(":checked")) {
                                addgenre.push(g)
                            }
                        });
                        if (addgenre.length > 0) {
                            if (duration > 0) {
                                const img = $("#img")[0].files
                                if (img.length > 0) {
                                    const fd = new FormData()
                                    fd.append("_token", '{{ csrf_token() }}')
                                    fd.append("synopsis", synopsis)
                                    fd.append("duration", duration)
                                    fd.append("genre", addgenre.join(", "))
                                    fd.append("director", director.join(", "))
                                    fd.append("produser", produser.join(", "))
                                    fd.append("cast", casts.join(", "))
                                    fd.append("image", $("#img").prop("files")[0])
                                    fd.append("judul", judul)
                                    dn = $.ajax({
                                        type: "POST",
                                        url: '{{url("/admin/movie/add")}}',
                                        data: fd,
                                        contentType: false,
                                        processData: false,
                                        cache: false,
                                        dataType: 'html',
                                        success: function (data) {
                                            var d = JSON.parse(data, false)
                                            $("#movie_judul").val("")
                                            produser = []
                                            director = []
                                            casts = []
                                            ReloadCast()
                                            ReloadDirector()
                                            ReloadProducer()
                                            $("#movie_produser").val("")
                                            $("#movie_direktur").val("")
                                            $("#movie_cast").val("")
                                            $("#durasi").val(0)
                                            $("#img").val('')
                                            $("#synopsis").val('')
                                            addgenre.forEach(g => {
                                                $("#add_" + g).prop("checked", false)
                                            });
                                            ReloadMovie(d)
                                            $("#div_add").css("display", "none")
                                            $("#div_movie").css("display", "block")
                                            Toast("Success","success","Berhasil tambah film")
                                        },
                                        error: function (xhr, ajaxOptions, thrownError) {
                                            // alert(xhr.status);
                                            // alert(thrownError);
                                            Toast("Error","danger","Gagal Tambah film, bad internet connection")
                                            //alert("Gagal Tambah film, bad internet connection")
                                            console.log(xhr.responseText);
                                        }
                                    });
                                } else {
                                    Toast("Error","danger","poster belum diupload!")
                                }
                            } else {
                                Toast("Error","danger","durasi film harus lebih dari 0!")
                                //alert("durasi film harus lebih dari 0!")
                            }
                        } else {
                            Toast("Error","danger","belum ada genre yang dipilih!")
                            //alert("belum ada genre yang dipilih!")
                        }
                    }
                } else {
                    Toast("Error","danger","produser, direktur, dan castnya harus ada!")
                    //alert("produser, direktur, dan castnya harus ada!")
                }
            } else {
                Toast("Error","danger","judul tidak boleh kosong!")
                //alert("")
            }
        } else {
            const judul = $("#movie_judul").val();
            const synopsis = $("#synopsis").val();
            const duration = $("#durasi").val()
            if (judul.length > 0) {
                if (produser.length > 0 && casts.length > 0 && director.length > 0) {
                    if (synopsis.length <= 0) {
                        alert("sinopsis tidak boleh kosong!")
                    } else {
                        var addgenre = []
                        genre.forEach(g => {
                            if ($("#add_" + g).is(":checked")) {
                                addgenre.push(g)
                            }
                        });
                        if (addgenre.length > 0) {
                            if (duration > 0) {
                                const img = $("#img")[0].files
                                if (img.length > 0) {
                                    const fd = new FormData()
                                    fd.append("_token", '{{ csrf_token() }}')
                                    fd.append("synopsis", synopsis)
                                    fd.append("duration", duration)
                                    fd.append("genre", addgenre.join(", "))
                                    fd.append("director", director.join(", "))
                                    fd.append("produser", produser.join(", "))
                                    fd.append("cast", casts.join(", "))
                                    fd.append("image", $("#img").prop("files")[0])
                                    fd.append("judul", judul)
                                    fd.append("id", cmov)
                                    dn = $.ajax({
                                        type: "POST",
                                        url: '{{url("/admin/movie/edit")}}',
                                        data: fd,
                                        contentType: false,
                                        processData: false,
                                        cache: false,
                                        dataType: 'html',
                                        success: function (data) {
                                            var d = JSON.parse(data, false)
                                            $("#movie_judul").val("")
                                            produser = []
                                            director = []
                                            casts = []
                                            ReloadCast()
                                            ReloadDirector()
                                            ReloadProducer()
                                            $("#movie_produser").val("")
                                            $("#movie_direktur").val("")
                                            $("#movie_cast").val("")
                                            $("#durasi").val(0)
                                            $("#img").val('')
                                            $("#synopsis").val('')
                                            addgenre.forEach(g => {
                                                $("#add_" + g).prop("checked", false)
                                            });
                                            ReloadMovie(d)
                                            $("#div_add").css("display", "none")
                                            $("#div_movie").css("display", "block")
                                            Toast("Success","success","Berhasil edit film")
                                        },
                                        error: function (xhr, ajaxOptions, thrownError) {
                                            Toast("Error","danger","Gagal Edit film, bad internet connection")
                                            //alert("Gagal Edit film, bad internet connection")
                                            //console.log(xhr.responseText);
                                        }
                                    });
                                }else {
                                    Toast("Error","danger","poster belum diupload!")
                                }
                            } else {
                                Toast("Error","danger","durasi film harus lebih dari 0!")
                                //alert("durasi film harus lebih dari 0!")
                            }
                        } else {
                            Toast("Error","danger","belum ada genre yang dipilih!")
                            //alert("belum ada genre yang dipilih!")
                        }
                    }
                } else {
                    Toast("Error","danger","produser, direktur, dan castnya harus ada!")
                    //alert("produser, direktur, dan castnya harus ada!")
                }
            } else {
                Toast("Error","danger","judul tidak boleh kosong!")
                //alert("")
            }
        }
    });
    $("#AddBranch").on("click", function () {
        const nama = $("#nama_branch").val();
        if (nama.length > 0) {
            dn = $.ajax({
                type: "POST",
                url: '{{url("/admin/branch/add")}}',
                data: {
                    _token: '{{ csrf_token() }}',
                    nama: nama,
                },
                success: function (data) {
                    var d = JSON.parse(data, false)
                    Reload(d)
                }
            });
        } else {
            alert("Nama tidak boleh kosong!");
        }
    });
    $("#deletemovie").on("click", function () {
        console.log(cmov);
        dn = $.ajax({
            type: "POST",
            url: '{{url("/admin/movie/delete")}}',
            data: {
                _token: '{{ csrf_token() }}',
                id: cmov,
            },
            success: function (data) {
                ReloadMovie(JSON.parse(data, false))
                Toast("Success","success","Berhasil hapus film")
            }
        });
    });
    $('#btn').on("click", function () {
        $("#div_add").css("display", "block")
        $("#div_movie").css("display", "none")
        $("#").val("add")
        $("#").text("Tambah Film")
        $("#juduladd").text("Tambah Film Baru")
    })
    $("#accordionExample").on('click', '.linkgantinama', function (e) {
        const d = $(this).attr("d")
        cbranch = $(this).attr("data-id")
        $("#nama_branch_edit").val(d)
    })
    $("#accordionExample").on('click', '.linkeditstudio', function (e) {
        const d = $(this).attr("d")
        cstudio = $(this).attr("data-id")
        const slot = $(this).attr("data-slot");
        $("#nama_studio_edit").val(d)
        $("#slot_studio_edit").val(slot)
    })
    $("#accordionExample").on('click', '.linkhapusbranch', function (e) {
        const d = $(this).attr("d")
        cbranch = $(this).attr("data-id")
        $("#hapusbranchh1").text("Hapus Branch " + d + "?")
    })
    $("#accordionExample").on('click', '.linkhapusstudio', function (e) {
        const d = $(this).attr("d")
        cstudio = $(this).attr("data-id")
        $("#hapusstudioh1").text("Hapus " + d + "?")
    })
    $("#accordionExample").on('click', '.tambahstudio', function (e) {
        const d = $(this).attr("d")
        cbranch = $(this).attr("data-id")
        $("#modaladdstudioh5").text("Add new Studio for " + d)
    })
    $("#movsec").on('click', '.delmovie', function (e) {
        const d = $(this).attr("d")
        cmov = $(this).val()
        $("#modaldeletemovie h4").text("Anda yakin ingin menghapus film " + d)
    })
    $("#btn_search_branch").click(function () {
        const nama = $("#search_branch").val()
        dn = $.ajax({
            type: "get",
            url: "admin/branch/search",
            data: {
                nama: nama
            },
            success: function (data) {
                Reload(JSON.parse(data, false))
            }
        })
    })


    // Ini bagian untuk snack
    function ReloadSnack(data) {
        var c = $("#containersnack")
        c.html("")
        var str=""
        if (data.length>0) {
          data.forEach(d=>{
            // str+=`<input type='hidden' id='id${d.id}' value='${d.id}'>
            // <input type='hidden' id='nama${d.id}' value='${d.nama}'>
            // <input type='hidden' id='harga${d.id}' value='${d.harga}'>
            // <input type='hidden' id='tipe${d.id}' value='${d.tipe}'>
            // <input type='hidden' id='deskripsi${d.id}' value='${d.deskripsi}'>
            // <input type='hidden' id='foto${d.id}' value='${d.foto}'>`;
            
            str+=`<input type='hidden' id='id${d.id}' value='${d.id}'>
            <input type='hidden' id='nama${d.id}' value='${d.nama}'>
            <input type='hidden' id='harga${d.id}' value='${d.harga}'>
            <input type='hidden' id='tipe${d.id}' value='${d.tipe}'>
            <input type='hidden' id='deskripsi${d.id}' value='${d.deskripsi}'>
            <input type='hidden' id='foto${d.id}' value='${d.foto}'>
          <div class='card col-12 col-md-6 col-lg-4 mb-3 mr-5' style='width: 30%;'>
            <div class=' bg-image hover-overlay ripple d-flex justify-content-center mt-3' data-mdb-ripple-color='light'>
                <img src="{{asset('assets/images/${d.foto}')}}" style='height: 150px;' class='img-fluid' alt='${d.slug}' />
            </div>
            <div class='card-body' style='height: 250px'>
                <h5 class='card-title text-dark'>${d.nama}</h5>
                <p class='card-text'>Harga :Rp.${d.harga}<br>Tipe :${d.tipe}<br> Deskripsi: ${d.deskripsi} <br></p> 
            </div>
            <div class="d-flex justify-content-center mb-10">            
                  <button class='btn btn-warning'  data-mdb-toggle='modal' data-mdb-target='#modaleditSnack' onclick='editSnack(${d.id})'>Edit</button> &nbsp;&nbsp;
                  <button href='' data-mdb-toggle='modal' value='${d.id}' d='${d.nama}' data-mdb-target='#modaldeletesnack' class='delmovie btn btn-danger' onclick='deletesnack(${d.id})'>Delete</button>
            </div>
          </div>`;
          })
        } else {
            str = "<h2>Belum ada snack!</h2>"
        }
        c.html(str)
        dashboard_snack()
      }
      
      // Ini bagian untuk melakukan add snack!!
      $("#AddSnack").on("click", async function(){
        var nm = $("#nama_snack_add").val(); 
        var hg = $("#harga_snack_add").val(); 
        var jenis = "Food"; 
        if($("#jenis_beverage_add").is(":checked")) {
          jenis = "Beverage";
        }
        var img = $("#foto_snack_add")[0].files;
        var deskripsi = $("#deskripsi_snack_add").val();

        // alert(nm + "-" + hg + "-" + jenis); 
        
        if (img.length>0) {
          const fd =new FormData()
          fd.append("_token",'{{ csrf_token() }}')
          fd.append("nama", nm)
          fd.append("harga",hg)
          fd.append("jenis",jenis)
          fd.append("image",$("#foto_snack_add").prop("files")[0])
          fd.append("deskripsi", deskripsi)

          dn = $.ajax({
            type: "POST",
            url: '{{url("/admin/snack/add")}}',
            data: fd,
            contentType: false,
            processData: false,
            cache:false,
            dataType: 'html',
            success: function(data){
              var d = JSON.parse(data,false)
              // alert(data);
              ReloadSnack(d)
            },
            error: function (xhr, ajaxOptions, thrownError) {
              alert(xhr.status);
              alert(thrownError);
              console.log(xhr.responseText);
            }
          }); 
        } 
        else {
          alert("foto snack belum diupload!")
        } 
      });
      
      var myurl = "<?php echo URL::to('/'); ?>";
      function deletesnack(id) {
        var dd =$("#delete_id_snack").val(id);
        
      }
      
      $("#DeleteSnack").on("click",function(){
        var id = $("#delete_id_snack").val(); 
         
        dn=$.ajax({
          type:"post",
          url:'{{url("/admin/snack/delete")}}',
          data: {
            _token:'{{ csrf_token() }}',
            id:id
          },
          success:function(data){
            var d=JSON.parse(data,false)
            ReloadSnack(d)
          }
        })
    })

      function editSnack(id) {
        $("#id_snack_edit").val($("#id" + id).val()); 
        $("#nama_snack_edit").val($("#nama" + id).val()); 
        $("#harga_snack_edit").val($("#harga" + id).val()); 
        if($("#tipe" + id).val() == "Food") {
          $("#jenis_food_edit").prop("checked", "checked");
        }
        else {
          $("#jenis_beverage_edit").prop("checked", "checked");
        }
        $("#deskripsi_snack_edit").val($("#deskripsi" + id).val());
    }

      $("#EditSnack").on("click", async function() {
        var id = $("#id_snack_edit").val(); 
        var nm = $("#nama_snack_edit").val(); 
        var hg = $("#harga_snack_edit").val(); 
        var jenis = "Food"; 
        if($("#jenis_beverage_edit").is(":checked")) {
          jenis = "Beverage";
        }
        var deskripsi = $("#deskripsi_snack_edit").val();

        var img= $("#foto_snack_edit")[0].files;

        
        
        var vimage = "";
        if (img.length > 0) {
          vimage = $("#foto_snack_edit").prop("files")[0];
        }

        const fd	=new FormData()
        fd.append("_token",'{{ csrf_token() }}')
        fd.append("id", id)
        fd.append("nama", nm)
        fd.append("harga",hg)
        fd.append("jenis",jenis)
        fd.append("deskripsi",deskripsi)
        fd.append("imagelength",img.length)
        fd.append("image",vimage)

        dn = $.ajax({
          type: "POST",
          url: '{{url("/admin/snack/edit")}}',
          data: fd, 
          contentType: false,
          processData: false,
          cache:false,
          dataType: 'html',
          success: function(data){
            var d	=	JSON.parse(data,false)
            ReloadSnack(d);
          },
          error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
            console.log(xhr.responseText);
          }
        }); 
      })

      //untuk menampilkan perubahan dashboard
      // function reloadsnackbaru(d){

      // }
</script>
@endsection
