@extends('master.masterlayout')
@section("subtitle","Cafe")

@section('body')

{{-- Loading AjAX --}}
<div id="processLoading" style="display: none">
    <div class="position-absolute w-100 vh-100 bg-black opacity-50 d-flex flex-column justify-content-center align-items-center" style="z-index:99" style="">
        <div class="spinner-border text-white" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <div class="text-white">Processing payment, please wait</div>
    </div>
</div>

<!-- preloader -->
<div id="preloader">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <img src="{{ asset('assets/img/preloader.svg') }}" alt="">
        </div>
    </div>
</div>
<!-- preloader-end -->

<!-- Scroll-top -->
<button class="scroll-top scroll-to-target" data-target="html">
    <i class="fas fa-angle-up"></i>
</button>
<!-- Scroll-top-end-->

@section('navbar')
<x-navbar2></x-navbar2>
@endsection


<!-- main-area -->
<main>
    <section class="ucm-area ucm-bg" data-background="{{ asset('assets/images/cafe_bg.jpg') }}">
        <br>
        <div class="container">
            <div class="row align-items-end mb-55">
                <div class="col-lg-6">
                    <div class="section-title text-left">
                        <span class="sub-title">Welcome To</span>
                        <h2 class="">NoBar Cafe</h2>
                        <button class="btn btn-outline-primary" onclick="resetOrder()">
                            <i class="fa-solid fa-arrows-rotate"></i> &nbsp; Reset
                        </button>
                    </div>
                </div>
            </div>

            <div>
                <!-- Tabs navs -->
                <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="navCafe nav-link active" id="ex3-tab-1" data-mdb-toggle="tab" href="#ex3-tabs-1"
                            role="tab" aria-controls="ex3-tabs-1" aria-selected="true">
                            <i class="fa-solid fa-pizza-slice"></i> &nbsp; Foods
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="navCafe nav-link" id="ex3-tab-2" data-mdb-toggle="tab" href="#ex3-tabs-2" role="tab"
                            aria-controls="ex3-tabs-2" aria-selected="false">
                            <i class="fa-solid fa-mug-saucer"></i> &nbsp; Beverages
                        </a>
                    </li>
                </ul>
                <!-- Tabs navs -->

                <!-- Tabs content -->
                <div class="tab-content shadow rounded-3 p-4" id="ex2-content" style="background-color: #14141d8a;">
                    <div class="tab-pane fade show active" id="ex3-tabs-1" role="tabpanel" aria-labelledby="ex3-tab-1">
                        <div class="row">
                            @foreach ($listSnacks as $f)
                            <div class="col-6 col-lg-3">
                                <x-foodcard idFood="{{ $f->id }}" description="{{ $f->deskripsi }}" img="{{ $f->foto }}" price="{{ $f->harga }}">{{ $f->nama }}</x-foodcard>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="ex3-tabs-2" role="tabpanel" aria-labelledby="ex3-tab-2">
                        <div class="row">
                            @foreach ($listBeverages as $f)
                            <div class="col-6 col-lg-3">
                                <x-foodcard idFood="{{ $f->id }}" description="{{ $f->deskripsi }}" img="{{ $f->foto }}" price="{{ $f->harga }}">{{ $f->nama }}</x-foodcard>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Tabs content -->
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center col-12">
            <br>
            @php
            $openTime = env("CAFE_OPEN_TIME") ?? "10:00";
            $closeTime = env("CAFE_CLOSE_TIME") ?? "22:30";
            date_default_timezone_set("Asia/Jakarta");
            @endphp
            @if (time() >= strtotime($openTime) && time() <= strtotime($closeTime)) <button
                class="btn btn-danger p-3 px-5" data-mdb-toggle="modal" data-mdb-target="#modalBranch"
                onclick="updateConfirmation(event)"
                id="btnConfirmOrderCafe"
                >
                Confirm Order
                </button>
                @else
                <button class="btn btn-danger disabled">
                    Sorry we are still closed. <br><span class="fw-bold h5">Open time : {{ $openTime }} -
                        {{ $closeTime }}</span>
                </button>
                @endif
        </div>
    </section>
</main>
<!-- main-area-end -->

<!-- Modal Confirmation Order -->
<div class="modal fade" id="modalConfirmationCafe" tabindex="-1" aria-labelledby="modalConfirmationCafeLabel"
    aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning" style="display: flex; justify-content: center">
                <h5 class="modal-title" id="modalConfirmationCafeLabel">Confirmation Order</h5>
            </div>
            <div class="modal-body row">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="fw-bold">Purchased Items</div>
                    <div class="fw-bold">Total</div>
                </div>
                <span id="cafeConfirmationItemList">
                    {{-- ITEM HERE JS --}}
                </span>
                <div class="col-12 text-end">
                    <br>
                    <b>Subtotal</b> <br>
                    <span class="text-success fw-bold" id="cafeConfirmationSubtotal">Rp70.000</span>
                </div>
            </div>
            <div class="text-dark" style="margin-left: 20px">
                Branch : <span class="text-warning fw-bold" id="confirmationBranch">Ciputra World</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-target="#modalBranch" data-mdb-toggle="modal">Back</button>
                <button type="button" class="btn btn-success" onclick="ajaxPay(event)">Confirm</button>
            </div>
        </div>
    </div>
</div>

