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
    <div id="div_schedule" style="display: none">
      @include('admin.schedule')
    </div>
@endsection
@section('pageScript')
<script>
  // console.log("HEY")
  $(document).ready(function () {
    const page=["dashboard","branch","schedule","movie"];
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    function PageChange(e){
      const current=$(e.target).attr("target");
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
        type: "POST",
        url: "{{url('admin/branch/add')}}",
        data: {"nama":nama},
        success: function (response) {
          $(".btn-close").click();
          
        }, error: function(){
          alert("error")
        }
      });
    });
  });
</script>
@endsection