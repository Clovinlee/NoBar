<main style="margin-top:58px">
  <h1 class="text-dark" id="juduladd">Tambah Film Baru</h1>
    <div class="form-control" style="width: 40%">
    Judul Film :<input class= "form-control" type="text" id="movie_judul"><br>
Poster Film : <input type="file" name="" id="img">
    Produser :<br>
    <div id="list_produser">
        
    </div>
    Tambah Produser :<input class= "form-control" type="text" id="movie_produser"><button id="addproducer" class="btn btn-primary">Tambah</button><br>
    Direktur :<br>
    <div  id="list_direktur">
        
    </div>
    Tambah Direktur :<input class= "form-control" type="text" id="movie_direktur"><button class="btn btn-primary" id="adddirektur">Tambah</button><br>
    Cast :<br>
    <div id="list_cast"></div>
    Tambah Cast :<input class= "form-control" type="text" id="movie_cast"><button class="btn btn-primary" id="addcast">Tambah</button><br>
    Synopsis: <br><textarea name="" id="synopsis" cols="30" rows="10"></textarea><br>
    Genre : <br>
    <input type="checkbox" name="add_comedy" id="add_Comedy">Comedy <br>
    <input type="checkbox" id="add_Horror">Horror <br>
    <input type="checkbox" id="add_Action">Action <br>
    <input type="checkbox" id="add_Romance">Romance <br>
    <input type="checkbox" id="add_Fantasy">Fantasy <br>
    <input type="checkbox" id="add_Superhero">Superhero <br>
    <input type="checkbox" id="add_History">History <br>
    <input type="checkbox" id="add_Life">Life <br>
    <input type="checkbox" id="add_Nature">Nature <br>
    Duration : <input type="number" name="" id="durasi"><br>
    <button class="btn btn-success" id="addmovie" val="add">Tambah Film</button>
    </div>
  </div>