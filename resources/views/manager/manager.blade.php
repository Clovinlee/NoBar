@extends('master.masterlayout')

@section('body')
<x-sidebarmanager></x-sidebarmanager>
    <div id="div_dashboard" style="display:block">
        @include('manager.dashboard')
    </div>
    <div id="div_report" style="display:block">
        @include('manager.report')
    </div>
@endsection