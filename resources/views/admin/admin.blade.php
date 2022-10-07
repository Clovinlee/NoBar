@extends('master.masterlayout')
@section('body')
    <x-sidebaradmin></x-sidebaradmin>
    <div style="display:">
      @include('admin.branch')
    </div>
    <div>
      {{-- @include('admin.movie') --}}
    </div>
    <div style="display: none">
      @include('admin.schedule')
    </div>
@endsection
@section('pageScript')
<script>
  $(document).ready(function(){
    var page=["#nav_dashboard","#nav_branch","#nav_movie","#nav_schedule"];
    
    $("#nav_branch").on("click",function(){

    })
  });
</script>
@endsection