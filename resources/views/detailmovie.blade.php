@extends('master.masterlayout')
@section("subtitle","Spiderman The SpiderVerse")

@section("navbar")
<x-navbar></x-navbar>
@stop

@section("navbar2")
<x-fixednavbar></x-fixednavbar>
@stop

@section('body')
<div class="container">
   <h1>Now Playing</h1>
   <div class="d-flex">
      <div>
         IMAGE
      </div>
      <div>
         Description
      </div>
   </div>
</div>
@endsection