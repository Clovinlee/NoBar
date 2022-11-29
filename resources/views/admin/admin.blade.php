@extends('master.masterlayout')
@section('body')
    <x-sidebaradmin></x-sidebaradmin>
    <div id="div_dashboard" style="display:block">
      @include('admin.dashboard')
    </div>
    <div id="div_branch" style="display:none">
      @include('admin.branch')
    </div>
    <div id="div_movie"style="display: none">
      @include('admin.movie')
    </div>
    <div id="div_schedule"style="display: none">
      @include('admin.schedule')
    </div>
    <div id="div_snack"style="display: none">
      @include('admin.snack')
    </div>
    <div id="div_add"style="display: none">
      @include('admin.movieadd')
    </div>
@endsection
@section('pageScript')
<script>
  // console.log("HEY")
  $(document).ready(function () {
    $('.js-example-basic-single').select2({dropdownParent: $('#tambahschedule')});
    $('.js-example-basic-multiple').select2({
      dropdownParent: $('#tambahschedule'),
      placeholder: 'Pilih studio',
  });
    //$.fn.modal.Constructor.prototype.enforceFocus = function() {};
    Schedule()
  });
  var dt=null;
  var current=0;
  var cbranch=-1
  var cstudio=-1
  var csched=-1
  var cmov=-1
  var produser=[];
  var casts=[]
  var director=[]
  const page=["dashboard","branch","movie","snack","schedule"];
  var genre=["Comedy","Horror","Action","Romance","Fantasy","Superhero","History","Life","Nature"]
    function Reload(data){
      $("#accordionExample").html("")
      var str="";
      data.forEach(d => {
        str+="<div class='accordion-item' id='branchacc"+d.id+"'><h2 class='accordion-header' id='heading"+d.id+"'><button class='accordion-button collapsed'type='button'data-mdb-toggle='collapse'data-mdb-target='#collapse"+d.id+"'aria-expanded='false'aria-controls='collapse"+d.id+"'><strong>"+d.nama+"</strong></h2><div id='collapse"+d.id+"' class='accordion-collapse collapse' aria-labelledby='heading"+d.id+"'><div class='accordion-body' style='padding-left: 2%'><button class='linkgantinama btn btn-secondary' data-mdb-toggle='modal' data-id='"+d.id+"' d='"+d.nama+"' data-mdb-target='#modaleditbranch'>Ganti nama branch?</button><button class='linkhapusbranch btn btn-danger' data-mdb-toggle='modal'data-id='"+d.id+"' d='"+d.nama+"' data-mdb-target='#modaldeletebranch'>Hapus branch ini!</button><button class=' tambahstudio btn btn-warning' data-mdb-toggle='modal'data-id='"+d.id+"' d='"+d.nama+"' data-mdb-target='#modaladdstudio'>Add new studio here!</button>"
        if (d.studio.length>0) {
          d.studio.forEach(s=>{
            str+="<br><strong>"+s.nama+"</strong><br><button class='linkeditstudio btn-warning btn' data-mdb-toggle='modal'data-id='"+s.id+"'data-slot='"+s.slot+"' d='"+s.nama+"' data-mdb-target='#modaleditstudio'>Edit studio</button><button class='linkhapusstudio btn-danger btn' data-mdb-toggle='modal'data-id='"+s.id+"' d='"+s.nama+"' data-mdb-target='#modalhapusstudio'>Hapus studio</button>"
          })
        } else {
          str+="<h3>Branch ini belum punya studio</h3>"
        }
        str+="</div></div></div>"
          });
          $("#accordionExample").html(str)
    }
    function delproducer(e) {
      const i=$(e.target).val()
      produser.splice(i,1)
      ReloadProducer()
    }
    function deldirektur(e) {
      const i=$(e.target).val()
      director.splice(i,1)
      ReloadDirector()
    }
    function delcast(e) {
      const i=$(e.target).val()
      casts.splice(i,1)
      ReloadCast()
    }
    $("#tambahjadwal").on("click",function(){
      const studio=$("#selectstudio").val()
      if (studio.length>0) {
        if ($("#addtime").val()!="") {
          $.ajax({
          type:"POST",
          url:'{{url("/admin/schedule/add")}}',
          data: {
            _token:'{{ csrf_token() }}',
            studio:studio,
            movie:$("#selectmovie").val(),
            time:$("#addtime").val()
          },
          success:function(data){
            Schedule()
            $("#selectstudio").val(null).trigger('change')
            $("#selectmovie").val(null).trigger('change')
            $("#addtime").val("")
          },error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                    console.log(xhr.responseText);
                  }
        })
        } else {
          alert("Waktu tayang belum diisi!")
        }
      }else{
        alert("Belum pilih studio!")
        $("#selectstudio").val(null).trigger('change')
      }
    })
    function ReloadProducer() {
      var c=""
      var i=0
      produser.forEach(p => {
        c+="<b>"+p+"</b><button class='btn btn-danger justify-content-end align-items-center' style='position:relative; left:60%;' onclick='delproducer(event)' value='"+i+"'>Delete</button><br>"
        i++
      });
      $("#list_produser").html(c)
    }
    function ReloadDirector() {
      var c=""
      var i=0
      director.forEach(d => {
        c+="<b>"+d+"</b><button class='btn btn-danger justify-content-end align-items-center' style='position:relative; left:60%;' onclick='deldirektur(event)' value='"+i+"'>Delete</button><br>"
        i++
      });
      $("#list_direktur").html(c)
    }
    function ReloadCast() {
      var c=""
      var i=0
      casts.forEach(ca => {
        c+="<b>"+ca+"</b><button class='btn btn-danger justify-content-end align-items-center' style='position:relative; left:60%;' onclick='delcast(event)' value='"+i+"'>Delete</button><br>"
        i++
      });
      $("#list_cast").html(c)
    }
    function ReloadMovie(data) { 
      var c=$("#containermovie")
      c.html("")
      var str=""
      if (data.length>0) {
        data.forEach(d=>{
          str+=`
          <div class='card' style='width: 30%; display: inline-block; margin: 9%;''>
            <div class=' bg-image hover-overlay ripple' data-mdb-ripple-color='light'>
              <img src="{{asset('assets/images/${d.image}')}}" class='img-fluid' alt='${d.slug}' />
          </div>
          <div class='card-body'>
              <h5 class='card-title text-dark'>${d.judul}</h5>
              <p class='card-text'>Genre :<br>${d.genre}<br>Duration :<br>${d.duration}<br></p>
              <button href='' value='${d.id}' class='movieedit btn btn-warning'>Edit</button>
              <button href='' data-mdb-toggle='modal' value='${d.id}' d='${d.judul}'
                  data-mdb-target='#modaldeletemovie' class='delmovie btn btn-danger'>Delete</button>
          </div>
          </div>`
        })
      } else {
        str="<h2>Belum ada film yang main!</h2>"
      }
      c.html(str)
     }
     $("#editjadwal").on("click",function () {
      const time=$("#date").val()
        dn=$.ajax({
          type:"POST",
          url:'{{url("/admin/schedule")}}'+"/"+cshed,
          data: {
            _token:'{{ csrf_token() }}',
            id:csched,
            time:time
          },
          success:function(data){
            Schedule()
          },error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                    console.log(xhr.responseText);
                  }
        })
     })
     $("#movsec").on("click",".movieedit",function () {
      var id=$(this).val()
      $.ajax({
        type:"get",
        url:'{{url('/admin/movie/get')}}',
        data:{
          id:id
        },success: function (data) {
          const m=JSON.parse(data,false)
          $("#movie_judul").val(m.judul)
          produser=m.producer.split(", ")
          director=m.director.split(", ")
          casts=m.casts.split(", ")
          $("#synopsis").val(m.synopsis)
          const temp=m.genre.split(", ")
          $("#durasi").val(m.duration)
          temp.forEach(g => {
            $("#add_"+g).prop("checked",true)
          });
          ReloadProducer()
          ReloadDirector()
          ReloadCast()
          $("#div_add").css("display","block")
          $("#div_movie").css("display","none")
          $("#addmovie").val("edit")
        $("#addmovie").text("Edit Film")
        $("#juduladd").text("Edit Film "+m.judul)
        cmov=id
        }
      })
     })
     $("#btnaddschedule").on("click",function () { 
        $.ajax({
          type:"get",
          url:'{{url("/admin/get")}}',
          success:function(data){
            $d=JSON.parse(data,false)
            var str=""
            $d.branch.forEach(b => {
              str+="<optgroup label='"+b.nama+"'>"
              b.studio.forEach(s=>{
                str+="<option value='"+b.id+","+s.id+"'>"+s.nama+"</option>"
              })
            });
            $("#selectstudio").html(str)
            str=""
            $d.movie.forEach(m => {
              str+="<option value='"+m.id+"'>"+m.judul+"</option>"
            });
            $("#selectmovie").html(str)
          }
        })
      })
     $("#schedule_table").on("click",".editschedule",function () {
      const data=dt.row($(this).parents('tr')).data()
      cshed = data.id;
      $("#date").val(data.time)
     })
     $("#schedule_table").on("click",".deleteschedule",function () {
      csched = dt.row($(this).parents('tr')).data().id;

     })
     $("#hapusjadwal").on("click",function () {
      dn=$.ajax({
        type:"post",
        url:'{{url("/admin/schedule/delete")}}',
        data: {
          _token:'{{ csrf_token() }}',
          id:csched
        },
        success:function(data){
          Schedule()
        }
      })
     })
    function Schedule() {
      if (dt!=null) {
        dt.destroy()
      }
      dt=$("#schedule_table").DataTable({
        processing:true,
        serverSide:true,
        ajax:"{{url('/admin/schedule')}}",
        aoColumns:[
            {
              mData:"branch.nama"
            },{
              mData:"studio.nama"
            },{
              mData:"movie.judul"
            },{
              mData:"time"
            },{
              mData:"harga"
            },{
              target:-1,
              data:null,
              defaultContent:"<button class='btn btn-warning editschedule form-control' data-mdb-toggle='modal' data-mdb-target='#ubahjadwalbranch'>Edit</button><button class='btn btn-danger deleteschedule form-control' data-mdb-toggle='modal' data-mdb-target='#hapusjadwal'>Delete</button>"
            }
          ]
      });
  };

    function PageChange(e){
      current=$(e.target).attr("target");
      for (let i = 0; i < page.length; i++) {
        const p = page[i];
        if (i==current) {
          $("#nav_"+p).addClass("active");
          $("#div_"+p).css("display","block");
        } else {
          $("#nav_"+p).removeClass("active");
          $("#div_"+p).css("display","none");
        }
      };
      $("#div_add").css("display","none");
      $("#div_edit").css("display","none");
    } 
    
    $("#EditBranch").on("click",function(){
      const nama=$("#nama_branch_edit").val();
      if (nama.length>0) {
        dn=$.ajax({
        type:"post",
        url:'{{url("/admin/branch/edit")}}',
        data: {
          _token:'{{ csrf_token() }}',
          nama:nama,
          id:cbranch
        },
        success:function(data){
          var d=JSON.parse(data,false)
          Reload(d)
        }
      })
      } else {
        alert("Nama tidak boleh kosong!");
      }
    })
    $("#DeleteBranch").on("click",function(){
      dn=$.ajax({
        type:"post",
        url:'{{url("/admin/branch/delete")}}',
        data: {
          _token:'{{ csrf_token() }}',
          id:cbranch
        },
        success:function(data){
          var d=JSON.parse(data,false)
          Reload(d)
        },error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                    console.log(xhr.responseText);
                  }
      })
    })
    $("#DeleteStudio").on("click",function(){
      dn=$.ajax({
        type:"post",
        url:'{{url("/admin/studio/delete")}}',
        data: {
          _token:'{{ csrf_token() }}',
          id:cstudio
        },
        success:function(data){
          var d=JSON.parse(data,false)
          Reload(d)
        }
      })
    })
    $("#EditStudio").on("click",function(){
      const nama=$("#nama_studio_edit").val()
      const slot=$("#slot_studio_edit").val()
      dn=$.ajax({
        type:"post",
        url:'{{url("/admin/studio/edit")}}',
        data: {
          _token:'{{ csrf_token() }}',
          nama:nama,
          slot:slot,
          id:cstudio
        },
        success:function(data){
          var d=JSON.parse(data,false)
          Reload(d)
        }
      })
    })
    $("#addproducer").on("click",function(){
      const tp=$("#movie_produser").val()
      produser.push(tp)
      $("#movie_produser").val("")
      ReloadProducer()
    })
    $("#adddirektur").on("click",function(){
      const tp=$("#movie_direktur").val()
      director.push(tp)
      $("#movie_direktur").val("")
      ReloadDirector()
    })
    $("#addcast").on("click",function(){
      const tp=$("#movie_cast").val()
      casts.push(tp)
      $("#movie_cast").val("")
      ReloadCast()
    })
    $("#AddStudio").on("click",function(){
      const nama=$("#nama_studio").val();
      const slot=$("#slot_studio").val();
      dn=$.ajax({
        type: "POST",
        url: '{{url("/admin/studio/add")}}',
        data: {
          _token:'{{ csrf_token() }}',
          nama:nama,
          branch:cbranch,
          slot:slot
        },
        success: function(data){
          var d=JSON.parse(data,false)
          Reload(d)
        }
      }); 
    });
    $("#addmovie").on("click",function(){
      if ($(this).val()=="add") {
        const judul=$("#movie_judul").val();
      const synopsis=$("#synopsis").val();
      const duration=$("#durasi").val()
      if (judul.length>0) {
        if (produser.length>0 && casts.length>0 && director.length>0) {
          if (synopsis.length<=0) {
            alert("sinopsis tidak boleh kosong!")
          } else {
            var addgenre=[]
            genre.forEach(g => {
              if ($("#add_"+g).is(":checked")) {
                addgenre.push(g)
              }
            });
            if (addgenre.length>0) {
              if (duration>0) {
                const img=$("#img")[0].files
                if (img.length>0) {
                  const fd=new FormData()
                  fd.append("_token",'{{ csrf_token() }}')
                  fd.append("synopsis",synopsis)
                  fd.append("duration",duration)
                  fd.append("genre",addgenre.join(", "))
                  fd.append("director",director.join(", "))
                  fd.append("produser",produser.join(", "))
                  fd.append("cast",casts.join(", "))
                  fd.append("image",$("#img").prop("files")[0])
                  fd.append("judul",judul)
                  dn=$.ajax({
                  type: "POST",
                  url: '{{url("/admin/movie/add")}}',
                  data: fd,
                  contentType: false,
                  processData: false,
                  cache:false,
                  dataType: 'html',
                  success: function(data){
                    var d=JSON.parse(data,false)
                    $("#movie_judul").val("")
                    produser=[]
                    director=[]
                    casts=[]
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
                      $("#add_"+g).prop("checked",false)
                    });
                    ReloadMovie(d)
                    $("#div_add").css("display","none")
                    $("#div_movie").css("display","block")
                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                    console.log(xhr.responseText);
                  }
                }); 
                } else {
                  alert("poster belum diupload!")
                }
              } else {
                alert("durasi film harus lebih dari 0!")
              }
            }else{
              alert("belum ada genre yang dipilih!")
            }
          }
        } else {
          alert("produser, direktur, dan castnya harus ada!")
        }
      }else{
        alert("judul tidak boleh kosong!")
      }
      }else {
        const judul=$("#movie_judul").val();
      const synopsis=$("#synopsis").val();
      const duration=$("#durasi").val()
      if (judul.length>0) {
        if (produser.length>0 && casts.length>0 && director.length>0) {
          if (synopsis.length<=0) {
            alert("sinopsis tidak boleh kosong!")
          } else {
            var addgenre=[]
            genre.forEach(g => {
              if ($("#add_"+g).is(":checked")) {
                addgenre.push(g)
              }
            });
            if (addgenre.length>0) {
              if (duration>0) {
                const img=$("#img")[0].files
                if (img.length>0) {
                  const fd=new FormData()
                  fd.append("_token",'{{ csrf_token() }}')
                  fd.append("synopsis",synopsis)
                  fd.append("duration",duration)
                  fd.append("genre",addgenre.join(", "))
                  fd.append("director",director.join(", "))
                  fd.append("produser",produser.join(", "))
                  fd.append("cast",casts.join(", "))
                  fd.append("image",$("#img").prop("files")[0])
                  fd.append("judul",judul)
                  fd.append("id",cmov)
                  dn=$.ajax({
                  type: "POST",
                  url: '{{url("/admin/movie/edit")}}',
                  data: fd,
                  contentType: false,
                  processData: false,
                  cache:false,
                  dataType: 'html',
                  success: function(data){
                    var d=JSON.parse(data,false)
                    $("#movie_judul").val("")
                    produser=[]
                    director=[]
                    casts=[]
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
                      $("#add_"+g).prop("checked",false)
                    });
                    ReloadMovie(d)
                    $("#div_add").css("display","none")
                    $("#div_movie").css("display","block")
                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                    console.log(xhr.responseText);
                  }
                }); 
                } else {
                  alert("poster belum diupload!")
                }
              } else {
                alert("durasi film harus lebih dari 0!")
              }
            }else{
              alert("belum ada genre yang dipilih!")
            }
          }
        } else {
          alert("produser, direktur, dan castnya harus ada!")
        }
      }else{
        alert("judul tidak boleh kosong!")
      }
      }
    });
    $("#AddBranch").on("click",function(){
      const nama=$("#nama_branch").val();
      if (nama.length>0) {
        dn=$.ajax({
        type: "POST",
        url: '{{url("/admin/branch/add")}}',
        data: {
          _token:'{{ csrf_token() }}',
          nama:nama,
        },
        success: function(data){
          var d=JSON.parse(data,false)
          Reload(d)
        }
      }); 
      } else {
        alert("Nama tidak boleh kosong!");
      }
    });
    $("#deletemovie").on("click",function(){
      console.log(cmov);
      dn=$.ajax({
        type: "POST",
        url: '{{url("/admin/movie/delete")}}',
        data: {
          _token:'{{ csrf_token() }}',
          id:cmov,
        },
        success: function(data){
          ReloadMovie(JSON.parse(data,false))
        }
      }); 
    });
    $('#btnaddmovie').on("click",function(){
      $("#div_add").css("display","block")
      $("#div_movie").css("display","none")
      $("#addmovie").val("add")
      $("#addmovie").text("Tambah Film")
      $("#juduladd").text("Tambah Film Baru")
    })
    $("#accordionExample").on('click','.linkgantinama',function(e){
        const d=$(this).attr("d")
        cbranch=$(this).attr("data-id")
        $("#nama_branch_edit").val(d)
      })
      $("#accordionExample").on('click','.linkeditstudio',function(e){
        const d=$(this).attr("d")
        cstudio=$(this).attr("data-id")
        const slot=$(this).attr("data-slot");
        $("#nama_studio_edit").val(d)
        $("#slot_studio_edit").val(slot)
      })
      $("#accordionExample").on('click','.linkhapusbranch',function(e){
        const d=$(this).attr("d")
        cbranch=$(this).attr("data-id")
        $("#hapusbranchh1").text("Hapus Branch "+d+"?")
      })
      $("#accordionExample").on('click','.linkhapusstudio',function(e){
        const d=$(this).attr("d")
        cstudio=$(this).attr("data-id")
        $("#hapusstudioh1").text("Hapus "+d+"?")
      })
      $("#accordionExample").on('click','.tambahstudio',function(e){
        const d=$(this).attr("d")
        cbranch=$(this).attr("data-id")
        $("#modaladdstudioh5").text("Add new Studio for "+d)
      })
      $("#movsec").on('click','.delmovie',function(e){
        const d=$(this).attr("d")
        cmov=$(this).val()
        $("#modaldeletemovie h4").text("Anda yakin ingin menghapus film "+d)
      })
      $("#btn_search_branch").click(function(){
        const nama=$("#search_branch").val()
        dn=$.ajax({
          type:"get",
          url:"admin/branch/search",
          data:{
            nama:nama
          },success:function(data){
            Reload(JSON.parse(data,false))
          }
        })
      })

      
      // Ini bagian untuk snack
      function ReloadSnack(data){
        var c=$("#containersnack")
        c.html("")
        var str=""
        if (data.length>0) {
          data.forEach(d=>{
            str+=`
          <div class='card' style='width: 30%; display: inline-block; margin: 9%;''>
            <div class=' bg-image hover-overlay ripple' data-mdb-ripple-color='light'>
              <img src="{{asset('assets/images/${d.foto}')}}" class='img-fluid' alt='${d.slug}' />
          </div>
          <div class='card-body'>
              <h5 class='card-title text-dark'>${d.nama}</h5>
              <p class='card-text'>Harga :Rp.${d.harga}<br>Tipe :${d.tipe}<br> Deskripsi: ${d.deskripsi} <br></p>
              <button href='' value='${d.id}' class=' btn btn-warning' data-mdb-target='#modaleditsnack'>Edit</button>
              <button href='' data-mdb-toggle='modal' value='${d.id}' d='${d.nama }'
                  data-mdb-target='#modaldeletesnack' class='btn btn-danger'>Delete</button>
          </div>
          </div>`
          })
        } else {
          str="<h2>Belum ada snack!</h2>"
        }
        c.html(str)
      }
      
      // Ini bagian untuk melakukan add snack!!
      $("#AddSnack").on("click", async function(){
        alert('1'); 
        var nm = $("#nama_snack_add").val(); 
        var hg = $("#harga_snack_add").val(); 
        var jenis = "Food"; 
        if($("#jenis_beverage_add").is(":checked")) {
          jenis = "Beverage";
        }
        var img= $("#foto_snack_add")[0].files;
        var deskripsi = $("#deskripsi_snack_add").val();

        alert(nm + "-" + hg + "-" + jenis); 
        
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
        $("#delete_id_snack").val(id); 
      }
      
      $("#DeleteSnack").on("click",function(){
        var id = $("#delete_id_snack").val(); 
        alert(id); 
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

      // $("#EditSnack").on("click", function() {
      //   var id = 
      // })
      
</script>
@endsection