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
@endsection
@section('pageScript')
<script>
  // console.log("HEY")
  $(document).ready(function () {
    //Reload();
  });
  var current=0;
  var cbranch=-1;
  const page=["dashboard","branch","movie"];
    function Reload(data){
      $("#accordionExample").html("")
      var str="";
      data.forEach(d => {
        str+="<div class='accordion-item' id='branchacc"+d.id+"'><h2 class='accordion-header' id='heading"+d.id+"'><button class='accordion-button collapsed'type='button'data-mdb-toggle='collapse'data-mdb-target='#collapse"+d.id+"'aria-expanded='false'aria-controls='collapse"+d.id+"'><strong>"+d.nama+"</strong></h2><div id='collapse"+d.id+"' class='accordion-collapse collapse' aria-labelledby='heading"+d.id+"'><div class='accordion-body' style='padding-left: 2%'><button class='linkgantinama btn btn-secondary' data-mdb-toggle='modal' data-id='"+d.id+"' d='"+d.nama+"' data-mdb-target='#modaleditbranch'>Ganti nama branch?</button><button class='linkhapusbranch btn btn-danger' data-mdb-toggle='modal'data-id='"+d.id+"' d='"+d.nama+"' data-mdb-target='#modaldeletebranch'>Hapus branch ini!</button><a href='' class='btn btn-warning'>Add new studio here!</a><h3>Branch ini belum punya studio</h3></div><button onclick='Schedule(event)' value='/admin/branch/schedule/"+d.id+"'class='btn btn-primary' style='margin-left: 2%'>Cek Jadwal</button></div>"
          });
          $("#accordionExample").html(str)
    }
    function Schedule(e) {
    const url=$(e.target).val();
    console.log(url);
    $.ajax({
      type: "get",
      url: url,
      success: function (response) {
        $("#div_schedule").css("display","block");
        for (let i = 0; i < page.length; i++) {
          const p = page[i];
          $("#div_"+p).css("display","none");
        };
        const data=JSON.parse(response);
        const tbody=$("#schedule_table");
        tbody.html("");
        for (let i = 0; i < data.schedule.length; i++) {
          const tr=document.createElement("tr");
          const td1=document.createElement("td");
          td1.innerHTML=data.schedule[i].nama_branch
          const td2=document.createElement("td");
          td2.innerHTML=data.schedule[i].nomor_studio
          const td3=document.createElement("td");
          td3.innerHTML=data.schedule[i].judul_movie
          const td4=document.createElement("td");
          td4.innerHTML=data.schedule[i].time
          const td5=document.createElement("td");
          td5.innerHTML=data.schedule[i].durasi + " menit"
          const td6=document.createElement("td");
          td6.innerHTML=data.schedule[i].price
          tr.append(td1,td2,td3,td4,td5,td6);
          tbody.append(tr);
        }
      }
    });
  }
    function PageChange(e){
      current=$(e.target).attr("target");
      $("#div_schedule").css("display","none");
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
    } 
    $("#EditBranch").on("click",function(){
      const nama=$("#nama_branch_edit").val();
      dn=$.ajax({
        type:"post",
        url:"/admin/branch/"+cbranch,
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
    })
    $("#DeleteBranch").on("click",function(){
      dn=$.ajax({
        type:"post",
        url:"/admin/branch/"+cbranch+"/delete",
        data: {
          _token:'{{ csrf_token() }}',
          id:cbranch
        },
        success:function(data){
          var d=JSON.parse(data,false)
          Reload(d)
        }
      })
    })
    $("#AddBranch").on("click",function(){
      const nama=$("#nama_branch").val();
      dn=$.ajax({
        type: "POST",
        url: "/admin/branch/add",
        data: {
          _token:'{{ csrf_token() }}',
          nama:nama,
        },
        success: function(data){
          var d=JSON.parse(data,false)
          var temp=$("#branchacc"+d.parent).html()
          var temp2="<div class='accordion-item' id='branchacc"+d.id+"'><h2 class='accordion-header' id='heading"+d.id+"'><button class='accordion-button collapsed'type='button'data-mdb-toggle='collapse'data-mdb-target='#collapse"+d.id+"'aria-expanded='false'aria-controls='collapse"+d.id+"'><strong>"+d.nama+"</strong></h2><div id='collapse"+d.id+"' class='accordion-collapse collapse' aria-labelledby='heading"+d.id+"'><div class='accordion-body' style='padding-left: 2%'><button class='linkgantinama btn btn-secondary' data-mdb-toggle='modal' data-id='"+d.id+"' d='"+d.nama+"' data-mdb-target='#modaleditbranch'>Ganti nama branch?</button><button class='linkhapusbranch btn btn-danger' data-mdb-toggle='modal'data-id='"+d.id+"' d='"+d.nama+"' data-mdb-target='#modaldeletebranch'>Hapus branch ini!</button><a href='' class='btn btn-warning'>Add new studio here!</a><h3>Branch ini belum punya studio</h3></div><button onclick='Schedule(event)' value='/admin/branch/schedule/"+d.id+"'class='btn btn-primary' style='margin-left: 2%'>Cek Jadwal</button></div>"
          $("#branchacc"+d.parent).html(temp+temp2)
        }
      });
      
    });
    $("#accordionExample").on('click','.linkgantinama',function(e){
        const d=$(this).attr("d")
        cbranch=$(this).attr("data-id")
        $("#nama_branch_edit").val(d)
      })
      $("#accordionExample").on('click','.linkhapusbranch',function(e){
        const d=$(this).attr("d")
        cbranch=$(this).attr("data-id")
        $("#hapusbranchh1").text("Hapus Branch "+d+"?")
      })
</script>
@endsection