@extends('master.masterlayout')
@section("subtitle","Test Page")

@section("navbar")
<x-navbar></x-navbar>
@stop

@section('body')
<!-- Buttons trigger collapse -->
<button
  class="btn btn-link bg-dark w-100"
  type="button"
  data-mdb-toggle="collapse"
  data-mdb-target="#collapseExample"
  aria-expanded="false"
  aria-controls="collapseExample"
>
<div class="d-flex justify-content-start align-items-center">
    <img src="https://asset-a.grid.id/crop/0x0:0x0/x/photo/2021/11/16/fep_b6mvgaanu5mjpg-20211116024702.jpg" alt="" style="height: 200px; width: 150px"> &nbsp; Spiderman The SpiderVerse
</div>
</button>

<!-- Collapsed content -->
<div class="collapse mt-3" id="collapseExample">
  Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
  squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
  sapiente ea proident.
</div>
@stop

@section('pageScript')
@endsection