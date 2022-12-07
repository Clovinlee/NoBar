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
        const page = ["dashboard", "report_profit", "report_movie", "report_crowd", "report_snack", "report_branch", "master_karyawan"];
        
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
        function ReloadKaryawan(data){
            var c=$("#containerkaryawan")
            c.html("")
            var str = ""
            if(data.length>0){
                str += `<table border='1px' class='table table-striped'>`;
                    str += `<tr>`;
                        str += `<th>Nama Karyawan</th>`;
                        str += `<th>Email Karyawan</th>`;
                        str += `<th>Register at</th>`;
                        str += `<th>Role</th>`;
                        str += `<th>Action</th>`;
                    str += `</tr>`;
                    data.forEach(d=>{
                        str += `<tr>`;
                            str += `<td>${d.name}</td>`;
                            str += `<td>${d.email}</td>`;
                            str += `<td>${d.created_at}</td>`;
                            str += `<td>${d.role}</td>`;
                            str += `<td><button data-mdb-toggle="modal" value="${d.id}" data-mdb-target="#modaldeletekaryawan" class="deluser btn btn-danger" onclick="deleteusers(${d.id})">Delete</button></td>`;
                        str += `</tr>`;
                    })
                str += `</table>`;
            }
            else{
                str = "<h2>Belum ada karyawan!</h2>";
            }
            c.html(str)
        }

        $("#AddKaryawan").on("click", async function(){
            var nama = $("#nama_karyawan_add").val();
            var email = $("#email_karyawan_add").val();
            var pass = $("#password_karyawan_add").val();
            var cpass = $("#cpassword_karyawan_add").val();

            alert(pass + " - " + cpass);
            if(pass == cpass){
                const fd = new FormData()
                fd.append("_token",'{{ csrf_token() }}')
                fd.append("nama", nama)
                fd.append("email", email)
                fd.append("password", pass)
                dn = $.ajax({
                    type: "POST",
                    url: '{{url("/manager/karyawan/add")}}',
                    data: fd,
                    contentType: false,
                    processData: false,
                    cache:false,
                    dataType: 'html',
                    success: function(data){
                    var d = JSON.parse(data,false)
                    ReloadKaryawan(d)
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(xhr.status);
                        alert(thrownError);
                        console.log(xhr.responseText);
                    }
                }); 
            }
            else{
                alert("password dan konfirmasi password tidak sama");
            }
        })

        function deleteusers(id){
            $("#delete_id_user").val(id);
        }

        $("#DeleteUsers").on("click", function(){
            var id = $("#delete_id_user").val();
            dn=$.ajax({
                type:"post",
                url:'{{url("/manager/karyawan/delete")}}',
                data: {
                    _token:'{{ csrf_token() }}',
                    id:id
                },
                success:function(data){
                    var d=JSON.parse(data,false)
                    ReloadKaryawan(d)
                }
            })
        })

        
    </script>
@endsection