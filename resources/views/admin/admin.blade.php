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
    Reload();
  });
  var current=0;
  const page=["dashboard","branch","movie"];
    function Reload(){
      $.ajax({
        type: "get",
        url: "/admin",
        success: function (response) {
          
        }
      });
    }
    function JadwalBranch(){
      $.ajax({
        type: "get",
        url: "/admin/schedule/branch",
        success: function (response) {
          
        }
      });
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
        const table=$("#schedule_table");
        table.html("");
        table.addClass("table table-striped");
        const head=document.createElement("thead");
        const td1=document.createElement("td");
        td1.innerHTML="Branch"
        const td2=document.createElement("td");
        td2.innerHTML="Studio"
        const td3=document.createElement("td");
        td3.innerHTML="Movie"
        const td4=document.createElement("td");
        td4.innerHTML="Waktu Tayang"
        const td5=document.createElement("td");
        td5.innerHTML="Durasi"
        const td6=document.createElement("td");
        td6.innerHTML="Price"
        head.append(td1,td2,td3,td4,td5,td6);
        table.append(head);
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
          table.append(tr);
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
    $("#AddBranch").on("click",function(){
      const nama=$("#nama_branch").val();
      $.ajax({
        type: "get",
        url: "{{url('admin/branch/add')}}",
        data: "nama="+nama,
        success: function (response) {
          $(".btn-close").click();
          
        }, error: function(){
          alert("error")
        }
      });
    });
</script>
@endsection