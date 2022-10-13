@extends('master.masterlayout')
@section('body')
    <x-sidebaradmin></x-sidebaradmin>
    {{-- <div id="div_dashboard" style="display:none">
      @include('admin.dashboard')
    </div> --}}
    <div id="div_branch" style="display:block">
      @include('admin.branch')
    </div>
    <div id="div_movie"style="display: none">
      @include('admin.movie')
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
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    function Reload(){
      $.ajax({
        type: "get",
        url: "url",
        data: "data",
        dataType: "dataType",
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