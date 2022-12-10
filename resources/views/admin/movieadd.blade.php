<main>
  <h1 class=" mx-2" id="juduladd">Tambah Film Baru</h1>
  <div class="col-9 px-5">
    <div class="form-group">
      <label for="movie_judul" class="form-label text-white">Judul Film</label>
      <input type="text" class="form-control" id="movie_judul" placeholder="Judul film">
    </div>
    <div class="mb-3">
      <label for="img" class="form-label text-white">Poster Film</label>
      <input class="form-control" type="file" id="img">
    </div>
      <h5 class="">Produser : </h5>
      <div id="list_produser">
          
      </div>
      <div class="form-group">
        <label for="movie_produser" class="form-label text-white">Tambah Produser</label>
        <input type="text" class="form-control" id="movie_produser" placeholder="Produser baru">
      </div>
      <button id="addproducer" class="btn btn-primary mt-2"><i class="fa-solid fa-plus"></i></button><br>
      <h5 class="">Direktur : </h5><br>
      <div  id="list_direktur">
          
      </div>
      <div class="form-group">
        <label for="movie_direktur" class="form-label text-white">Tambah Direktur</label>
        <input type="text" class="form-control" id="movie_direktur" placeholder="Direktur baru">
      </div>
      <button class="mt-2 btn btn-primary" id="adddirektur"><i class="fa-solid fa-plus"></i></button><br>
      Cast :<br>
      <div id="list_cast"></div>
      <div class="form-group">
        <label for="movie_cast" class="form-label text-white">Tambah Cast</label>
        <input type="text" class="form-control" id="movie_cast" placeholder="Cast baru">
      </div>
      <button class="btn btn-primary mt-2" id="addcast"><i class="fa-solid fa-plus"></i></button><br>
      <div class="mb-3">
        <label for="synopsis" class="form-label text-white">Synopsis</label>
        <textarea class="form-control" id="synopsis" cols="30" rows="10"></textarea>
      </div>
      <h5>Genre : </h5><br>
      <input type="checkbox" name="add_comedy" id="add_Comedy"><span class="text-white">Comedy</span> <br>
      <input type="checkbox" id="add_Horror"><span class="text-white">Horror</span> <br>
      <input type="checkbox" id="add_Action"><span class="text-white">Action</span> <br>
      <input type="checkbox" id="add_Romance"><span class="text-white">Romance</span> <br>
      <input type="checkbox" id="add_Fantasy"><span class="text-white">Fantasy</span> <br>
      <input type="checkbox" id="add_Superhero"><span class="text-white">Superhero</span> <br>
      <input type="checkbox" id="add_History"><span class="text-white">History</span> <br>
      <input type="checkbox" id="add_Life"><span class="text-white">Life</span> <br>
      <input type="checkbox" id="add_Nature"><span class="text-white">Nature</span> <br>
      <div class="form-group">
        <label for="durasi" class="form-label text-white">Duration (menit)</label>
        <input type="text" class="form-control" id="durasi" placeholder="Durasi film">
      </div>
      <button class="btn btn-success mt-3" id="addmovie" val="add">Tambah Film</button>
      </div>