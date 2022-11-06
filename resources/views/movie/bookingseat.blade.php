@extends('master.masterlayout')
@section("subtitle","Booking Seat")

@section("navbar")
<x-navbar></x-navbar>
@stop

@section('body')
    <!-- data: _token, jadwal, idJadwal, qtyTicket  $schedule -->
    @php $alphabets = "ABCDEFGHIJKLMNOPQRSTUVWXYZ"; $alphabets = str_split($alphabets); @endphp
    <!--  -->

    <div id="processLoading" style="display: none">
        <div class="position-absolute w-100 vh-100 bg-black opacity-50 d-flex flex-column justify-content-center align-items-center" style="z-index:99" style="">
            <div class="spinner-border text-white" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div class="text-white">Processing payment, please wait</div>
        </div>
    </div>

    <div class="container-fluid px-3 py-2">
        <div class="col-6" style="font-size: 0.7em">
            <div class="d-flex justify-content-start gap-4">
                <span><i class="fa-solid fa-square text-success"></i>&nbsp;Available</span> 
                <span><i class="fa-solid fa-square text-warning"></i>&nbsp;Your Seats</span> 
                <span><i class="fa-solid fa-square text-danger"></i>&nbsp;Sold</span> 
                <span><i class="fa-solid fa-square text-secondary"></i>&nbsp;Unavailable</span>
            </div>
            <div class="lh-sm">
                <div><strong>{{ $movie->judul }}</strong></div>
                <div><b>Seats :</b> <span id="seatList">-</span></div>
                <div><b>Tickets :</b> <span id="ticketQty">0</span>/{{ $data["qtyTicket"] }}</div>
                <div><b>Cinema :</b> <span>Tunjungan Plaza XXI</span></div>
                <div><b>Studio :</b> <span>{{ $schedule->studio->nama }}</span></div>
                <div><b>Date :</b> <span>{{ $data["jadwal"] }}</span></div>
                <div><b>Total Payment :</b> Rp<span id="subtotalPrice">45.000</span></div>
            </div>
        </div>
        <div class="row overflow-auto">
            <div class="col-12 d-flex justify-content-center">
                <table>
                    <!-- Generate Top Number -->
                    @php $space_seat = 3; $row_seat = 20; $alphanum = 0; @endphp
                    <!--  -->

                    <tr>
                        <td></td>
                        @for ($i = 1; $i <= $row_seat; $i++)
                            <td class="text-center"><strong>{{ $i }}</strong></td>
                            @if ($i == $space_seat || $i == $row_seat-$space_seat)
                                <td>&nbsp;&nbsp;</td>
                            @endif
                        @endfor
                    </tr>
                    <tr>

                    <!-- Generate Seat -->
                    <!-- intval(($schedule->studio->slot+1)/20) -->
                    @for ($y = 1; $y <= intval(150/$row_seat); $y++)
                        {{-- <td><x-seat></x-seat></td> --}}
                        @for ($x = 1; $x <= $row_seat; $x++)
                            @if ($x == 1)
                                <td><strong>{{ strtoupper($alphabets[$alphanum]) }}&nbsp;&nbsp;</strong></td>
                            @endif
                            <td><x-seat id="{{ $alphabets[$alphanum].$x }}"></x-seat></td>
                            @if ($x == $space_seat || $x == $row_seat-$space_seat)
                                <td>&nbsp;&nbsp;</td>
                            @endif
                        @endfor
                        @php $alphanum += 1 @endphp
                        </tr><tr>
                    @endfor
                    </tr>
                    <tr>
                        <td><strong>{{ strtoupper($alphabets[$alphanum]) }}</strong></td>
                        @for ($i = 1; $i <= 150-(intval(150/$row_seat)*$row_seat); $i++)
                            <td><x-seat id="{{ $alphabets[$alphanum].$i }}"></x-seat></td>
                            @if ($i == $space_seat || $i == $row_seat-$space_seat)
                                <td>&nbsp;&nbsp;</td>
                            @endif
                        @endfor
                    </tr>
                    <!-- End Generate Seat -->

                </table>
            </div>
            <h1 class="text-center mt-4"><strong>LAYAR</strong></h1>
            <div class="col-12 col-md-6 m-auto">
                <button class="btn btn-danger w-100 mb-2 disabled" id="btnPay" onclick="confirmPay()">Confirm Order</button><br>
                <a href="{{ url('/movie/'.$movie->slug.'/schedule') }}"><button class="btn btn-primary w-100">Kembali</button></a>
            </div>
        </div>
    </div>

    @section('pageScript')
        <!-- IMPORT MIDTRANS -->
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_SERVERKEY') }}"></script>
        <!--  -->

        <!-- SCRIPT KURSI -->
        <script>
            var booked = 0;
            var seatList = [];

            
            function bookSeat(e){
                let seat = $(e.target);

                if(seat.attr("status") == "booked"){
                    removeColorClass(seat);
                    seat.attr("status","available");
                    changeSeatColor(seat);
                    booked--;
                    $("#ticketQty").text(booked);
                    $("#btnPay").addClass("disabled");
                    seatList.splice(seatList.indexOf(seat.attr("id")),1);
                    changeSeatText();
                    return;
                }

                if(booked >= {{  $data["qtyTicket"]  }}){
                    return;
                }

                if(seat.attr("status") == "available"){
                    removeColorClass(seat);
                    seat.attr("status","booked");
                    changeSeatColor(seat);
                    booked++;
                    if(booked >= {{ $data["qtyTicket"] }}){
                        $("#btnPay").removeClass("disabled");
                    }
                    seatList.push(seat.attr("id"));
                    changeSeatText();
                }
                $("#ticketQty").text(booked);
            }

            function changeSeatText(){
                $("#subtotalPrice").text((seatList.length * {{ $schedule->price }}).toLocaleString());
                if(seatList.length == 0){
                    $("#seatList").text("-");
                    return;
                }
                $("#seatList").text(seatList);
            }
        
            function changeSeatColor(e){
                let seat = e;
                let status = seat.attr("status");
                if(status == "available"){
                    seat.addClass("text-success");
                }
                if(status == "booked"){
                    seat.addClass("text-warning");
                }
                if(status == "sold"){
                    seat.addClass("text-warning");
                }
                if(status == "unavailable"){
                    seat.addClass("text-secondary");
                }
            }
        
            function removeColorClass(e){
                let seat = e;
                seat.removeClass("text-success");
                seat.removeClass("text-danger");
                seat.removeClass("text-warning");
                seat.removeClass("text-secondary");
            }

            function confirmPay(){
                $("#processLoading").show();
                $.ajax({
                type:'POST',
                url:'/booking_pay',
                data:{
                    _token:'{{ csrf_token() }}',
                    scheduleId:'{{ $schedule->id }}',
                    ticketQty:'{{ $data["qtyTicket"] }}',
                    seatList: JSON.stringify(seatList),
                },
                success:function(token) {
                    $("#processLoading").hide();
                    snap.pay(token, {
                        // Optional
                        onSuccess: function(result){
                            $.ajax({
                                type:"POST",
                                url:"/booking_pay/success",
                                data:{
                                    _token:'{{ csrf_token() }}',
                                    result:result,
                                },
                                success:function(r){
                                    console.log("SUCCES PAYMENT");
                                }
                            },
                        )},
                        // Optional
                        onPending: function(result){
                            // console.log("Pending");
                            // console.log(result);
                            // console.log({{ $schedule->id }})
                            // {
                            //     "status_code": "201",
                            //     "status_message": "Transaksi sedang diproses",
                            //     "transaction_id": "737949c1-752e-470f-8b54-58e43727968c",
                            //     "order_id": "584503423",
                            //     "gross_amount": "200000.00",
                            //     "payment_type": "qris",
                            //     "transaction_time": "2022-09-25 21:31:21",
                            //     "transaction_status": "pending",
                            //     "fraud_status": "accept",
                            //     "finish_redirect_url": "http://example.com?order_id=584503423&status_code=201&transaction_status=pending"
                            // }

                        },
                        // Optional
                        onError: function(result){
                            console.log("Error");
                            console.log(result);
                            $.ajax({
                                type: "POST",
                                url: "/booking_pay/process",
                                data: {
                                    _token:'{{ csrf_token() }}',
                                },
                                success: function (response) {
                                    
                                }
                            });
                        }
                    });
                }
            });
            }
        </script>
        <!--  -->

    @endsection
@endsection