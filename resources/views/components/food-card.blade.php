<div class="card text-center bg-transparent shadow-5" style="">
    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="dark">
        <img src="{{ $img }}" class="img-fluid" />
        <a href="#!" data-mdb-toggle="modal" data-mdb-target="#modalDetailFood" onclick="updateDetailFood(event)">
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
        </a>
    </div>
    <div class="card-body">
        <h5 class="card-title">{{ $slot }}</h5>
        <p class="small text-warning m-0">Rp{{ number_format($price) }}</p>
        <p class="card-text foodDetail">{{ $description }}</p>
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-warning fw-bold" onclick="modifyQty(event)"><</button> 
            {{-- ID Foods ada di id=x --}}
                <input type="text" name="" id="{{ $idFood }}" price="{{ $price }}" title="{{ $slot }}" class="text-white text-center mx-2" placeholder="0"
                    maxlength="3" style="width: 40px; border:0; outline:0; background:transparent; border-bottom: 1px solid white;" readonly>
                <button type="button" class="btn btn-warning fw-bold" onclick="modifyQty(event)">></button>
        </div>
    </div>
</div>

<script>
    function updateDetailFood(e){
        var mainParent = $(e.target).parent().parent().parent();
        var title = "{{ $slot }}"
        var description = "{{ $description }}"
        var img = $(e.target).parent().parent().find("img");
        var price = "{{ $price }}"

        var modalImg = $("#modalDetailFoodImage");
        var modalTitle = $("#modalDetailFoodTitle")
        var modalBody = $("#modalDetailFoodBody");
        var modalPrice = $("#modalDetailFoodPrice");

        modalPrice.text("Rp"+number_format(price));
        modalImg.attr("src","{{ $img }}");
        modalBody.text(description);
        modalTitle.text(title);
    }

    function modifyQty(e){
        var btn = $(e.target)
        var parent = btn.parent();
        var inp = parent.find("input");
        var inpVal = 0;
        if(inp.val() != ""){
            inpVal = parseInt(inp.val());
        }
        if(btn.text() == "<"){
            if(inpVal-1 < 0) return;
            inp.val(inpVal-1)
        }else if(btn.text() == ">"){
            inp.val(inpVal+1)
        }
        
        var exist = false;
        listItem.forEach(f => {
            if(f["id"] == inp.attr("id")){
                f["qty"] = inp.val();
                exist = true;
            }
        });

        if(!exist){
            listItem.push({id:inp.attr("id"), qty:1, price:inp.attr("price"), nama:inp.attr("title")})
        }

        filterListItem();

        console.log(listItem);
    }
</script>
