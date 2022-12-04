@extends('master.masterlayout')

@section('body')
<x-sidebarmanager></x-sidebarmanager>
    <div>
        <div id="div_dashboard" style="display:block">
            @include('manager.dashboard')
        </div>
        <div id="div_report_profit" style="display:none">
            @include('manager.laporan')
        </div>
        <div id="div_report_movie" style="display:none">
            @include('manager.bar')
        </div>
        <div id="div_report_crowd" style="display:none">
            @include('manager.barHari')
        </div>
        <div id="div_report_snack" style="display:none">
            @include('manager.barSnack')
        </div>
        <div id="div_report_branch" style="display:none">
            @include('manager.branch')
        </div>
        <div id="div_report_master_karyawan" style="display:none">
            @include('manager.report')
        </div>
    </div>
@endsection
@section('pageScript')
    <script>
        $(document).ready(function(){

        });

        var current = 0;
        const page = ["dashboard", "report_profit", "report_movie", "report_crowd", "report_snack","report_branch"];
        
        function PageChange(e){
            current = $(e.target).attr("target");
            for(let i = 0; i < page.length; i++){
                const p = page[i];
                if(i == current){
                    $('#nav_'+p).addClass("active");
                    $('#div_'+p).css("display","block");
                }
                else{
                    $('#nav_'+p).removeClass("active");
                    $('#div_'+p).css("display","none");
                }
            }
        }
    </script>
@endsection