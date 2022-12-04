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
        <div id="div_report_snack" style="display:none">
            @include('manager.report')
        </div>
        <div id="div_master_karyawan" style="display:none">
            @include('manager.master-admin')
        </div>
    </div>
@endsection
@section('pageScript')
    <script>
        $(document).ready(function(){

        });

        var current = 0;
        const page = ["dashboard", "report_profit", "report_movie", "report_crowd", "report_snack"];
        
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

        // ini bagian untuk karyawan

        // function ReloadKaryawan(data){
        //     var c=$("#containerkaryawan")
        //     c.html("")
        //     var str = ""
        //     if(data.length>0){
        //         s
        //         data.forEach(d=>{
                    
        //         })
        //     }
        // }

        function deleteusers(id){
            $("#delete_id_user").val(id);
        }

        $("#DeleteUsers").on("click", function(){
            var id = $("#delete_id_user").val();
            alert(id);
            dn=$.ajax({
                type:"post",
                url:'{{url("/manager/karyawan/delete")}}',
                data: {
                    _token:'{{ csrf_token() }}',
                    id:id
                },
                success:function(data){
                    var d=JSON.parse(data,false)
                    alert(d)
                    // ReloadKaryawan(d)
                }
            })
        })

        // 
    </script>
@endsection