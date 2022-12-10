<main style="margin-top:58px">
  <h1 class="">Edit Movie</h1>
    <div class="form-control" style="width: 40%">
      Judul Film :<input class= "form-control" type="text" id="movie_judul_edit"><br>
      Poster Film : <input type="file" name="" id="img">
          Produser :<br>
          <div id="list_produser_edit">
              
          </div>
          Tambah Produser :<input class= "form-control" type="text" id="movie_produser_edit"><button id="addproducer" class="btn btn-primary">Tambah</button><br>
          Direktur :<br>
          <div  id="list_direktur_edit">
              
          </div>
          Tambah Direktur :<input class= "form-control" type="text" id="movie_direktur_edit"><button class="btn btn-primary" id="adddirektur">Tambah</button><br>
          Cast :<br>
          <div id="list_cast_edit"></div>
          Tambah Cast :<input class= "form-control" type="text" id="movie_cast_edit"><button class="btn btn-primary" id="addcast">Tambah</button><br>
          Synopsis: <br><textarea name="" id="synopsis" cols="30" rows="10"></textarea><br>
          Genre : <br>
          <input type="checkbox" name="add_comedy" id="add_comedy">Comedy <br>
          <input type="checkbox" id="add_horror">Horror <br>
          <input type="checkbox" id="add_action">Action <br>
          <input type="checkbox" id="add_romance">Romance <br>
          <input type="checkbox" id="add_fantasy">Fantasy <br>
          Duration : <input type="number" name="" id="durasi"><br>
    <button class="btn btn-success" id="editmovie">Edit Film</button>
    </div>
  </div>