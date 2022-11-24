<div class="card text-center bg-transparent shadow-5" style="">
    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="dark">
        <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/111.webp" class="img-fluid" />
        <a href="#!">
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
        </a>
    </div>
    <div class="card-body">
        <h5 class="card-title">{{ $slot }}</h5>
        <p class="card-text">Popcorn caramel dilengkapi dengan saus tomat dan barbeque lezat!</p>
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-warning fw-bold" onclick="modifyQty(event)"><</button> 
                <input type="text" name="" id="" class="text-white text-center mx-2" placeholder="0"
                    maxlength="3" style="width: 40px; border:0; outline:0; background:transparent; border-bottom: 1px solid white;">
                <button type="button" class="btn btn-warning fw-bold" onclick="modifyQty(event)">></button>
        </div>
    </div>
</div>

<script>
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
    }
</script>