{{-- Modal Select Branch --}}
<div class="modal fade" id="modalBranch" tabindex="-1" aria-labelledby="modalBranchLabel"
    aria-hidden="true" data-mdb-backdrop="static" data-mdb-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning" style="display: flex; justify-content: center">
                <h5 class="modal-title" id="modalBranchLabel">Select your branch</h5>
            </div>
            <div class="modal-body">
                <select name="selectbranch" id="selectbranch" class="w-100">
                    @foreach ($listBranch as $b)
                        <option value="{{ $b->id }}">{{ $b->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Back</button>
                <button type="button" class="btn btn-success" data-mdb-target="#modalConfirmationCafe" data-mdb-toggle="modal" onclick="updateBranch()">Confirm</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Food -->
<div class="modal fade" id="modalDetailFood" tabindex="-1" aria-labelledby="modalDetailFoodLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img id="modalDetailFoodImage" src="https://mdbcdn.b-cdn.net/wp-content/uploads/2020/06/vertical.webp" class="img-fluid rounded-start h-100"/>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title text-warning" id="modalDetailFoodTitle">Card title</h5>
                                <button type="button" class="btn-close" data-mdb-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <p class="card-text text-dark" id="modalDetailFoodBody">
                                This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.
                            </p>
                            <p class="text-dark">Price : <span id="modalDetailFoodPrice" class="fw-bold text-warning">Rp10.000</span></p>
                            <div class="d-flex justify-content-end align-items-center">
                                <button type="button" class="btn btn-warning" data-mdb-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if (Session::has("error"))
    <x-toast title="Error" type="danger">{!! Session::get("error") !!}</x-toast>
@elseif(Session::has("info"))
    <x-toast title="info" type="info">{!! Session::get("info") !!}</x-toast>
@endif

@php
    $encoded = json_encode(Session::get("listItem"));
@endphp

<x-footer></x-footer>

@section('pageScript')
    <!-- IMPORT MIDTRANS -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_SERVERKEY') }}"></script>
    <!--  -->

    <script>
        var listItem = [];
        if('{!! $encoded !!}' != "null"){
            listItem = JSON.parse('{!! $encoded !!}');
            listItem.forEach(el => {
                var id = el.id;
                $(".card-body input#"+id).val(el.qty);
            });
        }

        function resetOrder(){
            $.ajax({
            type:"POST",
            url:"{{ url('/cafe/resetOrder') }}",
            data:{
                _token:'{{ csrf_token() }}',
            },success: function(body){
                if(body == 200){
                    window.location.reload();
                }else{
                    console.log("Error refresh");
                    console.log(body);
                }
            }
            })
        }

        function ajaxTrans(result){
        $.ajax({
            type:"POST",
            url:"{{ url('/cafe_pay/process') }}",
            data:{
                _token:'{{ csrf_token() }}',
                mdResult: JSON.stringify(result),
                idBranch:$("#selectbranch").val(),
                listItem:JSON.stringify(listItem),
            },
            success: function(body){
                console.log("DB Added |code : "+body);
                window.location.replace("http://{{env('APP_URL')}}/user/history");
            }
        })
        }

        function ajaxPay(e){
            $("#processLoading").show();
            $.ajax({
            type:'POST',
            url:'{{ url("/cafe_pay") }}',
            data:{
                _token:'{{ csrf_token() }}',
                idBranch:$("#selectbranch").val(),
                listItem:JSON.stringify(listItem),
            },
            success:function(body) {
                if(body == false){
                    //If user not logged in, then go to login and save session
                    // window.location.reload();
                    console.log(body);
                    window.location.href = "{{ url('/login') }}";
                }else{
                    console.log(body);
                    $("#processLoading").hide();
                    var r = JSON.parse(body);
                    
                    //TODO : Return of body : undefined?

                    // Isi body
                    // "token"=>$mdToken,
                    // "idBranch"=>$r->idBranch,
                    // "listItem"=>$listItem,

                    snap.pay(r.token, {
                        onSuccess: async function(result){
                            await ajaxTrans(result)
                            console.log("SUCCESS PAYMENt");
                            },
                        onPending: async function(result){
                            console.log(result);
                            tst = result;
                            await ajaxTrans(result);
                            console.log("PENDING Payment");

                        },
                        // Optional
                        onError: function(result){
                            console.log("Error");
                            console.log(result);
                        }
                    });
                }
            }
            });
        }

        function updateBranch(){
            $("#confirmationBranch").text($("#selectbranch option:selected").text());
        }

        function number_format(n){
            return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        function filterListItem(){
            listItem.forEach(function(f, idx){
                if(f["qty"] <= 0){
                    listItem.splice(idx,1);
                }
            });
            if(listItem.length <= 0){
                $("#btnConfirmOrderCafe").addClass("disabled");
            }else if(listItem.length > 0){
                $("#btnConfirmOrderCafe").removeClass("disabled");
            }

            ajaxSaveCart();
        }

        function ajaxSaveCart(){
            $.ajax({
            type:'POST',
            url:'{{ url("/cafe/save") }}',
            data:{
                _token:'{{ csrf_token() }}',
                listItem:JSON.stringify(listItem),
            },
            success:function(body) {
                    if(body == 200){
                        console.log("cart saved");
                    }else{
                        console.log("cart unsaved");
                        console.log(body);
                    }
                }
            })
        }

        function updateConfirmation(e){
            var container = $("#cafeConfirmationItemList");
            var subtotal = $("#cafeConfirmationSubtotal");

            container.empty();
            var totalPrice = 0;
            listItem.forEach(f => {
                var nama = f["nama"];
                var qty = f["qty"];
                var price = f["price"];
                var id = f["id"];
                totalPrice += qty*price;
                var toprice = qty*price;
                container.append(
                    `
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">${nama}(${qty})</div>
                        <div class="">Rp${number_format(toprice)}</div>
                    </div>
                    `
                );
            });

            subtotal.text("Rp"+number_format(totalPrice));
        }
    </script>
@endsection

@endsection